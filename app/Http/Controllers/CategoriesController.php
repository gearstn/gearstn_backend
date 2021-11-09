<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json(new CategoryCollection($categories),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, Category::$cast);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $category = Category::create($inputs);
        return response()->json(new CategoryResource($category), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json(new CategoryResource($category), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $category = Category::find($id);
        $category->update($inputs);
        return response()->json(new CategoryResource($category), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(new CategoryResource($category), 200);
    }

    public function search(Request $request)
    {
        // dd($request['filter']);

        $inputs = $request->all();
        $inputs = searchable_lang($inputs,'title');
        $request->merge($inputs);

        $filtered_categories = QueryBuilder::for(Category::class,$request)
            ->allowedFilters('title_en', 'title_ar')
            ->allowedSorts('id')
            ->get();

        return response()->json($filtered_categories,200);
    }

}
