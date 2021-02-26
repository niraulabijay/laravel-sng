<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Contact;
use App\Model\PackageSubmission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use PDO;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::orderBy('created_at','desc')->get();
        return view('admin.contact.messages',compact('contacts'));
    }

    public function contactDetail(Request $request){
        $contact = Contact::find($request->contact_id);
        if($contact){
            $view = view('admin.contact.messageDetails',compact('contact'))->render();
            return response()->json($view,200);
        }else{
            return response()->json('Contact message not found');
        }
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

    public function packageDelete($id)
    {
        $package = optional(PackageSubmission::find($id))->delete();
        if($package)
        {
            Toastr::success('Package has been deleted successfully', 'Operation Success');
        }
        return redirect()->back();
    }   

    public function contactDelete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        Toastr::success('Contact has been deleted successfully', 'Operation Success');
        return redirect()->back();
    }
}
