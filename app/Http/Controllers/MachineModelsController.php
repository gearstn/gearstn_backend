<?php

namespace App\Http\Controllers;

use App\Http\Resources\MachineModelCollection;
use App\Http\Resources\MachineModelResource;
use Illuminate\Http\Request;
use App\Models\MachineModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;

class MachineModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $models = MachineModel::all();
        return response()->json(new MachineModelCollection($models),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, MachineModel::$cast);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $models = MachineModel::create($inputs);
        return response()->json(new MachineModelResource($models),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $models = MachineModel::findOrFail($id);
        return response()->json(new MachineModelResource($models),200);
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
        $models = MachineModel::find($id);
        $models->update($inputs);
        return response()->json(new MachineModelResource($models),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $models = MachineModel::findOrFail($id);
        $models->delete();
        return response()->json(new MachineModelResource($models),200);
    }


    public function search(Request $request)
    {
        $inputs = $request->all();
        $inputs = searchable_lang($inputs,'title');
        $request->merge($inputs);

        $filtered_machine_models = QueryBuilder::for(MachineModel::class,$request)
            ->allowedFilters('title_en', 'title_ar','sub_category_id','manufacture_id')
            ->allowedSorts('id')
            ->get();

        return response()->json($filtered_machine_models,200);
    }

}
