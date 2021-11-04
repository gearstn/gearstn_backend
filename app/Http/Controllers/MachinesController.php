<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Machine;
use Illuminate\Http\Response;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Machine[]
     */
    public function index()
    {
        return Machine::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return Machine::create($request->all());
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
    public function search($term)
    {
        return Machine::where('sub_category', 'like', '%'.$term.'%')
                    ->orWhere('manufacture', 'like', '%'.$term.'%')
                    ->orWhere('model', 'like', '%'.$term.'%')
                    ->orWhere('sn', 'like', '%'.$term.'%')
                    ->get();
    }
}
