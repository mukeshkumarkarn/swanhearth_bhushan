<?php

namespace App\Http\Controllers\AdminController;

use App\Models\User;
use App\Models\contact;
use App\Models\payment;
use App\Models\employer;
use App\Models\poll_option;
use Illuminate\Http\Request;
use App\Models\dynamic_metas;
use App\Models\poll_question;
use App\Models\dating_advices;
use App\Models\stories_dating;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function add_dynamic_meta()
    {
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('title', 'slug', 'publish_date', 'listing_img')->get();

        $dynamicMeta = dynamic_metas::where('page_name', 'add-dynamic-meta')->first();
        return view('Admin.Dynamic-Meta.add-meta', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function Show_dynamic_meta()
    {
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $data = dynamic_metas::all();

        $dynamicMeta = dynamic_metas::where('page_name', 'view-dynamic-meta')->first();
        return view('Admin.Dynamic-Meta.view-meta', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function edit_dynamic_meta($id)
    {
        $data = dynamic_metas::where('id', $id)->first();
        if (!$data) {
            return redirect()->to('admin/view-dynamic-meta');
        }

        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('title', 'slug', 'publish_date', 'listing_img')->get();

        $dynamicMeta = dynamic_metas::where('page_name', 'edit-dynamic-meta')->first();
        return view('Admin.Dynamic-Meta.edit-meta', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }


    public function AdminLoginPage()
    {
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'admin-login')->first();
        return view('Admin.Admin-Auth.admin-login', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function RegisterPage()
    {
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'admin-register')->first();
        return view('Admin.Admin-Auth.register', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }


    public function AllUsers()
    {
        $data = User::where('status', 1)->orderBy('updated_at', 'desc')->select('name', 'profile_img', 'id', 'user_ref', 'gender', 'updated_at')->paginate(20);
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'all-users')->first();
        return view('Admin.Admin-pages.all-users', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory, 'data' => $data
        ]);
    }

    public function BlockUsers()
    {
        $data = User::where('status', 4)->orderBy('updated_at', 'desc')->select('name', 'profile_img', 'id', 'user_ref', 'gender', 'updated_at')->paginate(30);

        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'block-users')->first();
        return view('Admin.Admin-pages.block-users', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory, 'data' => $data
        ]);
    }

    public function AddDatingAdvive()
    {
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'add-dating-advice')->first();
        return view('Admin.Admin-pages.add-dating-advice', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function Addstories()
    {
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'add-stories')->first();
        return view('Admin.Admin-pages.add-stories', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function StoriesApproved()
    {
        $data = stories_dating::where('stories_datings.status', 2)->orderBy('updated_at', 'desc')
            ->leftjoin('users', 'stories_datings.user_id', '=', 'users.id')
            ->select(
                'stories_datings.title',
                'stories_datings.slug',
                'stories_datings.publish_date',
                'stories_datings.listing_img',
                'stories_datings.summary',
                'stories_datings.updated_at',
                'users.name',
                'users.email'
            )->paginate(20);
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'stories-approval')->first();
        return view('Admin.Admin-pages.stories-approval', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }




    public function Detailsstories($slug)
    {
        $data = stories_dating::where('slug', $slug)->first();
        $recent = stories_dating::where('status', 1)->where('slug', '!=', $slug)->orderBy('updated_at', 'desc')->limit(4)->get();
        if (!$data) {
            return redirect()->to('admin/dating-stories');
        }
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'stories-approval-details')->first();
        return view('Admin.Admin-pages.stories-details', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data, 'recent' => $recent,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function StoriesActive($slug)
    {
        $data = stories_dating::where('slug', $slug)->first();
        if (!$data) {
            return redirect()->to('admin/dating-stories');
        }
        $data->update([
            'status' => 1,
            'publish_date' => now(),
        ]);
        Session::flash('success', 'Story Active successful.');
        return back();
    }

    public function StoriesInActive($slug)
    {
        $data = stories_dating::where('slug', $slug)->first();
        if (!$data) {
            return redirect()->to('admin/dating-stories');
        }
        $data->update([
            'status' => 2,
        ]);
        Session::flash('success', 'Story Inactive successful.');
        return back();
    }


    public function AdminSetting()
    {
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'admin-setting')->first();
        return view('Admin.Admin-pages.setting', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }


    public function UsersDatils($user_ref)
    {
        $user = DB::table('users')->where('users.user_ref', $user_ref)->first();

        $data = DB::table('users')
            ->leftJoin('eye_color_masters', 'users.eye_id', '=', 'eye_color_masters.id')
            ->leftJoin('hair_color_masters', 'users.hair_id', '=', 'hair_color_masters.id')
            ->leftJoin('religion_masters', 'users.religion_id', '=', 'religion_masters.id')
            ->leftJoin('qualification_masters', 'users.high_qualificatoin', '=', 'qualification_masters.id')
            ->where('users.user_ref', $user_ref)->first();
        if (!$data) {
            return redirect()->to('admin/all-users');
        }

        $options = DB::table('user_friend_families')
            ->leftJoin('friend_family_tell_masters', 'user_friend_families.friend_family_tell_id', '=', 'friend_family_tell_masters.id')
            ->where('user_friend_families.user_id', $user->id)
            ->select('friend_family_tell_masters.friend_family_tell')->get();

        $prematch = DB::table('preferred_matchs')
            ->leftJoin('qualification_masters', 'preferred_matchs.high_qualification_id', '=', 'qualification_masters.id')
            ->leftJoin('religion_masters', 'preferred_matchs.marital_status_id', '=', 'religion_masters.id')
            ->where('preferred_matchs.user_id', $user->id)
            ->first();

        $album = DB::table('users')
            ->leftJoin('user_albums', 'users.id', '=', 'user_albums.user_id')
            ->where('users.id', $user->id)
            ->select('user_albums.user_album')->get();

        // dd($album);
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'users-details')->first();
        return view('Admin.Admin-pages.users-details', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data,
            'prematch' => $prematch, 'options' => $options, 'album' => $album,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }


    public function AdminUserDelete($user_ref)
    {
        $data = DB::table('users')->where('users.status', 1)->where('users.user_ref', $user_ref)->first();
        user::where('id', $data->id)->update([
            'status' => 4,
        ]);
        Session::flash('success', 'Block Update successful.');
        return back();
    }

    public function AdminUserActive($user_ref)
    {
        $data = DB::table('users')->where('users.user_ref', $user_ref)->first();
        user::where('id', $data->id)->update([
            'status' => 1,
        ]);
        Session::flash('success', 'Account Active Update successful.');
        return back();
    }



    public function Editstories($slug)
    {
        $data = stories_dating::where('slug', $slug)->first();

        $recent = stories_dating::where('status', 1)->where('slug', '!=', $slug)->orderBy('updated_at', 'desc')->limit(4)->get();
        if (!$data) {
            return redirect()->to('admin/dating-stories');
        }
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'edit-stories')->first();
        return view('Admin.Admin-pages.edit-stories', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data, 'recent' => $recent,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }



    public function DatingApproved()
    {
        $data = dating_advices::orderBy('updated_at', 'desc')
            ->where('status', 2)
            ->select('title', 'slug', 'publish_date', 'listing_img', 'short_description', 'updated_at', 'status')->paginate(20);

        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'dating-advice')->first();
        return view('Admin.Admin-pages.Dating-advice', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }



    public function EditDatingAdvice($slug)
    {
        $data = dating_advices::where('slug', $slug)->first();

        if (!$data) {
            return redirect()->to('admin/dating-advice');
        }
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'edit-dating-advice')->first();
        return view('Admin.Admin-pages.edit-dating-advice', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function DatingAdviceActive($slug)
    {
        $data = dating_advices::where('slug', $slug)->first();
        if (!$data) {
            return redirect()->to('admin/dating-advice');
        }
        $data->update([
            'status' => 1,
        ]);
        Session::flash('success', 'Dating advice Active successful.');
        return back();
    }

    public function DatingAdviceInActive($slug)
    {
        $data = dating_advices::where('slug', $slug)->first();
        if (!$data) {
            return redirect()->to('admin/dating-advice');
        }
        $data->update([
            'status' => 2,
        ]);
        Session::flash('success', 'Dating advice Active successful.');
        return back();
    }


    public function DatingAdviceDetail($slug)
    {
        $data = dating_advices::where('slug', $slug)->first();
        $recent = dating_advices::where('status', 1)->where('slug', '!=', $slug)->orderBy('updated_at', 'desc')->limit(4)->get();
        if (!$data) {
            return redirect()->to('admin/dating-advice-details');
        }
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'deting-advice-details')->first();
        return view('Admin.Admin-pages.deting-advice-details', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data, 'recent' => $recent,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }


    public function AllAdmin()
    {
        $data = employer::where('status', 1)->where('admin_employee', '!=', 'super-admin')->orderBy('updated_at', 'desc')->paginate(30);

        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'all-admin')->first();
        return view('Admin.Admin-pages.all-admin', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory, 'data' => $data
        ]);
    }

    public function AllAdminBlock()
    {
        $data = employer::where('status', 2)->orderBy('updated_at', 'desc')->paginate(30);

        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'block-admin')->first();
        return view('Admin.Admin-pages.block-admin', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory, 'data' => $data
        ]);
    }

    public function AdminBlock($emp_ref)
    {
        $data = employer::where('emp_ref', $emp_ref)->first();
        $data->update([
            'status' => 2,
        ]);
        Session::flash('success', 'Block successful.');
        return back();
    }

    public function AdminUnBlock($emp_ref)
    {
        $data = employer::where('emp_ref', $emp_ref)->first();
        $data->update([
            'status' => 1,
        ]);
        Session::flash('success', 'UnBlock successful.');
        return back();
    }

    public function EditRegisterPage($emp_ref)
    {
        $data = employer::where('emp_ref', $emp_ref)->first();
        if (!$data) {
            return redirect()->to('admin/all-admin');
        }
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'admin-register-edit')->first();
        return view('Admin.Admin-Auth.edit-register', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory, 'data' => $data
        ]);
    }

    public function AddPollQuestion()
    {

        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'add-poll-question')->first();
        return view('Admin.Poll-question.add-question', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    //work process
    public function ShowPollQuestion()
    {
        // $data = poll_question::where('status', '!=', 3)->orderBy('updated_at', 'desc')->get();
        $data = poll_question::where('status', '!=', 3)
            ->orderByDesc('updated_at')
            ->orderBy('status')
            ->get();

        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'poll-question-show')->first();
        return view('Admin.Poll-question.poll-question-show', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory, 'data' => $data
        ]);
    }

    public function EditPollQuestion($id)
    {
        $data = DB::table('poll_questions')
            ->leftJoin('poll_options', 'poll_questions.id', '=', 'poll_options.poll_question_id')
            ->where('poll_questions.id', $id)
            ->select('poll_questions.question', 'poll_options.poll_question_id')
            ->groupBy('poll_questions.question', 'poll_options.poll_question_id')
            ->get();


        $options = DB::table('poll_options')
            ->where('poll_question_id', $id)
            ->pluck('option_value', 'poll_options.id');

        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'edit-poll-question')->first();
        return view('Admin.Poll-question.edit-poll-question', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory, 'data' => $data, 'options' => $options
        ]);
    }


    public function TermsAndCondition()
    {
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'admin-terms-and-condition')->first();
        return view('Admin.Admin-pages.admin-terms-and-condition', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function ActiveStories()
    {
        $data = stories_dating::where('stories_datings.status', 1)->orderBy('updated_at', 'desc')
            ->leftjoin('users', 'stories_datings.user_id', '=', 'users.id')
            ->select(
                'stories_datings.title',
                'stories_datings.slug',
                'stories_datings.publish_date',
                'stories_datings.listing_img',
                'stories_datings.summary',
                'stories_datings.updated_at',
                'users.name',
                'users.email'
            )->paginate(20);
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'active-stories')->first();
        return view('Admin.Admin-pages.active-stories', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function ActiveDatingApproved()
    {
        $data = dating_advices::orderBy('updated_at', 'desc')
            ->where('status', 1)
            ->select(
                'title',
                'slug',
                'publish_date',
                'listing_img',
                'short_description',
                'updated_at',
                'status'
            )->paginate(20);

        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'active-dating-advice')->first();
        return view('Admin.Admin-pages.active-dating', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }


    public function UserSeach(Request $request)
    {
        $name = $request->name;
        $result = User::where('name', 'like', '%' . $name . '%')->where('status', 1)->orderBy('updated_at', 'desc')->get();
        return $result;
    }


    public function ViewContact()
    {
        $data = DB::table('contacts')
            ->leftJoin('contact_replies', 'contacts.id', '=', 'contact_replies.contact_id')
            ->select(
                'contacts.id',
                'contacts.name',
                'contacts.subject',
                'contacts.phone',
                'contacts.email',
                'contacts.description',
                'contacts.updated_at',
                DB::raw('COUNT(contact_replies.id) AS total')
            )
            ->groupBy('contacts.id', 'contacts.name', 'contacts.subject', 'contacts.description', 'contacts.updated_at', 'contacts.phone', 'contacts.email')
            ->orderBy('contacts.updated_at', 'desc')
            ->paginate(30);
        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'view-contact')->first();
        return view('Admin.Admin-pages.view-contact', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory, 'data' => $data
        ]);
    }


    public function MembershipShow()
    {
        // $data = payment::where('status',1)->paginate(30);

        $data = DB::table('payments')
            ->where('payments.status', 1)
            ->join('users', 'payments.user_id', '=', 'users.id')
            ->orderBy('payments.updated_at', 'desc')
            ->paginate(30);

        $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
        $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
            ->select('title', 'slug', 'publish_date', 'listing_img')->get();
        $dynamicMeta = dynamic_metas::where('page_name', 'membership-show')->first();
        return view('Admin.Admin-pages.membership-show', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }
}
