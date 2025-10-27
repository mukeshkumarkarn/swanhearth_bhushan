@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Membership</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Membership</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage">
    <div class="how-it-work main-princing-section  w-100 float-start">
        <div class="container">
            <div class="heading center-heading">
                <h2><strong>Subscription</strong> tiers at a glance</h2>
                <div class="heart-line">
                    <i class="fa fa-heart"></i>
                </div>
				<p>Its almost free dating portal. We ask money to get serious people in platform. Dating portal is for serious single for love and relationship. <br/>Subscription rate are low and easily payable. Its non refundable.</p>
            </div>
            <div class="w-100 float-start">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="counter-box">
                            <div class="counter-icon">
                                <h2>₹ 200</h2>
                            </div>
                            <div class="counter-text">
                                <h4>Lovely</h4>
                                <span>1 Months plan</span>
                                <ul class="table-ul">
                                    <li>LifeTime Memabership</li>
                                    <li>Profile Security </li>
                                    <li>Free Notification</li>
                                </ul>
                                @if(Auth::check())
                                <form action="{{ route('razorpay.payment.store') }}" method="POST">
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-amount="20000"
                                            data-buttontext="₹ 200 Pay"
                                            data-name="swanhearth.com"
                                            data-user_id="{{ auth()->user()->id ?? '' }}"
                                            data-fee="200"
                                            data-description="Rozerpay"
                                            data-image="https://www.swanhearth.com/assets/images/index-3-logo.png"
                                            data-prefill.name="{{ auth()->user()->name ?? '' }}"
                                            data-prefill.email="{{ auth()->user()->email ?? '' }}"
                                            data-theme.color="#ff7529">
                                    </script>
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="razorpay-payment-button">₹ 200 Pay</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="counter-box">
                            <div class="counter-icon">
                                <h2>₹ 500</h2>
                            </div>
                            <div class="counter-text">
                                <h4>Sweet</h4>
                                <span>3 Months plan</span>
                                <ul class="table-ul">
                                    <li>LifeTime Memabership</li>
                                    <li>Profile Security </li>
                                    <li>Free Notification</li>
                                </ul>
                                @if(Auth::check())
                                <form action="{{ route('razorpay.payment.store') }}" method="POST">
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="50000" data-buttontext="₹ 500 Pay" data-name="swanhearth.com" data-user_id="{{ auth()->user()->id ?? '' }}" data-fee="500" data-description="Rozerpay" data-image="https://www.swanhearth.com/assets/images/index-3-logo.png" data-prefill.name="{{ auth()->user()->name ?? '' }}" data-prefill.email="{{ auth()->user()->email ?? '' }}" data-theme.color="#ff7529">
                                    </script>
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="razorpay-payment-button">₹ 500 Pay</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="counter-box">
                            <div class="counter-icon">
                                <h2>₹ 900</h2>
                            </div>
                            <div class="counter-text">
                                <h4>Honey</h4>
                                <span>6 Months plan</span>
                                <ul class="table-ul">
                                    <li>LifeTime Memabership</li>
                                    <li>Profile Security </li>
                                    <li>Free Notification</li>
                                </ul>
                                @if(Auth::check())
                                <form action="{{ route('razorpay.payment.store') }}" method="POST">
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="90000" data-buttontext="₹ 900 Pay" data-name="swanhearth.com" data-user_id="{{ auth()->user()->id ?? '' }}" data-fee="900" data-description="Rozerpay" data-image="https://www.swanhearth.com/assets/images/index-3-logo.png" data-prefill.name="{{ auth()->user()->name ?? '' }}" data-prefill.email="{{ auth()->user()->email ?? '' }}" data-theme.color="#ff7529">
                                    </script>
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="razorpay-payment-button">₹ 900 Pay</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')