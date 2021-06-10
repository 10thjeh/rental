@extends('console/indexConsole')
@section('content')
<!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row" style="max-width:100%;">
    <p onload="updatePrice()"></p>
    <!--Grid column-->
    <div class="col-lg-8">

      <!-- Card -->
      <div class="card wish-list mb-3">
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

                </div>
                <a role="button" type="button" href="{{url('/cart/deleteconsole/'.$console->consoleId)}}" class="btn btn-danger btn-block waves-effect waves-light">Delete</a>
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
                </div>
                <a role="button" type="button" href="{{url('/cart/deletegame/'.$game->idGame)}}" class="btn btn-danger btn-block waves-effect waves-light">Delete</a>
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
      <!-- Card -->
      <form class="" action="{{url('/cart')}}" method="post">
        <div class="card mb-3">
          <div class="card-body">

            <h5 class="mb-3">Receipt</h5>

            <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Choose Rent Time :
                <input type="number" id="days" oninput="updatePrice()" name="days" value="" min="1" required>
                <!-- <select class="form-select" aria-label="Default select example" id="days" oninput="updatePrice()" name="hari">
                                          <option value="1" selected>1 Day</option>
                                          <option value="2">2 Days</option>
                                          <option value="3">3 Days</option>
                                          <option value="4">4 Days</option>
                                          <option value="5">5 Days</option>
                                          <option value="6">6 Days</option>
                                          <option value="7">7 Days</option>
                                        </select> -->
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Order Date :
                <span><?php
            date_default_timezone_set('Asia/Jakarta');
            echo date("l")." ".date("Y/m/d");
            ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Order Time :
                <span><?php
            date_default_timezone_set('Asia/Jakarta');
            echo date("h:i");
            ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Temporary amount :
                <span>Rp. <p id="price"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Shipping
                <span>Free</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Minimum rent time :
                  <strong>
                  <span>1 Day</span>
                </strong>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>The total amount of</strong>
                  <strong>
                    <p class="mb-0">(including VAT)</p>
                  </strong>
                </div>
                <span><strong>Rp. <p id="priceToo">2</p> </strong></span>
              </li>
            </ul>
            @csrf
            <input type="submit" class="btn btn-primary btn-block waves-effect waves-light" name="" value="Confirm Order">
          </div>
        </div>
      </form>

    </divss>
  </div>
</section>
<script type="text/javascript">
  const updatePrice = () => {
    let totalPrice = {{$price}} || 0;
    let days = document.getElementById('days').value || 1;
    let finalPrice = totalPrice * days;
    document.getElementById('priceToo').innerHTML = document.getElementById('price').innerHTML = isNaN(finalPrice)?"0":finalPrice;
  };

  document.addEventListener("DOMContentLoaded", function(event) {
      updatePrice();
  });
</script>
@endsection
