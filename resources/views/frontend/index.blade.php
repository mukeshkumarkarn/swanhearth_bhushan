@include('frontend.bin.home-page-header')
<section id="first-section">
    <div class="dating-wapper dating-wrapper-3  w-100 float-start">
        <div class="container">
            <div id="demo" class="carousel slide dating-slider" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row align-items-end">
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="date-img"> <img src="{{asset('assets/images/ind3-bg-img-1.png')}}" alt="dating-img" class="img-fluid position-relative"> </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="dating-content">
                                    <div class="heading"> <span>Swanhearth dating</span>
                                        <h2>Dating <strong>is an Easy way</strong> to find someone</h2>
                                    </div>
                                    <p> Dating is a tool to find people with similar mindsets in your local area for long-term or short-term relationships. Feel the fragrance of love in the air and immerse yourself in the ocean of fantasy hypnotism. </p>
                                    <div> </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row align-items-end">
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="date-img"> <img src="{{asset('assets/images/online_dating.png')}}" alt="dating-img" class="img-fluid position-relative"> </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="dating-content">
                                    <div class="heading"><span>online dating site</span>
                                        <h2>Find <strong>People</strong> with similar mindset</h2>
                                    </div>
                                    <p>SwanHearth.com is a secured and authentic web portal for online dating to find similar mindsets near your locality. We don't display email, mobile, photos, or any sensitive information without permission. Register now to make your heart blossom.</p>
                                    <div> </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row align-items-end">
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="date-img"> <img src="{{asset('assets/images/romantic_love.png')}}" alt="dating-img" class="img-fluid position-relative"> </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="dating-content">
                                    <div class="heading"> <span>Romantic relationships</span>
                                        <h2>Romantic love for<strong> Emotional and Physical Intimacy</strong> </h2>
                                    </div>
                                    <p> Long-term partnerships, marriage and casual dating, all require mutual respect, caring and affection. Spend quality time together with fun and enjoyment being remain in the boundaries to keep the romance alive. Dating works as therapy for loner. </p>
                                    <div> </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10.605" height="15.555" viewbox="0 0 10.605 15.555">
                            <polygon points="10.605 12.727 5.656 7.776 10.605 2.828 7.777 0 0 7.776 7.777 15.555 10.605 12.727" />
                        </svg>
                    </span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10.605" height="15.555" viewbox="0 0 10.605 15.555">
                            <polygon points="2.828 15.555 10.605 7.776 2.828 0 0 2.828 4.949 7.776 0 12.727 2.828 15.555" />
                        </svg>
                    </span>
                </button>
            </div>
            <!-- <div class="take-a-change take-a-change-3 w-100 float-start ">
                <form action="{{url('search-data')}}">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="change-box w-100 float-start">
                                <label>I am a</label>
                                <div class="custum-select">
                                    <select class name="gender">
                                        @php
                                        $genderdata = Session::get('genderdata');
                                        @endphp
                                        <option value="female" {{ $genderdata == 'female' ? 'selected' : '' }}>Man Looking for a Woman</option>
                                        <option value="male" {{ $genderdata == 'male' ? 'selected' : '' }}>Woman Looking for a Man</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="change-box change-box-res w-100 float-start">
                                <label class="label-2nd">Between Ages:</label>
                                <div class="custum-range">
                                    <div slider id="slider-distance">
                                        <div>
                                            <div inverse-left style="width:70%;"></div>
                                            <div inverse-right style="width:70%;"></div>
                                            <div range style="left:30%;right:40%;"></div>
                                            <span thumb style="left:30%;"></span>
                                            <span thumb style="left:60%;"></span>
                                            <div sign style="left:30%;">
                                                <span id="value">30</span>
                                            </div>
                                            <div sign style="left:60%;">
                                                <span id="value">60</span>
                                            </div>
                                        </div>
                                        <input type="range" tabindex="0" value="30" max="100" min="0" step="1" oninput="
                                        this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                                        var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                                        var children = this.parentNode.childNodes[1].childNodes;
                                        children[1].style.width=value+'%';
                                        children[5].style.left=value+'%';
                                        children[7].style.left=value+'%';children[11].style.left=value+'%';
                                        children[11].childNodes[1].innerHTML=this.value;" name="minage" />

                                        <input type="range" tabindex="0" value="60" max="100" min="0" step="1" oninput="
                                        this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                                        var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                                        var children = this.parentNode.childNodes[1].childNodes;
                                        children[3].style.width=(100-value)+'%';
                                        children[5].style.right=(100-value)+'%';
                                        children[9].style.left=value+'%';children[13].style.left=value+'%';
                                        children[13].childNodes[1].innerHTML=this.value;" name="maxage" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <div>
                                <button class="index2-btn2" type="submit">Find</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> -->
        </div>
    </div>
</section>


<section id="third-section">
    <div class="doctor-love doctor-love-next w-100 float-start">
        <div class="container">
            <div class="heading center-heading">
                <h2> Calculate your <strong>Love</strong> Number by Name</h2>
                <div class="heart-line"> <i class="fa fa-heart"></i> </div>
                <p>Love calculator helps you to find compatible match between you and your loved ones. Calculation is based on numerology considering several parameters. Enter full name including middle name also</p>
            </div>
            <form action="">
                <div class="love-calculater w-100 float-start">
                    <div class="index-three-counter w-100 float-start">
                        <ul>
                            <li>
                                <div class="enter-name enter-name1">
                                    <label for="nameInput1"><span>Your Name</span>
                                        <input type="text" class="NumerologyName" name="txtNumerologyName" id="nameInput1" value="{{ isset($fullNames) ? $fullNames : '' }}" placeholder="Full Name" />
                                        <h6 class="NumerologyNameError error"></h6>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="love-result"> <img src="{{asset('assets/images/ind3-counter-img.png')}}" alt="heart-img" class="img-fluid d-block ">
                                    <h2 class="percentages" id="resultlabel">0%</h2>
                                </div>
                            </li>
                            <li>
                                <div class="enter-name enter-name2">
                                    <label for="nameInput2"><span>Your Crush</span>
                                        <input type="text" id="nameInput2" name="txtNumerologyCrushName" class="crushname" value="{{ isset($txtNumerologyCrushNames) ? $txtNumerologyCrushNames : '' }}" placeholder="Crush Name" />
                                        <h6 class="crushnameError error"></h6>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="counter-btn-box">
                        <a href="javascript:;" class="index2-btn2  index-3-btn bynamecheck">Calculate love </a>
                        <button class="index2-btn2 match-reset" type="reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="cloud-shape"></div>
    </div>
</section>






<section id="second-section">
    <div class="meet-wrapper w-100 float-start">
        <div class="container">
            <div class="meet-wrapper-box">
                <div class="row align-items-end">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="dating-content">
                            <div class="heading">
                                <h2> Dating <strong>Better Than</strong> Ever Before</h2>
                            </div>

                            <p>Dating is an ultimate path towards finding your life partner. Earlier it was complex as finding good people with same mindset is very difficult. Now a days, the issues gets resolved and its better than ever before due to following factors: <br /><br />

                                1. Technology - online platforms has made it easier for people to connect with others who share similar interests and values. <br />
                                2. Communication - Using chat, social media, and video calling, etc enables couples to stay connected throughout the day and maintain stronger emotional bonds.<br />
                                3. Diverse options - Modern dating encourages individuals to explore their own preferences and needs.<br />
                                4. Community - Now a days, various resources are available to provide guidance and support during the dating process. </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="date-img">
                            <img src="{{asset('assets/images/ind3-bg-img-2.png')}}" alt="dating-img" class="img-fluid position-relative">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="side-shape"></div>
        <div class="side-shape-2"></div>
        <div class="side-shape-4"></div>
        <div class="side-shape-5"></div>
    </div>
</section>


<div class="mobile-app-section w-100 float-start">
    <div class="meet-wrapper for-bg-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12 col-12 order-lg-1">
                    <div class="app-content text-center text-lg-start mb-5 mb-lg-0">
                        <form>
                            @foreach($pollQuestion as $question)
                            <div class="heading">
                                <h3>{{$question->question}}</h3>
                                <input type="text" value="{{$question->id}}" class="poll_question_id" name="poll_question_id" hidden>
                            </div>
                            @endforeach
                            <div class="custom">
                                <ul>
                                    @foreach($pollOptions as $option)
                                    <li>
                                        <input type="radio" id="option{{$option->id}}" class="option_id checkhide" name="option_id" value="{{$option->id}}">
                                        <label for="option{{$option->id}}">{{$option->option_value}}</label>
                                        <div class="check"></div>
                                        <div class="flex-container">
                                            <div class="barchart" data-value="{{$percentages[$option->id]}}" hidden>
                                                <div class="bar"></div>
                                            </div>
                                            <div class="ans-percentage" hidden>{{ floor($percentages[$option->id]) }}%</div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <h6 class="error optionError"></h6>
                            </div>
                            <ul class="btn-ul justify-content-center justify-content-lg-start">
                                <li>
                                    <button type="button" class="main-btn main-btn-iocn optionsubmit">Submit</button>
                                </li>
                            </ul>
                        </form>
                    </div>

                </div>
                <div class="col-lg-5 col-md-12 col-12 order-lg-12">
                    <div class="mobile-img">
                        <img src="{{asset('assets/images/poll-img.png')}}" alt="app-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="side-shape-6"></div>
    </div>
</div>




<section id="seventh-section">
    <div class="blog blog-next w-100 float-start">
        <div class="container-fluid">
            <div class="heading center-heading">
                <h2>Sweet <strong>Stories From Our</strong> Lovers</h2>
                <div class="heart-line"> <i class="fa fa-heart"></i> </div>
				<p>Love story is the prime solution to share your feelings. Everyone has lots to share about their love stories. We can publish your story after its approval from admin.<br/>Don't hide your love story, share it with us now.</p>
            </div>
            <div class="w-100 blog-slider">
                <div class="owl-carousel owl-theme">
                    @foreach($data as $datas)
                    <div class="item">
                        <div class="blog-box blog-box-next text-center">
                            <div class="blog-img"> <img src="{{url('assets/stories/home_img'.'/'. $datas->home_img)}}" alt="blog-box-img3" class="img-fluid"> </div>
                            <div class="blog-text">
                                <div class="date-box"> <a href="javascript:;">{{$datas->publish_date}}</a> </div>
                                <a href="{{url('dating-stories') . '/' .$datas->slug}}" class="h5" target="_blank">{{$datas->title}}
                                </a>
                                <p>{{$datas->summary}}</p>
                                <a href="{{url('dating-stories') . '/' .$datas->slug}}" class="btn" target="_blank">View More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>



<div class="clearfix"></div>
<section id="fifth-section">
    <div class="how-it-work how-it-work-3 how-it-work-next bg-color2 w-100 float-start">
        <div class="container">
            <div class="heading center-heading">
                <h2>How it works</h2>
                <div class="heart-line"> <i class="fa fa-heart"></i> </div>
                <p>Simple portal for genuine user. Sometimes think from heart not from mind, but remains careful from fraud and cheater. We tried to conceal your identity in portal. Enjoy dating.
                </p>
            </div>
            <div class="w-100 float-start line-box">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="counter-box-2">
                            <div class="counter-icon"> <img src="{{asset('assets/images/ind3-add-icon.png')}}" alt="work-img"> </div>
                            <div class="counter-text-2">
                                <h5>Create An Account</h5>
                                <span>Signup using your password or,<br/>
                                    use social media to register.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="counter-box-2">
                            <div class="counter-icon"> <img src="{{asset('assets/images/ind3-partner-icon.png')}}" alt="work-img"> </div>
                            <div class="counter-text-2">
                                <h5>Select Your Partner</h5>
                                <span>Contact partner through message,<br/>
                                    mobile, email, etc.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="counter-box-2">
                            <div class="counter-icon"> <img src="{{asset('assets/images/ind3-date-icon.png')}}" alt="work-img"> </div>
                            <div class="counter-text-2">
                                <h5>Enjoy Date</h5>
                                <span>Move forward with your love,<br/>
                                    enjoy and live your life.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cloud-shape"></div>
    </div>
</section>


<div class="clearfix"></div>
<section>
    <div class="bg-color2 w-100 float-start">
        <div class="testimonial-one-wrapper padd-100 float-start w-100">
            <div class="heading center-heading mb-5">
                <h2>Sweet <strong>Dating Advice</strong> for Lovers</h2>
                <div class="heart-line"> <i class="fa fa-heart"></i> </div>
                <p>Lorem ipsum dolor amet consectetur do eiusmod tempor incididunt labore ut enim ad minim
                    veniam Lorem ipsum</p>
            </div>
            <div class="container">
                <div class="row">
                    @foreach($dating as $datas)
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="testimonial-one">
                            <div class="test-img"> <img src="{{url('assets/dating-advice/home_img'.'/'. $datas->home_img)}}" alt="image"> </div>
                            <div class="test-content">
                                <div class="test-icon"> <i class="fa-solid fa-handshake"></i> </div>
                                <ul class="tag-list mt-4">
                                    <!-- <li><a href="javascript:;"><span><i class="fa fa-tags"></i></span> By Admin</a>
                                    </li> -->
                                    <li><a href="javascript:;"><span><i class="fa fa-calendar"></i></span> <?php echo date('d F Y', strtotime($datas->updated_at)); ?></a></li>
                                </ul>
                                <h6>{{$datas->title}}</h6>
                                <p>{{$datas->short_description}}</p>
                                <a href="{{url('dating-advice') . '/' .$datas->slug}}" class="btn6 mt-4 mb-3">Read More &nbsp;<i class="fas fa-arrow-right"></i></a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="cloud-shape"></div>
    </div>
</section>



<div class="dating-wapper w-100 float-start">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12 order-lg-1">
                <div class="dating-content text-left">
                    <div class="heading">
                        <h2><strong>Efficient</strong> Matching</h2>
                        <div class="heart-line"> <i class="fa fa-heart"></i> </div>
                    </div>
                    <div class="about-us-img text-start d-block d-lg-none mb-5"> <img src="{{asset('assets/images/Efficient-Matching.png')}}" alt="about-us" class="img-fluid w-100 "> </div>
                    <p>Efficient matching means made for each other. We should understand likes and dislikes of eachother. Dating is perferct means to understand other by giving quality time to make your future perfect.<br>
                        <br>
                        Marriage is not like a game where you enjoy and leave whenever you want. It's a matter of adjustment, support and live for each other. Think for long term commitment. Earlier we dependent on arrange marriage only and various time we have to repent as we don't know each other. Dating is the first step toward marriage where we got full flexibility to find perfect match our choice.
                    </p>

                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 order-lg-12">
                <div class="about-us-img text-start d-none d-lg-block"> <img src="{{asset('assets/images/Efficient-Matching.png')}}" alt="about-us" class="img-fluid"> </div>
            </div>
        </div>
    </div>
</div>
<div class="dating-wapper w-100 float-start">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12 order-lg-1">
                <div class="about-us-img text-start d-none d-lg-block p-0 text-right"> <img src="{{asset('assets/images/Balanced-Community.png')}}" alt="about-us" class="img-fluid"> </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 order-lg-12">
                <div class="dating-content">
                    <div class="heading">
                        <h2>Balanced <strong>Community</strong></h2>
                        <div class="heart-line"> <i class="fa fa-heart"></i> </div>
                    </div>
                    <div class="about-us-img text-start d-block d-lg-none mb-5"> <img src="{{asset('assets/images/Balanced-Community.png')}}" alt="about-us" class="img-fluid w-100 "> </div>
                    <p>It is said that matches were made in heaven and we met here according to the instructions of Almighty God. Dating is the first step towards marriage. Make sure to understand each other and avoid making it dirty.</p>
                    <br />
                    <p>Few people seek partners within their community. It all depends on your mindset. Whether you choose a partner in any community, but always remain transparent and truthful. Relationships should not be formed on false commitments and bad behavior. Always think for long term commitment.</p>
                    <br />
                    <p>Platonic relationship is generally good for dating. Avoid toxic environment/relationship. It's better to leave a toxic relationship now than later. Sometimes we thought of ideal or perfect dating. Life is not a fairy tale, try to accept it.</p>
                    <br />
                    <p>We meet with different people with different behaviors. Some attracted us, some seemed neutral, and some seemed like enemies. Try to understand God's vibration and obey their orders. It helps to select partner easily and better.</p>



                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
@include('frontend.bin.footer')