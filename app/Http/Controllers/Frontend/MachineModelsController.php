<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

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
        $models = MachineModel::paginate(number_in_page());
        return MachineModelResource::collection($models)->additional(['status' => 200, 'message' => 'Models fetched successfully']);

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
}
