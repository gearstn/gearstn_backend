<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MachineManufacture;

class MachineManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sub_category)
    {
        return MachineManufacture::where('sub_category', '=', $sub_category)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (MachineManufacture::where('manufacture', '=', $request->get('manufacture'))->count() > 0 && MachineManufacture::where('sub_category', '=', $request->get('sub_category'))->count() > 0) {
            return 'Manufacture is already exist';
        }
        return MachineManufacture::create($request->all());
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