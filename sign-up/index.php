<?php
session_start();
if (isset($_SESSION["usrname"])) {
  header('Location: http://cheer.lk');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <?php include "../includes/cssjs.php";
  echo $cssjs; ?>
  <script type="text/javascript" src="http://cheer.lk/js/sign-up.triggers.js"></script>
  <script type="text/javascript" src="http://cheer.lk/js/sign-up.js"></script>
  <script>
    $(document).ready(function() {
      load();
    });
  </script>
</head>

<body class="skin-light">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand" href="http://cheer.lk/">
          <span class="icon">SNF</span>
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
              <a href="#!" type="button" class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light">Sign
                up</a>
            </li>
          </ul>

        </div>
        <!-- Links -->
      </div>
    </nav>
    <!-- Navbar -->

    <div class="jumbotron color-grey-light mt-70">
      <div class="d-flex align-items-center h-100">
        <div class="container text-center py-5">
          <h3 class="mb-0">Sign up</h3>
        </div>
      </div>
    </div>

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main>
    <div class="container">

      <!--Grid row-->
      <div class="row d-flex justify-content-center">

        <!--Grid column-->
        <div class="col-md-6">

          <!--Section: Content-->
          <section class="mt-4 mb-5">

            <form onsubmit="return isvalidate()" action="../Service/site.services.php" method="post">

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
                <label for="materialRegisterFormemail">Email</label>
                <small id="egemail" class="form-text text-muted text-left">Ex. someone@company.com</small>
              </div>
              <div class="form-row" style="max-width: 537px;">
                <div class="col-sm-2">
                  <div class="md-form md-outline mt-0">
                    <input type="text" id="cntrycod" class="form-control" value="+94" readonly>
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
                  <div class="md-form md-outline mt-0 " style="min-width: 93.3px;">
                    <button type="button" class="btn btn-light btn-md mr-1 mb-2 waves-effect waves-light" id="btnsend" style="width: 93.3px;">Send</button>
                    <small id="passwordHelpBlock" class="form-text text-muted text-center">(05:00)</small>
                  </div>
                </div>
              </div>
              <div class="md-form md-outline mt-0">
                <input type="password" id="defaultForm-pass" class="form-control" name="password" required>
                <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
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
                <input type='hidden' name="section" id="section">
                <input type='hidden' name="operation" id="operation">
                <input type='hidden' name="trigger" id="trigger">
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