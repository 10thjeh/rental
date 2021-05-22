@extends('console.indexConsole')
@section('content')


<div class="container" id="list">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">SHOP LIST</h1>
                <div class="list-group">
                <a class="list-group-item" href="{{url('console')}}">All Category</a>
                    <a class="list-group-item" href="{{url('console/sony#list')}}">Sony</a>
                    <a class="list-group-item" href="{{url('console/microsoft#list')}}">Microsoft</a>
                    <a class="list-group-item" href="{{url('console/nintendo#list')}}">Nintendo</a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="carousel slide my-4" id="carouselExampleIndicators" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"><img class="d-block img-fluid" src="{{asset('front/assets/img/psc4.png')}}" alt="First slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/xboxc.png')}}" alt="Second slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/ninc.png')}}" alt="Third slide" /></div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="row">
                    
                    @foreach($consoles as $console)
                        
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#!">{{$console->NamaConsole}}</a></h4>
                                        <h5>$24.99</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                    </div>
                                    <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                                </div>
                            </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<style>
body {
    animation: fadeInAnimation ease 3s
    animation-iteration-count: 1;
    animation-fill-mode: forwards;
}
  
@keyframes fadeInAnimation {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
     }
}
</style>

@endsection
