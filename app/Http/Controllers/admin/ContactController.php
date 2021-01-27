<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\PackageSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

    }

    public function packageEnquiries(){
        $enquiries = PackageSubmission::orderBy('created_at','desc')->get();
        return view('admin.contact.packageEnquiries',compact('enquiries'));
    }

    public function packageEnquiryDetail(Request $request){
        $enquiry = PackageSubmission::find($request->enquiry_id);
        if($enquiry){
            $view = view('admin.contact.enquiryDetails',compact('enquiry'))->render();
            return response()->json($view,200);
        }else{
            return response()->json("Submission not found",400);
        }
    }
}
