<?php

namespace App\Http\Controllers;

use App\Http\Resources\ManufactureCollection;
use App\Http\Resources\ManufactureResource;
use App\Models\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ManufacturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $manufacture =  Manufacture::all();
        return response()->json(new ManufactureCollection($manufacture),200);

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
        $validator = Validator::make($inputs, Manufacture::$cast);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $manufacture = Manufacture::create($inputs);
        return response()->json(new ManufactureResource($manufacture),200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manufacture = Manufacture::findOrFail($id);
        return response()->json(new ManufactureResource($manufacture),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $manufacture = Manufacture::find($id);
        $manufacture->update($inputs);
        return response()->json(new ManufactureResource($manufacture),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufacture = Manufacture::findOrFail($id);
        $manufacture->delete();
        return response()->json(new ManufactureResource($manufacture),200);
    }


}
