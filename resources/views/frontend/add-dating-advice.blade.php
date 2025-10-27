@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Add dating advice</h2>
            <span><a href="/"> Home </a> &gt; <span class="font-color-pink">Add dating advice</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage">
    <div class="main-singin-box w-100 float-start">
        <div class="container">
            <div class="singin-box">

                <div class="singin-right">
                    <div class="main-form">
                        <h4>Add dating advice</h4>
                        @if(session('success'))
                        <h5 class="errorsal w-100 error">
                            {{ session('success') }}
                        </h5>
                        @endif
                        <form method="POST" action="{{ url('dating-advice-add') }}" enctype=multipart/form-data>
                            @csrf
                            <div class="form-input">
                                <input type="text" name="title" id="validationCustom01" placeholder="title*" class="title">
                                <label for="validationCustom01"><i class="fa fa-user"></i></label>
                            </div>
                            <br>
                            <div class="form-input">
                                <input type="text" name="summary" id="validationCustom01" placeholder="short detail*" class="">
                                <label for="validationCustom01"><i class="fa fa-user"></i></label>
                            </div>
                            <br>
                            <div class="form-input">
                                <input type="text" name="details" id="validationCustom01" placeholder="long details*" class="">
                                <label for="validationCustom01"><i class="fa fa-user"></i></label>
                            </div>
                            <br>
                            <div class="form-input">
                                <input type="file" name="listing_img" id="validationCustom01" placeholder="listing_img*" class="">
                                <label for="validationCustom01"><i class="fa fa-user"></i></label>
                            </div>
                            <br>
                            <div class="form-input">
                                <input type="file" name="detail_img" id="validationCustom01" placeholder="detail_img*" class="">
                                <label for="validationCustom01"><i class="fa fa-user"></i></label>
                            </div>
                            <br>
                            <div class="form-input">
                                <input type="text" name="meta_title" id="validationCustom01" placeholder="meta_title*" class="">
                                <label for="validationCustom01"><i class="fa fa-user"></i></label>
                            </div>
                            <br>
                            <div class="form-input">
                                <input type="text" name="meta_keyword" id="validationCustom01" placeholder="meta_keyword*" class="">
                                <label for="validationCustom01"><i class="fa fa-user"></i></label>
                            </div>
                            <br>
                            <div class="form-input">
                                <input type="text" name="meta_description" id="validationCustom01" placeholder="meta_description*" class="">
                                <label for="validationCustom01"><i class="fa fa-user"></i></label>
                            </div>  
                            <br>
                            <div class="form-input">
                                <button class="main-btn" type="submit" style="width: 60%;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')