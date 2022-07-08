<?php

namespace Modules\BrandedPage\Http\Controllers;

use App\Classes\POST_Caller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\BrandedPage\Entities\BrandedPagePost;
use Modules\BrandedPage\Http\Requests\StoreBrandedPagePostRequest;
use Modules\BrandedPage\Http\Requests\UpdateBrandedPagePostRequest;
use Modules\BrandedPage\Http\Resources\BrandedPagePostResource;

class BrandedPagePostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $branded_page_posts = BrandedPagePost::all()->paginate(number_in_page());
        return BrandedPagePostResource::collection($branded_page_posts)->additional(['status' => 200, 'message' => 'Branded Page Posts fetched successfully']);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('brandedpage::create');
    }

    /**
     * Store a newly created resource in storage.
     * @return Renderable
     */
    public function store( StoreBrandedPagePostRequest $request)
    {
        $inputs = $request->validated();
        $user = Auth::user();
        $data = [
            'photos' => $inputs['photos'],
            'seller_id' => $user->id,
        ];
        $post = new POST_Caller(UploadController::class, 'store', Request::class, $data);
        $response = $post->call();
        if ($response->status() != 200) {return $response;}
        $inputs['image_id'] = $response->getContent();
        unset($inputs['photos']);

        $branded_page_post = BrandedPagePost::create($inputs);
        return response()->json(new BrandedPagePostResource($branded_page_post), 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('brandedpage::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('brandedpage::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateBrandedPagePostRequest $request, $id)
    {
        $inputs = $request->validated();
        $branded_page_post = BrandedPagePost::findOrFail($id);
        $branded_page_post->update($inputs);
        return response()->json(new BrandedPagePostResource($branded_page_post), 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $branded_page_post = BrandedPagePost::findOrFail($id);
        $branded_page_post->delete();
        return response()->json(['status' => 200, 'message' => 'Branded Page Post deleted successfully'], 200);
    }
}
