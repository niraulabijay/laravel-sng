<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Album;
use App\Model\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function gallery($album_slug){
        if($album = Album::where('slug',$album_slug)->first()){
            return view('admin.album.gallery',compact('album'));
        }
        else{
            return redirect()->back()->with('error','Album Not Found! Please Reload Page.');
        }
    }
    public function get_gallery($album_id){
        $album = Album::find($album_id);
        $images = $album->galleries;
        return $images;
    }

    public function upload(Request $request,$album_id){
        $validator = Validator::make($request->all(), [
            'album_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()[0] ?? "Action Failed"],400);
        }
        try {
            $album = Album::find($album_id);
            $gallery = new Gallery();
            if ($request->hasFile('album_image')) {
                $image = $request->file('album_image');
                $db_filename = fileupload('album/' . $album->id . '/', $image);
                $gallery->image = $db_filename;
                $gallery->album_id = $album->id;
            }
            $gallery->save();
            return response()->json("File Added", 200);
        }catch (\Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

    public function delete($gallery_id){
        $image = Gallery::findOrFail($gallery_id);
        $file_path = public_path().'/'.$image->image;
        if(file_exists($file_path)){
            unlink($file_path);
        }
        if($image->delete()){
            return response()->json("File deleted",200);
        }
        else{
            return response()->json("Error",400);
        }
    }
}
