<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Model\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
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


}
