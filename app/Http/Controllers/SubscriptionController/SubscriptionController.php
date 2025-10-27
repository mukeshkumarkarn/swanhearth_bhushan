<?php

namespace App\Http\Controllers\SubscriptionController;

use App\Models\payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Razorpay\Api\Api;


class SubscriptionController extends Controller
{
    //
    public function SubscriptionPay(Request $request)
    {
        $request->validate([
            'subscription_plan' => 'required',
            'user_id' => 'required',
            'fee' => 'required',

        ]);
        $payment = new payment;
        $payment->user_id = $request->user_id;
        $payment->subscription_plan = $request->subscription_plan;
        $payment->fee = $request->fee;
        $payment->status = 1;
        $payment->subscription_start_date = Carbon::now('Asia/Kolkata');
        $payment->subscription_end_date = Carbon::now('Asia/Kolkata')->addMonth();
        $payment->order_id = Str::random(20);
        $payment->transaction_id = Str::random(30);
        $payment->save();
        return back();
    }


}
