<?php

namespace App\Http\Controllers\Contactcontroller;

use App\Models\contact;
use App\Mail\contact_Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\contactMail_reply;
use App\Models\contact_replies;


class ContactController extends Controller
{
    //
    public function Contact_store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'nullable|string|max:50',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'subject' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:500',
        ]);

        $ipAddress = request()->ip();

        $contact = new contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->description = $request->message;
        $contact->ip_address = $ipAddress;
        $contact->user_id = $request->user_id;
        $contact->save();

        $superAdmin = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to(env('SUPER_ADMIN_EMAIL'))->send(new contact_Mail($superAdmin));
        Session::flash('success', 'Contact send data.');
        return back();
    }

    public function Contact_Reply(Request $request)
    {
        $contact = new contact;
        $contact = contact::where('id', $request->contact_id)->first();
        $maildata = [
            'name' => $contact->name,
            'phone' => $contact->phone,
            'email' => $contact->email,
            'message' =>  ucfirst($request->message),
        ];
        $contact_reply = new contact_replies;
        $contact_reply->contact_id =  $contact->id;
        $contact_reply->message = $request->message;
        $contact_reply->user_id = $request->contact_id;
        $contact_reply->save();

        $toEmail = $request->email;
        $ccEmail = 'cc@example.com';
        $bccEmail = 'bcc@example.com';
        Mail::to($contact->email)->send(new contactMail_reply($maildata));

        $request->session()->flash('success', 'Message sent successfully!');

        return back();
    }


    public function Contact_message($id)
    {
        $notes = contact_replies::where('contact_id', $id)->get();
        return $notes;
    }


}
