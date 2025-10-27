<?php

namespace App\Http\Controllers\DatingStoriesController;

use App\Traits\UploadImage;
use Illuminate\Support\Str;
use App\Mail\UserStorieMail;
use Illuminate\Http\Request;
use App\Models\stories_dating;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class DatingStoriesController extends Controller
{
    use UploadImage;
    //
    public function add_user_stories(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'details' => 'required',
            'listing_img' => 'required',
        ]);

        $imgProduct = null;
        if ($request->hasFile('listing_img')) {
            $imgProductFile = $request->file("listing_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/stories/listing_img/', '', $imgProductFile, $new_name_of_profile_photo3);
        }

        $imgProduct2 = null;
        if ($request->hasFile('detail_img')) {
            $imgProductFile = $request->file("detail_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct2 = $this->UploadImage('assets/stories/detail_img/', '', $imgProductFile, $new_name_of_profile_photo3);
        }

        $dating = new stories_dating;
        $dating->ref_no = mt_rand(1000000, 9999999);
        $dating->title = $request->title;
        $dating->detail_img = $imgProduct2;
        $dating->listing_img = $imgProduct;
        $dating->summary = $request->summary;
        $dating->user_id = $request->user_id;
        $dating->meta_title = $request->title;
        $dating->meta_keyword = $request->title;
        $dating->meta_description = $request->title;
        $dating->details = $request->details;
        $dating->slug = Str::slug($request->title);
        $dating->status = 2;
        $dating->save();
        Session::flash('success', 'dating Story Save successful.');
        return back();
    }


    public function UserStoriesMail(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'comment' => 'required',
        ]);

        $maildata = [
            'email' => $request->email,
            'comment' => $request->comment,
        ];
        Mail::to($request->email)->send(new UserStorieMail($maildata));
        return ["message" => "Send Sucessfull"];
    }
}
