<?php

namespace App\Http\Controllers;

use App\Http\Resources\MachineCollection;
use App\Http\Resources\MachineResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Machine;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
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
        $machines = Machine::all();
        return response()->json(new MachineCollection($machines),200);
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
        // $inputs = $request->all();
        // $inputs = searchable_lang($inputs,'title');
        // $request->merge($inputs);

        $filtered_machine_models = QueryBuilder::for(Machine::class,$request)
            ->allowedFilters('description','model_id','category_id','subcategory_id','manufacture_id','seller_id')
            ->allowedSorts('id','year','condition')
            ->get();

        return response()->json($filtered_machine_models,200);
    }
}
