<?php

namespace App\Http\Controllers\UserProfileController;

use App\Models\User;
use App\Models\user_album;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use App\Models\preferred_match;
use App\Http\Controllers\Controller;
use App\Models\user_friend_families;
use Illuminate\Support\Facades\Hash;
use App\Models\user_romantic_gesture;
use App\Models\romantic_gesture_master;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserProfileController extends Controller
{
    use UploadImage;
    //
    public function profile_update(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();
        User::where('id', $user_id)->update([
            'name' => $request->name,
            'display_email' => $request->display_email,
            'high_qualificatoin' => $request->high_qualificatoin,
            'mobile_no' => $request->mobile_no,
            'pincode' => $request->pincode,
            'dob' => $request->dob,
            'state' => $request->state,
            'city' => $request->city,
        ]);
        Session::flash('success', 'Profile Update successful.');
        return back();
    }

    public function profile_img(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();
        $imgProduct = null;
        if ($request->hasFile('profile_img')) {
            $imgProductFile = $request->file("profile_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/images/profile_img/', '', $imgProductFile, $new_name_of_profile_photo3);
            User::where('id', $user_id)->update([
                'profile_img' => $imgProduct,
            ]);
        }
        Session::flash('success', 'Profile Image successful.');
        return back();
    }

    public function user_password_update(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();
        $Password = Hash::make($request->password);
        User::where('id', $user_id)->update([
            'password' => $Password,
        ]);
        Session::flash('success', 'Password updated successfully');
        return back();
    }


    public function personal_details_update(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();
        User::where('id', $user_id)->update([
            'eye_id' => $request->eye_id,
            'hair_id' => $request->hair_id,
            'religion_id' => $request->religion_id,
            'body_weigh' => $request->body_weigh,
            'body_type' => $request->body_type,
            'heigh_feet' => $request->heigh_feet,
            'heigh_inch' => $request->heigh_inch,
            'about_me' => $request->about_me,
        ]);

        if ($request->has('friend_family_tell_id')) {
            foreach ($request->friend_family_tell_id as $friend_family_tell_id) {
                $friend = new user_friend_families;
                $friend->user_id = $request->user_id;
                $friend->friend_family_tell_id = $friend_family_tell_id;
                $friend->save();
            }
        }

        if ($request->has('romantic_gesture_master_id')) {
            foreach ($request->romantic_gesture_master_id as $romantic_gesture_master_id) {
                $romantic = new user_romantic_gesture();
                $romantic->user_id = $request->user_id;
                $romantic->romantic_gesture_master_id = $romantic_gesture_master_id;
                $romantic->save();
            }
        }
        Session::flash('success', 'Personal Details Update successful.');
        return back();
    }


    public function user_preferred_matchs_update(Request $request)
    {

        $user_id = $request->user_id;

        if ($user = preferred_match::where('user_id', $user_id)->first()) {
            preferred_match::where('user_id', $user->user_id)->update([
                'user_id' => $request->user_id,
                'high_qualification_id' => $request->high_qualification_id,
                'pincode' => $request->pincode,
                'state' => $request->state,
                'city' => $request->city,
                'marital_status_id' => $request->marital_status_id,
                'religion_id' => $request->religion_id,
                'height' => $request->height,
                'Inch' => $request->Inch,
            ]);
        } else {
            $preferred_match = new preferred_match();
            $preferred_match->user_id = $request->user_id;
            $preferred_match->high_qualification_id = $request->high_qualification_id;
            $preferred_match->pincode = $request->pincode;
            $preferred_match->state = $request->state;
            $preferred_match->city = $request->city;
            $preferred_match->marital_status_id = $request->marital_status_id;
            $preferred_match->religion_id = $request->religion_id;
            $preferred_match->height = $request->height;
            $preferred_match->Inch = $request->Inch;
            $preferred_match->save();
        }

        Session::flash('success', 'Preferred  match Update successful.');
        return back();
    }


    // public function user_album(Request $request)
    // {
    //     $request->validate([
    //         'user_album' => 'required|dimensions:max_width=1024,max_height=1024|max:1024',
    //     ]);

    //     if ($request->hasFile('user_album')) {
    //         $imgProductFile = $request->file("user_album");
    //         $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
    //         $imgProduct = $this->UploadImage('assets/images/user_album/', '', $imgProductFile, $new_name_of_profile_photo3);
    //     }

    //     $user_album = new user_album();
    //     $user_album->user_album = $imgProduct;
    //     $user_album->user_id = $request->user_id;
    //     $user_album->status = 1;
    //     $user_album->save();
    //     Session::flash('success', 'Album Update successful.');
    //     return back();
    // }


    public function user_album(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_album' => 'required|max:1024',
        ]);

        $validator->setAttributeNames([
            'user_album' => 'Album',
        ]);

        $validator->setCustomMessages([
            'max' => 'The :attribute must not be greater than 1MB.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('user_album')) {
            $imgProductFile = $request->file("user_album");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/images/user_album/', '', $imgProductFile, $new_name_of_profile_photo3);
        }

        $user_album = new user_album();
        $user_album->user_album = $imgProduct;
        $user_album->user_id = $request->user_id;
        $user_album->status = 1;
        $user_album->save();

        Session::flash('success', 'Album update successful.');
        return back();
    }



    public function AccountDelete(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();
        $newEmail = $user->email . now()->format('d-m-Y');
        User::where('id', $user_id)->update([
            'email' => $newEmail,
            'status' => 3,
        ]);
        session()->flush();
        return redirect()->to('/');
    }

    public function Permission(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();
        User::where('id', $user->id)->update([
            'profileShow_hide' => $request->profileshow,
            'email_show_hide' => $request->emailshow,
            'mobile_show_hide' => $request->mobileshow,
        ]);
        Session::flash('success', 'Permission Updated successful.');
        return back();
    }

    public function user_professional_update(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();
        User::where('id', $user->id)->update([
            'professional_details' => $request->professional_details,
            'achievement' => $request->achievement,
            'speak_language_id' => $request->speak_language_id,
            'mother_tongue_id' => $request->mother_tongue_id,
            'annual_salary' => $request->annual_salary,
            'political_view' => $request->political_view,
            'hobbies_id' => $request->hobbies_id,
            'Occupention' => $request->Occupention,
        ]);
        Session::flash('success', 'Professional Updated successful.');
        return back();
    }
}
