<?php

namespace App\Http\Controllers\UserLikeController;

use App\Models\User;
use App\Mail\UserLike;
use App\Mail\UserBlock;
use App\Models\user_action;
use Illuminate\Http\Request;
use App\Mail\UserEmailRequest;
use App\Mail\UserMobileRequest;
use App\Http\Controllers\Controller;
use App\Mail\AcceptEmail;
use App\Mail\AcceptMobile;
use Illuminate\Support\Facades\Mail;
use App\Models\user_album;

class UserLikeController extends Controller
{
    //

    public function user_like_data(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();

        $name = User::where('id', $user_id)->first();

        if (!$user) {
            return ["message" => "User not found"];
        }

        if ($user_like) {
            $user_like->update([
                'like' => 'like',
                'like_status' => '1',
                'like_notification' => '1',
            ]);

            $maildata = [
                'name' => $name->name,
            ];
            Mail::to($user->email)->send(new UserLike($maildata));
            return ["message" => "Like to favorite User"];
        } else {
            $new_user_like = new user_action;
            $new_user_like->other_person_user_id = $user->id;
            $new_user_like->user_id = $user_id;
            $new_user_like->like = 'like';
            $new_user_like->like_status = 1;
            $new_user_like->like_notification = 1;
            $new_user_like->save();
            $maildata = [
                'name' => $name->name,
            ];
            Mail::to($user->email)->send(new UserLike($maildata));
            return ["message" => "Like to favorite User"];
        }
    }

    public function user_dislike_data(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();

        if (!$user) {
            return ["message" => "User not found"];
        }

        $user_like->update([
            'like' => NULL,
            'like_status' => 0,
            'like_notification' => NULL,
        ]);
        return ["message" => "Remove to favorite User"];
    }


    public function user_bookmark_data(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();

        if (!$user) {
            return ["message" => "User not found"];
        }
        if ($user_like) {
            $user_like->update([
                'bookmark' => 'bookmark',
                'bookmark_status' => 1,
            ]);
            return ["message" => "BookMark to favourite User"];
        } else {
            $user_likes = new user_action;
            $user_likes->other_person_user_id = $user->id;
            $user_likes->user_id = $user_id;
            $user_likes->bookmark = 'bookmark';
            $user_likes->bookmark_status = 1;
            $user_likes->save();
            return ["message" => "BookMark to favourite User"];
        }
    }

    public function user_bookmark_Remove(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();

        if (!$user) {
            return ["message" => "User not found"];
        }

        $user_like->update([
            'bookmark' => NULL,
            'bookmark_status' => 0,
        ]);
        return ["message" => "Remove BookMark to favourite User"];
    }

    public function user_mobile_no_request(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();

        $name = User::where('id', $user_id)->first();

        if (!$user) {
            return ["message" => "User not found"];
        }
        if ($user_like) {
            $user_like->update([
                'request_mobile' => 'request-mobile',
                'request_mobile_status' => 1,
                'notification' => 1,
            ]);
            $maildata = [
                'name' => $name->name,
            ];
            Mail::to($user->email)->send(new UserMobileRequest($maildata));
            return ["message" => "Request to Mobile No"];
        } else {
            $user_likes = new user_action;
            $user_likes->other_person_user_id = $user->id;
            $user_likes->user_id = $user_id;
            $user_likes->request_mobile = 'request-mobile';
            $user_likes->request_mobile_status = 1;
            $user_likes->notification = 1;
            $user_likes->save();
            $maildata = [
                'name' => $name->name,
            ];
            Mail::to($user->email)->send(new UserMobileRequest($maildata));
            return ["message" => "Request to Mobile No"];
        }
    }

    public function user_mobile_no_request_cancle(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();

        if (!$user) {
            return ["message" => "User not found"];
        }

        $user_like->update([
            'request_mobile' => NULL,
            'request_mobile_status' => 0,
            'notification' => NULL,
        ]);
        return ["message" => "Request to Mobile No Request Cancle"];
    }

    public function request_mobile_status(Request $request, $action_id, $request_mobile_status)
    {

        $user_like = user_action::where('id', $action_id)->first();

        if (!$user_like) {
            return ["message" => "Request not found"];
        }

        $user_like->update([
            'request_mobile_status' => $request_mobile_status
        ]);
        if($request_mobile_status == 2){
            $mobile_status = "Approved";
        }
        else if($request_mobile_status == 3){
            $mobile_status = "Rejected";
        }
        return ["message" => "Request $mobile_status"];
    }

    public function request_email_status(Request $request, $action_id, $request_email_status)
    {

        $user_like = user_action::where('id', $action_id)->first();

        if (!$user_like) {
            return ["message" => "Request not found"];
        }

        $user_like->update([
            'request_email_status' => $request_email_status
        ]);
        if($request_email_status == 2){
            $changed_status = "Approved";
        }
        else if($request_email_status == 3){
            $changed_status = "Rejected";
        }
        return ["message" => "Request $changed_status"];
    }


    public function user_email_request(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();

        $name = User::where('id', $user_id)->first();

        if (!$user) {
            return ["message" => "User not found"];
        }
        if ($user_like) {
            $user_like->update([
                'request_email' => 'request-email',
                'request_email_status' => 1,
                'email_notification' => 1,
            ]);
            $maildata = [
                'name' => $name->name,
            ];
            Mail::to($user->email)->send(new UserEmailRequest($maildata));
            return ["message" => "Request to Email"];
        } else {
            $user_likes = new user_action;
            $user_likes->other_person_user_id = $user->id;
            $user_likes->user_id = $user_id;
            $user_likes->request_email = 'request-email';
            $user_likes->request_email_status = 1;
            $user_likes->email_notification = 1;
            $user_likes->save();
            $maildata = [
                'name' => $name->name,
            ];
            Mail::to($user->email)->send(new UserEmailRequest($maildata));
            return ["message" => "Request to Email"];
        }
    }


    public function user_email_request_cancle(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();

        if (!$user) {
            return ["message" => "User not found"];
        }
        $user_like->update([
            'request_email' => NULL,
            'request_email_status' => 0,
            'email_notification' => NULL,
        ]);
        return ["message" => "Request to Email Cancle"];
    }


    public function block(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();
        $name = User::where('id', $user_id)->first();

        if (!$user) {
            return ["message" => "User not found"];
        }
        if ($user_like) {
            $user_like->update([
                'block' => 'block',
                'block_status' => 1,
            ]);
            $maildata = [
                'name' => $name->name,
            ];
            Mail::to($user->email)->send(new UserBlock($maildata));
            return ["message" => "User Block"];
        } else {
            $user_likes = new user_action;
            $user_likes->other_person_user_id = $user->id;
            $user_likes->user_id = $user_id;
            $user_likes->block = 'block';
            $user_likes->block_status = 1;
            $user_likes->save();
            $maildata = [
                'name' => $name->name,
            ];
            Mail::to($user->email)->send(new UserBlock($maildata));
            return ["message" => "User Block"];
        }
    }

    public function Unblock(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();

        if (!$user) {
            return ["message" => "User Not Found"];
        }
        $user_like->update([
            'block' => NULL,
            'block_status' => 0,
        ]);
        return ["message" => "User Unblock Sucessfull"];
    }


    // accept mobile No

    public function accep_mobile_no(Request $request, $id)
    {
        $mobile = user_action::where('id', $id)->first();

        $mailData = user::where('id', $mobile->user_id)->select('email')->first();

        $loadmobile = user::where('id', $mobile->other_person_user_id)->first();

        if ($loadmobile->mobile_no) {
            $mobile->update([
                // 'request_mobile' => '',
                'request_mobile_status' => 2,
            ]);

            $maildata = [
                'name' => $loadmobile->name,
            ];
            Mail::to($mailData->email)->send(new AcceptMobile($maildata));
            return ["message" => "Accept Mobile Request Sucessfull"];
        } else {
            return ["message" => "Mobile No updated Please updated :- https://swanhearth.com/settings"];
        }
    }

    public function cancle_mobile_no(Request $request, $id)
    {
        $mobile = user_action::where('id', $id)->first();
        $mobile->update([
            'request_mobile' => '',
            'request_mobile_status' => 3,
        ]);
        return ["message" => "Cancle Mobile Request Sucessfull"];
    }

    public function accept_email(Request $request, $id)
    {
        $mobile = user_action::where('id', $id)->first();
        $mailData = user::where('id', $mobile->user_id)->select('email')->first();

        $loadmobile = user::where('id', $mobile->other_person_user_id)->first();
        $mobile->update([
            // 'request_email' => '',
            'request_email_status' => 2,
        ]);
        $maildata = [
            'name' => $loadmobile->name,
        ];
        Mail::to($mailData->email)->send(new AcceptEmail($maildata));
        return ["message" => "Accept Email Request Sucessfull"];
    }

    public function cancle_email(Request $request, $id)
    {
        $mobile = user_action::where('id', $id)->first();
        $mobile->update([
            'request_email' => NULL,
            'request_email_status' => 3,
        ]);
        return ["message" => "Cancle Email Request Sucessfull"];
    }


    // notification Remove 

    public function mobile_no_request_Notification(Request $request, $user_id)
    {
        user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.request_mobile', 'request-mobile')
            ->where('user_actions.notification', 1)
            ->where('user_actions.other_person_user_id', $user_id)
            ->update(['notification' => 0]);

        $MobileNot = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.request_mobile', 'request-mobile')
            ->where('user_actions.notification', 1)
            ->where('user_actions.other_person_user_id', $user_id)
            ->count();
        return $MobileNot;
    }

    public function email_request_Notification(Request $request, $user_id)
    {
        user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.request_email', 'request-email')
            ->where('user_actions.email_notification', 1)
            ->where('user_actions.other_person_user_id', $user_id)
            ->update(['email_notification' => 0]);

        $EmailNot = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.request_email', 'request-email')
            ->where('user_actions.email_notification', 1)
            ->where('user_actions.other_person_user_id', $user_id)
            ->count();
        return $EmailNot;
    }

    public function like_request_Notification(Request $request, $user_id)
    {
        user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.like', 'like')
            ->where('user_actions.like_notification', 1)
            ->where('user_actions.other_person_user_id', $user_id)
            ->update(['like_notification' => 0]);

        $LikeNot = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.like', 'like')
            ->where('user_actions.like_notification', 1)
            ->where('user_actions.other_person_user_id', $user_id)
            ->count();
        return $LikeNot;
    }

    public function TotalNotificationDashbord($user_id)
    {
        $totalCount = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.other_person_user_id', $user_id)
            ->selectRaw('SUM(user_actions.like_notification + user_actions.notification + user_actions.email_notification) as total')
            ->first();
        return $totalCount->total;
    }


    public function AlbumDelete(Request $request, $id)
    {
        $data = user_album::where('id', $id)->first();
        $data->update([
            'status' => 3,
        ]);
        return ["message" => "Request Sucessfull"];
    }


    // request photo

    public function user_photo_request(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();

        $name = User::where('id', $user_id)->first();

        if (!$user) {
            return ["message" => "User not found"];
        }
        if ($user_like) {
            $user_like->update([
                'request_photo' => 'request-photo',
                'photo_request_status' => 1,
                'photo_notification' => 1,
            ]);
            $maildata = [
                'name' => $name->name,
            ];
            Mail::to($user->email)->send(new UserMobileRequest($maildata));
            return ["message" => "Request to Photo"];
        } else {
            $user_likes = new user_action;
            $user_likes->other_person_user_id = $user->id;
            $user_likes->user_id = $user_id;
            $user_likes->request_photo = 'request-photo';
            $user_likes->photo_request_status = 1;
            $user_likes->photo_notification = 1;
            $user_likes->save();
            $maildata = [
                'name' => $name->name,
            ];
            Mail::to($user->email)->send(new UserMobileRequest($maildata));
            return ["message" => "Request to Photo"];
        }
    }

    public function user_photo_request_cancle(Request $request, $user_other_person_id, $user_id)
    {
        $user = User::where('user_ref', $user_other_person_id)->first();

        $user_like = user_action::where('other_person_user_id', $user->id)
            ->where('user_id', $user_id)
            ->first();

        if (!$user) {
            return ["message" => "User not found"];
        }

        $user_like->update([
            'request_photo' => NULL,
            'photo_request_status' => 0,
            'photo_notification' => NULL,
        ]);
        return ["message" => "Photo Request Cancle"];
    }


    public function accecp_photo(Request $request, $id)
    {
        $photo = user_action::where('id', $id)->first();

        $mailData = user::where('id', $photo->user_id)->select('email')->first();

        $loadphoto = user::where('id', $photo->other_person_user_id)->first();

        if ($loadphoto->profile_img) {
            $photo->update([
                // 'request_mobile' => '',
                'photo_request_status' => 2,
            ]);

            $maildata = [
                'name' => $loadphoto->name,
            ];
            Mail::to($mailData->email)->send(new AcceptMobile($maildata));
            return ["message" => "Accept Photo Request Sucessfull"];
        } else {
            return ["message" => "Photo updated Please updated :- https://swanhearth.com/settings/album"];
        }
    }

    public function cancle_photo(Request $request, $id)
    {
        $mobile = user_action::where('id', $id)->first();
        $mobile->update([
            'request_photo' => '',
            'photo_request_status' => 3,
        ]);
        return ["message" => "Cancle Photo Request Sucessfull"];
    }



}
