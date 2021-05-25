@extends('console.indexConsole')
@section('content')
<!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-lg-8">

      <!-- Card -->
      <div class="card wish-list mb-3">
        <div class="card-body">

          <h5 class="mb-4">Cart (<span>2</span> items)</h5>

          <div class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                <img class="img-fluid w-100"
                  src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">
                <a href="#!">
                  <div class="mask waves-effect waves-light">
                    <img class="img-fluid w-100"
                      src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg">
                    <div class="mask rgba-black-slight waves-effect waves-light"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <h5>Doom : Eternal</h5>
                    <p class="mb-3 text-muted text-uppercase small">DUAR MEKIA</p>
                  </div>
                  <div>
                    <div class="def-number-input number-input safari_only mb-0 w-100">
                      <input class="quantity" min="0" name="quantity" value="1" type="number">
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                      (Note, 1 piece)
                    </small>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                  </div>
                  <p class="mb-0"><span><strong>Rp. 69420</strong></span></p>
                </div>
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <di class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                <img class="img-fluid w-100"
                  src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                <a href="#!">
                  <div class="mask waves-effect waves-light">
                    <img class="img-fluid w-100"
                      src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg">
                    <div class="mask rgba-black-slight waves-effect waves-light"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <h5>Atari See Hong Puff</h5>
                    <p class="mb-3 text-muted text-uppercase small">console garing</p>
                  </div>
                  <div>
                    <div class="def-number-input number-input safari_only mb-0 w-100">
                      <input class="quantity" min="0" name="quantity" value="1" type="number">
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                    <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i
                        class="fas fa-heart mr-1"></i> Move to wish list </a>
                  </div>
                  <p class="mb-0"><span><strong>Rp. 42069</strong></span></p>
                </div>
              </div>
            </div>
          </di>
          <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding
            items to your cart does not mean booking them.</p>
        </div>
      </div>
      <!-- Card -->

      <!-- Card -->
      
      <!-- Card -->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4">
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
      <div class="card mb-3">
        <div class="card-body">

          <h5 class="mb-3">Receipt</h5>

          <ul class="list-group list-group-flush">
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
              Temporary amount
              <span>$25.98</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              Shipping
              <span>Free</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
              <div>
                <strong>The total amount of</strong>
                <strong>
                  <p class="mb-0">(including VAT)</p>
                </strong>
              </div>
              <span><strong>$53.98</strong></span>
            </li>
          </ul>

          <button type="button" class="btn btn-primary btn-block waves-effect waves-light">go to checkout</button>

        </div>
      </div>
      <!-- Card -->

      <!-- Card -->
      <!--<div class="card mb-3">
        <div class="card-body">

          <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample1"
            aria-expanded="false" aria-controls="collapseExample1">
            Add a discount code (optional)
            <span><i class="fas fa-chevron-down pt-1"></i></span>
          </a>

          <div class="collapse" id="collapseExample1">
            <div class="mt-3">
              <div class="md-form md-outline mb-0">
                <input type="text" id="discount-code1" class="form-control font-weight-light"
                  placeholder="Enter discount code">
              </div>
            </div>
          </div>
        </div>
      </div>-->
      <!-- Card -->

    </div>
    <!--Grid column-->

  </div>
  <!--Grid row-->

</section>
<!--Section: Block Content-->
<script>
$('.add-to-cart').on('click', (e) => {
  addToCart(e.currentTarget)
})

const addToCart = (product) => {
  const productId = $(product).attr('productId');
  const isAlreadyInCart = $.grep(productsInCart, el => {return el.id == productId}).length;

  if (isAlreadyInCart) {
    $.each(storageData, (i, el) => {
      if (productId == el.id) {
        el.itemsNumber += 1;
      }
    })
  } else {
    const newProduct = {
      id: Number(productId),
      itemsNumber: 1
    }

    storageData.push(newProduct);
  }

  updateCart();
  updateProductList();
}
</script>
@endsection