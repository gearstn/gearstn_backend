<?php

namespace Modules\Manufacture\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Manufacture\Entities\Manufacture;
use Modules\Manufacture\Http\Resources\ManufactureResource;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $manufacture =  Manufacture::paginate(number_in_page());
        return ManufactureResource::collection($manufacture)->additional(['status' => 200, 'message' => 'Manufactures fetched successfully']);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param Request $request
    //  * @return Response
    //  */
    // public function store(Request $request)
    // {
    //     $inputs = $request->all();
    //     $validator = Validator::make($inputs, Manufacture::$cast);
    //     if ($validator->fails()) {
    //         return response()->json($validator->messages(), 400);
    //     }
    //     $manufacture = Manufacture::create($inputs);
    //     return response()->json(new ManufactureResource($manufacture),200);
    // }


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
}
