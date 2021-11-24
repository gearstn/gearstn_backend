<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Http\Resources\MachineResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Machine;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Classes\CollectionPaginate;
use Spatie\QueryBuilder\QueryBuilder;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Machine[]
     */
    public function index()
    {
        $machines = Machine::paginate(number_in_page());
        return MachineResource::collection($machines)->additional(['status' => 200, 'message' => 'Machines fetched successfully']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, Machine::$cast);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $machine = Machine::create($inputs);
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
        $results['max_price'] = Machine::max('price');
        $results['min_price'] = Machine::min('price');
        $results['max_year'] = Machine::max('year');
        $results['min_year'] = Machine::min('year');
        $results['max_hours'] = Machine::max('hours');
        $results['min_hours'] = Machine::min('hours');
        return response()->json($results,200);
    }
}
