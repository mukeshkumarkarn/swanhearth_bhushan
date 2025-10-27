@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Poll Question</h2>
            <span><a href=""> Home </a> &gt; <span class="font-color-pink">poll question</span></span>
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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <a href="{{url('admin/add-poll-question')}}" class="main-btn" style="float: right;">Add Question</a>
                                </div>
                                <h2>Poll <strong>Question</strong> </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>

                            @if(session('success'))
                            <h5 class="errorsal w-100 error">
                                {{ session('success') }}
                            </h5>
                            @endif
                            <div class="content">
                                <div class="row">
                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach ($data as $datas)
                                    <div class="col-md-12">
                                        <div class="friends-box">
                                            <div class="friends-img">
                                            </div>
                                            <div class="friend-name">
                                                <h4>{{ ++$i }}. {{ $datas->question }}
                                                    @if($datas->status == 1)
                                                    ( active )
                                                    @else
                                                    ( Inactive )
                                                    <a href="{{ url('poll-question-inactive') . '/' . $datas->ref_no }}"><i class="fa-solid fa-trash"></i></a>
                                                    @endif
                                                </h4>
                                                @php
                                                $options = DB::table('poll_options')
                                                ->leftJoin('poll_questions', 'poll_options.poll_question_id', '=', 'poll_questions.id')
                                                ->leftJoin('poll_answers', 'poll_options.id', '=', 'poll_answers.option_id')
                                                ->where('poll_options.poll_question_id', $datas->id)
                                                ->selectRaw('poll_options.option_value, COUNT(poll_answers.id) as option_count')
                                                ->groupBy('poll_options.option_value')
                                                ->get();
                                                @endphp

                                                @foreach($options as $option)
                                                <p>{{ $option->option_value }}, Count: {{ $option->option_count }}</p>
                                                @endforeach


                                            </div>
                                            <div class="request-btn d-flex">
                                                @if($datas->status == 1)

                                                @else
                                                <a href="{{ url('poll-question-active') . '/' . $datas->ref_no }}" class="main-btn">active</a>
                                                @endif
                                                <a href="{{ url('admin/poll-question/edit') . '/' . $datas->id }}" class="main-btn">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


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