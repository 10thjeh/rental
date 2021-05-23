@extends('game.indexGame')
@section('content')


<div class="container" id="list" data-aos="fade-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">SHOP LIST</h1>
                <div class="list-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Genres</button>
                    <div class="dropdown-menu">
                        <a class="list-group-item" href="{{url('game')}}">All Genre</a>
                      @foreach($genres as $genre)
                        <a class="list-group-item" href="{{url('game/'.$genre->genreId)}}">{{$genre->genreName}}</a>
                      @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="carousel slide my-4" id="carouselExampleIndicators" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"><img class="d-block img-fluid" src="{{asset('front/assets/img/resident.jpg')}}" alt="First slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/mass.jpg')}}" alt="Second slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/animal.jpg')}}" alt="Third slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/monster.jpg')}}" alt="Fourth slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/rachet.jpg')}}" alt="Fifth slide" /></div>
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

                    @foreach($games as $game)

                            <div class="col-lg-4 col-md-6 mb-4" data-aos="flip-left">
                                <div class="card h-100">
                                    <a href="#!"><img class="card-img-top" src="<?php echo ($game->gambar !== '')?url('img/game/'.$game->gambar):"https://via.placeholder.com/700x400"; ?>" alt="..." /></a>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#!">{{$game->NamaGame}}</a></h4>
                                        <br>
                                        <h6>Available in store {{$game->qty}}</h6>
                                        <hr>
                                        <h5>Rp. {{$game->harga}}</h5>
                                        <p class="card-text">{{$game->deskripsi}}</p>
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
