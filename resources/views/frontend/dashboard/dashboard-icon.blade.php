				
                    <div class="my-profile tab-content">
                        <div class="tab-pane active show" id="tab-7">
                            <div class="heading">
                                <h2><?php echo $page_heading ?></h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
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
<?php 											$userData = $data ?>
												@include('frontend.dashboard.request_button')


												

                                            </div>
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
                        </div>
                    </div>
