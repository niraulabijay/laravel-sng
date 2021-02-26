<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Album;
use App\Model\PopImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PopImageController extends Controller
{
    //
    public function popImage()
    {
        if($album = PopImage::get()){

            return view('admin.pop-image.index');
        }
        else{
            return redirect()->back()->with('error','Album Not Found! Please Reload Page.');
        }


    }

    public function get_gallery(){
       $images = PopImage::get();
        return $images;
    }

    public function upload(Request $request){

        $validator = Validator::make($request->all(), [
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',

        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()[0] ?? "Action Failed"],400);
        }
        try {

            $pop_image = new PopImage();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $db_filename = fileupload('pop/' , $image);
                $pop_image->image = $db_filename;
            }
            $pop_image->title = $request->title;
            $pop_image->status = $request->status;
            $pop_image->save();
            return response()->json("File Added", 200);
        }catch (\Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

    public function delete($gallery_id){
        $image = PopImage::findOrFail($gallery_id);
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

    public function update(Request $request,$id)
    {
        $pop_image = PopImage::findOrFail($id);
        if($pop_image->status == 1)
        {
            $pop_image->status = 0;
        }
        else
        {
            $pop_image->status = 1;
        }
        $save = $pop_image->save();
  
        if($save){
            return response()->json("Status Changed",200);
        }
        else{
            return response()->json("Error",400);
        }
    }
}
