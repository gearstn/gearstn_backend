<?php

namespace Modules\Machine\Http\Controllers;

use App\Classes\CollectionPaginate;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Machine\Entities\Machine;
use Modules\Machine\Http\Requests\StoreMachineRequest;
use Modules\Machine\Http\Resources\MachineResource;
use Modules\MachineModel\Entities\MachineModel;
use Modules\Mail\Http\Controllers\MailController;
use Modules\Upload\Http\Controllers\UploadController;
use Modules\MachineModel\Http\Controllers\MachineModelController;
class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Machine[]
     */
    public function index()
    {
        $machines = Machine::where('approved', '=', 1)->paginate(number_in_page());
        return MachineResource::collection($machines)->additional(['status' => 200, 'message' => 'Machines fetched successfully']);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreMachineRequest $request)
    {
        $inputs = $request->validated();

        $user = User::find($inputs['seller_id']);
        foreach ($user->subscriptions()->get() as $plan) {
            if ( str_contains($plan->slug , 'distributor') ) {
                $plan->recordFeatureUsage($plan->slug);
            }
        }
        
        //Uploads route to upload images and get array of ids
        $uploads_controller = new UploadController();
        $request = new Request([
            'photos' => $inputs['photos'],
            'seller_id' => $inputs['seller_id'],
        ]);
        if(!isset($inputs['rent_hours'])) $inputs['rent_hours'] = 0;
        $response = $uploads_controller->store($request);
        if($response->status() != 200) { return $response; }
        $inputs['images'] = $response->getContent();
        unset($inputs['photos']);

        //If the client wants to create a non existing model
        if($inputs['model_id'] == 0 && isset($inputs['new_model'])){
            $models_controller = new MachineModelController();
            $request = new Request([
                'title_en' => $inputs['new_model'],
                'title_ar' => $inputs['new_model'],
                'category_id' => $inputs['category_id'],
                'sub_category_id' => $inputs['sub_category_id'],
                'manufacture_id' => $inputs['manufacture_id'],
            ]);
            $response = $models_controller->store($request);
            if($response->status() != 200)
                return $response;
            $inputs['model_id'] = json_decode($response->getContent())->id;
        }


        if ( isset($inputs['report_file']) ) {
            //Uploads route to upload images and get array of ids
            $uploads_controller = new UploadController();
            $request = new Request([
                'file' => $inputs['report_file'],
                'seller_id' => $inputs['seller_id'],
            ]);
            $response = $uploads_controller->upload_report_file($request);
            if($response->status() != 200) { return $response; }
            $inputs['report_id'] = $response->getContent();
            unset($inputs['report_file']);
        }

        $machine = Machine::create($inputs);
        $machine->sku = random_int(10000000, 99999999);
        $model_title = MachineModel::findorFail($machine->model_id)->title_en;
        $machine->slug = $machine->year.'-'.$machine->manufacture->title_en.'-'.$model_title.'-'.$machine->sku;
        $machine->save();

        //Send Mail To the machine owner
        $mails_controller = new MailController();
        $request = new Request([
            'machine_id' => $machine->id,
            'seller_id' => $inputs['seller_id'],
        ]);
        $response = $mails_controller->store_machine($request);
        if($response->status() != 200) { return $response; }

        return response()->json(new MachineResource($machine), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $machine = Machine::where('slug', '=', $slug)->firstOrFail();
        views($machine)->record();
        return response()->json(new MachineResource($machine), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $machine = Machine::find($id);
        $machine->update($inputs);
        return response()->json(new MachineResource($machine), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);
        $machine->delete();
        return response()->json(new MachineResource($machine), 200);
    }


    public function search_filter(Request $request)
    {
        $inputs = $request->all();
        //Full Search in all fields
        if( isset($inputs['search_query']) && $inputs['search_query'] != null )
            $q = Machine::search($inputs['search_query'])->get();
        else
            $q = Machine::all();

        //Converting result to Resources Collection
        MachineResource::collection($q);

        //Filter for every attribute we want to filter
        $q =  machines_filter($q, 1 ,'approved'); // To get approved
        $q =  machines_filter($q, isset( $inputs['category_id'] ) ? $inputs['category_id'] : null,'category_id');
        $q =  machines_filter($q, isset( $inputs['sub_category_id'] ) ? $inputs['sub_category_id'] : null,'sub_category_id');
        $q =  machines_filter($q, isset( $inputs['manufacture_id'] ) ? $inputs['manufacture_id'] : null,'manufacture_id');
        $q =  machines_filter($q, isset( $inputs['model_id'] ) ? $inputs['model_id'] : null,'model_id');
        $q =  machines_filter($q, isset( $inputs['sell_type'] ) ? $inputs['sell_type'] : null,'sell_type');
        $q =  machines_filter($q, isset( $inputs['condition'] ) ? $inputs['condition'] : null,'condition');
        $q =  machines_filter($q, isset( $inputs['country'] ) ? $inputs['country'] : null,'country');
        $q =  machines_filter($q, isset( $inputs['city_id'] ) ? $inputs['city_id'] : null,'city_id');
        $q =  machines_range_filter($q, isset($inputs['min_price'] ) ? $inputs['min_price'] : null , isset($inputs['max_price'] ) ? $inputs['max_price'] : null , 'price');
        $q =  machines_range_filter($q, isset($inputs['min_year'] ) ? $inputs['min_year'] : null , isset($inputs['max_year'] ) ? $inputs['max_year'] : null , 'year');
        $q =  machines_range_filter($q, isset($inputs['min_hours'] ) ? $inputs['min_hours'] : null , isset($inputs['max_hours'] ) ? $inputs['max_hours'] : null , 'hours');

        //Sort the collection of machines if requested
        $q = $q->when( isset($inputs['sort_by']) && $inputs['sort_by'] != null , function ($q) use ($inputs) {
            $sort = explode( '_', $inputs['sort_by'] );
            if($sort[1] == 'asc')
                return $q->sortBy($sort[0]);
            else
                return $q->SortByDesc($sort[0]);
        });

        //Adding Pagination to a collection
        $paginatedResult = CollectionPaginate::paginate($q, 10);
        return MachineResource::collection($paginatedResult)->additional(['status' => 200, 'message' => 'Machines fetched successfully']);
    }



    public function getMinMaxOfField(){
        $results =[];
        $results[ 'max_price'] = Machine::max('price');
        $results[ 'min_price'] = Machine::min('price');
        $results[ 'max_year' ] = Machine::max('year' );
        $results[ 'min_year' ] = Machine::min('year' );
        $results[ 'max_hours'] = Machine::max('hours');
        $results[ 'min_hours'] = Machine::min('hours');
        return response()->json($results,200);
    }

    public function getRelatedMachines(Request $request){
        $inputs = $request->all();
        $related_machines = Machine::where('approved', '=', 1)->where('id','!=',$inputs['id'])->where('sub_category_id',$inputs['sub_category_id'])->take(10)->get();
        return MachineResource::collection($related_machines)->additional(['status' => 200, 'message' => 'Machines fetched successfully']);
    }

    public function get_machine_price(Request $request){
        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            "machine_id" => 'required',
        ] );
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $machine_price = Machine::find($inputs['machine_id'])->price;
        return response()->json(['price' => $machine_price],200);
    }

}
