<?php

namespace App\Http\Controllers;

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
    public function show($id)
    {
        $machine = Machine::findOrFail($id);
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


    public function search(Request $request)
    {
        $inputs = $request->all();
        //Full Search in all fields
        if($inputs['search_query'] != null )
            $q = Machine::search($inputs['search_query'])->get();
        else
            $q = Machine::all();

        //Converting result to Resources Collection
        MachineResource::collection($q);

        //Filter for every attribute we want to filter
        $q = $q->when($inputs['category_id'] != null, function ($q) use ($inputs) {
           return $q->filter(function ($item) use ($inputs) { if($item->category_id == $inputs['category_id'] )return true;});
        });
        $q = $q->when($inputs['sub_category_id'] != null, function ($q) use ($inputs) {
            return $q->filter(function ($item) use ($inputs) {  return $item->sub_category_id == $inputs['sub_category_id']; });
        });
        $q = $q->when($inputs['manufacture_id'] != null, function ($q) use ($inputs) {
            return $q->filter(function ($item) use ($inputs) { return $item->manufacture_id == $inputs['manufacture_id']; });
        });
        $q = $q->when($inputs['model_id'] != null, function ($q) use ($inputs) {
            return $q->filter(function ($item) use ($inputs) { return $item->model_id == $inputs['model_id']; });
        });
        $q = $q->when($inputs['sell_type'] != null, function ($q) use ($inputs) {
            return $q->filter(function ($item) use ($inputs) { return $item->sell_type == $inputs['sell_type']; });
        });
        $q = $q->when($inputs['condition'] != null, function ($q) use ($inputs) {
            return $q->filter(function ($item) use ($inputs) { return $item->condition == $inputs['condition']; });
        });
        $q = $q->when($inputs['country'] != null, function ($q) use ($inputs) {
            return $q->filter(function ($item) use ($inputs) { return $item->country == $inputs['country']; });
        });
        $q = $q->when($inputs['min_price'] != null || $inputs['max_price'] != null, function ($q) use ($inputs) {
            return $q->filter(function ($item) use ($inputs) { return $item->price >= $inputs['min_price'] && $inputs['max_price'] >= $item->price ; });
        });
        $q = $q->when($inputs['min_year'] != null || $inputs['max_year'], function ($q) use ($inputs) {
            return $q->filter(function ($item) use ($inputs) { return $item->year >= $inputs['min_year'] && $inputs['max_year'] >= $item->year; });
        });
        $q = $q->when($inputs['min_hours'] != null || $inputs['max_hours'] != null, function ($q) use ($inputs) {
            return $q->filter(function ($item) use ($inputs) { return $item->hours >= $inputs['min_hours'] && $inputs['max_hours'] >= $item->hours; });
        });

        //Sort the collection of machines if requested
        $q = $q->when($inputs['sort_by'] != null , function ($q) use ($inputs) {
            if($inputs['sort_order'] == 'asce')
                return $q->sortBy($inputs['sort_by']);
            else
                return $q->SortByDesc($inputs['sort_by']);
        });


        //Adding Pagination to a collection
        $paginatedResult = CollectionPaginate::paginate($q, 1000);
        return MachineResource::collection($paginatedResult)->additional(['status' => 200, 'message' => 'Machines fetched successfully']);
    }
}
