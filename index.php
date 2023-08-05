<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <?php include "includes/cssjs.php";
  echo $cssjs; ?>
  <script type="text/javascript" src="http://slimnfit.lk/js/index.js"></script>
  <script type="text/javascript" src="http://slimnfit.lk/js/crypto.js"></script>
  <script type="text/javascript" src="http://slimnfit.lk/js/index.triggers.js"></script>
  <script>
    $(document).ready(function() {
      fillSideNavOrg();
      loadProduct($("#test").val());
    });
  </script>

</head>

<body class="skin-light">
  <div class="pageloader justify-content-center align-items-center">
    <img class="animation__wobble" src="http://slimnfit.lk/img/logo/slimnfit.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top scrolling-navbar navbar-transparent">

      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand" href="http://slimnfit.lk/">
          <span class="icon">SNF</span>
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="basicExampleNav">
          <!-- Right -->
          <ul class="navbar-nav ml-auto snavcontul">
            <li class="nav-item">
              <a href="http://slimnfit.lk/cart/?34a6e5d64ade17ef4e51612c50dd72f5=54013ba69c196820e56801f1ef5aad54" class="nav-link navbar-link-2 waves-effect">
                <span class="badge badge-pill red">0</span>
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
              <?php if (isset($_SESSION['usrname'])) {
                echo ("<a href='#!' type='button' class='btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light'>" . $_SESSION['usrname'] . "</a>");
              } else {
                echo ("<a href='http://slimnfit.lk/sign-in' type='button' class='btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light'>Sign in</a>");
              } ?>
            </li>
          </ul>

        </div>
        <!-- Links -->
      </div>

    </nav>
    <!-- Navbar -->

    <div class="jumbotron jumbotron-image color-grey-light" style="background-image: url('http://slimnfit.lk/img/carousel/webimage.jpeg'); height: 400px;">
      <div class="mask rgba-black-strong d-flex align-items-center h-100">
        <div class="container text-center white-text py-5">
          <img class="img-fluid " src="http://slimnfit.lk/img/logo/slimnfit.png" id="centerimg">
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
        <div class="col-md-3 mb-4">

          <!-- Section: Sidebar -->
          <section>

            <!-- Section: Categories -->
            <section>
              <span class='icon'></span>
              <h5 class="mb-3">Subcategories</h5>
              <input type="hidden" id="test" value="ALL">
              <h6 class="pt-3 pl-3"></h6>
              <div class="text-muted small text-uppercase mb-5 snavcont">
              </div>

            </section>
            <!-- Section: Categories -->

            <!-- Section: Filters -->

            <!-- Section: Filters -->

          </section>
          <!-- Section: Sidebar -->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-9 mb-4">
          <section class="mb-4">

            <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
              <input type="text" id="searchproduct" class="form-control mb-0" placeholder="Search...">
              <a href="#!" class="btn btn-flat btn-md px-3 waves-effect"><i class="fas fa-search fa-lg"></i></a>
            </div>

          </section>
          <!--Section: Block Content-->
          <div class="padded" style="margin-bottom: 5rem;"></div>
          <section>
            <div class="productWin">
              <div class="row d-flex justify-content-around align-items-center m-8">
                <div class="spinner-border" role="status" style="padding: 50px;">
                  <span class="visually-hidden"></span>
                </div>
              </div>
              <div class="row d-flex justify-content-around align-items-center m-8">
                <div class="spinner-border" role="status" style="padding: 50px;">
                  <span class="visually-hidden"></span>
                </div>
              </div>
              <div class="row d-flex justify-content-around align-items-center m-8">
                <div class="spinner-border" role="status" style="padding: 50px;">
                  <span class="visually-hidden"></span>
                </div>
              </div>
              <div class="row d-flex justify-content-around align-items-center m-8">
                <div class="spinner-border" role="status" style="padding: 50px;">
                  <span class="visually-hidden"></span>
                </div>
              </div>
            </div>
          </section>
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
    <div class="footer-copyright text-center py-3">© 2021 Developed by:
      <a href="https://www.linkedin.com/in/ekshan-perera-2826b0182"> Ekshan Perera</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</body>

</html>