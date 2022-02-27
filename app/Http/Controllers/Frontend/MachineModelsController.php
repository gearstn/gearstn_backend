<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Http\Resources\MachineModelCollection;
use App\Http\Resources\MachineModelResource;
use Illuminate\Http\Request;
use App\Models\MachineModel;
use App\Models\Manufacture;
use App\Models\SubCategory;
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
        return MachineModelResource::collection($models)->additional(['status' => 200, 'message' => 'Models fetched successfully']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $inputs['sub_category_id'] = Manufacture::find($inputs['manufacture_id'])->sub_category_id;
        $inputs['category_id'] = SubCategory::find($inputs['sub_category_id'])->category_id;
        $validator = Validator::make($inputs, MachineModel::$cast);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $machine_model = MachineModel::create($inputs);
        return response()->json(new MachineModelResource($machine_model), 200);
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

    //Get models based on sub_category_id && manufacture_id
    public function filter_models(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            'sub_category_id' => 'required',
            'manufacture_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $models = MachineModel::where('sub_category_id',$inputs['sub_category_id'])->where('manufacture_id',$inputs['manufacture_id'])->get();
        // dd($models);
        return MachineModelResource::collection($models)->additional(['status' => 200, 'message' => 'Models fetched successfully']);
    }
}