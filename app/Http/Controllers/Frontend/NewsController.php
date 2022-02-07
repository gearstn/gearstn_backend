<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Http\Resources\NewsCollection;
use App\Http\Resources\NewsResource;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(number_in_page());
        return NewsResource::collection($news)->additional(['status' => 200, 'message' => 'News fetched successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $news = News::where('slug','=',$slug)->firstOrFail();
        return response()->json(new NewsResource($news), 200);
    }



    public function latest_news(Request $request)
    {
        $inputs = $request->all();
        $news = News::orderBy('created_at', 'desc')->take((int)$inputs['number'])->get();
        return NewsResource::collection($news)->additional(['status' => 200, 'message' => 'News fetched successfully']);
    }


}