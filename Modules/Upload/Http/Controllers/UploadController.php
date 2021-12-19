<?php

namespace Modules\Upload\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Modules\Upload\Entities\Upload;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        if(isset($inputs['file'])) $inputs['photos'][] = $inputs['file'];

        $validator = Validator::make($inputs, [
            "photos" => ["required","array","min:1","max:5"],
            "photos.*" => ["required","mimes:jpeg,jpg,png,gif","max:500"],
        ] );
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $images = [];
        foreach ($inputs['photos'] as $image) {
            $fileInfo = $image->getClientOriginalName();
            $newFileName = time() . '.' . $image->extension();
            $path = Storage::disk('s3')->put('images', $image);
            $url = Storage::disk('s3')->url($path);
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
    public function destroy(Request $request)
    {
        $inputs = $request->all();
        // foreach($inputs['ids'] as $id){
            $image = Upload::find($inputs['ids']);
            Storage::disk('s3')->delete($image->file_path);
            $image->delete();
        // }
        return redirect()->back();
    }
}
