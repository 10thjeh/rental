@extends('console/indexConsole')
@section('content')

@if(count($errors) > 0 )
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <ul class="p-0 m-0" style="list-style: none;">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="container" id="list" data-aos="fade-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <br>
                <br>
                <h1 class="my-4">SHOP LIST</h1>
                <a class="list-group-item" href="{{url('game')}}">All Genre</a>
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#genreModal" style="background-color:black;">
                                            GENRE
                                        </button>
               <!-- <ul class="list-group">
                <a class="list-group-item" href="{{url('game')}}">All Genre</a>
                      @foreach($genres as $genre)
                        <a class="list-group-item" href="{{url('game/'.$genre->genreId)}}">{{$genre->genreName}}</a>
                      @endforeach
                </ul>-->
            </div>
            <div class="col-lg-9">
                <div class="carousel slide my-4" id="carouselExampleIndicators" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"><img class="d-block img-fluid" src="{{asset('front/assets/img/resident.jpg')}}" alt="First slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/mass.jpg')}}" alt="Second slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/animal.jpg')}}" alt="Third slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/monster.jpg')}}" alt="Fourth slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/rachet.jpg')}}" alt="Fifth slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/spider.png')}}" alt="Sixth slide" /></div>
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
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#gameModal-{{$game->GameID}}">
                                            description
                                        </button>
                                    </div>
                                    <div class="card-footer"><small class="text-muted">??? ??? ??? ??? ???</small></div>
                                    <form class="card-footer" action="{{url('/game/addtocart')}}" method="post">
                                      @csrf
                                      <input type="text" name="gameId" value="{{$game->GameID}}" hidden>
                                      <button type="submit" class="btn btn-primary">Rent</button>
                                    </form>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Genre Modal -->
@foreach($games as $game)

<div class="modal fade" id="genreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Genre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <ul class="list-group">
                      @foreach($genres as $genre)
                        <a class="list-group-item" href="{{url('game/'.$genre->genreId)}}">{{$genre->genreName}}</a>
                      @endforeach
                </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
@endforeach

<!-- Game Modal -->
@foreach($games as $game)

<div class="modal fade" id="gameModal-{{$game->GameID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$game->NamaGame}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <h5>Rp. {{$game->harga}}</h5>
                    <p class="card-text">{{$game->deskripsi}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
@endforeach


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