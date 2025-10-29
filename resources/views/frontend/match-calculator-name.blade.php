@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Match Calculator</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Match Calculator</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage">
   
    <div class="doctor-love doctor-love-next w-100 float-start">
        <div class="container">
            <div class="heading center-heading">
                <h2> Calculate your <strong>Love</strong> percentage by Name</h2>
                <div class="heart-line"> <i class="fa fa-heart"></i> </div>
                <p>Calculate your love percentage by name. Enter your name and your crush name. It is lesser accurate than calculator with name and DOB. You will get compatibility percentage for love and relationship</p>
            </div>
            <form>
                <div class="love-calculater w-100 float-start">
                    <div class="index-three-counter w-100 float-start">
                        <ul>
                            <li>
                                <div class="enter-name enter-name1">
                                    <label for="nameInput1"><span>Your Name</span>
                                        <input type="text" class="userId" id="" name="usrId" value="{{ auth()->user()->id ?? '' }}" hidden>
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
                        <button class="index2-btn2  index-3-btn bynamecheck" type="button">Calculate love</button>
                        <button class="index2-btn2 match-reset" type="reset">Reset</button>
                        <!--<a href="javascript:;" class="blog1 btn6"><span><i class="fa-brands fa-facebook-f"></i></span> Share on facebook</a>-->
                    </div>
                </div>
            </form>
        </div>
        <div class="cloud-shape"></div>
    </div>
    
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')



<script>
    // counter js start
    $(document).ready(function($) {
        function isScrolledIntoView(elem) {
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();
            var elemTop = $(elem).offset().top;
            var elemBottom = elemTop + $(elem).height();
            return ((elemBottom <= docViewBottom));
        }

        function countUp() {
            $('.counter').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');

                $({
                    countNum: $this.text()
                }).animate({
                        countNum: countTo
                    },

                    {

                        duration: 8000,
                        easing: 'linear',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }

                    });
            });
        }
        $(document).scroll(function() {
            if (isScrolledIntoView(".counter")) {
                countUp();
            }
        });
    });
</script>
<script>
    new WOW().init();
</script>
<script>
    $('.blog-slider .owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            },
            1366: {
                items: 4
            }
        }
    })
</script>


<script>
    $(function() {
        $('#datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: "1947:"+new Date().getFullYear()
        });
    });
    $(function() {
        $('#datepicker2').datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: "1947:"+new Date().getFullYear()
        });
    });
</script>

