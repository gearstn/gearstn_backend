<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Http\Resources\SubCategoryCollection;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = SubCategory::paginate(number_in_page());
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
