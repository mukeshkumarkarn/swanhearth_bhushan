@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Contact View</h2>
            <span><a href=""> Home </a> &gt; <span class="font-color-pink">Admin</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage ">
    <div class="blog-page pt-5 pb-5 w-100 float-start">
        <div class="container">
            <div class="row">
                @include('Admin.Admin-pages.Left-menu.admin-main-left-menu')
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="my-profile tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="heading">
                                <h2>Contact <strong>view</strong> </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            @if(session('success'))
                            <h5 class="errorsal w-100 error">
                                {{ session('success') }}
                            </h5>
                            @endif
                            <div class="content">
                                <div class="row">
                                    @foreach($data as $datas)
                                    <div class="col-md-12">
                                        <div class="friends-box">
                                            <div class="friends-img">

                                            </div>
                                            <div class="friend-name">
                                                <h4>Name - {{$datas->name}}</h4>
                                                <p>Phone - {{$datas->phone}}</p>
                                                <p>Email - {{$datas->email}}</p>
                                                <p>Subject - {{$datas->subject}}</p>
                                                <p>Message -</p>
                                                <p>{!! nl2br(e($datas->description)) !!}</p>
                                                @php
                                                $dateString = $datas->updated_at;
                                                $formattedDate = date('j F Y', strtotime($dateString));
                                                @endphp
                                                <span>Date - {{$formattedDate}}</span>
                                            </div>
                                            <div class="request-btn">
                                                <button data-bs-toggle="modal" data-emailrly="{{$datas->id}}" data-bs-target="#staticBackdrop" class="main-btn ContactEmailReplay">Replay message</button>
                                                <button data-bs-toggle="modal" data-id="{{$datas->id}}" data-bs-target="#staticBackdropmessage" class="main-btn view-contact-notes">Message @if($datas->total > 0)
                                                    ({{$datas->total}})
                                                    @endif
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="d-flex justify-content-center">
                                        {{ $data->links('pagination::bootstrap-4') }}
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Replay Message</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{url('Contact-Reply')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body text-left">
                                                        <div class="input-info-box">
                                                            <div class="content">
                                                                <div class="row">
                                                                    <h6 class="message" style="color:green;"></h6>
                                                                    <input type="text" placeholder="Email" name="contact_id" class="contact_id EmailReplay" hidden>
                                                                    <div class="col-md-12">
                                                                        <div class="my-input-box">
                                                                            <label>Message</label>
                                                                            <textarea type="text" name="message" class="contactmessage message"></textarea>
                                                                            <h6 class="contactmessageError error"></h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="main-btn" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="sendcontact-replay-submit" hidden>sumit</button>
                                                        <button type="button" class="main-btn sendcontact-replay">Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->

                                    <!-- Modal2 show message -->
                                    <div class="modal fade" id="staticBackdropmessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Show Message</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div class="input-info-box">
                                                        <div class="content">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="my-input-box">
                                                                        <p>Message</p>
                                                                        <br>
                                                                        <div class="notesjobapply w-100"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="main-btn" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->


                                </div>
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