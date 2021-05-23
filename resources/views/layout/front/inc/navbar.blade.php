<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
            <div class="logo">
                <a class="navbar-brand js-scroll-trigger" href="{{url('home')}}">CrustyCRUD<span>Rent</span></a>
                </div>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">{{session('firstName')}}</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('home')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('console#list')}}">Console</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('game#list')}}">Games</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('home#contact')}}">Contact</a></li>
                        @if(session('isLoggedIn') != True)
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/register')}}">Sign Up</a></li>
                        @endif
                        @if(session('isLoggedIn') == True)
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/logout')}}">Log Out</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <link rel="stylesheet" href="css/style.css">
<script>
  AOS.init();
</script>
