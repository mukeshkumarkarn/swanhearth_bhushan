<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegister\UserRegister;
use App\Http\Controllers\AdminAuth\AdminAuthController;
use App\Http\Controllers\PollController\PollController;
use App\Http\Controllers\FrontendController\FrontendController;
use App\Http\Controllers\UserLikeController\UserLikeController;
use App\Http\Controllers\SendMessageController\SendMessageController;
use App\Http\Controllers\DatingStoriesController\DatingStoriesController;
use App\Http\Controllers\MatchCalculatorController\MatchCalculatorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('getstatecity', [UserRegister::class, 'getStateCity']);

Route::post('poll-answer', [PollController::class, 'poll_answer']);

Route::get('user-like/{user_other_person_id}/{user_id}', [UserLikeController::class, 'user_like_data']);

Route::get('user-dislike/{user_other_person_id}/{user_id}', [UserLikeController::class, 'user_dislike_data']);

Route::get('Bookmark/{user_other_person_id}/{user_id}', [UserLikeController::class, 'user_bookmark_data']);

Route::get('cancle-Bookmark/{user_other_person_id}/{user_id}', [UserLikeController::class, 'user_bookmark_Remove']);


Route::get('request-mobile/{user_other_person_id}/{user_id}', [UserLikeController::class, 'user_mobile_no_request']);

Route::get('cancle-request-mobile/{user_other_person_id}/{user_id}', [UserLikeController::class, 'user_mobile_no_request_cancle']);

Route::get('request-email/{user_other_person_id}/{user_id}', [UserLikeController::class, 'user_email_request']);

Route::get('cancle-request-email/{user_other_person_id}/{user_id}', [UserLikeController::class, 'user_email_request_cancle']);

Route::get('block/{user_other_person_id}/{user_id}', [UserLikeController::class, 'block']);

Route::get('unblock/{user_other_person_id}/{user_id}', [UserLikeController::class, 'Unblock']);

Route::get('request-mobile-status/{action_id}/{request_mobile_status}', [UserLikeController::class, 'request_mobile_status']);

Route::get('request-email-status/{action_id}/{request_email_status}', [UserLikeController::class, 'request_email_status']);

// Route::get('proposal-fillter/{id}', [FrontendController::class, 'GetUserData']);


Route::post('Send-message', [SendMessageController::class, 'Send_Message']);

Route::get('accept-mobile-request/{id}', [UserLikeController::class, 'accep_mobile_no']);

Route::get('deny-mobile-request/{id}', [UserLikeController::class, 'cancle_mobile_no']);

// Email

Route::get('accept-email-request/{id}', [UserLikeController::class, 'accept_email']);

Route::get('deny-email-request/{id}', [UserLikeController::class, 'cancle_email']);

// mobile Request Notification 
Route::get('mobile-request-notification-remove/{id}', [UserLikeController::class, 'mobile_no_request_Notification']);

// email notification
Route::get('email-request-notification-remove/{id}', [UserLikeController::class, 'email_request_Notification']);

// like notification
Route::get('like-request-notification-remove/{id}', [UserLikeController::class, 'like_request_Notification']);

Route::get('total-notification-dashboad/{id}', [UserLikeController::class, 'TotalNotificationDashbord']);

Route::post('user-stories-mail', [DatingStoriesController::class, 'UserStoriesMail']);

Route::post('superadmin-change-password-admin', [AdminAuthController::class, 'SuperAdmin_password_updateAdmin']);


Route::post('match-calculators-name', [MatchCalculatorController::class, 'bynameMatchCalculator']);

Route::post('match-calculators', [MatchCalculatorController::class, '_getMatchCalculator']);

Route::get('album-delete-request/{id}', [UserLikeController::class, 'AlbumDelete']);


Route::get('request-photo/{user_other_person_id}/{user_id}', [UserLikeController::class, 'user_photo_request']);

Route::get('cancle-request-photo/{user_other_person_id}/{user_id}', [UserLikeController::class, 'user_photo_request_cancle']);

Route::get('accept-photo-request/{id}', [UserLikeController::class, 'accecp_photo']);

Route::get('deny-photo-request/{id}', [UserLikeController::class, 'cancle_photo']);
