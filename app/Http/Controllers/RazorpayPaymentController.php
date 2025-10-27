<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Razorpay\Api\Api;
use App\Models\payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        return view('razorpayView');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
      
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);
    
        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }
        $user_id = User::where('email', $payment->email)->first();

        $amount = $payment->amount;
        $paymentId = $payment->id;

        if ($amount == 100000) {
            $amount = 1000;
            $subscription_plan = 'basic';
            $date = Carbon::now('Asia/Kolkata')->addMonth();
        } elseif ($amount == 200000) {
            $amount = 2000;
            $subscription_plan = 'standard';
            $date = Carbon::now('Asia/Kolkata')->addMonth(2);
        } else {
            $amount = 3000;
            $subscription_plan = 'professional';
            $date = Carbon::now('Asia/Kolkata')->addMonth(3);
        }

        $payment = new payment;
        $payment->fee = $amount;
        $payment->subscription_plan = $subscription_plan;
        $payment->user_id = $user_id->id;
        $payment->transaction_id = $paymentId;
        $payment->order_id = Str::random(20);
        $payment->status = 1;
        $payment->subscription_start_date = Carbon::now('Asia/Kolkata');
        $payment->subscription_end_date = $date;
        $payment->save();
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}
