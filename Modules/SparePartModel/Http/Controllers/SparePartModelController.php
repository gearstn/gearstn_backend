<?php

namespace Modules\SparePartModel\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\SparePartModel\Entities\SparePartModel;
use Modules\SparePartModel\Http\Requests\FilterSparePartsModelRequest;
use Modules\SparePartModel\Http\Resources\SparePartModelResource;

class SparePartModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spare_parts_model = SparePartModel::paginate(number_in_page());
        return SparePartModelResource::collection($spare_parts_model)->additional(['status' => 200, 'message' => 'Spare parts Models fetched successfully']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, SparePartModel::$cast );
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $spare_parts_model = SparePartModel::create($inputs);
        return response()->json(new SparePartModelResource($spare_parts_model), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $spare_parts_model = SparePartModel::findOrFail($id);
        return response()->json(new SparePartModelResource($spare_parts_model), 200);
    }


    //Get models based on sub_category_id && manufacture_id
    public function filter_spare_part_models(FilterSparePartsModelRequest $request)
    {
        $inputs = $request->validated();
        $spare_parts_models = SparePartModel::where('sub_category_id', $inputs['sub_category_id'])->where('manufacture_id', $inputs['manufacture_id'])->get();
        return SparePartModelResource::collection($spare_parts_models)->additional(['status' => 200, 'message' => 'Spare part Models fetched successfully']);
    }
}
