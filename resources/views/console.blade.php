@extends('console.indexConsole')
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

                            <div class="col-lg-4 col-md-6 mb-4" data-aos="flip-left">
                                <div class="card h-100">
                                    <a href="#!"><img class="card-img-top" src="<?php echo ($console->gambar !== '')?url('img/console/'.$console->gambar):"https://via.placeholder.com/700x400"; ?>" alt="..." /></a>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#!">{{$console->NamaConsole}}</a></h4>
                                        <h5>$24.99</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">★ ★ ★ ★ ☆</small>
                                        <form class="card-footer" action="{{url('/console/addtocart')}}" method="post">
                                          @csrf
                                          <input type="text" name="consoleId" value="{{$console->ConsoleID}}" hidden>
                                          <select class="form-select" aria-label="Default select example" id="manufacturer" name="hari">
                                            <option value="1">1 Day</option>
                                            <option value="2">2 Days</option>
                                            <option value="3">3 Days</option>
                                            <option value="4">4 Days</option>
                                            <option value="5">5 Days</option>
                                            <option value="6">6 Days</option>
                                            <option value="7">7 Days</option>
                                          </select>
                                          <button type="submit" class="btn btn-primary">Rent</button>
                                        </form>
                                    </div>
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
<style>
.btn {
  border: none;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  display: inline-block;
}

/* Green */
.rent {
  color: white;
}

.rent:hover {
  background-color: #04AA6D;
  color: white;
}

</style>

@endsection
