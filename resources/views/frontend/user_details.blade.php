
    <!-- fifth button end -->
    <div class="bz_single_product_main_wrapper w-100 float-start">
        <div class="container">
            <div class="shoping_box w-100 float-start">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="product__carousel">
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">

                                    @foreach ($disp_album as $img_album)
                                    <div class="swiper-slide">
                                        <a href="{{ url('assets/images/'. $img_album) }}" data-fancybox="gallery-image">
                                            <img src="{{ url('assets/images/'. $img_album) }}" alt="single-product1" class="img-fluid" />
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white"></div>
                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    @foreach ($disp_album as $img_album)
                                    <div class="swiper-slide"> <img src="{{ url('assets/images/'. $img_album) }}" alt="single-product1" class="img-fluid"> </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-12">
                        <div class="b_product_sell_details_wrapper mt-4 mt-lg-0 float_left">
                            <div class="bz_product_heading float_left">
                                <h3>{{$userData->name}}</h3>
                                <span class="font-color-pink"><?php
                                    $dob = new DateTime($userData->dob);
                                    $currentDate = new DateTime();
                                    $age = $dob->diff($currentDate)->y;
                                    echo $age;
                                    ?> years old
                                </span><br>
                                <span>{{$userData->city}}, {{$userData->state}}, {{$userData->country}} </span>
                                <br>
                                <span class="font-color-pink">{{ round($distance) }} km away</span>
								
                                <h6 class="messageShow" style="color: green;"></h6>

								@include('frontend.dashboard.request_button')


                                <input type="text" value="{{Auth::user()->id}}" class="user_id" hidden>
                            </div>
                            <div class="tab-five-wrapper float-start w-100 pt-3">
                                <ul class="nav nav-pills mb-3" id="pills-tab-five" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-consult-tab" data-bs-toggle="pill" data-bs-target="#pills-consult" type="button" role="tab" aria-controls="pills-consult" aria-selected="true">About</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-planning-tab" data-bs-toggle="pill" data-bs-target="#pills-planning" type="button" role="tab" aria-controls="pills-planning" aria-selected="false">Personal Details</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-investment-tab" data-bs-toggle="pill" data-bs-target="#pills-investment" type="button" role="tab" aria-controls="pills-investment" aria-selected="false">Preferred Match</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="professional-details-tab" data-bs-toggle="pill" data-bs-target="#professional-details" type="button" role="tab" aria-controls="professional-details" aria-selected="false">Professional Details</button>
                                    </li>
									
                                </ul>
                                <div class="container">
                                    <div class="row">
                                        <div class="tab-content p-0" id="pills-tabContentfive">
                                            <div class="tab-pane fade show active" id="pills-consult" role="tabpanel" aria-labelledby="pills-consult-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-4 my-table">
                                                        <tbody>
                                                            @if($userData->name)
                                                            <tr>
                                                                <th scope="row">Name</th>
                                                                <td>{{$userData->name}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($userData->display_email)
                                                            <tr>
                                                                <th scope="row">Public Email</th>
                                                                <td>{{$userData->display_email}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($userData->qualification_name)
                                                            <tr>
                                                                <th scope="row">Education Level</th>
                                                                <td>{{$userData->qualification_name}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($userData->mobile_no)
                                                            <tr>
                                                                <th scope="row">Mobile Number</th>
                                                                <td>{{$userData->mobile_no}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($userData->pincode)
                                                            <tr>
                                                                <th scope="row">Zipcode/Pincode</th>
                                                                <td>{{$userData->pincode}}</td>
                                                            </tr>
                                                            @endif

                                                            @if($userData->dob)
                                                            <tr>
                                                                <th scope="row">Birthday </th>
                                                                <td>{{$userData->dob}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
															
                                                            @if($userData->country)
                                                            <tr>
                                                                <th scope="row">Country</th>
                                                                <td>{{$userData->country}}</td>
                                                            </tr>
                                                            @endif
															
                                                            @if($userData->state)
                                                            <tr>
                                                                <th scope="row">State</th>
                                                                <td>{{$userData->state}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($userData->city)
                                                            <tr>
                                                                <th scope="row">City</th>
                                                                <td>{{$userData->city}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            <!-- end tr -->
                                                        </tbody>
                                                        <!-- end tbody -->
                                                    </table>
                                                    <!-- end table -->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-planning" role="tabpanel" aria-labelledby="pills-planning-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-3 my-table">
                                                        <tbody>
                                                            @if($userData->about_me)
                                                            <tr>
                                                                <th scope="row">About me</th>
                                                                <td><?php echo nl2br($userData->about_me) ?></td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
														
                                                            @if($userData->eye_color)
                                                            <tr>
                                                                <th scope="row">Eye Color</th>
                                                                <td>{{$userData->eye_color}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($userData->eye_color)
                                                            <tr>
                                                                <th scope="row">Hair Color</th>
                                                                <td>{{$userData->hair_color}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($userData->body_type)
                                                            <tr>
                                                                <th scope="row">Body Type</th>
                                                                <td>{{$userData->body_type}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($userData->body_weigh)
                                                            <tr>
                                                                <th scope="row">Body Weight (kg)</th>
                                                                <td>{{$userData->body_weigh}} Kg</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($userData->religion_name)
                                                            <tr>
                                                                <th scope="row">Religion</th>
                                                                <td>{{$userData->religion_name}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($userData->heigh_feet)
                                                            <tr>
                                                                <th scope="row">Height</th>
                                                                <td>{{$userData->heigh_feet}} Foot {{$userData->heigh_inch}} Inch</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($options)
                                                            <tr>
                                                                <th scope="row">My friend and family tell about me</th>
                                                                <td>
                                                                    <ul class="tag-line">
                                                                        @foreach ($options as $option)
                                                                        <li>{{ $option->friend_family_tell }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
															
                                                            @if($user_romantic_gestures)
                                                            <tr>
                                                                <th scope="row">My favourite romantic gesture</th>
                                                                <td>
                                                                    <ul class="tag-line">
                                                                        @foreach ($user_romantic_gestures as $user_romantic_gesture)
                                                                        <li>{{ $user_romantic_gesture->romantic_gesture }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
															
                                                        </tbody>
                                                        <!-- end tbody -->
                                                    </table>
                                                    <!-- end table -->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-investment" role="tabpanel" aria-labelledby="pills-investment-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-3 my-table">
                                                        <tbody>
                                                            @if($prematch)
                                                            @if($prematch->qualification_name)
                                                            <tr>
                                                                <th scope="row">Education</th>
                                                                <td>{{$prematch->qualification_name}}</td>
                                                            </tr>
                                                            @endif
															
                                                            @if($prematch->pincode)
                                                            <tr>
                                                                <th scope="row">Zipcode/Pincode</th>
                                                                <td>{{$prematch->pincode}}</td>
                                                            </tr>
                                                            @endif
															
                                                            @if($prematch->state)
                                                            <tr>
                                                                <th scope="row">State</th>
                                                                <td>{{$prematch->state}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($prematch->city)
                                                            <tr>
                                                                <th scope="row">City</th>
                                                                <td>{{$prematch->city}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($prematch->height)
                                                            <tr>
                                                                <th scope="row">Height </th>
                                                                <td>{{$prematch->height}} Foot {{$prematch->Inch}} Inch</td>
                                                            </tr>
                                                            @endif
                                                            @if($prematch->marital_status)
                                                            <tr>
                                                                <th scope="row">Marital status</th>
                                                                <td>
                                                                    <ul class="tag-line">
                                                                        <li>{{$prematch->marital_status}}</li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            @endif
															
                                                            @if($prematch->religion_name)
                                                            <tr>
                                                                <th scope="row">Religion</th>
                                                                <td>
                                                                    <ul class="tag-line">
                                                                        <li>{{$prematch->religion_name}}</li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
											
                                            <div class="tab-pane fade" id="professional-details" role="tabpanel" aria-labelledby="professional-details-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-3 my-table">
                                                        <tbody>
                                                            @if($userData->professional_details)
                                                            <tr>
                                                                <th scope="row">Professional Details</th>
                                                                <td><?php echo nl2br($userData->professional_details) ?></td>
                                                            </tr>
                                                            @endif
                                                            @if($userData->achievement)
                                                            <tr>
                                                                <th scope="row">Achievements</th>
                                                                <td><?php echo nl2br($userData->achievement) ?></td>
                                                            </tr>
                                                            @endif
                                                            @if($userData->mother_tongue_id)
                                                            <tr>
                                                                <th scope="row">Mother Tongue</th>
                                                                <td>{{$userData->mother_tongue_id}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($userData->speak_language_id)
                                                            <tr>
                                                                <th scope="row">Languages I Speak</th>
                                                                <td>{{$userData->speak_language_id}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($userData->annual_salary)
                                                            <tr>
                                                                <th scope="row">Annual Salary</th>
                                                                <td>{{$userData->annual_salary}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($userData->political_view)
                                                            <tr>
                                                                <th scope="row">Political View</th>
                                                                <td>{{$userData->political_view}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($userData->hobbies_id)
                                                            <tr>
                                                                <th scope="row">Hobbies</th>
                                                                <td>{{$userData->hobbies_id}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($userData->Occupention)
                                                            <tr>
                                                                <th scope="row">Occupation</th>
                                                                <td>{{$userData->Occupention}}</td>
                                                            </tr>
                                                            @endif
															
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
											
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fifth button end -->
                        </div>
                    </div>
                </div>
                <div class="for-next-prv-btn">
				
                    @if ($userRef['prev']!='')

                    <a href="/matches/{{ $userRef['prev'] }}/{{ $arrPage['prev'] }}" class="main-btn2 float-start">Previous</a>

                    @else

                    <span class="main-btn2 float-start disabled">Previous</span>

                    @endif



                    @if ($userRef['next']!='')

                    <a href="/matches/{{ $userRef['next'] }}/{{ $arrPage['next'] }}" class="main-btn2">Next</a>

                    @else

                    <span class="main-btn2 disabled">Next</span>

                    @endif
				
                </div>
            </div>
        </div>
    </div>
    <!-- bz Slider main wrapper End-->
