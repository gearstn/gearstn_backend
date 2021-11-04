<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MachineModel;
use Illuminate\Http\Response;

class MachineModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($sub_category, $manufacture)
    {
        return MachineModel::where('subcategory_id', '=', $sub_category)->where('manufacture_id', '=', $manufacture)->orderBy('model','ASC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (MachineModel::find($request->name)) {
            return redirect()->back();
        }
        if (MachineModel::where('title', '=', $request->get('title'))->count() > 0) {
            return 'Model is already exist';
        }
        return MachineModel::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     * SELECT title FROM pages WHERE my_col LIKE %$param1% OR another_col LIKE %$param2%;
     */
}
