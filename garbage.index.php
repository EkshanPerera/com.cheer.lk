
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <?php include "includes/cssjs.php"; echo $cssjs;?>
  <script type="text/javascript" src="http://slimnfit.lk/js/index.js"></script>
  <script type="text/javascript" src="http://slimnfit.lk/js/index.triggers.js"></script>
  <script>
    // $('#multi').mdbRange({
    //   single: {
    //     active: true,
    //     multi: {
    //       active: true,
    //       rangeLength: 1
    //     },
    //   }
    // });
     
    $(document).ready(function () {
      fillSideNav();
      saveHome($("#main").html());
      loadProduct($("#test").val());
    });
  </script>
</head>

<body class="skin-light">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top scrolling-navbar navbar-transparent">

      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand">
          <i class="fab fa-mdb fa-3x" alt="mdb logo"></i>
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
          aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

          <!-- Right -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="#!" class="nav-link navbar-link-2 waves-effect">
                <span class="badge badge-pill red">1</span>
                <i class="fas fa-shopping-cart pl-0"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink3" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true">
                <i class="united kingdom flag m-0"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#!">Action</a>
                <a class="dropdown-item" href="#!">Another action</a>
                <a class="dropdown-item" href="#!">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="#!" class="nav-link waves-effect">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a href="#!" class="nav-link waves-effect">
                Contact
              </a>
            </li>
            <li class="nav-item">
              <a href="#!" class="nav-link waves-effect">
                Sign in
              </a>
            </li>
            <li class="nav-item pl-2 mb-2 mb-md-0">
              <a href="#!" type="button"
                class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light">Sign
                up</a>
            </li>
          </ul>

        </div>
        <!-- Links -->
      </div>

    </nav>
    <!-- Navbar -->

    <div class="jumbotron jumbotron-image color-grey-light"
      style="background-image: url('http://slimnfit.lk/img/carousel/webimage.jpeg'); height: 400px;">
      <div class="mask rgba-black-strong d-flex align-items-center h-100">
        <div class="container text-center white-text py-5">
          <h1 class="mb-0">Shop</h1>
        </div>
      </div>
    </div>

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main>
    <div class="container">

      <!--Grid row-->
      <div class="row mt-5">

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Section: Sidebar -->
          <section>

            <!-- Section: Categories -->
            <section>
            
              <h5>Subcategories</h5>
              <input type="hidden" id="test" value="ALL">
              <div class="treeview-animated mb-5">
                <h6 class="pt-3 pl-3"></h6>
                <hr>
                  <ul class="treeview-animated-list "> 
                  <li>
                      <div class='treeview-animated-element font-weight-bold text-uppercase' id='all' style="background-color:rgb(0,0,0,32%)"><i></i>All Products
                  </li>
                  <div class="snavcont"> 
                  </div>
                </ul>
              </div>
              <div class="text-muted small text-uppercase mb-5">
                <p class="mb-4">return to <a href="#!" class="card-link-secondary"><strong>Clothing, Shoes,
                      Accessories</strong></a></p>

                <p class="mb-3"><a href="#!" class="card-link-secondary">Dresses</a></p>
                <p class="mb-3"><a href="#!" class="card-link-secondary">Tops, Tees & Blouses</a></p>
                <p class="mb-3"><a href="#!" class="card-link-secondary">Sweaters</a></p>
                <p class="mb-3"><a href="#!" class="card-link-secondary">Fashion Hoodies & Sweatshirts</a></p>
                <p class="mb-3"><a href="#!" class="card-link-secondary">Jeans</a></p>
              </div>

            </section>
            <!-- Section: Categories -->

            <!-- Section: Filters -->
            <section>

              <h5 class="pt-2 mb-4">Filters</h5>

              <section class="mb-4">

                <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                  <input type="text" id="search12" class="form-control mb-0" placeholder="Search...">
                  <a href="#!" class="btn btn-flat btn-md px-3 waves-effect"><i class="fas fa-search fa-lg"></i></a>
                </div>

              </section>

              <!-- Section: Condition -->
              <section class="mb-4">

                <h6 class="font-weight-bold mb-3">Condition</h6>

                <div class="form-check pl-0 mb-3">
                  <input type="checkbox" class="form-check-input filled-in" id="new">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="new">New</label>
                </div>
                <div class="form-check pl-0 mb-3">
                  <input type="checkbox" class="form-check-input filled-in" id="used">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="used">Used</label>
                </div>
                <div class="form-check pl-0 mb-3">
                  <input type="checkbox" class="form-check-input filled-in" id="collectible">
                  <label class="form-check-label small text-uppercase card-link-secondary"
                    for="collectible">Collectible</label>
                </div>
                <div class="form-check pl-0 mb-3 pb-1">
                  <input type="checkbox" class="form-check-input filled-in" id="renewed">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="renewed">Renewed</label>
                </div>

              </section>
              <!-- Section: Condition -->

              <!-- Section: Average -->
              <!-- <section class="mb-4">

                <h6 class="font-weight-bold mb-3">Avg. Customer Review</h6>

                <a href="#!">
                  <ul class="rating">
                    <li>
                      <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <p class="small text-uppercase card-link-secondary px-2">& Up</p>
                    </li>
                  </ul>
                </a>
                <a href="#!">
                  <ul class="rating">
                    <li>
                      <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <p class="small text-uppercase card-link-secondary px-2">& Up</p>
                    </li>
                  </ul>
                </a>
                <a href="#!">
                  <ul class="rating">
                    <li>
                      <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <p class="small text-uppercase card-link-secondary px-2">& Up</p>
                    </li>
                  </ul>
                </a>
                <a href="#!">
                  <ul class="rating">
                    <li>
                      <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                      <p class="small text-uppercase card-link-secondary px-2">& Up</p>
                    </li>
                  </ul>
                </a>

              </section> -->
              <!-- Section: Average -->

              <!-- Section: Price -->
              <section class="mb-4">

                <h6 class="font-weight-bold mb-3">Price</h6>

                <div class="form-check pl-0 mb-3">
                  <input type="radio" class="form-check-input" id="under25" name="materialExampleRadios">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="under25">Under
                    $25</label>
                </div>
                <div class="form-check pl-0 mb-3">
                  <input type="radio" class="form-check-input" id="2550" name="materialExampleRadios">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="2550">$25 to $50</label>
                </div>
                <div class="form-check pl-0 mb-3">
                  <input type="radio" class="form-check-input" id="50100" name="materialExampleRadios">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="50100">$50 to
                    $100</label>
                </div>
                <div class="form-check pl-0 mb-3">
                  <input type="radio" class="form-check-input" id="100200" name="materialExampleRadios">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="100200">$100 to
                    $200</label>
                </div>
                <div class="form-check pl-0 mb-3">
                  <input type="radio" class="form-check-input" id="200above" name="materialExampleRadios">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="200above">$200 &
                    Above</label>
                </div>
                <form>
                  <div class="d-flex align-items-center mt-4 pb-1">
                    <div class="md-form md-outline my-0">
                      <input id="from" type="text" class="form-control mb-0">
                      <label for="form">$ Min</label>
                    </div>
                    <p class="px-2 mb-0 text-muted"> - </p>
                    <div class="md-form md-outline my-0">
                      <input id="to" type="text" class="form-control mb-0">
                      <label for="to">$ Max</label>
                    </div>
                  </div>
                </form>

              </section>
              <!-- Section: Price -->

              <!-- Section: Price version 2 -->
              <section class="mb-4">

                <h6 class="font-weight-bold mb-3">Price</h6>

                <div class="slider-price d-flex align-items-center my-4">
                  <span class="font-weight-normal small text-muted mr-2">$0</span>
                  <form class="multi-range-field w-100">
                    <input id="multi" class="multi-range" type="range" />
                  </form>
                  <span class="font-weight-normal small text-muted ml-2">$100</span>
                </div>

              </section>
              <!-- Section: Price version 2 -->

              <!-- Section: Size -->
              <section class="mb-4">

                <h6 class="font-weight-bold mb-3">Size</h6>

                <div class="form-check pl-0 mb-3">
                  <input type="checkbox" class="form-check-input filled-in" id="34">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="34">34</label>
                </div>
                <div class="form-check pl-0 mb-3">
                  <input type="checkbox" class="form-check-input filled-in" id="36">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="36">36</label>
                </div>
                <div class="form-check pl-0 mb-3">
                  <input type="checkbox" class="form-check-input filled-in" id="38">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="38">38</label>
                </div>
                <div class="form-check pl-0 mb-3">
                  <input type="checkbox" class="form-check-input filled-in" id="40">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="40">40</label>
                </div>
                <a class="btn btn-link text-muted p-0" data-toggle="collapse" href="#collapseExample"
                  aria-expanded="false" aria-controls="collapseExample">
                  More
                </a>
                <div class="collapse pt-3" id="collapseExample">
                  <div class="form-check pl-0 mb-3">
                    <input type="checkbox" class="form-check-input filled-in" id="42">
                    <label class="form-check-label small text-uppercase card-link-secondary" for="42">42</label>
                  </div>
                  <div class="form-check pl-0 mb-3">
                    <input type="checkbox" class="form-check-input filled-in" id="44">
                    <label class="form-check-label small text-uppercase card-link-secondary" for="44">44</label>
                  </div>
                  <div class="form-check pl-0 mb-3">
                    <input type="checkbox" class="form-check-input filled-in" id="46">
                    <label class="form-check-label small text-uppercase card-link-secondary" for="46">46</label>
                  </div>
                  <div class="form-check pl-0 mb-3">
                    <input type="checkbox" class="form-check-input filled-in" id="50">
                    <label class="form-check-label small text-uppercase card-link-secondary" for="50">50</label>
                  </div>
                </div>

              </section>
              <!-- Section: Size -->

              <!-- Section: Color -->
              <!-- <section class="mb-4">

                <h6 class="font-weight-bold mb-3">Color</h6>

                <div class="btn-group btn-group-toggle btn-color-group d-block mt-n2 ml-n2" data-toggle="buttons">
                  <label class="btn rounded-circle white border-inset-grey p-3 m-2">
                    <input type="checkbox" autocomplete="off">
                  </label>
                  <label class="btn rounded-circle grey p-3 m-2">
                    <input type="checkbox" autocomplete="off">
                  </label>
                  <label class="btn rounded-circle black p-3 m-2">
                    <input type="checkbox" autocomplete="off">
                  </label>
                  <label class="btn rounded-circle green p-3 m-2">
                    <input type="checkbox" autocomplete="off">
                  </label>
                  <label class="btn rounded-circle blue p-3 m-2">
                    <input type="checkbox" autocomplete="off">
                  </label>
                  <label class="btn rounded-circle purple p-3 m-2">
                    <input type="checkbox" autocomplete="off">
                  </label>
                  <label class="btn rounded-circle yellow p-3 m-2">
                    <input type="checkbox" autocomplete="off">
                  </label>
                  <label class="btn rounded-circle indigo p-3 m-2">
                    <input type="checkbox" checked autocomplete="off">
                  </label>
                  <label class="btn rounded-circle red p-3 m-2">
                    <input type="checkbox" autocomplete="off">
                  </label>
                  <label class="btn rounded-circle orange p-3 m-2">
                    <input type="checkbox" autocomplete="off">
                  </label>
                </div>

              </section> -->
              <!-- Section: Color -->

            </section>
            <!-- Section: Filters -->

          </section>
          <!-- Section: Sidebar -->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!-- Section: Block Content -->
          <section class="mb-3">

            <div class="row d-flex justify-content-around align-items-center">
              <div class="col-12 col-md-3 text-center text-md-left">
                <!-- <a href="#!" class="text-reset"><i class="fas fa-th-list fa-lg mr-1"></i></a href="#!"> -->
                <!-- <a href="#!" class="text-reset"><i class="fas fa-th-large fa-lg"></i></a href="#!"> -->
              </div>
              <div class="col-12 col-md-5">
                <div class="d-flex flex-wrap">
                  <div class="select-outline position-relative w-100">
                    <select class="mdb-select md-outline md-form" searchable="Search here..">
                      <option value="" disabled selected>Choose category</option>
                      <option value="1">Category 1</option>
                      <option value="2">Category 2</option>
                      <option value="3">Category 3</option>
                      <option value="4">Category 4</option>
                      <option value="5">Category 5</option>
                    </select>
                    <label>Label example</label>
                    <button class="btn-save btn btn-primary btn-sm mt-2">Save</button>
                  </div>
                </div>
              </div>
              <!-- <div class="col-12 col-md-4 text-center">
                <nav aria-label="Page navigation example">
                  <ul class="pagination pagination-circle justify-content-center float-md-right mb-0">
                    <li class="page-item"><a class="page-link"><i class="fas fa-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link">1</a></li>
                    <li class="page-item"><a class="page-link">2</a></li>
                    <li class="page-item"><a class="page-link">3</a></li>
                    <li class="page-item"><a class="page-link"><i class="fas fa-chevron-right"></i></a></li>
                  </ul>
                </nav>
              </div> -->
            </div>

          </section>
          <!-- Section: Block Content -->

          <!--Section: Block Content-->
          <section>
            <div class="row d-flex justify-content-around align-items-center productWin" id="productWin"> 
              <div class="spinner-border" role="status" style="padding: 50px;">
                  <span class="visually-hidden"></span>
              </div>         
            </div>
          </section>
          <!--Section: Block Content-->

          <!-- Section: Block Content -->
          <section>

            <div class="row d-flex justify-content-around align-items-center">
              <div class="col-12 col-md-3 text-center text-md-left">
                <!-- <a href="#!" class="text-reset"><i class="fas fa-th-list fa-lg mr-1"></i></a href="#!"> -->
                <!-- <a href="#!" class="text-reset"><i class="fas fa-th-large fa-lg"></i></a href="#!"> -->
              </div>
              <div class="col-12 col-md-5">
                <div class="d-flex flex-wrap">
                  <div class="select-outline position-relative w-100">
                    <select class="mdb-select md-outline md-form" searchable="Search here..">
                      <option value="" disabled selected>Choose category</option>
                      <option value="1">Category 1</option>
                      <option value="2">Category 2</option>
                      <option value="3">Category 3</option>
                      <option value="4">Category 4</option>
                      <option value="5">Category 5</option>
                    </select>
                    <label>Label example</label>
                    <button class="btn-save btn btn-primary btn-sm mt-2">Save</button>
                  </div>
                </div>
              </div>
              <!-- <div class="col-12 col-md-4 text-center">
                <nav aria-label="Page navigation example">
                  <ul class="pagination pagination-circle justify-content-center float-md-right mb-0">
                    <li class="page-item"><a class="page-link"><i class="fas fa-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link">1</a></li>
                    <li class="page-item"><a class="page-link">2</a></li>
                    <li class="page-item"><a class="page-link">3</a></li>
                    <li class="page-item"><a class="page-link"><i class="fas fa-chevron-right"></i></a></li>
                  </ul>
                </nav>
              </div> -->
            </div>

          </section>
          <!-- Section: Block Content -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->

  <!-- Footer -->
  <footer class="page-footer font-small elegant-color">

    <div class="color-primary">
      <div class="container">

        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0">Get connected with us on social networks!</h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">

            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fab fa-facebook-f white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fab fa-twitter white-text mr-4"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g white-text mr-4"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fab fa-linkedin-in white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram white-text"> </i>
            </a>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row-->

      </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left pt-4 pt-md-5">

      <!-- Grid row -->
      <div class="row mt-1 mt-md-0 mb-4 mb-md-0">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">

          <!-- Links -->
          <h5>About me</h5>
          <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">

          <p class="foot-desc mb-0">Here you can use rows and columns to organize your footer content. Lorem
            ipsum dolor sit amet,
            consectetur
            adipisicing elit.</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">

          <!-- Links -->
          <h5>Products</h5>
          <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">

          <ul class="list-unstyled foot-desc">
            <li class="mb-2">
              <a href="#!">MDBootstrap</a>
            </li>
            <li class="mb-2">
              <a href="#!">MDWordPress</a>
            </li>
            <li class="mb-2">
              <a href="#!">BrandFlow</a>
            </li>
            <li class="mb-2">
              <a href="#!">Bootstrap Angular</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">

          <!-- Links -->
          <h5>Useful links</h5>
          <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">

          <ul class="list-unstyled foot-desc">
            <li class="mb-2">
              <a href="#!">Your Account</a>
            </li>
            <li class="mb-2">
              <a href="#!">Become an Affiliate</a>
            </li>
            <li class="mb-2">
              <a href="#!">Shipping Rates</a>
            </li>
            <li class="mb-2">
              <a href="#!">Help</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">

          <!-- Links -->
          <h5>Contacts</h5>
          <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">

          <ul class="fa-ul foot-desc ml-4">
            <li class="mb-2"><span class="fa-li"><i class="far fa-map"></i></span>New York, Avenue Street 10
            </li>
            <li class="mb-2"><span class="fa-li"><i class="fas fa-phone-alt"></i></span>042 876 836 908</li>
            <li class="mb-2"><span class="fa-li"><i class="far fa-envelope"></i></span>company@example.com</li>
            <li><span class="fa-li"><i class="far fa-clock"></i></span>Monday - Friday: 10-17</li>
          </ul>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->



  
  
  
</body>

</html>