<?php

namespace Modules\SubCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SubCategory\Entities\SubCategory;
use Modules\SubCategory\Http\Resources\SubCategoryResource;

class SubCategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = SubCategory::all();
        return SubCategoryResource::collection($sub_categories)->additional(['status' => 200, 'message' => 'SubCategories fetched successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        return response()->json(new SubCategoryResource($sub_category),200);
    }
}