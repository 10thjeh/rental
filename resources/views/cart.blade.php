@extends('console/indexConsole')
@section('content')
<!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row" style="max-width:100%;">

    <!--Grid column-->
    <div class="col-lg-8">

      <!-- Card -->
      <div class="card wish-list mb-3" >
        <div class="card-body">

          <h5 class="mb-4">Cart (<span>{{count($gameCart)+count($consoleCart)}}</span> item(s) )</h5>
          <!-- console section -->
          @foreach($consoleCart as $console)
          <div class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                <!-- <img class="img-fluid w-100"
                  src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample"> -->
                <a href="#!">
                  <div class="mask waves-effect waves-light">
                    <img class="img-fluid w-100"
                      src="{{url('img/console/'.$console->gambar)}}">
                    <div class="mask rgba-black-slight waves-effect waves-light"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <h5>{{$console->NamaConsole}}</h5>
                    <p class="mb-3 text-muted text-uppercase small">{{$console->deskripsi}}</p>
                    <p class="mb-3 text-muted text-uppercase small">Start date = {{$console->startDate}}</p>
                    <p class="mb-3 text-muted text-uppercase small">End date = {{$console->endDate}}</p>
                  </div>
                  <!-- <div>
                    <div class="def-number-input number-input safari_only mb-0 w-100">
                      <input class="quantity" min="0" name="quantity" value="1" type="number" disabled>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                      (Note, 1 piece)
                    </small>
                  </div> -->
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <!-- <div>
                    <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                  </div> -->
                  <p class="mb-0"><span><strong>Rp. {{$console->harga}}</strong></span></p>
                  <p class="mb-0">Status : {{$console->status}}</p>
                  
                </div>
                <a role="button" type="button" href="{{url('/cart/return/console/'.$console->orderId)}}" class="btn btn-primary btn-block waves-effect waves-light <?php if($console->status != "Sudah dikirim") echo "disabled"; ?>">Ready to Pickup</a>
              </div>
            </div>
          </div>
          @endforeach

          <!-- game section -->
          @foreach($gameCart as $game)
          <div class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                <!-- <img class="img-fluid w-100"
                  src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample"> -->
                <a href="#!">
                  <div class="mask waves-effect waves-light">
                    <img class="img-fluid w-100"
                      src="{{url('img/game/'.$game->gambar)}}">
                    <div class="mask rgba-black-slight waves-effect waves-light"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <h5>{{$game->NamaGame}}</h5>
                    <p class="mb-3 text-muted text-uppercase small">{{$game->deskripsi}}</p>
                    <p class="mb-3 text-muted text-uppercase small">Start date = {{$game->startDate}}</p>
                    <p class="mb-3 text-muted text-uppercase small">End date = {{$game->endDate}}</p>
                  </div>
                  <!-- <div>
                    <div class="def-number-input number-input safari_only mb-0 w-100">
                      <input class="quantity" min="0" name="quantity" value="1" type="number" disabled>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                      (Note, 1 piece)
                    </small>
                  </div> -->
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <!-- <div>
                    <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                  </div> -->
                  <p class="mb-0"><span><strong>Rp. {{$game->harga}}</strong></span></p>
                  <p class="mb-0">Status : {{$game->status}}</p>
                </div>
                <a role="button" type="button" href="{{url('/cart/return/game/'.$game->gameOrderId)}}" class="btn btn-primary btn-block waves-effect waves-light <?php if($game->status != "Sudah dikirim") echo "disabled"; ?>">Ready to Pickup</a>
              </div>
            </div>
          </div>
          @endforeach

          <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Accidentaly clicked the order button? our customer satisfaction allow you to cancel the order when our courier delivering your goods, so dont worry!</p>
        </div>
      </div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <divss class="col-lg-4">
      <div class="card mb-3">
        <div class="card-body">

          <h5 class="mb-4">Expected shipping delivery</h5>

          <p class="mb-0"> </p>
          <p class="mb-0">Delivery Date : <?php
          date_default_timezone_set('Asia/Jakarta');
          echo date("l")." ".date("Y/m/d");
          echo " Time: " . date("h:i", strtotime('+1 hours'))?></p>
        </div>
      </div>
    </divss>
  </div>
</section>
@endsection
