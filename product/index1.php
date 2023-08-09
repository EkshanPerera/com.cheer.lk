
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <?php include "../includes/cssjs.php"; echo $cssjs;?>
  <script type="text/javascript" src="http://cheer.lk/js/product.js"></script>

  <script>
    $(document).ready(function () {
        validateFirst();
        loadDetails(); 
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
        <a class="navbar-brand" href="https://mdbecommerce.com/">
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
      style="background-image: url('http://cheer.lk/img/carousel/webimage.jpeg'); height: 200px;">
      <div class="mask rgba-black-strong d-flex align-items-center h-100">
        <div class="container text-center white-text py-5">
          <h1 class="mb-0">Product page</h1>
        </div>
      </div>
    </div>
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main>
    <div class="container">

      <!--Section: Block Content-->
      <section class="mb-5">

        <div class="row">
          <div class="col-md-6 mb-4 mb-md-0">

            <div id="mdb-lightbox-ui"></div>

            <div class="mdb-lightbox">

                <div class="row product-gallery mx-1">

                <div class="col-12 mb-0 gallery">
                        <figure class="view overlay rounded z-depth-1 main-img" style="max-height: 450px;">
                        <a href="" data-size="710x823" id="aimg01">
                            <img src="" class="img-fluid z-depth-1" style="margin-top: -90px;" id="img01">
                        </a>
                        </figure>
                        <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
                        <a href="" data-size="710x823" id="aimg02">
                            <img src="" class="img-fluid z-depth-1" id="img03">
                        </a>
                        </figure>
                        <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
                        <a href="" data-size="710x823" id="aimg03">
                            <img src="" class="img-fluid z-depth-1" id="img03">
                        </a>
                        </figure>
                        <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
                        <a href="" data-size="710x823" id="aimg04">
                            <img src="" class="img-fluid z-depth-1" id="img04">
                        </a>
                        </figure>   
                </div>
                <div class="col-12">
                    <div class="row">
                    <div class="col-3">
                        <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                        <img src="" class="img-fluid" id="navimg01">
                        <div class="mask rgba-white-slight"></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                        <img src="" class="img-fluid" id="navimg02">
                        <div class="mask rgba-white-slight"></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                        <img src="" class="img-fluid" id="navimg03">
                        <div class="mask rgba-white-slight"></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                        <img src="" class="img-fluid" id="navimg04">
                        <div class="mask rgba-white-slight"></div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

            </div>

            </div>
            <div class="col-md-6">

            <h5 class="product_name"></h5>
            <p class="mb-2 text-muted text-uppercase small cat" ></p>
            <!-- <ul class="rating">
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
            </ul> -->
            <p><span class="mr-1"><strong class='price'></strong></span></p>
            <p class="pt-1 prdescription"></p>
            <div class="table-responsive">
                <table class="table table-sm table-borderless mb-0">
                <tbody>
                    <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
                    <td><div id="product"><?php if(isset($_GET["model"])){
                                echo $_GET["model"];
                                }else{
                                    echo "null" ;
                                }?></div></td>
                    </tr>
                    <tr>
                      <th class="pl-0 w-25" scope="row" style="vertical-align: middle;"><strong>Colours</strong></th>
                      <td id="colours">
                        <div class="btn-group btn-group-toggle btn-color-group d-block mt-n2 ml-n2 " data-toggle="buttons">
                        </div>
                      </td>
                    </tr>
                    <!-- <section class="mb-4"> -->
                     
                        
                    <!-- </section> -->
                    <!-- <tr> -->
                    <!--<th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
                    <td id="dilivary"></td>
                    </tr> -->
                </tbody>
                </table>
            </div>
            <hr>
            <div class="table-responsive mb-2">
              <table class="table table-sm table-borderless">
                <tbody>
                  <tr>
                    <td class="pl-0 pb-0 w-25">Quantity</td>
                    <td class="pb-0">Select size</td>
                  </tr>
                  <tr>
                    <td class="pl-0">
                      <div class="def-number-input number-input safari_only mb-0">
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                          class="minus"></button>
                        <input class="quantity" min="1" name="quantity" value="1" type="number" readonly>
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                          class="plus"></button>
                      </div>
                    </td>
                    <td>
                      <div class="mt-1" id="form">
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="small" name="materialExampleRadios" checked>
                          <label class="form-check-label small text-uppercase card-link-secondary"
                            for="small">Small</label>
                        </div>
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="medium" name="materialExampleRadios">
                          <label class="form-check-label small text-uppercase card-link-secondary"
                            for="medium">Medium</label>
                        </div>
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="large" name="materialExampleRadios">
                          <label class="form-check-label small text-uppercase card-link-secondary"
                            for="large">Large</label>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Buy now</button>
            <button type="button" class="btn btn-light btn-md mr-1 mb-2"><i class="fas fa-shopping-cart pr-2"></i>Add to
              cart</button>
          </div>
        </div>

      </section>
      <!--Section: Block Content-->

      <!-- Classic tabs -->
      <div class="classic-tabs">

        <ul class="nav tabs-primary nav-justified" id="advancedTab" role="tablist">
          <li class="nav-item">
              <a class="nav-link active show" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description"
              aria-selected="true">Description</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info"
              aria-selected="false">Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
              aria-selected="false">Reviews (1)</a>
          </li>
        </ul>
        <div class="tab-content" id="advancedTabContent">
          <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <h5 class="product_name"></h5>
            <p class="small text-muted text-uppercase mb-2 cat" ></p>
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
            </ul>
            <h6 class="price">12.99 $</h6>
            <p class="pt-1 prdescription"></p>
          </div>
          <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
            <h5>Additional Information</h5>
            <table class="table table-striped table-bordered mt-3">
              <thead>
                <tr>
                  <th scope="row" class="w-150 dark-grey-text h6">Weight</th>
                  <td><em>0.3 kg</em></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="w-150 dark-grey-text h6">Dimensions</th>
                  <td><em>50 × 60 cm</em></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <h5><span>1</span> review for <span>Fantasy T-shirt</span></h5>
            <div class="media mt-3 mb-4">
              <img class="d-flex mr-3 z-depth-1" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg"
                width="62" alt="Generic placeholder image">
              <div class="media-body">
                <div class="d-flex justify-content-between">
                  <p class="mt-1 mb-2">
                    <strong>Marthasteward </strong>
                    <span>– </span><span>January 28, 2020</span>
                  </p>
                  <ul class="rating mb-0">
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
                  </ul>
                </div>
                <p class="mb-0">Nice one, love it!</p>
              </div>
            </div>
            <hr>
            <h5 class="mt-4">Add a review</h5>
            <p>Your email address will not be published.</p>
            <div class="my-3">
              <ul class="rating mb-0">
                <li>
                  <a href="#!">
                    <i class="fas fa-star fa-sm text-primary"></i>
                  </a>
                </li>
                <li>
                  <a href="#!">
                    <i class="fas fa-star fa-sm text-primary"></i>
                  </a>
                </li>
                <li>
                  <a href="#!">
                    <i class="fas fa-star fa-sm text-primary"></i>
                  </a>
                </li>
                <li>
                  <a href="#!">
                    <i class="fas fa-star fa-sm text-primary"></i>
                  </a>
                </li>
                <li>
                  <a href="#!">
                    <i class="far fa-star fa-sm text-primary"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <!-- Your review -->
              <div class="md-form md-outline">
                <textarea id="form76" class="md-textarea form-control pr-6" rows="4"></textarea>
                <label for="form76">Your review</label>
              </div>
              <!-- Name -->
              <div class="md-form md-outline">
                <input type="text" id="form75" class="form-control pr-6">
                <label for="form75">Name</label>
              </div>
              <!-- Email -->
              <div class="md-form md-outline">
                <input type="email" id="form77" class="form-control pr-6">
                <label for="form77">Email</label>
              </div>
              <div class="text-right pb-2">
                <button type="button" class="btn btn-primary">Add a review</button>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- Classic tabs -->

      <hr>

      <!--Section: Block Content-->
      <section class="text-center">
        <h4 class="text-center my-5"><strong>Related products</strong></h4>
        <div class="row relatedPro">
        </div>                              
      </section>
      <!--Section: Block Content-->

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








<div class="modal-body">
          <div class="text-center">
            <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iusto nulla aperiam blanditiis
              ad consequatur in dolores culpa, dignissimos, eius non possimus fugiat. Esse ratione
              fuga, enim, ab officiis totam.</p>
          </div>
          <ul class="list-group z-depth-0">
            <li class="list-group-item justify-content-between">
              Cras justo odio
              <span class="badge badge-success badge-pill">14</span>
            </li>
            <li class="list-group-item justify-content-between">
              Dapibus ac facilisis in
              <span class="badge badge-success badge-pill">2</span>
            </li>
            <li class="list-group-item justify-content-between">
              Morbi leo risus
              <span class="badge badge-success badge-pill">1</span>
            </li>
            <li class="list-group-item justify-content-between">
              Cras justo odio
              <span class="badge badge-success badge-pill">14</span>
            </li>
            <li class="list-group-item justify-content-between">
              Dapibus ac facilisis in
              <span class="badge badge-success badge-pill">2</span>
            </li>
            <li class="list-group-item justify-content-between">
              Morbi leo risus
              <span class="badge badge-success badge-pill">1</span>
            </li>
          </ul>
        </div>


        fluidModalRightSuccess