<?php

namespace App\Http\Controllers\FrontendController;

use App\Models\User;
use App\Models\payment;
use App\Models\user_album;
use App\Models\poll_option;
use App\Models\user_action;
use App\Models\send_message;
use Illuminate\Http\Request;
use App\Models\dynamic_metas;
use App\Models\poll_question;
use App\Models\dating_advices;
use App\Models\stories_dating;
use App\Models\preferred_match;
use App\Models\religion_master;
use App\Models\eye_color_master;
use App\Models\hair_color_master;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\qualification_master;
use App\Models\user_friend_families;
use Illuminate\Support\Facades\Auth;
use App\Models\marital_status_master;
use App\Models\user_romantic_gesture;
use App\Models\romantic_gesture_master;
use Illuminate\Support\Facades\Session;
use App\Models\friend_family_tell_master;
use Stevebauman\Location\Facades\Location;
use App\Models\language_master;
use App\Models\hobbies_master;
use Illuminate\Support\Facades\Storage;


class FrontendController extends Controller
{
    //
    public function Home()
    {
        $pollQuestion = poll_question::where('status', 1)->orderBy('updated_at', 'desc')->limit(1)->get();
		
        //foreach ($pollQuestion as $pollQuestions) {
            $pollOptions = DB::table('poll_options')
                ->join('poll_questions', 'poll_options.poll_question_id', '=', 'poll_questions.id')
                ->leftJoin('poll_answers', 'poll_options.id', '=', 'poll_answers.option_id')
                ->where('poll_options.poll_question_id', $pollQuestion[0]->id)
                ->selectRaw('poll_options.option_value, poll_options.id, COUNT(poll_answers.id) as option_count')
                ->groupBy('poll_options.option_value', 'poll_options.id')
                ->get();


            // Calculate total count of all options
            $totalCount = $pollOptions->sum('option_count');
            $percentages = [];
            if ($totalCount > 0) {
                foreach ($pollOptions as $option) {
                    $percentage = ($option->option_count / $totalCount) * 100;
                    $percentages[$option->id] = $percentage;
                }
                $sumPercentages = array_sum($percentages);
                $percentages[$pollOptions->last()->id] += 100 - $sumPercentages;
            } else {
                // If total count is zero, assign zero percentage to all options
                foreach ($pollOptions as $option) {
                    $percentages[$option->id] = 0;
                }
            }
        //}

        $dynamicMeta = dynamic_metas::where('page_name', 'home')->first();
        $data = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(6)->get();
        $dating = dating_advices::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->get();

		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        return view('frontend.index', [
            'data' => $data, 'pollQuestion' => $pollQuestion, 'dynamicMeta' => $dynamicMeta,
            'pollOptions' => $pollOptions, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory,
            'dating' => $dating, 'percentages' => $percentages
        ]);
    }


    public function User_login()
    {
        $dynamicMeta = dynamic_metas::where('page_name', 'user-login')->first();
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();
		
        return view('frontend.user-login', ['dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory]);
    }

    public function User_register(Request $request)
    {
        $ip = $request->ip();
        $location = Location::get($ip);

		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'user-register')->first();
        return view('frontend.user-register', [
            'dynamicMeta' => $dynamicMeta, 'location' => $location,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }


    public function forgot_password()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'forgot-password')->first();
        return view('frontend.forgot-password', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function dating_advice()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'dating-advice')->first();
        $data = dating_advices::where('status', 1)->orderBy('updated_at', 'desc')->paginate(20);
        return view('frontend.dating-advice', [
            'data' => $data, 'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function detail_advice($slug)
    {
        $data = dating_advices::where('slug', $slug)->first();
        if (!$data) {
            return redirect()->to('dating-advice');
        }

		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        // $dynamicMeta = dynamic_metas::where('page_name', 'detail-advice')->first();
        $meta = dating_advices::where('slug', $slug)->select(
            'meta_title as title',
            'meta_keyword as keywords',
            'meta_description as description',
        )->first();
        $recent = dating_advices::where('status', 1)->where('slug', '!=', $slug)->orderBy('updated_at', 'desc')->limit(4)->get();
        return view('frontend.detail-advice', [
            'data' => $data, 'recent' => $recent, 'dynamicMeta' => $meta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function stories_dating()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $data = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->paginate(30);
        $dynamicMeta = dynamic_metas::where('page_name', 'stories-dating')->first();
        return view('frontend.stories-dating', [
            'data' => $data, 'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function detail_stories($slug)
    {
        $data = stories_dating::where('slug', $slug)->first();

        $recent = stories_dating::where('status', 1)->where('slug', '!=', $slug)->orderBy('updated_at', 'desc')->limit(4)->get();
        if (!$data) {
            return redirect()->to('dating-stories');
        }

		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();
        // $dynamicMeta = dynamic_metas::where('page_name', 'detail-stories')->first();

        $meta = stories_dating::where('slug', $slug)->select(
            'meta_title as title',
            'meta_keyword as keywords',
            'meta_description as description',
        )->first();
      
        return view('frontend.detail-stories', [
            'data' => $data, 'dynamicMeta' => $meta, 'recent' => $recent, 'FooterUser' => $FooterUser,
            'Footerstory' => $Footerstory,
        ]);
    }

    public function MatchMaking()
    {
        $userData = DB::table('users')
            ->leftJoin('eye_color_masters', 'users.eye_id', '=', 'eye_color_masters.id')
            ->leftJoin('hair_color_masters', 'users.hair_id', '=', 'hair_color_masters.id')
            ->leftJoin('religion_masters', 'users.religion_id', '=', 'religion_masters.id')
            ->leftJoin('qualification_masters', 'users.high_qualificatoin', '=', 'qualification_masters.id')
            ->leftJoin('user_friend_families', 'user_friend_families.user_id', '=', 'users.id')
            ->leftJoin('friend_family_tell_masters', 'user_friend_families.friend_family_tell_id', '=', 'friend_family_tell_masters.id')
            ->leftJoin('user_albums', 'users.id', '=', 'user_albums.user_id')

            ->leftJoin('hobbies_masters', 'users.hobbies_id', '=', 'hobbies_masters.id')
            ->leftJoin('preferred_matchs', 'users.id', '=', 'preferred_matchs.user_id')
            ->leftJoin('qualification_masters as preferred_qualification', 'preferred_matchs.high_qualification_id', '=', 'preferred_qualification.id')
            ->leftJoin('marital_status_masters as preferred_marital', 'preferred_matchs.marital_status_id', '=', 'preferred_marital.id')
            ->leftJoin('religion_masters as preferred_religion', 'preferred_matchs.religion_id', '=', 'preferred_religion.id')
            ->leftJoin('language_masters as mother_tongue', 'users.mother_tongue_id', '=', 'mother_tongue.id')
            ->leftJoin('language_masters as speak_language', 'users.speak_language_id', '=', 'speak_language.id')
            
            ->leftJoin('user_actions', function ($join) {
                $join->on('users.id', '=', 'user_actions.other_person_user_id')
                    ->where('user_actions.user_id', '=', Auth::user()->id);
            })
            ->where('users.status', 1)
            ->select(
                'users.*',
                'eye_color_masters.*',
                'hair_color_masters.*',
                'religion_masters.*',
                'qualification_masters.*',
                'friend_family_tell_masters.*',
                'hobbies_masters.*',
                'user_albums.*',
                'user_actions.*',
                'mother_tongue.name as mother_tongue',
                'speak_language.name as speak_language',
                'preferred_matchs.state as preferred_state',
                'preferred_matchs.city as preferred_city',
                'preferred_matchs.height as preferred_height',
                'preferred_matchs.Inch as preferred_Inch',
                'preferred_qualification.qualification_name as preferredqua',
                'preferred_marital.marital_status as preferred_married',
                'preferred_religion.religion_name as preferred_religions',
            )
            ->where('users.id', '!=', Auth::user()->id);
        $oppositeGender = Auth::user()->gender == 'male' ? 'female' : 'male';
        $userData = $userData->where('users.gender', $oppositeGender);

        $userData = $userData->orderBy('users.updated_at', 'desc')->limit(1)
            ->paginate(1);
          // dd($userData);
        $user = $userData->items()[0];
        $userId = User::where('user_ref', $user->user_ref)->first();
      
        $album = DB::table('users')
        ->leftJoin('user_albums', 'users.id', '=', 'user_albums.user_id')
        ->where('users.id', $userId->id)
        ->where('user_albums.status', 1)
        ->select('user_albums.user_album')->get();
        
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'matchmaking')->first();
        return view('frontend.matchmaking', [
            'dynamicMeta' => $dynamicMeta,
            'userData' => $userData, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory,
            'album'=>$album
        ]);
    }


    // this code is km waise use in feature ex-100KM
    // public function MatchMaking(Request $request)
    // {
    //     // Retrieve user's IP address
    //     $ip = $request->ip();

    //     // Get location information based on IP
    //     $location = Location::get($ip);

    //     // Retrieve latitude and longitude from the location object
    //     $latitude = $location->latitude;
    //     $longitude = $location->longitude;

    //     // Define the radius for searching nearby users (in kilometers)
    //     $radius = 100; // You can adjust this value according to your requirement

    //     // Query to filter user data based on location within a certain radius
    //     $userData = DB::table('users')
    //         ->leftJoin('eye_color_masters', 'users.eye_id', '=', 'eye_color_masters.id')
    //         ->leftJoin('hair_color_masters', 'users.hair_id', '=', 'hair_color_masters.id')
    //         ->leftJoin('religion_masters', 'users.religion_id', '=', 'religion_masters.id')
    //         ->leftJoin('qualification_masters', 'users.high_qualificatoin', '=', 'qualification_masters.id')
    //         ->leftJoin('user_actions', function ($join) {
    //             $join->on('users.id', '=', 'user_actions.other_person_user_id')
    //                 ->where('user_actions.user_id', '=', Auth::user()->id);
    //         })
    //         ->where('users.status', 1)
    //         ->where('users.id', '!=', Auth::user()->id)
    //         // Add filters based on latitude and longitude within the specified radius
    //         ->whereBetween('users.current_latitude', [$latitude - ($radius / 111), $latitude + ($radius / 111)]) // Approximately 1 degree latitude is about 111 kilometers
    //         ->whereBetween('users.current_longitute', [
    //             $longitude - ($radius / (111 * cos(deg2rad($latitude)))),
    //             $longitude + ($radius / (111 * cos(deg2rad($latitude))))
    //         ]); // Adjusting for longitude based on latitude

    //     // Determine the opposite gender
    //     $oppositeGender = Auth::user()->gender == 'male' ? 'female' : 'male';
    //     $userData = $userData->where('users.gender', $oppositeGender);

    //     // Order by distance (optional)
    //     // $userData = $userData->orderBy(DB::raw('(POW((users.latitude - ' . $latitude . '), 2) + POW((users.longitude - ' . $longitude . '), 2))'), 'asc');

    //     // Limit the results to one record per page since you're using pagination
    //     $userData = $userData->orderBy('users.updated_at', 'desc')->paginate(1);

    //     // Retrieve footer user data and stories
    //     $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
    //         ->select('name', 'profile_img')->get();
    //     $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)
    //         ->select('title', 'slug', 'publish_date', 'listing_img')->get();

    //     // Retrieve dynamic meta information
    //     $dynamicMeta = dynamic_metas::where('page_name', 'matchmaking')->first();

    //     return view('frontend.matchmaking', [
    //         'dynamicMeta' => $dynamicMeta,
    //         'userData' => $userData,
    //         'FooterUser' => $FooterUser,
    //         'Footerstory' => $Footerstory
    //     ]);
    // }
    // end code km wise 

    // match real code
    // public function MatchMaking(Request $request)
    // {
    //     $ip = $request->ip();
    //     $location = Location::get($ip);
    //     $latitude = $location->latitude;
    //     $longitude = $location->longitude;

    //     $userData = DB::table('users')
    //         ->leftJoin('eye_color_masters', 'users.eye_id', '=', 'eye_color_masters.id')
    //         ->leftJoin('hair_color_masters', 'users.hair_id', '=', 'hair_color_masters.id')
    //         ->leftJoin('religion_masters', 'users.religion_id', '=', 'religion_masters.id')
    //         ->leftJoin('qualification_masters', 'users.high_qualificatoin', '=', 'qualification_masters.id')
    //         ->leftJoin('user_friend_families', 'user_friend_families.user_id', '=', 'users.id')
    //         ->leftJoin('friend_family_tell_masters', 'user_friend_families.friend_family_tell_id', '=', 'friend_family_tell_masters.id')
    //         ->leftJoin('user_albums', 'users.id', '=', 'user_albums.user_id')

    //         ->leftJoin('user_actions', function ($join) {
    //             $join->on('users.id', '=', 'user_actions.other_person_user_id')
    //                 ->where('user_actions.user_id', '=', Auth::user()->id);
    //         })
    //         ->select(
    //             'users.*',
    //             'user_actions.*',
    //             'eye_color_masters.*',
    //             'hair_color_masters.*',
    //             'religion_masters.*',
    //             'qualification_masters.*',
    //             'friend_family_tell_masters.*',
    //             'user_albums.*',
    //              DB::raw("ROUND(6371 * acos(cos(radians($latitude)) * cos(radians(current_latitude))
    //             * cos(radians(current_longitute) - radians($longitude)) + sin(radians($latitude)) * sin(radians(current_latitude)))) AS distance"),
    //             'current_latitude',
    //             'current_longitute'
    //         )
    //         ->where('users.status', 1)
    //         ->where('users.id', '!=', Auth::user()->id);

    //     // Determine the opposite gender
    //     $oppositeGender = Auth::user()->gender == 'male' ? 'female' : 'male';
    //     $userData = $userData->where('users.gender', $oppositeGender);

    //     $userData = $userData->orderBy('distance', 'asc') // Order by distance
    //         ->paginate(1);
    //     $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
    //     $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('title', 'slug', 'publish_date', 'listing_img')->get();

    //     $dynamicMeta = dynamic_metas::where('page_name', 'matchmaking')->first();
    //     return view('frontend.matchmaking', [
    //         'dynamicMeta' => $dynamicMeta,
    //         'userData' => $userData, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
    //     ]);
    // }



    // work process
    public function GetUserData()
    {
        $userData = DB::table('users')
            ->leftJoin('eye_color_masters', 'users.eye_id', '=', 'eye_color_masters.id')
            ->leftJoin('hair_color_masters', 'users.hair_id', '=', 'hair_color_masters.id')
            ->leftJoin('religion_masters', 'users.religion_id', '=', 'religion_masters.id')
            ->leftJoin('user_actions', function ($join) {
                $join->on('users.id', '=', 'user_actions.other_person_user_id')
                    ->where('user_actions.user_id', '=', Auth::user()->id);
            })
            ->where('users.status', 1)
            ->where('users.id', '!=', Auth::user()->id)
            ->orderBy('users.updated_at', 'desc')
            ->get();
        return [
            'proposal' => $userData,
        ];
    }

    public function Match_Calculator()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();
		
        $percentage = 0;
        $dynamicMeta = dynamic_metas::where('page_name', 'match-calculator')->first();
        return view('frontend.match-calculator', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser,
            'Footerstory' => $Footerstory, 'percentage' => $percentage
        ]);
    }

    public function Membership()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'membership')->first();
        return view('frontend.membership', ['dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory]);
    }

    public function contact_us()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'contact-us')->first();
        return view('frontend.contact-us', ['dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory]);
    }

    // public function settings()
    // {
    //     $education = qualification_master::where('status', 1)->get();
    //     $eyecolor = eye_color_master::where('status', 1)->get();
    //     $haircolor = hair_color_master::where('status', 1)->get();

    //     $religion = religion_master::where('status', 1)->get();

    //     $fritell = friend_family_tell_master::where('status', 1)->get();

    //     $friendtell = user_friend_families::where('user_id', Auth::user()->id)->get();

    //     $romantic = romantic_gesture_master::where('status', 1)->get();

    //     $romaticData = user_romantic_gesture::where('user_id', Auth::user()->id)->get();

    //     $friend = user_friend_families::where('user_id', Auth::user()->id)->get();

    //     $roma = user_romantic_gesture::where('user_id', Auth::user()->id)->get();

    //     $qualification = qualification_master::where('status', 1)->get();

    //     $relis = religion_master::where('status', 1)->get();

    //     $meri = marital_status_master::where('status', 1)->get();

    //     $perfectMatch = preferred_match::where('user_id', Auth::user()->id)->first();

    //     $bookmarks = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
    //         ->where('user_actions.bookmark', 'bookmark')
    //         ->where('user_actions.user_id', Auth::user()->id)
    //         ->get();

    //     $messageSentToUser = User::join('send_messages', 'users.id', '=', 'send_messages.user_id')
    //         ->select('users.id', 'users.user_ref', 'users.name', 'users.state', 'users.city', 'users.profile_img')
    //         ->where('send_messages.other_person_user_id', Auth::user()->id)
    //         ->groupBy('users.id', 'users.user_ref', 'users.name', 'users.state', 'users.city', 'users.profile_img')
    //         ->get();

    //     $messageSentByUser = User::join('send_messages', 'users.id', '=', 'send_messages.other_person_user_id')
    //         ->select('users.id', 'users.user_ref', 'users.name', 'users.state', 'users.city', 'users.profile_img')
    //         ->where('send_messages.user_id', Auth::user()->id)
    //         ->groupBy('users.id', 'users.user_ref', 'users.name', 'users.state', 'users.city', 'users.profile_img')
    //         ->get();


    //     $message = $messageSentToUser->merge($messageSentByUser)->sortByDesc('updated_at');


    //     $requestMobile = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
    //         ->where('user_actions.request_mobile', 'request-mobile')
    //         ->where('user_actions.other_person_user_id', Auth::user()->id)
    //         ->get();


    //     $requestEmail = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
    //         ->where('user_actions.request_email', 'request-email')
    //         ->where('user_actions.other_person_user_id', Auth::user()->id)
    //         ->get();

    //     $sendMobileRequest = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
    //         ->where('user_actions.request_mobile', 'request-mobile')
    //         ->where('user_actions.user_id', Auth::user()->id)
    //         ->get();

    //     $sendEmailRequest = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
    //         ->where('user_actions.request_mobile', 'request-mobile')
    //         ->where('user_actions.user_id', Auth::user()->id)
    //         ->get();

    //     $album = user_album::where('status', 1)->where('user_id', Auth::user()->id)->get();

    //     $dynamicMeta = dynamic_metas::where('page_name', 'settings')->first();
    //     $FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img')->get();
    //     $Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('title', 'slug', 'publish_date', 'listing_img')->get();

    //     return view('frontend.settings', [
    //         'dynamicMeta' => $dynamicMeta, 'eyecolor' => $eyecolor,
    //         'education' => $education, 'haircolor' => $haircolor, 'religion' => $religion,
    //         'fritell' => $fritell, 'romantic' => $romantic, 'friend' => $friend, 'roma' => $roma,
    //         'qualification' => $qualification, 'relis' => $relis, 'meri' => $meri, 'perfectMatch' => $perfectMatch,
    //         'album' => $album, 'friendtell' => $friendtell, 'romaticData' => $romaticData,
    //         'bookmarks' => $bookmarks, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory,
    //         'message' => $message, 'requestMobile' => $requestMobile, 'requestEmail' => $requestEmail,
    //         'sendMobileRequest' => $sendMobileRequest, 'sendEmailRequest' => $sendEmailRequest
    //     ]);
    // }

    public function settings()
    {
        $education = qualification_master::where('status', 1)->get();

        $dynamicMeta = dynamic_metas::where('page_name', 'settings')->first();
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        return view('frontend.settings', [
            'dynamicMeta' => $dynamicMeta,
            'education' => $education, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function add_stories()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'add-stories')->first();
        return view('frontend.add-stories', [
            'dynamicMeta' => $dynamicMeta,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function add_dating_advice()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'add-dating-advice')->first();
        return view('frontend.add-dating-advice', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }


    public function Message($user_ref = null)
    {
        $currentUser = Auth::user();
        $otheruserid = User::where('user_ref', $user_ref)->firstOrFail();

        $message = send_message::join('users as user1', 'send_messages.user_id', '=', 'user1.id')
            ->join('users as user2', 'send_messages.other_person_user_id', '=', 'user2.id')
            ->where(function ($query) use ($currentUser, $otheruserid) {
                $query->where('send_messages.user_id', $currentUser->id)
                    ->where('send_messages.other_person_user_id', $otheruserid->id);
            })
            ->orWhere(function ($query) use ($currentUser, $otheruserid) {
                $query->where('send_messages.other_person_user_id', $currentUser->id)
                    ->where('send_messages.user_id', $otheruserid->id);
            })
            ->orderBy('message_time')
            ->select('send_messages.*', 'user1.profile_img as other_person_profile_img')
            ->get();

        $payments = payment::where('user_id', Auth::user()->id)->where('status', 1);

		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'message')->first();
        return view('frontend.message', [
            'dynamicMeta' => $dynamicMeta, 'otheruserid' => $otheruserid,
            'message' => $message, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory,
            'payments' => $payments,
        ]);
    }


    public function policy()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'policy')->first();
        return view('frontend.policy', ['dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory]);
    }

    public function terms_and_condition()
    {
        //$FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img','city')->get();
		$FooterUser = $this->footerUser();
        //$Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('title', 'slug', 'publish_date', 'listing_img')->get();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'terms-and-condition')->first();
        return view('frontend.terms-and-condition', ['dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory]);
    }

    public function faqs()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'faqs')->first();
        return view('frontend.faqs', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

    public function fb_data_deletion()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'fb-data-deletion')->first();
        return view('frontend.fb-data-deletion', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }

	public function users($user_ref='') {
		if($user_ref=='') {
			$user_ref=Auth::user()->user_ref;
		}
		
        $userData = DB::table('users')
            ->leftJoin('eye_color_masters', 'users.eye_id', '=', 'eye_color_masters.id')
            ->leftJoin('hair_color_masters', 'users.hair_id', '=', 'hair_color_masters.id')
            ->leftJoin('religion_masters', 'users.religion_id', '=', 'religion_masters.id')
            ->leftJoin('qualification_masters', 'users.high_qualificatoin', '=', 'qualification_masters.id')
            ->leftJoin('user_friend_families', 'user_friend_families.user_id', '=', 'users.id')
            ->leftJoin('friend_family_tell_masters', 'user_friend_families.friend_family_tell_id', '=', 'friend_family_tell_masters.id')
            //->leftJoin('user_albums', 'users.id', '=', 'user_albums.user_id')
            ->leftJoin('hobbies_masters', 'users.hobbies_id', '=', 'hobbies_masters.id')
            ->leftJoin('preferred_matchs', 'users.id', '=', 'preferred_matchs.user_id')
            ->leftJoin('qualification_masters as preferred_qualification', 'preferred_matchs.high_qualification_id', '=', 'preferred_qualification.id')
            ->leftJoin('marital_status_masters as preferred_marital', 'preferred_matchs.marital_status_id', '=', 'preferred_marital.id')
            ->leftJoin('religion_masters as preferred_religion', 'preferred_matchs.religion_id', '=', 'preferred_religion.id')
            ->leftJoin('language_masters as mother_tongue', 'users.mother_tongue_id', '=', 'mother_tongue.id')
            ->leftJoin('language_masters as speak_language', 'users.speak_language_id', '=', 'speak_language.id')

            ->leftJoin('user_actions', function ($join) {
                $join->on('users.id', '=', 'user_actions.other_person_user_id')
                    ->where('user_actions.user_id', '=', Auth::user()->id);
            })
			
            ->where('users.status', 1)
            ->where('users.user_ref', $user_ref)
            ->select(
                'users.*',
                'eye_color_masters.*',
                'hair_color_masters.*',
                'religion_masters.*',
                'qualification_masters.*',
                'friend_family_tell_masters.*',
                'hobbies_masters.*',
                //'user_albums.*',
                'user_actions.*',
                'mother_tongue.name as mother_tongue',
                'speak_language.name as speak_language',
                'preferred_matchs.state as preferred_state',
                'preferred_matchs.city as preferred_city',
                'preferred_matchs.height as preferred_height',
                'preferred_matchs.Inch as preferred_Inch',
                'preferred_qualification.qualification_name as preferredqua',
                'preferred_marital.marital_status as preferred_married',
                'preferred_religion.religion_name as preferred_religions',
            )->get();
        
		//$userData = $userData->orderBy('users.updated_at', 'desc')->limit(1)
          //  ->paginate(1);
          // dd($userData);
		$data=$userData[0];
		$login_user_ref = Auth::user()->user_ref;
	  
        $album = DB::table('users')
        ->leftJoin('user_albums', 'users.id', '=', 'user_albums.user_id')
        ->where('users.user_ref', $user_ref)
        ->where('user_albums.status', 1)
        ->select('users.profile_img', 'user_albums.user_album')->get();
		$albumCount = $album->count();
		//echo "co==".$albumCount;
		
		
		$profile_img_path = '/profile_img/';
		$album_img_path = '/user_album/';
		
		
		$disp_album=array();
		if($albumCount>0 && ($login_user_ref==$data->user_ref || $data->profileShow_hide==1)) {
			$profileUser=0;
			foreach($album as $albums) {
				//echo "<pre>";print_r($albums);
				if($albums->profile_img !='' && $profileUser==0) {
					$profileUser=1;
					$disp_album[]=$profile_img_path.$albums->profile_img;
				}
				if($albums->user_album !='') {
					$disp_album[]=$album_img_path.$albums->user_album;
				}
			}
			//echo "<pre>";print_r($disp_album);
        }
		else {
			if($data->gender=='male') {
				$disp_album[]=$profile_img_path.env('MALE');
			}
			else  {
				$disp_album[]=$profile_img_path.env('FEMALE');
			}
		}
		
		//ECHO "<PRE>";print_r($disp_album);
		
		$disp_album_count=count($disp_album);
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'matchmaking')->first();
        return view('frontend.user_profile', [
            'dynamicMeta' => $dynamicMeta,
            'userData' => $userData, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory, 'disp_album_count'=>$disp_album_count,
            'disp_album'=>$disp_album
        ]);
		
	}

    public function account()
    {

        $data = DB::table('users')
            ->leftJoin('eye_color_masters', 'users.eye_id', '=', 'eye_color_masters.id')
            ->leftJoin('hair_color_masters', 'users.hair_id', '=', 'hair_color_masters.id')
            ->leftJoin('religion_masters', 'users.religion_id', '=', 'religion_masters.id')
            ->leftJoin('qualification_masters', 'users.high_qualificatoin', '=', 'qualification_masters.id')
            ->where('users.status', 1)
            ->where('users.id', Auth::user()->id)
            ->first();

        $album = DB::table('users')
            ->leftJoin('user_albums', 'users.id', '=', 'user_albums.user_id')
            ->where('users.id', Auth::user()->id)
            ->where('user_albums.status', 1)
            ->select('user_albums.user_album')->get();


        $options = DB::table('user_friend_families')
            ->leftJoin('friend_family_tell_masters', 'user_friend_families.friend_family_tell_id', '=', 'friend_family_tell_masters.id')
            ->where('user_friend_families.user_id', Auth::user()->id)
            ->select('friend_family_tell_masters.friend_family_tell')->get();

        $prematch = DB::table('preferred_matchs')
            ->leftJoin('qualification_masters', 'preferred_matchs.high_qualification_id', '=', 'qualification_masters.id')
            ->leftJoin('religion_masters', 'preferred_matchs.marital_status_id', '=', 'religion_masters.id')
            ->where('preferred_matchs.user_id', Auth::user()->id)
            ->first();
        //dd($prematch);

		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'account')->first();
        return view('frontend.account', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data, 'FooterUser' => $FooterUser,
            'options' => $options, 'album' => $album,
            'Footerstory' => $Footerstory, 'prematch' => $prematch
        ]);
    }

    public function DeleteAccount()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();
        $dynamicMeta = dynamic_metas::where('page_name', 'delete-account')->first();
        return view('frontend.Account.delete-account', ['dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory]);
    }

    public function change_password()
    {
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'change-password')->first();

        return view('frontend.Account.change-password', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }


    public function personal_details()
    {
        $education = qualification_master::where('status', 1)->get();
        $eyecolor = eye_color_master::where('status', 1)->get();
        $haircolor = hair_color_master::where('status', 1)->get();

        $religion = religion_master::where('status', 1)->get();

        $fritell = friend_family_tell_master::where('status', 1)->get();

        $friendtell = user_friend_families::where('user_id', Auth::user()->id)->get();

        $romantic = romantic_gesture_master::where('status', 1)->get();

        $romaticData = user_romantic_gesture::where('user_id', Auth::user()->id)->get();

		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();
		
        $dynamicMeta = dynamic_metas::where('page_name', 'personal-details')->first();

        return view('frontend.Account.personal-details', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory,
            'education' => $education, 'eyecolor' => $eyecolor, 'haircolor' => $haircolor, 'religion' => $religion,
            'fritell' => $fritell, 'friendtell' => $friendtell, 'romantic' => $romantic, 'romaticData' => $romaticData
        ]);
    }

    public function album()
    {
        $album = user_album::where('status', 1)->where('user_id', Auth::user()->id)->get();

        $albumCont = user_album::where('status', 1)->where('user_id', Auth::user()->id)->count();

		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();
		
        $dynamicMeta = dynamic_metas::where('page_name', 'album')->first();

        return view('frontend.Account.album', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser,
            'Footerstory' => $Footerstory, 'album' => $album, 'albumCont' => $albumCont
        ]);
    }

    public function PermissionManage()
    {
        $data = User::where('status', 1)->where('id', Auth::user()->id)->first();

		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'permission-manage')->first();

        return view('frontend.Account.permission-manage', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser,
            'Footerstory' => $Footerstory, 'data' => $data
        ]);
    }


    public function preferred_match()
    {

        $qualification = qualification_master::where('status', 1)->get();

        $relis = religion_master::where('status', 1)->get();

        $meri = marital_status_master::where('status', 1)->get();

        $perfectMatch = preferred_match::where('user_id', Auth::user()->id)->first();

		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();
		
        $dynamicMeta = dynamic_metas::where('page_name', 'preferred-match')->first();

        return view('frontend.Account.preferred-match', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser,
            'Footerstory' => $Footerstory, 'qualification' => $qualification, 'relis' => $relis,
            'meri' => $meri, 'perfectMatch' => $perfectMatch
        ]);
    }

    // dashboard All function 

    public function dashboard()
    {
		$this->__checkActiveUser();
        $bookmarks = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
            ->where('user_actions.bookmark', 'bookmark')
            ->where('user_actions.user_id', Auth::user()->id)
            ->paginate(20);

		$page_heading = '<strong>Book</strong>marks';



		$dashboardMenu = $this->__dashboardMenu();
		//ECHO "<PRE>";print_r($dashboardMenu);
        $dynamicMeta = dynamic_metas::where('page_name', 'dashboard')->first();
		$otherRet=['dynamicMeta' => $dynamicMeta, 'page_heading'=>$page_heading, 'displayData' => $bookmarks];
		$arrReturnValue = array_merge($dashboardMenu, $otherRet);
		
		return view('frontend.dashboard', $arrReturnValue);
    }


    public function friend_message()
    {
        $messageSentToUser = User::join('send_messages', 'users.id', '=', 'send_messages.user_id')
            ->select('users.id', 'users.user_ref', 'users.name', 'users.state', 'users.city', 'users.profile_img')
            ->where('send_messages.other_person_user_id', Auth::user()->id)
            ->groupBy('users.id', 'users.user_ref', 'users.name', 'users.state', 'users.city', 'users.profile_img')
            ->get();
        $messageSentByUser = User::join('send_messages', 'users.id', '=', 'send_messages.other_person_user_id')
            ->select('users.id', 'users.user_ref', 'users.name', 'users.state', 'users.city', 'users.profile_img')
            ->where('send_messages.user_id', Auth::user()->id)
            ->groupBy('users.id', 'users.user_ref', 'users.name', 'users.state', 'users.city', 'users.profile_img')
            ->get();
        $message = $messageSentToUser->merge($messageSentByUser)->sortByDesc('updated_at')->paginate(20);
        $count = $messageSentToUser->merge($messageSentByUser)->count();

		$page_heading = '<strong>Friend</strong> Message';

		$dashboardMenu = $this->__dashboardMenu();
        $dynamicMeta = dynamic_metas::where('page_name', 'friend-message')->first();
		
		$otherRet=['dynamicMeta' => $dynamicMeta, 'page_heading'=>$page_heading, 'displayData' => $message];
		$arrReturnValue = array_merge($dashboardMenu, $otherRet);
		
		return view('frontend.dashboard.friend-message', $arrReturnValue);
		
		/*
        return view('frontend.dashboard.friend-message', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory,
            'message' => $message, 'countMessage' => $countMessage, 'bookmarksCount' => $bookmarksCount, 'requestMobilesCount'=>$requestMobilesCount
        ]);*/
    }


    public function request_mobile_recived()
    {
        $requestMobiles = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.request_mobile', 'request-mobile')
            ->where('user_actions.other_person_user_id', Auth::user()->id)
            ->select(
                'user_actions.id',
                'users.profile_img',
                'users.name',
                'users.state',
                'users.city',
                'users.user_ref',
                'users.mobile_no',
                'user_actions.request_mobile_status'
            )
            ->paginate(20);

		$page_heading='<strong>Request Mobile</strong> Number';
		
        $dynamicMeta = dynamic_metas::where('page_name', 'request-mobile-recived')->first();
		
		$dashboardMenu = $this->__dashboardMenu();
		
		$otherRet=['dynamicMeta' => $dynamicMeta, 'page_heading'=>$page_heading, 'displayData' => $requestMobiles];
		$arrReturnValue = array_merge($dashboardMenu, $otherRet);
		
		return view('frontend.dashboard.request-mobile', $arrReturnValue);
    }

    public function request_email_recived()
    {
		$bookmarksCount = $this->countBookmark();
		
        $requestEmails = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.request_email', 'request-email')
            ->where('user_actions.other_person_user_id', Auth::user()->id)
            ->select(
                'user_actions.id',
                'users.profile_img',
                'users.name',
                'users.state',
                'users.city',
                'users.user_ref',
                'users.email',
                'user_actions.request_email_status'
            )
            ->paginate(20);

		$dashboardMenu = $this->__dashboardMenu();
		
        $dynamicMeta = dynamic_metas::where('page_name', 'request-email-recived')->first();
		
		$otherRet=['dynamicMeta' => $dynamicMeta, 'displayData' => $requestEmails];
		$arrReturnValue = array_merge($dashboardMenu, $otherRet);
		
		return view('frontend.dashboard.request-email', $arrReturnValue);
    }

    public function request_photo_recived()
    {

        $requestphotos = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.request_photo', 'request-photo')
            ->where('user_actions.other_person_user_id', Auth::user()->id)
            ->select(
                'user_actions.id',
                'users.profile_img',
                'users.name',
                'users.state',
                'users.city',
                'users.user_ref',
                'users.mobile_no',
                'user_actions.photo_request_status'
            )
            ->paginate(20);
        // dd($requestphotos);

		$page_heading='<strong> Photo Request</strong> Received';
		$dashboardMenu = $this->__dashboardMenu();
		
        $dynamicMeta = dynamic_metas::where('page_name', 'request-photo-recived')->first();
		$otherRet=['dynamicMeta' => $dynamicMeta, 'page_heading'=>$page_heading, 'displayData'=> $requestphotos];
		$arrReturnValue = array_merge($dashboardMenu, $otherRet);
		
		return view('frontend.dashboard.request-photo', $arrReturnValue);
		
    }

    public function request_mobile_send()
    {
        $sendMobileRequests = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
            ->where('user_actions.request_mobile', 'request-mobile')
            ->where('user_actions.user_id', Auth::user()->id)
            ->paginate(20);
			
		$page_heading='<strong>Mobile Request</strong> Send';
		$dashboardMenu = $this->__dashboardMenu();	
			
        $dynamicMeta = dynamic_metas::where('page_name', 'request-mobile-send')->first();
		$otherRet=['dynamicMeta' => $dynamicMeta, 'page_heading'=>$page_heading, 'displayData' => $sendMobileRequests];
		$arrReturnValue = array_merge($dashboardMenu, $otherRet);
		
		return view('frontend.dashboard.send-mobile', $arrReturnValue);
				
    }

    public function request_email_send()
    {
        $sendEmailRequests = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
            ->where('user_actions.request_email', 'request-email')
            ->where('user_actions.user_id', Auth::user()->id)
            ->paginate(20);

		$page_heading='<strong>Email Request</strong> Send';
		$dashboardMenu = $this->__dashboardMenu();	

        $dynamicMeta = dynamic_metas::where('page_name', 'request-email-send')->first();
		$otherRet=['dynamicMeta' => $dynamicMeta, 'page_heading'=>$page_heading, 'displayData' => $sendEmailRequests];
		$arrReturnValue = array_merge($dashboardMenu, $otherRet);
		
		
        return view('frontend.dashboard.send-email', $arrReturnValue);
    }

    public function request_send_photo()
    {
        $sendphotoRequests = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
            ->where('user_actions.request_photo', 'request-photo')
            ->where('user_actions.user_id', Auth::user()->id)
            ->paginate(20);

		$page_heading='<strong> Photo Request</strong> send';
		$dashboardMenu = $this->__dashboardMenu();	
		
        $dynamicMeta = dynamic_metas::where('page_name', 'request-send-photo')->first();
		$otherRet=['dynamicMeta' => $dynamicMeta, 'page_heading'=>$page_heading, 'displayData' => $sendphotoRequests];
		$arrReturnValue = array_merge($dashboardMenu, $otherRet);
		
        return view('frontend.dashboard.send-photo', $arrReturnValue);
    }

    public function request_like_recived()
    {
        $requestLikes = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.like', 'like')
            ->where('user_actions.other_person_user_id', Auth::user()->id)
            ->select('user_actions.id', 'users.profile_img', 'users.name', 'users.state', 'users.city', 'users.user_ref')
            ->paginate(20);

		$page_heading='<strong>Request </strong> Like';
		$dashboardMenu = $this->__dashboardMenu();	
		
        $dynamicMeta = dynamic_metas::where('page_name', 'request-Like-recived')->first();
		$otherRet=['dynamicMeta' => $dynamicMeta, 'page_heading'=>$page_heading, 'displayData' => $requestLikes];
		$arrReturnValue = array_merge($dashboardMenu, $otherRet);
		
        return view('frontend.dashboard.request-like', $arrReturnValue);
    }

    public function request_like_send()
    {
        $sendLikes = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
            ->where('user_actions.like', 'like')
            ->where('user_actions.user_id', Auth::user()->id)
            ->paginate(20);

		$page_heading='<strong>Request Like</strong> Send';
		$dashboardMenu = $this->__dashboardMenu();	

        $dynamicMeta = dynamic_metas::where('page_name', 'request-like-send')->first();
		$otherRet=['dynamicMeta' => $dynamicMeta, 'page_heading'=>$page_heading, 'displayData' => $sendLikes];
		$arrReturnValue = array_merge($dashboardMenu, $otherRet);
		
        return view('frontend.dashboard.send-like', $arrReturnValue);
    }


    public function SocialMediaRegister(Request $request)
    {
        $ip = $request->ip();
        $location = Location::get($ip);
        $UserData = User::where('id', Session::get('user_id'))->first();
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();
		
        $dynamicMeta = dynamic_metas::where('page_name', 'socail-media-register')->first();
        return view('frontend.socail-media-register', [
            'dynamicMeta' => $dynamicMeta, 'location' => $location,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory, 'UserData' => $UserData
        ]);
    }



    public function Userdetail_stories($slug)
    {
        $data = stories_dating::where('slug', $slug)->first();

        $recent = stories_dating::where('status', 1)->where('slug', '!=', $slug)->orderBy('updated_at', 'desc')->limit(4)->get();
        if (!$data) {
            return redirect()->to('dating-stories');
        }
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();
		
        $dynamicMeta = dynamic_metas::where('page_name', 'edit-users-dating-stories')->first();
        return view('frontend.edit-users-dating-stories', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data, 'recent' => $recent,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }



    public function searchKeyword(Request $request)
    {
        $datasearch = $request->gender;
        Session::put('genderdata', $datasearch);
        $minage = $request->minage;
        $maxage = $request->maxage;


        $url = url('matchmaking') . '/' . $datasearch . '/' . $minage . '/' . $maxage;

        return redirect()->to($url);
    }



    public function searchMatchMaking(Request $request, $datasearch = null, $minage = null, $maxage = null)
    {

        $userData = DB::table('users')
            ->leftJoin('eye_color_masters', 'users.eye_id', '=', 'eye_color_masters.id')
            ->leftJoin('hair_color_masters', 'users.hair_id', '=', 'hair_color_masters.id')
            ->leftJoin('religion_masters', 'users.religion_id', '=', 'religion_masters.id')
            ->leftJoin('qualification_masters', 'users.high_qualificatoin', '=', 'qualification_masters.id')
            ->leftJoin('user_friend_families', 'user_friend_families.user_id', '=', 'users.id')
            ->leftJoin('friend_family_tell_masters', 'user_friend_families.friend_family_tell_id', '=', 'friend_family_tell_masters.id')
            ->leftJoin('user_actions', function ($join) {
                $join->on('users.id', '=', 'user_actions.other_person_user_id')
                    ->where('user_actions.user_id', '=', Auth::user()->id);
            })
            ->where('users.status', 1)
            ->where('users.id', '!=', Auth::user()->id);

        $userData = $userData->orderBy('users.updated_at', 'desc')->where('users.gender', $datasearch)->limit(1)
            ->paginate(1);
        
		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'matchmaking')->first();
        return view('frontend.matchmaking', [
            'dynamicMeta' => $dynamicMeta,
            'userData' => $userData, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory
        ]);
    }



    public function ShowGallery($user_ref = null)
    {
        $data = User::where('user_ref', $user_ref)->where('status', 1)->first();
        if (!$data) {
            return redirect()->to('dashboard');
        }
        $album = DB::table('users')
            ->leftJoin('user_albums', 'users.id', '=', 'user_albums.user_id')
            ->where('user_albums.status', 1)
            ->where('users.id', $data->id)
            ->select('user_albums.user_album')->get();

		$FooterUser = $this->footerUser();
		$Footerstory = $this->footerStory();

        $dynamicMeta = dynamic_metas::where('page_name', 'show-image-gallery')->first();
        return view('frontend.dashboard.show-image-gallery', [
            'dynamicMeta' => $dynamicMeta, 'data' => $data,
            'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory,
            'album' => $album,
        ]);
    }



    public function professional_details()
    {
        $language = language_master::where('status', 1)->get();
        $hobbies = hobbies_master::where('status', 1)->get();

        //$FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img','city')->get();
        $FooterUser = $this->footerUser();
		
        //$Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('title', 'slug', 'publish_date', 'listing_img')->get();
		$Footerstory = $this->footerStory();
		
        $dynamicMeta = dynamic_metas::where('page_name', 'professional-details')->first();
        return view('frontend.Account.professional-details', [
            'dynamicMeta' => $dynamicMeta, 'FooterUser' => $FooterUser, 'Footerstory' => $Footerstory,
             'language' => $language,'hobbies'=>$hobbies,
        ]);
    }
	private function __checkActiveUser() {				
		$currentUser = Auth::user();			
		//echo "<pre>";print_r($currentUser);	echo "</pre>==";		
		//echo "324==".$currentUser->count();
		//echo "<br>";
		if($currentUser!='' && $currentUser->count()===0) {
			return redirect()->to('dating-stories');
			die();
		}
	}

	private function countBookmark() {
        $bookmarksCount = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
            ->where('user_actions.bookmark', 'bookmark')
            ->where('user_actions.user_id', Auth::user()->id)
            ->count();
	
		return $bookmarksCount;
	}
	
	private function countMessage() {
		
        $messageSentToUserCount = User::join('send_messages', 'users.id', '=', 'send_messages.user_id')
            ->where('send_messages.other_person_user_id', Auth::user()->id)
            ->count();
		
		return $messageSentToUserCount;
	}

    public function countRequestPhoto()
    {
        $requestphotos = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.request_photo', 'request-photo')
            ->where('user_actions.other_person_user_id', Auth::user()->id)
			->count();
			
		return $requestphotos;
        // dd($requestphotos);
		
    }


	private function countRequestMobiles() {
        $requestMobilesCount = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.request_mobile', 'request-mobile')
            ->where('user_actions.notification', 1)
            ->where('user_actions.other_person_user_id', Auth::user()->id)
            ->count();
		return $requestMobilesCount;
	}

	private function countRequestEmail() {
        $requestEmailsCount = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.request_email', 'request-email')
            ->where('user_actions.email_notification', 1)
            ->where('user_actions.other_person_user_id', Auth::user()->id)
            ->count();
			
		return $requestEmailsCount;
	}

	private function countRequestLike() {
        $requestLikesCount = user_action::join('users', 'user_actions.user_id', '=', 'users.id')
            ->where('user_actions.like', 'like')
            ->where('user_actions.other_person_user_id', Auth::user()->id)
            ->count();
			
		return $requestLikesCount;
	}
	
	private function sendMobileRequestsCount() {
	
        $sendMobileRequestsCount = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
            ->where('user_actions.request_mobile', 'request-mobile')
            ->where('user_actions.user_id', Auth::user()->id)
            ->count();
			
		return $sendMobileRequestsCount;
	}

	private function sendEmailRequestsCont() {
        $sendEmailRequestsCont = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
            ->where('user_actions.request_email', 'request-email')
            ->where('user_actions.user_id', Auth::user()->id)
            ->count();
		return $sendEmailRequestsCont;
	}
	
	private function sendLikescount() {
        $sendLikescount = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
            ->where('user_actions.like', 'like')
            ->where('user_actions.user_id', Auth::user()->id)
            ->count();
		return $sendLikescount;
	}

	private function sendphotoRequestsCount() {
        $sendphotoRequestsCount = user_action::join('users', 'user_actions.other_person_user_id', '=', 'users.id')
            ->where('user_actions.request_photo', 'request-photo')
            ->where('user_actions.user_id', Auth::user()->id)
            ->count();
		return $sendphotoRequestsCount;
	}

	private function footerUser() {
		$FooterUser = User::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('name', 'profile_img','city')->get();
		return $FooterUser;
	}

	private function footerStory() {
		$Footerstory = stories_dating::where('status', 1)->orderBy('updated_at', 'desc')->limit(3)->select('title', 'slug', 'publish_date', 'listing_img')->get();
		return $Footerstory;
	}
	
	private function __dashboardMenu() {
		$bookmarksCount = $this->countBookmark();
		$countMessage = $this->countMessage();
		$requestMobilesCount = $this->countRequestMobiles();
		$countRequestPhoto = $this->countRequestPhoto();
		$requestEmailsCount = $this->countRequestEmail();
		$requestLikesCount = $this->countRequestLike();
		$sendMobileRequestsCount = $this->sendMobileRequestsCount();
		$sendEmailRequestsCont = $this->sendEmailRequestsCont();
		$sendLikescount = $this->sendLikescount();
		$sendphotoRequestsCount = $this->sendphotoRequestsCount();
		$FooterUser = $this->footerUser();
		$FooterStory = $this->footerStory();

		$arrReturn=['bookmarksCount' => $bookmarksCount, 'countMessage'=>$countMessage, 'requestMobilesCount' => $requestMobilesCount, 'countRequestPhoto'=>$countRequestPhoto, 'requestEmailsCount'=>$requestEmailsCount, 'requestLikesCount' => $requestLikesCount, 'sendMobileRequestsCount'=>$sendMobileRequestsCount, 'sendEmailRequestsCont'=>$sendEmailRequestsCont, 'sendLikescount'=>$sendLikescount, 'sendphotoRequestsCount'=>$sendphotoRequestsCount, 'FooterUser'=>$FooterUser, 'Footerstory'=>$FooterStory];
		return $arrReturn;
	}

	public function footerView() {
		$FooterUser = $this->footerUser();
		$FooterStory = $this->footerStory();


		//$html = view('users.edit', compact('user'))->render();

        $response = view('frontend.bin.footer', ['FooterUser' => $FooterUser, 'Footerstory' => $FooterStory])->render();
        //$response = response()->view('frontend.bin.footer', ['FooterUser' => $FooterUser, 'Footerstory' => $FooterStory]);
		file_put_contents('../resources/views/frontend/bin/footerFrontend.blade.php', $response);
		
		
		//Storage::put('frontend.bin/example2.blade.php', $response);
		//Storage::disk('local')->put('example2.blade.php', $response);
		

		//return view('frontend.bin.footer', ['FooterUser' => $FooterUser, 'Footerstory' => $FooterStory]);
		//echo "<pre>"; print_r($response);
	}
}
