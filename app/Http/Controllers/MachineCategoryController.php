<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MachineCategory;

class MachineCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($equipmenttype)
    {
        return MachineCategory::where('category', '=', $equipmenttype)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (MachineCategory::find($request->name)) {
            return redirect()->back();
        }
        if (MachineCategory::where('sub_category', '=', $request->get('sub_category'))->count() > 0) {
            return 'Categroy is already exist';
        }
        return MachineCategory::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * SELECT title FROM pages WHERE my_col LIKE %$param1% OR another_col LIKE %$param2%;
     */
}