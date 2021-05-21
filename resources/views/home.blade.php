@extends('layout.front.app')
@section('content')

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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
        <section class="contact-section bg-black">
            <div>
            <img style="width:200px; height:75px; margin-bottom: 75px;" src="{{asset('front/assets/img/LogoBaruPutih.png')}}" class="rounded mx-auto d-block" alt="..."> />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100" data-aos="fade-up-right">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">Jl. Boulevard Bar. Raya No.5, RW.5, West Kelapa Gading, Kelapa Gading, North Jakarta City, Jakarta 14240, Indonesia</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100" data-aos="flip-left">
                            <div class="card-body text-center" >
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50"><a href="{{url('home')}}">rent@crusty-crud.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100" data-aos="fade-up-left">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">+6282132343821</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>

<script>
  AOS.init();
</script>
@endsection
