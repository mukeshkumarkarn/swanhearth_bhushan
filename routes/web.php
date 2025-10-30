<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdminAuth;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\UserRegister\UserRegister;
use App\Http\Controllers\AdminAuth\AdminAuthController;
use App\Http\Controllers\PollController\PollController;
use App\Http\Controllers\AdminController\AdminController;
use App\Http\Controllers\Contactcontroller\ContactController;
use App\Http\Controllers\FrontendController\FrontendController;
use App\Http\Controllers\DynamicMetaController\DynamicMetaController;
use App\Http\Controllers\UserProfileController\UserProfileController;
use App\Http\Controllers\SubscriptionController\SubscriptionController;
use App\Http\Controllers\DatingStoriesController\DatingStoriesController;
use App\Http\Controllers\MatchCalculatorController\MatchCalculatorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'Home'])->name('index');

Route::get('/home', [FrontendController::class, 'Home'])->name('index');


Route::get('login', [FrontendController::class, 'User_login'])->name('login');

Route::get('sign-up', [FrontendController::class, 'User_register'])->name('user-register');

//Route::get('dashboard', [FrontendController::class, 'dashboard'])->name('dashboard');

Route::get('forgot-password', [FrontendController::class, 'forgot_password'])->name('forgot-password');

Route::post('user-register', [UserRegister::class, 'register']);

Route::get('confirmemail/{token}', [UserRegister::class, 'activamail']);

Route::get('dating-advice', [FrontendController::class, 'dating_advice'])->name('dating-advice');

Route::get('dating-advice/{slug}', [FrontendController::class, 'detail_advice'])->name('detail-advice');

Route::get('dating-stories', [FrontendController::class, 'stories_dating'])->name('dating-stories');

Route::get('dating-stories/{slug}', [FrontendController::class, 'detail_stories'])->name('detail-stories');

Route::get('dating-stories/edit/{slug}', [FrontendController::class, 'Userdetail_stories'])->name('edit-user-dating-stories');

// Route::get('matchmaking', [FrontendController::class, 'matchmaking'])->name('matchmaking');

Route::get('love-calculator', [FrontendController::class, 'Match_Calculator'])->name('love-calculator');
Route::get('love-calculator/{search_type}', [FrontendController::class, 'Match_Calculator'])->name('love-calculator-search_type');
Route::get('love-calculator-name', [FrontendController::class, 'Match_Calculator_name'])->name('love-calculator-name');
Route::get('love-calculator-name-dob', [FrontendController::class, 'Match_Calculator_name_dob'])->name('love-calculator-name-dob');

Route::get('membership', [FrontendController::class, 'membership'])->name('membership');

Route::get('faqs', [FrontendController::class, 'faqs'])->name('faqs');

Route::get('policy', [FrontendController::class, 'policy'])->name('policy');

Route::get('terms-and-condition', [FrontendController::class, 'terms_and_condition'])->name('terms-and-condition');

Route::get('fb-data-deletion', [FrontendController::class, 'fb_data_deletion'])->name('fb-data-deletion');

Route::get('contact-us', [FrontendController::class, 'contact_us'])->name('contact-us');

Route::post('contact-save', [ContactController::class, 'Contact_store']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [FrontendController::class, 'dashboard'])->name('dashboard');
    Route::get('settings', [FrontendController::class, 'settings'])->name('settings');
    Route::get('matchmaking', [FrontendController::class, 'matchmaking'])->name('matchmaking');
	
	Route::get('matches/{user_ref}/{page}', [FrontendController::class, 'matches'])->name('matches');
	Route::get('matches/{user_ref}', [FrontendController::class, 'matches'])->name('matches');
    Route::get('matches', [FrontendController::class, 'matches'])->name('matches');
    
    Route::get('message/{user_ref?}', [FrontendController::class, 'message'])->name('message');
    Route::get('account', [FrontendController::class, 'account'])->name('account');
    Route::post('subscription-pay', [SubscriptionController::class, 'SubscriptionPay']);
    Route::get('search-data', [FrontendController::class, 'searchKeyword']);
    Route::get('/matchmaking/{datasearch?}/{minage?}/{maxage?}', [FrontendController::class, 'searchMatchMaking'])->name('matchmaking');
    //Route::get('blocked-users', [FrontendController::class, 'blocked_users'])->name('blocked_users');
});

Route::get('captcha', [UserRegister::class, 'captcha']);

Route::post('captcha', [UserRegister::class, 'validateCaptcha'])->name('validate-captcha');

Route::post('story-add', [PollController::class, 'add_stories']);
Route::post('dating-advice-add', [PollController::class, 'add_dating_advice']);

Route::prefix('admin')->middleware(['CheckAdminAuth'])->group(function () {
    Route::get('view-dynamic-meta', [AdminController::class, 'Show_dynamic_meta'])->name('view-meta');
    Route::get('add-dynamic-meta', [AdminController::class, 'add_dynamic_meta'])->name('add-dynamic-meta');
    Route::get('edit-dynamic-meta/{id}', [AdminController::class, 'edit_dynamic_meta'])->name('edit-dynamic-meta');
    Route::get('all-users', [AdminController::class, 'AllUsers'])->name('all-users')->middleware('CheckAdminAuth');
    Route::get('block-users', [AdminController::class, 'BlockUsers'])->name('block-users');
    Route::get('add-dating-advice', [AdminController::class, 'AddDatingAdvive'])->name('add-dating-advice');
    Route::get('dating-stories', [AdminController::class, 'StoriesApproved'])->name('dating-stories');
    Route::get('register', [AdminController::class, 'RegisterPage'])->name('register');
    Route::get('add-stories', [AdminController::class, 'AddStories'])->name('add-stories');
    Route::get('dating-stories/{slug}', [AdminController::class, 'Detailsstories'])->name('dating-stories');
    Route::get('setting', [AdminController::class, 'AdminSetting'])->name('setting');
    Route::get('user-details/{user_ref}', [AdminController::class, 'UsersDatils'])->name('user-details');
    Route::get('stories-edit/{slug}', [AdminController::class, 'Editstories'])->name('user-details');
    Route::get('dating-advice', [AdminController::class, 'DatingApproved'])->name('dating-advice');
    Route::get('dating-advice/edit/{slug}', [AdminController::class, 'EditDatingAdvice'])->name('dating-advice');
    Route::get('dating-advice/{slug}', [AdminController::class, 'DatingAdviceDetail'])->name('dating-advice');
    Route::get('all-admin', [AdminController::class, 'AllAdmin'])->name('all-admin');
    Route::get('block-admin', [AdminController::class, 'AllAdminBlock'])->name('block-admin');
    Route::get('edit-register/{emp_ref}', [AdminController::class, 'EditRegisterPage'])->name('edit-register');
    Route::get('add-poll-question', [AdminController::class, 'AddPollQuestion'])->name('add-poll-question');
    Route::get('poll-question', [AdminController::class, 'ShowPollQuestion'])->name('poll-question');
    Route::get('poll-question/edit/{id}', [AdminController::class, 'EditPollQuestion'])->name('edit');
    Route::get('active-stories', [AdminController::class, 'ActiveStories'])->name('active-stories');
    Route::get('active-dating-advice', [AdminController::class, 'ActiveDatingApproved'])->name('active-dating-advice');
    Route::get('view-contact', [AdminController::class, 'ViewContact'])->name('view-contact');

    Route::get('membership-show', [AdminController::class, 'MembershipShow'])->name('membership-show');


});
Route::get('admin/terms-and-condition', [AdminController::class, 'TermsAndCondition'])->name('terms-and-condition');

Route::get('stories-active/{slug}', [AdminController::class, 'StoriesActive']);
Route::get('stories-inactive/{slug}', [AdminController::class, 'StoriesInActive']);

Route::get('admin', [AdminController::class, 'AdminLoginPage'])->name('admin-login');
Route::post('employes-login', [AdminAuthController::class, 'login_admin']);
Route::get('admin-logout', [AdminAuthController::class, 'Adminlogout']);
Route::post('admin-password-update', [AdminAuthController::class, 'admin_password_update']);
Route::post('admin-register', [AdminAuthController::class, 'Adminregister']);
Route::get('admin-delete/{user_ref}', [AdminController::class, 'AdminUserDelete']);
Route::get('admin-active-user/{user_ref}', [AdminController::class, 'AdminUserActive']);
Route::post('stories-update', [PollController::class, 'Update_stories']);
Route::post('dating-advice-update', [PollController::class, 'UpdateDatingAdvice']);
Route::get('dating-advice-active/{slug}', [AdminController::class, 'DatingAdviceActive']);
Route::get('dating-advice-inactive/{slug}', [AdminController::class, 'DatingAdviceInActive']);

Route::get('poll-question-inactive/{ref_no}', [PollController::class, 'PollQuestionInActive']);


Route::get('super-admin-block/{emp_ref}', [AdminController::class, 'AdminBlock']);

Route::get('super-admin-unblock/{emp_ref}', [AdminController::class, 'AdminUnBlock']);

Route::post('admin-register-update', [AdminAuthController::class, 'Update_register']);

Route::post('add-question', [PollController::class, 'AddQuestion']);

Route::post('update-poll-question', [PollController::class, 'PollQuestionUpdate']);



Route::post('add-meta', [DynamicMetaController::class, 'add_meta']);

Route::post('update-meta', [DynamicMetaController::class, 'update_meta']);


Route::post('add-user-story', [DatingStoriesController::class, 'add_user_stories']);

Route::post('profile-update', [UserProfileController::class, 'profile_update']);

Route::post('user-password-update', [UserProfileController::class, 'user_password_update']);

Route::post('user-personal-update', [UserProfileController::class, 'personal_details_update']);

Route::post('user-preferred-matchs-update', [UserProfileController::class, 'user_preferred_matchs_update']);

Route::post('user-album-update', [UserProfileController::class, 'user_album']);

Route::get('auth/google', [UserRegister::class, 'redirectToGoogle']);

Route::get('callback/google', [UserRegister::class, 'user_checking_google']);

Route::get('auth/facebook', [UserRegister::class, 'redirectTofacebook']);

Route::get('callback/facebook', [UserRegister::class, 'user_checking_facebook']);

Route::prefix('settings')->group(function () {
    Route::get('change-password', [FrontendController::class, 'change_password'])->name('change-password');
    Route::get('personal-details', [FrontendController::class, 'personal_details'])->name('personal-details');
    Route::get('album', [FrontendController::class, 'album'])->name('album');
    Route::get('preferred-match', [FrontendController::class, 'preferred_match'])->name('preferred-match');
    Route::get('delete-account', [FrontendController::class, 'DeleteAccount'])->name('delete-account');
    Route::get('permission-manage', [FrontendController::class, 'PermissionManage'])->name('permission-manage');
    Route::get('professional-details', [FrontendController::class, 'professional_details'])->name('professional-details');
});



// dashboard function

Route::prefix('dashboard')->group(function () {
    Route::get('friend-message', [FrontendController::class, 'friend_message'])->name('friend-message');
    Route::get('request-mobile-received', [FrontendController::class, 'request_mobile_recived'])->name('request-mobile-received');
    Route::post('request-mobile-received', [FrontendController::class, 'request_mobile_recived']);
    Route::get('request-email-received', [FrontendController::class, 'request_email_recived'])->name('request-email-received');
    Route::get('request-photo-received', [FrontendController::class, 'request_photo_recived'])->name('request-photo-received');
    Route::get('request-like-received', [FrontendController::class, 'request_like_recived'])->name('request-like-received');
    Route::get('request-mobile-sent', [FrontendController::class, 'request_mobile_send'])->name('request-mobile-sent');
    Route::get('request-email-sent', [FrontendController::class, 'request_email_send'])->name('request-email-sent');
    Route::get('request-sent-photo', [FrontendController::class, 'request_send_photo'])->name('request-sent-photo');
    Route::get('request-like-sent', [FrontendController::class, 'request_like_send'])->name('request-like-sent');
    Route::get('show-image-gallery/{user_ref}', [FrontendController::class, 'ShowGallery'])->name('show-image-gallery');
    Route::get('blocked-users', [FrontendController::class, 'blocked_users'])->name('blocked_users');
});

Route::get('own-user-delete-account', [UserProfileController::class, 'AccountDelete']);

Route::get('register-step2', [FrontendController::class, 'SocialMediaRegister'])->name('register-step2');

Route::post('user-register-social-media', [UserRegister::class, 'UserRegisterStep2']);

Route::get('poll-question-active/{ref_no}', [PollController::class, 'PollQueActive']);

Route::post('users-stories-update', [PollController::class, 'UpdateStoriesByUsers']);

Route::get('dating-stories-delete/{ref_no}', [PollController::class, 'deleteStories']);

Route::post('profile-img', [UserProfileController::class, 'profile_img']);

Route::post('permission-update', [UserProfileController::class, 'Permission']);

Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);

Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

Route::get('user-search', [AdminController::class, 'UserSeach']);

Route::post('Contact-Reply', [ContactController::class, 'Contact_Reply']);

Route::get('contact-message-Show/{id}', [ContactController::class, 'Contact_message']);

Route::post('user-professional-update', [UserProfileController::class, 'user_professional_update']);

Route::get('footer-view', [FrontendController::class, 'footerView']);


Route::get('users', [FrontendController::class, 'users'])->name('users');

Route::get('users/{slug}', [FrontendController::class, 'users'])->name('users');
