@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Frequently Asked Questions</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">FAQs</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage">
    <div class="accordion3-wrapper padd-100 float-start w-100">
        <div class="container">

            <div>
                <div class="row justify-content-center">

                    <div class="accordions" id="thirdAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                    Who can use this portal?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#thirdAccordion">
                                <div class="accordion-body">
                                    <p>Any adult person can use this site. Girls should be 18+ years of age and boys should be 21+ years of age.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    Do i have to pay for registration and see matches?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#thirdAccordion">
                                <div class="accordion-body">
                                    <p>You don't need to pay for registration, see matches, matchmaking, etc. We charges, if you want to communication. We assume only serious person will pay and to maintain privacy, we ask for package</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    Do i need to upload image?
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#thirdAccordion">
                                <div class="accordion-body">
                                    <p>It is not necessary, but as it is a dating website, so people generally want to see the pic and then decide to go further.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingten">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                                    How to subscribe/Unsubscribe newsletter?
                                </button>
                            </h2>
                            <div id="collapseten" class="accordion-collapse collapse" aria-labelledby="headingten" data-bs-parent="#thirdAccordion">
                                <div class="accordion-body">
                                    <p>After login, go to home page. In left menu, you will get a tab of Account Management. In this tab you will get an option of subscribe/unsubscribe newsletter.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingone">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                                    Do you display my email id and mobile number to users ?
                                </button>
                            </h2>
                            <div id="collapseone" class="accordion-collapse collapse" aria-labelledby="headingone" data-bs-parent="#thirdAccordion">
                                <div class="accordion-body">
                                    <p>We donot display any email id or mobile number without users confirmation.</p>
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