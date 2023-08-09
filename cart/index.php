<?php 
  session_start();
  if(isset($_SESSION["ordering"])){
    unset($_SESSION["ordering"]);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <?php include "../includes/cssjs.php"; echo $cssjs;?>
  <script>
 
  </script>
  <script type="text/javascript" src="https://cheer.lk/js/cart.js"></script>
  <script type="text/javascript" src="https://cheer.lk/js/cart.triggers.js"></script>
  <script type="text/javascript" src="https://cheer.lk/js/sign-up.js"></script>
  <script type="text/javascript" src="https://cheer.lk/js/sign-up.triggers.js"></script>
  <script>
    $(document).ready(function () { 
        if('<?php if(isset($_GET[md5('platform')])){echo($_GET[md5('platform')]);}?>' == '<?php echo(md5('cart'));?>'){
          loadcart(); 
        }else if('<?php if(isset($_GET[md5('platform')])){echo($_GET[md5('platform')]);}?>' == '<?php echo(md5('buynow'));?>'){
          loadbuynow();
        }else{
          window.location.replace('../');
        }; 
        $(document).on("click","#gotocheckout",function(){
          <?php if(isset($_SESSION['usrid'])){echo("process();");}else{echo("signin();");}?>
        })
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
              <a href="<?php if(isset($_GET[md5('platform')])){ if ($_GET[md5('platform')] == md5('buynow')){echo "https://cheer.lk/cart/?34a6e5d64ade17ef4e51612c50dd72f5=54013ba69c196820e56801f1ef5aad54"; }}?>              
              " class="nav-link navbar-link-2 waves-effect">
                <span class="badge badge-pill red">0</span>
                <i class="fas fa-shopping-cart pl-0"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink2" data-toggle="dropdown"
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
      style="background-image: url('https://cheer.lk/img/carousel/webimage.jpeg'); height: 200px;">
      <div class="mask rgba-black-strong d-flex align-items-center h-100">
        <div class="container text-center white-text py-5">
          <h1 class="mb-0">Shopping cart</h1>
        </div>
      </div>
    </div>
   
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main>
    <div class="container">

      <!--Section: Block Content-->
      <section class="mt-5 mb-4">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-lg-8">

            <!-- Card -->
            <div class="card wish-list mb-4">
              <div class="card-body">

                <h5 class="mb-4 init" >Cart (<span class="itemcount"></span> items)</h5>
                <div class="itemlist">
                </div>
                <!-- <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding
                items to your cart does not mean booking them.</p> -->
              </div>
            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">
              <div class="card-body">

                <h5 class="mb-4">Expected shipping delivery</h5>

                <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
              </div>
            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">
              <div class="card-body">

                <h5 class="mb-4">We accept</h5>

                <img class="mr-2" width="45px"
                  src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                  alt="Visa">
                <img class="mr-2" width="45px"
                  src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                  alt="American Express">
                <img class="mr-2" width="45px"
                  src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                  alt="Mastercard">
              </div>
            </div>
            <!-- Card -->

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4">

            <!-- Card -->
            <div class="card mb-4">
              <div class="card-body">

                <h5 class="mb-3">The total amount of</h5>

                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                    Subtotal amount
                    <span id="subtotamount"></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center px-0 dropdown">
                    <!-- <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style = "padding:0px">
                      Colombo 1 - 15
                    </a> -->
                    <a class="nav-link dropdown-toggle waves-effect shipping1" id="navbarDropdownMenuLink3" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true" style = "padding:0px" > Colombo 1 - 15 </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-shippingitems dropdown-item" href="javascript:void(0)" id="shipping1">Colombo 1 - 15</a>
                      <a class="dropdown-shippingitems dropdown-item" href="javascript:void(0)" id="shipping2">Colombo suburbs</a>
                      <a class="dropdown-shippingitems dropdown-item" href="javascript:void(0)" id="shipping3">Outside Colombo</a>
                    </div>
                    <span id="shipment">Rs. 250</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                      <strong>The total amount of</strong>
                    </div>
                    <span><strong id="total">Rs. 0.00</strong></span>
                  </li>
                </ul>

                <button type="button" class="btn btn-primary btn-block waves-effect waves-light" id="gotocheckout">go to
                  checkout</button>

              </div>
            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">
              <div class="card-body">

                <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample"
                  aria-expanded="false" aria-controls="collapseExample">
                  Add a discount code (optional)
                  <span><i class="fas fa-chevron-down pt-1"></i></span>
                </a>

                <div class="collapse" id="collapseExample">
                  <div class="mt-3">
                    <div class="md-form md-outline mb-0">
                      <input type="text" id="discount-code" class="form-control font-weight-light"
                        placeholder="Enter discount code">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Card -->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->
        <!--modals-->
        <!--sign-in modals-->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true" id="signinmdl">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="d-flex align-items-center h-100">
                  <div class="container text-center py-5">
                    <h3 class="mb-0">Sign in</h3>
                  </div>
                </div>
                <div class="container">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                  <!--Grid column-->
                  <div class="col-md-6">
                    <!--Section: Content-->
                    <section class="mb-5">
                      <form action="../Service/site.services.php" id="logging" method="post" onsubmit="return false">
                        <div class="info"></div>
                        <div class="md-form md-outline">
                          <input type="email" id="email" class="form-control" name="email" required="">
                          <label data-error="wrong" data-success="right" for="email">Your email</label>
                        </div>
                        <div class="md-form md-outline">
                          <input type="password" id="password" class="form-control" name="password" required="">
                          <label data-error="wrong" data-success="right" for="password">Your password</label>
                        </div>
                        <input type="hidden" name="section" id="section" value="sign-in">
                        <input type="hidden" name="operation" id="operation" value="sign-in">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="form-check pl-0 mb-3">
                          <input type="checkbox" class="form-check-input filled-in" id="new">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="new">Remember me</label>
                        </div>
                        <p><a href="">Forgot password?</a></p>
                      </div>
                      <div class="text-center pb-2">

                        <button type="submit" class="btn btn-primary mb-4 waves-effect waves-light" id="btnsignin">Sign in</button>
                        
                        <p>Not a member? <a href="javascript:void(0)" id="registerlink">Register</a></p>

                        <p>or sign in with:</p>

                        <a type="button" class="btn-floating btn-fb btn-sm mr-1 waves-effect waves-light">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                        <a type="button" class="btn-floating btn-tw btn-sm mr-1 waves-effect waves-light">
                          <i class="fab fa-twitter"></i>
                        </a>
                        <a type="button" class="btn-floating btn-li btn-sm mr-1 waves-effect waves-light">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a type="button" class="btn-floating btn-git btn-sm waves-effect waves-light">
                          <i class="fab fa-github"></i>
                        </a>
                      </div>
                    </form>
                    </section>
                    <!--Section: Content-->
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
            </div>
          </div>
        </div>
        <!--sign-in modals-->
        <!--sign-up modals-->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true" id="signupmdl">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="d-flex align-items-center h-100">
                  <div class="container text-center py-5">
                    <h3 class="mb-0">Sign up</h3>
                  </div>
                </div>
                <div class="container">

                <!--Grid row-->
                <div class="row d-flex justify-content-center">

                  <!--Grid column-->
                  <div class="col-md-6">

                    <!--Section: Content-->
                    <section class="mt-4 mb-5">
                      <form onsubmit="return false" action = "../Service/site.services.php" method="post" id="reg">
                        <div class="form-row">
                          <div class="col">
                            <div class="md-form md-outline mt-0">
                              <input type="text" id="materialRegisterFormFirstName" class="form-control" name="firstname" required>
                              <label for="materialRegisterFormFirstName">First name</label>
                            </div>
                          </div>
                          <div class="col">
                            <div class="md-form md-outline mt-0">
                              <input type="text" id="materialRegisterFormLastName" class="form-control" name="lastname" required>
                              <label for="materialRegisterFormLastName">Last name</label>
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="md-form md-outline mt-0">
                          <input type="email" id="materialRegisterFormemail" class="form-control" name="email" required>
                          <label for="materialRegisterFormemail" >Email</label>
                          <small id="egemail" class="form-text text-muted text-left">Ex. someone@company.com</small>
                        </div>        
                        <div class="form-row" style="max-width: 537px;">
                          <div class="col-sm-2">
                            <div class="md-form md-outline mt-0">
                              <input type="text" id="cntrycod" class="form-control" value = "+94" readonly >
                            </div>
                          </div>
                          <div class="col">
                            <div class="md-form md-outline mt-0">
                              <input type="text" id="telephonenumber" class="form-control" required>
                              <label for="telephonenumber">Telephone</label>
                              <small id="egtp" class="form-text text-muted text-left">Ex. 712345678</small>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="md-form md-outline mt-0">
                              <input type="text" id="onetimepassword" class="form-control">
                              <label for="onetimepassword">OTP</label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="md-form md-outline mt-0" style="min-width: 93.3px;">
                                  <button type="button" class="btn btn-light btn-md mr-1 mb-2 waves-effect waves-light" id="btnsend" style="width: 93.3px;">Send</button>
                                  <small id="passwordHelpBlock" class="form-text text-muted text-center">(05:00)</small>
                            </div>
                          </div>
                        </div> 
                        <div class="md-form md-outline mt-0">
                          <input type="password" id="defaultForm-pass" class="form-control" name="password" required>
                          <label data-error="wrong" data-success="right" for="defaultForm-pass" >Your password</label>
                          <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                            At least 8 characters and 1 digit
                          </small>
                          
                        </div>        
                      <div class="text-center pb-2">
                  
                        <div class="form-check pl-0 mb-3">
                          <input type="checkbox" class="form-check-input filled-in" id="new1">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="new1">Subscribe to our newsletter</label>
                        </div>
                  
                      </div>
                  
                      <div class="text-center mb-2">
                        <input type='hidden' name="tpno" id="tpno">
                        <input type='hidden' name="section" id="sectionsignup" >
                        <input type='hidden' name="operation" id="operationsignup">
                        <button type="submit" class="btn btn-primary mb-4" id="btnsignup">Sign Up</button>  
                        <p>or sign up with:</p>
                  
                        <a type="button" class="btn-floating btn-fb btn-sm mr-1">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                        <a type="button" class="btn-floating btn-tw btn-sm mr-1">
                          <i class="fab fa-twitter"></i>
                        </a>
                        <a type="button" class="btn-floating btn-li btn-sm mr-1">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a type="button" class="btn-floating btn-git btn-sm">
                          <i class="fab fa-github"></i>
                        </a>
                  
                        <hr class="mt-4">
                  
                        <p>By clicking
                          <em>Sign up</em> you agree to our
                          <a href="">terms of service</a>
                        </p>
                  
                      </div>
                      </form>
                    </section>
                    <!--Section: Content-->
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Block Content-->
    </div>
    <!--sign-up modals-->
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