@extends('console.indexConsole')
@section('content')


<div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h1 class="my-4">SHOP LIST</h1>
                    <div class="list-group">
                        <a class="list-group-item" href="#!">Playstation</a>
                        <a class="list-group-item" href="#!">Xbox</a>
                        <a class="list-group-item" href="#!">Nintendo</a>
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
                            <div class="carousel-item active"><img class="d-block img-fluid" src="{{asset('front/assets/img/psc3.png')}}" alt="First slide" /></div>
                            <div class="carousel-item"><img class="d-block img-fluid" src="{{asset('front/assets/img/psc4.png')}}" alt="Second slide" /></div>
                            <div class="carousel-item"><img class="d-block img-fluid" src="https://via.placeholder.com/900x350" alt="Third slide" /></div>
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
                        <?php $count = 0; ?>
                        @foreach($consoles as $console)
                            <?php if($count == 3) break; ?>
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
                            <?php $count++; ?>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>

@endsection