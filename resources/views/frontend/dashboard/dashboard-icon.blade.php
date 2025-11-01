				
                    @php
                        $segments = explode('/', \Request::path());
                        $route = end($segments);
                    @endphp
                    <div class="my-profile tab-content">
                        <div class="tab-pane active show" id="tab-7">
                            <div class="heading">
                                <div class="row">
                                    <div class="col-sm-6">
                                       <h2><?php echo $page_heading ?></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        @if($route == "request-mobile-received")<!-- mobile start -->
                                            @if(isset($request_mobile_change_status_count) && $request_mobile_change_status_count >0)
                                                <a href="{{url('dashboard/request-mobile-received-changed-status')}}" style="float: ;">View Accepted/Rejected <strong style="font-size: 50px;">&#8594;</strong></a>
                                            @endif
                                        @elseif($route == "request-email-received")<!--mobile End email Start-->
                                            @if(isset($request_email_change_status_count) && $request_email_change_status_count >0)
                                                <a href="{{url('dashboard/request-email-received-changed-status')}}" style="float:;">View Accepted/Rejected <strong style="font-size: 50px;">&#8594;</strong></a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                                </div>
                            
                            <div style="display:none;margin-bottom: 2%;" id="edit_div">
                                @if($route == "request-mobile-received")<!-- mobile start -->
                                <form method="post" action="{{url('dashboard/request-mobile-received')}}">
                                    @csrf
                                    
                                        @php
                                            $mobile_number = isset($user_detail["mobile_no"]) ? $user_detail["mobile_no"] :'';
                                        @endphp
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="fw-bold">Mobile Number:</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="mobile_no" id="mobile_no" oninput="this.value = this.value.replace(/\D+/g, '')" maxlength="10" class="form-control" value="{{$mobile_number}}" placeholder="">
                                            </div>

                                            <div class="col-md-6">
                                                <button type="submit" class="main-btn" name="update_mobile_no">Update</button>
                                            </div>
                                        </div>
                                    
                                </form>
                                @elseif($route == "request-email-received")<!--mobile End email Start-->
                                    <form method="post" action="{{url('dashboard/request-email-received')}}">
                                        @csrf
                                        
                                            @php
                                                $email = isset($user_detail["email"]) ? $user_detail["email"] :'';
                                            @endphp
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <label class="fw-bold">Email:</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="email" name="email" id="email" class="form-control" value="{{$email}}" placeholder="">
                                                </div>

                                                <div class="col-md-5">
                                                    <button type="submit" class="main-btn" name="update_email">Update</button>
                                                </div>
                                            </div>
                                        
                                    </form>
                                @endif
                            </div>
                            <div class="gallery4-wrapper">
                                
                                <div class="row">
                                    @if(count($displayData) > 0)
                                    @foreach($displayData as $data)
                                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <div class="tab_image_wrapper">
                                            <div class="tab_image">
                                                <figure>
                                                    @if($data->profile_img)
                                                    <img src="{{ url('assets/images/profile_img'.'/'. $data->profile_img) }}" class="img-responsive" alt="profile-img">
                                                    @else
                                                    <img src="{{ asset('assets/images/no_image.jpg') }}" class="img-responsive" alt="footer-img">
                                                    @endif
                                                </figure>
                                            </div>
                                            <div class="tab_image_text">
                                                <div class="project_title">
                                                    <h4><a href="javascript:;">{{$data->name}}</a></h4>
                                                    <p> {{$data->state}}, {{$data->city}} </p>
                                                    <!-- <p> 85% Match </p> -->
                                                </div>

                                                <h6 class="messageShow" style="color: green;"></h6>
                                                <?php $userData = $data ?>
												@include('frontend.dashboard.request_button')


												

                                            </div>
                                        </div>
                                        <div class="status_changed_div">

                                            @if($route == "request-mobile-received-changed-status")<!-- mobile start -->
                                                @if($data->request_mobile_status == 2)
                                                    Request Approved
                                                @elseif($data->request_mobile_status == 3)
                                                    Request Rejected
                                                @endif
                                            @elseif($route == "request-email-received-changed-status")<!--mobile End email Start-->
                                                @if($data->request_email_status == 2)
                                                    Request Approved
                                                @elseif($data->request_email_status == 3)
                                                    Request Rejected
                                                @endif
                                            @endif 

                                            @if($route == "request-mobile-received")<!-- mobile start -->
                                                
                                                @if($data->request_mobile_status == 1)
                                                    @if($mobile_number!="")
                                                        <div class="row align-items-center">
                                                            <div class="col-md-6">
                                                                <label class="fw-bold">Mobile Number:</label>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <span>{{$mobile_number}}</span>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <button class="open_edit_div"><i class="fa-solid fa-pen"></i></button>
                                                            </div>
                                                            
                                                        </div>
                                                    @endif
                                                    <button type="button"  class="main-btn request_mobile_status" data-request_mobile_status="2" data-action_id="{{$data->id}}">Approve</button>
                                                    <button type="button" class="custom-button request_mobile_status" data-request_mobile_status="3" data-action_id="{{$data->id}}">Reject</button>
                                                @endif
                                            @elseif($route == "request-email-received")       <!--mobile End email Start-->           
                                                @if($data->request_email_status == 1)
                                                    @if($email!="")
                                                        <div class="row align-items-center">
                                                            <div class="col-md-2">
                                                                <label class="fw-bold">Email:</label>
                                                            </div>

                                                            <div class="col-md-8">
                                                                <span>{{$email}}</span>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <button class="open_edit_div"><i class="fa-solid fa-pen"></i></button>
                                                            </div>
                                                            
                                                        </div>
                                                    @endif
                                                    <button type="button"  class="main-btn request_email_status" data-request_email_status="2" data-action_id="{{$data->id}}">Approve</button>
                                                    <button type="button" class="custom-button request_email_status" data-request_email_status="3" data-action_id="{{$data->id}}">Reject</button>
                                                @endif
                                            @endif
                                        </div>    
                                    </div>
                                    
                                    @endforeach()
                                    @else
                                    <div class="col-lg-12 NoData">
                                        <h4><span class="alert-icon"><i class="fas fa-bullhorn "></i></span>
                                            No record found.
                                        </h4>
                                    </div>
                                    @endif
                                </div>
                                <input type="text" value="{{Auth::user()->id}}" class="user_id" hidden>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $displayData->links('pagination::bootstrap-4') }}
                            </div>
                            @if($route == "request-mobile-received-changed-status")<!-- mobile start -->
                                <a href="{{url('dashboard/request-mobile-received')}}"><span style='font-size:50px;'>&#8592;</span>Back</a>
                            @elseif($route == "request-email-received-changed-status") <!--mobile End email Start-->
                                <a href="{{url('dashboard/request-email-received')}}"><span style='font-size:50px;'>&#8592;</span>Back</a>
                            @endif
                        </div>
                    </div>
