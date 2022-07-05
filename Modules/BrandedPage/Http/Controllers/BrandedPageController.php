<?php

namespace Modules\BrandedPage\Http\Controllers;

use App\Classes\POST_Caller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\BrandedPage\Entities\BrandedPage;
use Modules\BrandedPage\Http\Requests\StoreBrandedPageRequest;
use Modules\BrandedPage\Http\Requests\UpdateBrandedPageRequest;
use Modules\BrandedPage\Http\Resources\BrandedPageResource;
use Modules\Upload\Http\Controllers\UploadController;

class BrandedPageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $branded_pages = BrandedPage::all()->paginate(number_in_page());
        return BrandedPageResource::collection($branded_pages)->additional(['status' => 200, 'message' => 'Branded Pages fetched successfully']);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreBrandedPageRequest $request)
    {
        $inputs = $request->validated();
        $user = Auth::user();
        $inputs['slug'] = $user->company_name;
        $data = [
            'photos' => $inputs['photos'],
            'seller_id' => $inputs['user_id'],
        ];
        $post = new POST_Caller(UploadController::class, 'store', Request::class, $data);
        $response = $post->call();
        if ($response->status() != 200) {return $response;}
        $inputs['image_id'] = $response->getContent();
        unset($inputs['photos']);

        $branded_page = BrandedPage::create($inputs);
        return response()->json(new BrandedPageResource($branded_page), 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $branded_page = BrandedPage::findOrFail($id);
        return response()->json(new BrandedPageResource($branded_page), 200);
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
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateBrandedPageRequest $request, $id)
    {
        $inputs = $request->validated();
        $branded_page = BrandedPage::findOrFail($id);
        $branded_page->update($inputs);
        return response()->json(new BrandedPageResource($branded_page), 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
