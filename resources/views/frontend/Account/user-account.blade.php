    <!-- fifth button end -->

    <div class="bz_single_product_main_wrapper w-100 float-start">

        <div class="container">

            <div class="shoping_box w-100 float-start">

                @foreach($userData as $data)

<?php
					$dob = new DateTime($data->dob);
					$currentDate = new DateTime();
					$age = $dob->diff($currentDate)->y;
?>
                <div class="row">

                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="product__carousel">
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="{{ url('assets/images/profile_img'.'/'. $data->profile_img) }}" data-fancybox="gallery-image">
                                            @if($data->profileShow_hide == 1)
												
                                            @if($data->profile_img)
                                            <img src="{{ url('assets/images/profile_img'.'/'. $data->profile_img) }}" alt="single-product1" class="img-fluid" />
                                            @elseif($data->gender == 'male')
                                            <img src="{{ asset('assets/images/profile_img/' . env('MALE')) }}" alt="single-product1" class="img-fluid">
                                            @else
                                            <img src="{{ asset('assets/images/profile_img/' . env('FEMALE')) }}" alt="single-product1" class="img-fluid">
                                            @endif
                                            @else
                                            @if($data->gender == 'male')

                                            <img src="{{ asset('assets/images/profile_img/' . env('MALE')) }}" alt="single-product1" class="img-fluid">

                                            @else

                                            <img src="{{ asset('assets/images/profile_img/' . env('FEMALE')) }}" alt="single-product1" class="img-fluid">

                                            @endif

                                            @endif

                                        </a>



                                    </div>



                                </div>

                                <div class="swiper-button-next swiper-button-white"></div>

                                <div class="swiper-button-prev swiper-button-white"></div>

                            </div>

                            <div class="swiper-container gallery-thumbs">

                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">

                                        @if($data->profileShow_hide == 1)

                                        @if($data->user_album)

                                        <img src="{{ url('assets/images/user_album'.'/'. $data->user_album) }}" alt="single" class="img-fluid" />

                                        @elseif($data->gender == 'male')

                                        <img src="{{ asset('assets/images/profile_img/' . env('MALE')) }}" alt="single-product1" class="img-fluid">

                                        @else

                                        <img src="{{ asset('assets/images/profile_img/' . env('FEMALE')) }}" alt="single-product1" class="img-fluid">

                                        @endif



                                        @else



                                        @if($data->gender == 'male')

                                        <img src="{{ asset('assets/images/profile_img/' . env('MALE')) }}" alt="single-product1" class="img-fluid">

                                        @else

                                        <img src="{{ asset('assets/images/profile_img/' . env('FEMALE')) }}" alt="single-product1" class="img-fluid">

                                        @endif

                                        @endif

                                    </div>



                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-7 col-md-12 col-12">

                        <div class="b_product_sell_details_wrapper mt-4 mt-lg-0 float_left">

                            <div class="bz_product_heading float_left">

                                <h3>{{$data->name}} , <?php

                                                        $dob = new DateTime($data->dob);

                                                        $currentDate = new DateTime();

                                                        $age = $dob->diff($currentDate)->y;

                                                        echo $age;

                                                        ?></h3>

                                <span class="font-color-pink">23 kilometers away</span><br><span>{{$data->state}} , {{$data->city}}</span>

                                <h6 class="messageShow" style="color: green;"></h6>

                                <div class="req-btn-profile">

                                    <ul class="media-list">

                                        <li data-tooltip="Send Message"><a href="{{url('message').'/'.$data->user_ref}}"><i><img src="{{asset('assets/images/icon/send-message.png')}}" alt="send-message" /></i></a></li>



                                        <!-- like Button -->

                                        @if($data->like === 'like')

                                        <li data-tooltip="Like" class="user-dislike userlike" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Like.png')}}" style="filter: hue-rotate(120deg);" alt="Like" /></i></a></li>

                                        @else

                                        <li data-tooltip="Like" class="userlike user-like" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Like.png')}}" alt="Like" /></i></a></li>

                                        @endif



                                        <!-- Bookmark Button -->

                                        @if($data->bookmark === 'bookmark')

                                        <li data-tooltip="Bookmark" class="cancle-Bookmark userBook" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/bookmark.png')}}" style="filter: hue-rotate(120deg);" alt="Bookmark" /></i></a></li>

                                        @else

                                        <li data-tooltip="Bookmark" class="Bookmark userBook" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/bookmark.png')}}" alt="Bookmark" /></i></a></li>

                                        @endif



                                        <!-- Request Mobile Button -->

                                        @if($data->mobile_show_hide == 1)



                                        @else

                                        @if($data->request_mobile === 'request-mobile')

                                        <li data-tooltip="Request Mob no." class="cancle-request-mobile RequestMobile" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Mobile.png')}}" style="filter: hue-rotate(120deg);" alt="Request Mobile" /></i></a></li>

                                        @else

                                        <li data-tooltip="Request Mob no." class="request-mobile RequestMobile" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Mobile.png')}}" alt="Request Mobile" /></i></a></li>

                                        @endif

                                        @endif



                                        <!-- Request email Button -->

                                        @if($data->email_show_hide == 1)



                                        @else

                                        @if($data->request_email === 'request-email')

                                        <li data-tooltip="Request Email" class="cancle-request-email RequestEmail" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Email.png')}}" style="filter: hue-rotate(120deg);" alt="Request Email" /></i></a></li>

                                        @else

                                        <li data-tooltip="Request Email" class="request-email RequestEmail" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Email.png')}}" alt="Request Email" /></i></a></li>

                                        @endif

                                        @endif



                                        <!-- Request email Button -->

                                        @if($data->profile_img === null)

                                        @if($data->request_photo === 'request-photo')

                                        <li data-tooltip="Request photo" class="cancle-request-photo Requestphoto" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/gallery.png')}}" style="filter: hue-rotate(120deg);" alt="Request photo" /></i></a></li>

                                        @else

                                        <li data-tooltip="Request photo" class="request-photo Requestphoto" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/gallery.png')}}" alt="Request photo" /></i></a></li>

                                        @endif

                                        @endif

                                        <!-- block Button -->

                                        @if($data->block === 'block')

                                        <li data-tooltip="Block" class="unblock requestBlock" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/userBlock.png')}}" style="filter: hue-rotate(120deg);" alt="Block" /></i></a></li>

                                        @else

                                        <li data-tooltip="Block" class="block requestBlock" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/userBlock.png')}}" alt="Block" /></i></a></li>

                                        @endif

                                    </ul>



                                </div>

                                <input type="text" value="{{Auth::user()->id}}" class="user_id" hidden>

                            </div>

                            <div class="tab-five-wrapper float-start w-100 pt-3">

                                <ul class="nav nav-pills mb-3" id="pills-tab-five" role="tablist">

                                    <li class="nav-item" role="presentation">

                                        <button class="nav-link active" id="pills-consult-tab" data-bs-toggle="pill" data-bs-target="#pills-consult" type="button" role="tab" aria-controls="pills-consult" aria-selected="true">About</button>

                                    </li>

                                    @if($data->dob)

                                    <li class="nav-item" role="presentation">

                                        <button class="nav-link" id="pills-planning-tab" data-bs-toggle="pill" data-bs-target="#pills-planning" type="button" role="tab" aria-controls="pills-planning" aria-selected="false">Personal Details</button>

                                    </li>

                                    @endif



                                    @if($data->professional_details)

                                    <li class="nav-item" role="presentation">

                                        <button class="nav-link" id="pills-investment-tab" data-bs-toggle="pill" data-bs-target="#pills-investment" type="button" role="tab" aria-controls="pills-investment" aria-selected="false">Professional Details</button>

                                    </li>

                                    @endif

                                    @if($data->preferredqua)

                                    <li class="nav-item" role="presentation">

                                        <button class="nav-link" id="pills-preferred-tab" data-bs-toggle="pill" data-bs-target="#pills-preferred" type="button" role="tab" aria-controls="pills-preferred" aria-selected="false">preferred Match</button>

                                    </li>

                                    @endif

                                </ul>

                                <div class="container">

                                    <div class="row">

                                        <div class="tab-content p-0" id="pills-tabContentfive">

                                            <div class="tab-pane fade show active" id="pills-consult" role="tabpanel" aria-labelledby="pills-consult-tab">

                                                <div class="table-responsive">

                                                    <table class="table table-bordered mb-4 my-table">

                                                        <tbody>

                                                            @if($data->name)

                                                            <tr>

                                                                <th scope="row">Name</th>

                                                                <td>{{$data->name}}</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->dob)

                                                            <tr>

                                                                <th scope="row">Age</th>

                                                                <td>{{$age}} Years</td>

                                                            </tr>

                                                            @endif

                                                            @if($data->request_email_status === 2)

                                                            <tr>

                                                                <th scope="row">Public Email</th>

                                                                <td>{{$data->display_email}}</td>

                                                            </tr>

                                                            @endif



                                                            @if($data->email_show_hide == 1)

                                                            <tr>

                                                                <th scope="row">Public Email</th>

                                                                <td>{{$data->display_email}}</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->qualification_name)

                                                            <tr>

                                                                <th scope="row">Education Level</th>

                                                                <td>{{$data->qualification_name}}</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->request_mobile_status == 2)

                                                            <tr>

                                                                <th scope="row">Mobile Number</th>

                                                                <td>{{$data->mobile_no}}</td>

                                                            </tr>

                                                            @endif

                                                            @if($data->mobile_show_hide === 1)

                                                            <tr>

                                                                <th scope="row">Mobile Number</th>

                                                                <td>{{$data->mobile_no}}</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->state)

                                                            <tr>

                                                                <th scope="row">state</th>

                                                                <td>{{$data->state}}</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->city)

                                                            <tr>

                                                                <th scope="row">City</th>

                                                                <td>{{$data->city}}</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->pincode)

                                                            <tr>

                                                                <th scope="row">Zipcode/Pincode</th>

                                                                <td>{{$data->pincode}}</td>

                                                            </tr>

                                                            @endif

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

                                                            @if($data->dob)

                                                            <tr>

                                                                <th scope="row">Date of Birthday </th>

                                                                <td>{{$data->dob}}</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->eye_color)

                                                            <tr>

                                                                <th scope="row">Eye Color</th>

                                                                <td>{{$data->eye_color}}</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->eye_color)

                                                            <tr>

                                                                <th scope="row">Hair Color</th>

                                                                <td>{{$data->hair_color}}</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->body_type)

                                                            <tr>

                                                                <th scope="row">Body Type</th>

                                                                <td>{{$data->body_type}}</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->body_weigh)

                                                            <tr>

                                                                <th scope="row">Body Weight (kg)</th>

                                                                <td>{{$data->body_weigh}} Kg</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->religion_name)

                                                            <tr>

                                                                <th scope="row">Religion</th>

                                                                <td>{{$data->religion_name}}</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->heigh_feet)

                                                            <tr>

                                                                <th scope="row">Height</th>

                                                                <td>{{$data->heigh_feet}} Foot {{$data->heigh_inch}} Inch</td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->friend_family_tell)

                                                            <tr>

                                                                <th scope="row">My friend and family tell about me</th>

                                                                <td>

                                                                    <ul class="tag-line">

                                                                        <li>{{$data->friend_family_tell}}</li>

                                                                    </ul>

                                                                </td>

                                                            </tr>

                                                            @endif

                                                            <!-- end tr -->

                                                            @if($data->about_me)

                                                            <tr>

                                                                <th scope="row">About me</th>

                                                                <td>{{$data->about_me}}</td>

                                                            </tr>

                                                            @endif

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

                                                           @if($data->professional_details)

                                                            <tr>

                                                                <th scope="row">Professional details</th>

                                                                <td>{{$data->professional_details}}</td>

                                                            </tr>

                                                            @endif



                                                            @if($data->achievement)

                                                            <tr>

                                                                <th scope="row">Achievement</th>

                                                                <td>{{$data->achievement}}</td>

                                                            </tr>

                                                            @endif

                                                            @if($data->annual_salary)

                                                            <tr>

                                                                <th scope="row">Annual Salary</th>

                                                                <td>{{$data->annual_salary}}</td>

                                                            </tr>

                                                            @endif



                                                            @if($data->political_view)

                                                            <tr>

                                                                <th scope="row">Political View</th>

                                                                <td>{{$data->political_view}}</td>

                                                            </tr>

                                                            @endif



                                                            @if($data->Occupention)

                                                            <tr>

                                                                <th scope="row">Occupention</th>

                                                                <td>{{$data->Occupention}}</td>

                                                            </tr>

                                                            @endif



                                                            @if($data->hobbies_id)

                                                            <tr>

                                                                <th scope="row">Hobbies</th>

                                                                <td>{{$data->hobbie_name}}</td>

                                                            </tr>

                                                            @endif



                                                            @if($data->mother_tongue_id)

                                                            <tr>

                                                                <th scope="row">Mother Tongue</th>

                                                                <td>{{$data->mother_tongue}}</td>

                                                            </tr>

                                                            @endif



                                                            @if($data->speak_language_id)

                                                            <tr>

                                                                <th scope="row">Speak Language</th>

                                                                <td>{{$data->speak_language}}</td>

                                                            </tr>

                                                            @endif

                                                            

                                                        </tbody>

                                                    </table>

                                                </div>

                                            </div>



                                            <div class="tab-pane fade" id="pills-preferred" role="tabpanel" aria-labelledby="pills-preferred-tab">

                                                <div class="table-responsive">

                                                    <table class="table table-bordered mb-3 my-table">

                                                        <tbody>

                                                           @if($data->preferred_state)

                                                            <tr>

                                                                <th scope="row">State</th>

                                                                <td>{{$data->preferred_state}}</td>

                                                            </tr>

                                                            @endif



                                                            @if($data->preferred_city)

                                                            <tr>

                                                                <th scope="row">City</th>

                                                                <td>{{$data->preferred_city}}</td>

                                                            </tr>

                                                            @endif

                                                            @if($data->preferredqua)

                                                            <tr>

                                                                <th scope="row">Qualification</th>

                                                                <td>{{$data->preferredqua}}</td>

                                                            </tr>

                                                            @endif



                                                            @if($data->preferred_married)

                                                            <tr>

                                                                <th scope="row">Marrird status</th>

                                                                <td>{{$data->preferred_married}}</td>

                                                            </tr>

                                                            @endif



                                                            @if($data->preferred_religions)

                                                            <tr>

                                                                <th scope="row">Religions</th>

                                                                <td>{{$data->preferred_religions}}</td>

                                                            </tr>

                                                            @endif



                                                            @if($data->preferred_Inch)

                                                            <tr>

                                                                <th scope="row">Height</th>

                                                                <td>{{$data->preferred_height}} Foot , {{$data->preferred_Inch}} Inch</td>

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

                    <input type="text" class="user_id" value="{{Auth::user()->id}}" hidden>

                </div>

                @endforeach



                <div class="for-next-prv-btn">

                    @if ($userData->previousPageUrl())

                    <a href="{{ $userData->previousPageUrl() }}" class="main-btn2 float-start">Previous</a>

                    @else

                    <span class="main-btn2 float-start disabled">Previous</span>

                    @endif



                    @if ($userData->nextPageUrl())

                    <a href="{{ $userData->nextPageUrl() }}" class="main-btn2">Next</a>

                    @else

                    <span class="main-btn2 disabled">Next</span>

                    @endif

                </div>



            </div>

        </div>

    </div>

    <!-- bz Slider main wrapper End-->
