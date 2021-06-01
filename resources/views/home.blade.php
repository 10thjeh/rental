@extends('layout/front/app')
@section('content')

<section class="projects-section bg-light" id="projects">
            <div class="container" data-aos="fade-left">
                <!-- Featured Project Row-->
                <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="{{asset('front/assets/img/mabars.png')}}" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Fun and Affordable</h4>
                            <p class="text-black-50 mb-0">CrustyCRUD Rent will give you the best experience of playing game console with your friend or your family</p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div style="margin-bottom:40px; margin-left:auto; margin-right:auto;">
                    <h1> Our Consoles</h1>
                </div>
                <div class="row justify-content-center no-gutters mb-5 mb-lg-0" data-aos="fade-right">
                    <div class="col-lg-6"><img class="img-fluid" src="{{asset('front/assets/img/ps.png')}}" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Playstation</h4>
                                    <p style="color:#0c94ff;">Play lightning-fast, immersive and more lifelike with PlayStation 5.With ultra-high speed SSD, ray tracing, frame rates up to 120 fps, and 8K support. </p>
                                    <hr class="d-none d-lg-block mb-0 ml-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row justify-content-center no-gutters" data-aos="fade-left">
                    <div class="col-lg-6"><img class="img-fluid" src="{{asset('front/assets/img/xbok.png')}}" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">XBOX</h4>
                                    <p style="color:#59bf59;">Discover the fastest, most powerful Xbox ever with the Xbox Series X. Enjoy 4K gaming at up to 120 frames per second on this next generation video game</p>
                                    <hr class="d-none d-lg-block mb-0 mr-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Three Row-->
                <div class="row justify-content-center no-gutters mb-5 mb-lg-0" data-aos="fade-right">
                    <div class="col-lg-6"><img class="img-fluid" src="{{asset('front/assets/img/nintendo.png')}}" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Nintendo</h4>
                                   <p style="color:#ff6363;">The Nintendo Switch is a hybrid video game console, consisting of a console unit, a dock, and two Joy-Con controllers</p>
                                    <hr class="d-none d-lg-block mb-0 ml-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Signup-->
        <!-- <section class="signup-section" id="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Subscribe to receive updates!</h2>
                        <form class="form-inline d-flex">
                            <input class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" type="email" placeholder="Enter email address..." />
                            <button class="btn btn-primary mx-auto" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Contact-->
        

@endsection
