<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Album;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function index(){
        $albums = Album::all();
        return view('admin.album.index',compact('albums'));
    }

    public function add(Request $request){
        try{
            $album = new Album();
            $album->title = $request->title;
            $album->status = $request->status == "on" ? 1 : 0;
            $album->save();
            Toastr::success('New Album Created','Operation Success');
            return redirect()->back();
        }catch (\Exception $e){
            Toastr::error($e->getMessage(),'Operation Failed');
        }

    }

    public function edit($id){
        $editAlbum = Album::findOrFail($id);
        $albums = Album::all();
        return view('admin.album.index',compact('albums','editAlbum'));
    }

    public function update(Request $request, $album_id){
        try{
            $album = Album::findOrFail($album_id);
            $album->title = $request->title;
            $album->status = $request->status == "on" ? 1 : 0;
            $album->update();

            Toastr::success('Album Data Updated','Operation Success');
            return redirect()->back();
        }catch (\Exception $e){
           Toastr::error($e->getMessage(),'Operation Failed');
           return redirect()->back();
        }
    }

    public function delete($id){
        try {
            DB::beginTransaction();
            $album = Album::find($id);
            $deleteUrls = [];
            if ($galleries = $album->gallerys) {
                foreach ($galleries as $gallery) {
                    $file_path = public_path() . '/' . $gallery->image;
                    $thumbnail_path = public_path() . '/thumbnail/' . $gallery->image;
                    if (file_exists($file_path)) {
                        $deleteUrls[]= $file_path;
                    }
                    if (file_exists($thumbnail_path)) {
                        $deleteUrls[] = $thumbnail_path;
                    }
                    $gallery->delete();
                    ///code left to delete from local storage;
                }
            }
            $album->delete();
            DB::commit();
            // Delete image only after database changes.
            foreach ($deleteUrls as $url){
                unlink($url);
            }
            Toastr::success('Album Deleted Successfully','Operation Success');
            return redirect()->back();
        }catch (\Exception $e){
            DB::rollBack();
            Toastr::error($e->getMessage(),'Operation Failed');
            return redirect()->back();
        }
    }
}
