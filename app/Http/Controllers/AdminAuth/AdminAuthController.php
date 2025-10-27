<?php

namespace App\Http\Controllers\AdminAuth;

use App\Models\employer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Traits\UploadImage;


class AdminAuthController extends Controller
{
    use UploadImage;

    //
    public function login_admin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $result = employer::where('email', $email)->where('status', 1)->first();
        if ($result && !empty($result->password)) {
            $hashedPassword = $result->password;
            if (is_string($password) && password_verify($password, $hashedPassword)) {
                $request->session()->put('Ljghtoq45!@856Sl56as^%$aslf5DSDFl', 'login');
                Session::put("admin", $result);
                Session::put("id", $result->id);
                Session::put("first_name", $result->first_name);
                Session::put("email", $result->email);
                Session::put("avatar", $result->avatar);
                Session::put("admin_employee", $result->admin_employee);
                return redirect()->to('admin/all-users');
            } else {
                return redirect()->to('admin')->with('success', 'Invalid email or password');
            }
        } else {
            return redirect()->to('admin')->with('success', 'User not found');
        }
    }

    public function Adminlogout()
    {
        session()->flush();
        return redirect()->to('/');
    }


    public function admin_password_update(Request $request)
    {
        $admin_id = $request->admin_id;
        $user = employer::where('id', $admin_id)->first();
        $Password = Hash::make($request->password);
        employer::where('id', $admin_id)->update([
            'password' => $Password,
        ]);
        Session::flash('success', 'Password Update successful.');
        return back();
    }


    public function Adminregister(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'email' => 'required',
            'last_name' => 'required',
            'password' => 'required',
        ]);

        $emailUser = employer::where('email', $request->email)->first();


        if ($emailUser) {
            if ($emailUser->status == 1) {
                $request->session()->flash('success', "The email has already been taken");
            } elseif ($emailUser->status == 2) {
                $request->session()->flash('success', "The email has already been taken , Please verify your email.");
            } elseif ($emailUser->status == 3) {
                $request->session()->flash('success', "Your Account is deleted.");
            }
        }

        if ($request->hasFile('profile_img')) {
            $imgProductFile = $request->file("profile_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/images/Admin-profile-img/', '', $imgProductFile, $new_name_of_profile_photo3);
        } else {
            if ($request->gender == 'male') {
                $imgProduct = '660e46c8255c62.74317369.png';
            } else {
                $imgProduct = '660e474dbdf8c0.17337599.png';
            }
        }

        $employer = new employer();
        $employer->emp_ref = mt_rand(1000000, 9999999);
        $employer->first_name = $request->first_name;
        $employer->last_name = $request->last_name;
        $employer->avatar = $imgProduct;
        $employer->email = $request->email;
        $employer->admin_employee = $request->admin_employee;
        $employer->gender = $request->gender;
        $employer->parentId = $request->parentId;
        $employer->password = Hash::make($request->password);
        $employer->status = 1;
        $employer->save();

        $request->session()->flash('success', "Registration Successful");
        return redirect()->to('admin/all-admin');
    }

    public function Update_register(Request $request)
    {
        $emp_ref = $request->emp_ref;
        $user = employer::where('emp_ref', $emp_ref)->first();
        if ($request->hasFile('profile_img')) {
            $imgProductFile = $request->file("profile_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/images/Admin-profile-img/', '', $imgProductFile, $new_name_of_profile_photo3);
        } else {
            if ($request->gender == 'male') {
                $imgProduct = '660e46c8255c62.74317369.png';
            } else {
                $imgProduct = '660e474dbdf8c0.17337599.png';
            }
        }

        employer::where('emp_ref', $emp_ref)->update([
            'first_name' =>  $request->first_name,
            'last_name' =>  $request->last_name,
            'avatar' => $imgProduct,
            'admin_employee' =>  $request->admin_employee,
            'gender' =>  $request->gender,
            'parentId' =>  $request->parentId,
        ]);
        $request->session()->flash('success', "Update Successful");
        return redirect()->to('admin/all-admin');
    }


    public function SuperAdmin_password_updateAdmin(Request $request)
    {
        $admin_id = $request->getid;
        $user = employer::where('id', $admin_id)->first();
        $Password = Hash::make($request->password);
        employer::where('id', $admin_id)->update([
            'password' => $Password,
        ]);
        return response()->json(["message" => "Password updated successfully"], 200);
    }
}
