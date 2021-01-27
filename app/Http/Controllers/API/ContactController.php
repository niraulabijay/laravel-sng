<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Mail\PackageMail;
use App\Model\Contact;
use App\Model\PackageSubmission;
use App\Repositories\FrontCms\CmsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class ContactController extends Controller
{
    protected $cms;
    public function __construct(CmsInterface $cms)
    {
        $this->cms = $cms;
    }

    public function create(ContactRequest $request)
    {
        try {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            Mail::to("admin@app.com")->send(new ContactMail($contact));
            return response()->json([
                'status' => 'success',
                'message' => "Mail sent to Sng Hotel."
            ], 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

    public function postPackage(Request $request){
        try{
            $data = $request->all();
            $package = $this->cms->getGlobalPostSingleById($data['package_id']);
            if($package){
                $packageSubmission = PackageSubmission::create([
                    'package_id' => $package->id,
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['contact'],
                    'tour_date' => $data['tour_date'],
                    'no_of_persons' => $data['no_of_persons'],
                    'message' => $data['message']
                ]);
                $packageSubmission->save();
                Mail::to("admin@app.com")->send(new PackageMail($packageSubmission));
                return response()->json([
                    'status' => 'success',
                    'message' => "Package enquiry successfully sent to Sng Hotel."
                ],200);
            }else{
                return response()->json('Package Not Found', 400);
            }
        }catch(\Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }


}
