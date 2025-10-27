<?php

namespace App\Http\Controllers\UserRegister;

use DateTime;
use App\Models\User;
use App\Mail\SendMail;
use App\Mail\SuperInfo;
use App\Models\login_log;
use App\Models\error_logs;
use App\Traits\UploadImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Stevebauman\Location\Facades\Location;



class UserRegister extends Controller
{
    use UploadImage;
    //

    public function captcha()
    {
        $randomVal = substr(md5(rand()), 4, 5);
        $imgPath = "./assets/images/";
        $imgName = "captcha.jpg";

        $width = 70;
        $height = 35;
        $captRandVal = $randomVal;
        $img = imagecreatetruecolor($width, $height);

        // Image color allocation
        $white = ImageColorAllocate($img, 255, 255, 255);
        $black = ImageColorAllocate($img, 0, 0, 0);
        $grey = ImagecolorAllocate($img, 204, 204, 204);
        $pink = ImagecolorAllocate($img, 186, 44, 115);
        imagecolortransparent($img, $black);

        // Fill color
        ImageFill($img, 0, 0, $pink);
        // imagearc($img, 100, 100, 200, 200,  0, 360, $white);
        imagestring($img, 20, 10, 10, $captRandVal, $white);

        session(['CAPTCHAVALUE' => $captRandVal]);

        header('Content-type: image/jpeg');
        imagejpeg($img);


        //imagejpeg($img, $imgPath.$imgName);
        imagedestroy($img);
    }


    public function validateCaptcha(Request $request)
    {
        $captchaValue = $request->input('captcha_value');
        $storedValue = session('CAPTCHAVALUE');
        //dd($storedValue);
        if ($captchaValue === $storedValue) {
            // Correct captcha value entered
            // Do something here, like allowing the user to submit a form
            return response()->json(['message' => 'Captcha validation successful.']);
        } else {
            // Incorrect captcha value entered
            // Show an error message to the user
            return response()->json(['message' => 'Invalid captcha value entered. Please try again.']);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'password' => 'required',
            'gender' => 'required',
        ]);

        $emailUser = User::where('email', $request->email)->first();

        if ($emailUser) {
            if ($emailUser->status == 1) {
                $request->session()->flash('success', "The email has already been taken");
            } elseif ($emailUser->status == 2) {
                $request->session()->flash('success', "The email has already been taken , Please verify your email.");
            } elseif ($emailUser->status == 3) {
                $request->session()->flash('success', "Your Account is deleted.");
            }
            return redirect()->back();
        }

        // Calculate age from date of birth
        $dob = new DateTime($request->dob);
        $today = new DateTime();
        $age = $dob->diff($today)->y;

        // Check age based on gender
        if ($request->gender == 'female' && $age < 18) {
            return redirect()->back()->with('success', "Your age is not complete. Female users must be at least 18 years old.");
        } elseif ($request->gender == 'male' && $age < 21) {
            return redirect()->back()->with('success', "Your age is not complete. Male users must be at least 21 years old.");
        }

        $imgProduct = null;
        if ($request->hasFile('profile_img')) {
            $imgProductFile = $request->file("profile_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/images/profile_img/', '', $imgProductFile, $new_name_of_profile_photo3);
        }


        $token = Str::random(30);
        $ipAddress = request()->ip();
        $user = new User();
        $user->user_ref = mt_rand(1000000, 9999999);
        $user->name = $request->name;
        $user->profile_img = $imgProduct;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->pincode = $request->pincode;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->latitude = $request->latitude;
        $user->longitute = $request->longitude;
        $user->city = $request->city;
        $user->status = 2;
        $user->ip_address = $ipAddress;
        $user->email_verification = $token;
        $user->save();
        $url = url('confirmemail/') . '/' . $token;

        $maildata = [
            'name' => $request->name,
            'url' =>  $url,
        ];

        Mail::to($request->email)->send(new SendMail($maildata));

        $superAdmin = [
            'name' => $request->name,
            'dob' => $request->dob,
            'email' => $request->email,
        ];

        Mail::to(env('SUPER_ADMIN_EMAIL'))->send(new SuperInfo($superAdmin));

        $request->session()->flash('success', "Registration Successful and Please Verify email");
        return back();
    }

    public function getStateCity(Request $request)
    {
        $request->validate([
            "pincode" => 'required'
        ]);
        $pincode = $request->pincode;
        $url = 'https://api.postalpincode.in/pincode/' . $pincode;
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            return response()->json($data);
        } else {
            return response()->json(['error' => 'Failed to retrieve data'], 400);
        }
    }


    public function activamail($id)
    {
        $user = User::where('email_verification', $id)->first();

        if ($user) {
            $user->conf_email = 1;
            $user->email_verified_at = now();
            $user->status = 1;
            $user->update();
            Session::flash('success', 'Email verified successfully Please Login.');
            return redirect()->to('login');
        } else {
            return abort(404);
        }
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // public function user_checking_google()
    // {
    //     try {
    //         $user = Socialite::driver('google')->user();
    //         $findUser = User::where('email', $user->email)->where('status', '!=', 3)->first();
    //         if ($findUser) {
    //             Auth::login($findUser);
    //         } else {
    //             $newUser = User::create([
    //                 'user_ref' => mt_rand(1000000, 9999999),
    //                 'email' => $user->email,
    //                 'name' => $user->name,
    //                 'status' => 1,
    //                 'social_id' => $user->id,
    //                 'email_verified_at' => now(),
    //                 'social_type' => 'google',
    //                 'password' => bcrypt($user->email),
    //             ]);
    //             Auth::login($newUser);
    //         }

    //         return redirect()->to('/home');
    //     } catch (Exception $e) {
    //         dd($e->getMessage());
    //     }
    // }

    public function user_checking_google(Request $request)
    {
		$ip = $request->ip();
        try {
            $location = Location::get($ip);
            $latitude = $location->latitude;
            $longitude = $location->longitude;
            $user = Socialite::driver('google')->stateless()->user();
            $findUser = User::where('email', $user->email)->where('status', '!=', 3)->first();
            if ($findUser) {
                $findUser->update([
                    'current_latitude' => $latitude,
                    'current_longitute' => $longitude,
                ]);
                Auth::login($findUser);
                $login_log = new login_log();
                $login_log->user_id = $findUser->id;
                $login_log->ip_address = $ip;
                $login_log->country = $location->countryName;
                $login_log->state = $location->regionName;
                $login_log->city = $location->cityName;
                $login_log->pincode = $location->postalCode;
                $login_log->latitude = $location->latitude;
                $login_log->longitute = $location->longitude;
                $login_log->login_type = 'google';
                $login_log->loginDate = now();
                $login_log->save();
                return redirect()->to('matches');
            } else {
                $newUser = User::create([
                    'user_ref' => mt_rand(1000000, 9999999),
                    'email' => $user->email,
                    'name' => $user->name,
                    'status' => 1,
                    'social_id' => $user->id,
                    'email_verified_at' => now(),
                    'social_type' => 'google',
                    'password' => bcrypt($user->name),
                    'latitude' => $latitude,
                    'longitute' => $longitude,
                    'current_latitude' => $latitude,
                    'current_longitute' => $longitude,
                ]);
                Session::put('user_id', $newUser->id);
                return redirect()->to('register-step2');
            }
            return redirect()->to('/home');
        } catch (Exception $e) {
			$this->__error_log($e);
            //dd($e->getMessage());
        }
    }

    public function redirectTofacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function user_checking_facebook(Request $request)
    {
        try {
            $ip = $request->ip();
            $location = Location::get($ip);
            $latitude = $location->latitude;
            $longitude = $location->longitude;
            $user = Socialite::driver('facebook')->stateless()->user();
            $findUser = User::where('email', $user->email)->where('status', '!=', 3)->first();
            if ($findUser) {
                $findUser->update([
                    'current_latitude' => $latitude,
                    'current_longitute' => $longitude,
                ]);
                Auth::login($findUser);
                $login_log = new login_log();
                $login_log->user_id = $findUser->id;
                $login_log->ip_address = $ip;
                $login_log->country = $location->countryName;
                $login_log->state = $location->regionName;
                $login_log->city = $location->cityName;
                $login_log->pincode = $location->postalCode;
                $login_log->latitude = $location->latitude;
                $login_log->longitute = $location->longitude;
                $login_log->login_type = 'facebook';
                $login_log->loginDate = now();
                $login_log->save();
                return redirect()->to('matches');
            } else {
                $newUser = User::create([
                    'user_ref' => mt_rand(1000000, 9999999),
                    'email' => $user->email,
                    'name' => $user->name,
                    'status' => 1,
                    'social_id' => $user->id,
                    'email_verified_at' => now(),
                    'social_type' => 'facebook',
                    'password' => bcrypt($user->name),
                    'latitude' => $latitude,
                    'longitute' => $longitude,
                    'current_latitude' => $latitude,
                    'current_longitute' => $longitude,
                ]);
                Session::put('user_id', $newUser->id);
                return redirect()->to('register-step2');
            }
            return redirect()->to('/home');
        } catch (Exception $e) {
			$this->__error_log($e);
			
            //dd($e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            return $this->sendLoginResponse($request);
        }
        Session::flash('success', 'These credentials do not match our records.');
        return $this->sendFailedLoginResponse($request);
    }


    public function UserRegisterStep2(Request $request)
    {
        $user_id = $request->user_id;
        $ip = $request->ip();
        $location = Location::get($ip);
        $data = User::where('id', $user_id)->first();

        $imgProduct = null;
        if ($request->hasFile('profile_img')) {
            $imgProductFile = $request->file("profile_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/images/profile_img/', '', $imgProductFile, $new_name_of_profile_photo3);
        }

        user::where('id', $user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile_img' => $imgProduct,
            'pincode' => $request->pincode,
            'dob' => $request->dob,
            'country' => $request->country,
            'state' => $request->state,
            'gender' => $request->gender,
            'city' => $request->city,
            'ip_address' => $ip,
            'conf_email' => 1,
            'status' => 1,
        ]);
        Auth::login($data);
        $login_log = new login_log();
        $login_log->user_id = $user_id;
        $login_log->ip_address = $ip;
        $login_log->country = $location->countryName;
        $login_log->state = $location->regionName;
        $login_log->city = $location->cityName;
        $login_log->pincode = $location->postalCode;
        $login_log->latitude = $location->latitude;
        $login_log->longitute = $location->longitude;
        $login_log->login_type = 'google';
        $login_log->loginDate = now();
        $login_log->save();
        return redirect()->to('matches');
    }
	
	private function __error_log($e) {
			$current_url=url()->current();
			$error_logs = error_logs::create([
				'url'=>$current_url,
				'ip_address'=>$ip,
				'error_message'=>dd($e->getMessage())
			]);
		return redirect()->to('/');
	}
}
