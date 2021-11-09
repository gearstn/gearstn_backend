<?php

namespace App\Http\Controllers;

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
        $sub_categories = SubCategory::all();
        return response()->json(new SubCategoryCollection($sub_categories),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, SubCategory::$cast);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $sub_category = SubCategory::create($inputs);
        return response()->json(new SubCategoryResource($sub_category),200);
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
        $sub_category = SubCategory::find($id);
        $sub_category->update($inputs);
        return response()->json(new SubCategoryResource($sub_category),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $sub_category->delete();
        return response()->json(new SubCategoryResource($sub_category),200);
    }

    public function search(Request $request)
    {
        // dd($request['filter']);

        $inputs = $request->all();
        $inputs = searchable_lang($inputs,'title');
        $request->merge($inputs);

        $filtered_sub_categories = QueryBuilder::for(SubCategory::class,$request)
            ->allowedFilters('title_en', 'title_ar','category_id')
            ->allowedSorts('id')
            ->get();

        return response()->json($filtered_sub_categories,200);
    }
}
