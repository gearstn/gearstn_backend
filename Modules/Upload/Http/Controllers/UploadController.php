<?php

namespace Modules\Upload\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Modules\Upload\Entities\Upload;
use Modules\Upload\Http\Requests\StoreUploadRequest;
use Modules\Upload\Http\Requests\DestroyUploadRequest;
use Modules\Upload\Http\Requests\StoreFileRequest;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreUploadRequest $request)
    {
        $inputs = $request->validated();
        $images = [];
        foreach ($inputs['photos'] as $image) {

            $fileInfo = $image->getClientOriginalName();
            $newFileName = time() . '.' . $image->extension();
            $img = Image::make($image)->insert( storage_path('app/public/logo.png') , 'bottom-right' ,10 ,10 )->limitColors(256)->gamma(1.0)->encode($image->extension());

            $path = Storage::disk('local')->put($inputs['seller_id'] .'/'. $newFileName,   (string)$img);
            $url = Storage::disk('local')->url($path);

            $photo = [
                'user_id' => isset($inputs['seller_id']) ? $inputs['seller_id'] : Auth::user()->id ,
                'file_original_name' => pathinfo($fileInfo, PATHINFO_FILENAME),
                'extension' => pathinfo($fileInfo, PATHINFO_EXTENSION),
                'file_name' => $newFileName,
                'type' => $image->getMimeType(),
                'url' => $url,
                'file_path' => $path,
            ];
            $images[] = Upload::create($photo)->id;
        }
        return response()->json($images,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(DestroyUploadRequest $request)
    {
        $inputs = $request->validated();
        // foreach($inputs['ids'] as $id){
            $image = Upload::find($inputs['ids']);
            Storage::disk('s3')->delete($image->file_path);
            $image->delete();
        // }
        return redirect()->back();
    }



        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function upload_report_file(StoreFileRequest $request)
    {
        $inputs = $request->validated();
        foreach ($inputs['file'] as $image) {
            $fileInfo = $image->getClientOriginalName();
            $newFileName = time() . '.' . $image->extension();
            $path = Storage::disk('s3')->put('machine_reports', $image);
            $url = Storage::disk('s3')->url($path);
            $photo = [
                'user_id' => isset($inputs['seller_id']) ? $inputs['seller_id'] : Auth::user()->id ,
                'file_original_name' => pathinfo($fileInfo, PATHINFO_FILENAME),
                'extension' => pathinfo($fileInfo, PATHINFO_EXTENSION),
                'file_name' => $newFileName,
                'type' => 'file',
                'url' => $url,
                'file_path' => $path,
            ];
            $file = Upload::create($photo)->id;
        }
        return response()->json($file,200);
    }
}
