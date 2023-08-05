<?php
session_start();
if (!isset($_SESSION["usrname"])) {
  header('Location: http://slimnfit.lk');
}
$_SESSION["section"] = $_POST['detaset']['section'];
if (isset($_SESSION["ordering"]) && !isset($_SESSION['orderprosessed'])) {
  header('Location: http://slimnfit.lk/cart/?34a6e5d64ade17ef4e51612c50dd72f5=9b24bfb7d238ca1de5650f754e3f84de');
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
  <script type="text/javascript" src="http://slimnfit.lk/js/checkout.js"></script>
  <script type="text/javascript" src="http://slimnfit.lk/js/checkout.triggers.js"></script>
  <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
  <script>
    const dataset = <?php echo json_encode($_POST['detaset']); ?>;
    const section = "<?php echo $_SESSION["section"]; ?>";
    var items = "";
    if (localStorage[section] == undefined) {
      window.history.back();
    }
    $.each(dataset.items, function(i, item) {
      if (i == 0) {
        items = item.brandingname;
      } else {
        if (dataset.items[i - 1].brandingname != item.brandingname) {
          items = items + "," + item.brandingname;
        }
      }
    });

    function placeorder(orderID, paymentmethod, handleData) {
      var addressline01 = $("#form14").val();
      var addressline02 = $("#form15").val();
      var addressline03 = $("#form16").val();
      var addressline04 = $("#form17").val();
      var postalcode = $("#form18").val();
      $.ajax({
        url: 'http://slimnfit.lk/Service/site.services.php',
        method: 'post',
        dataType: 'json',
        data: {
          'section': 'ordering',
          'orderID': orderID,
          'operation': 'placeorder',
          'addressline01': addressline01,
          'addressline02': addressline02,
          'addressline03': addressline03,
          'addressline04': addressline04,
          'postalcode': postalcode,
          'paymentmethod': paymentmethod,
          'addressid': addressid,
          'telephoneid': telephoneid,
          'dataset': dataset,
          'userid': <?php echo $_SESSION['usrid']; ?>
        },
        success: function(data) {
          handleData(data.RESULT);
        }
      })
    }

    function deleteorder(orderID) {
      $.ajax({
        url: 'http://slimnfit.lk/Service/site.services.php',
        method: 'post',
        dataType: 'json',
        data: {
          'section': 'ordering',
          'orderID': orderID,
          'operation': 'deleteorder'
        },
        success: function(data) {
          console.log(data);
        }
      })
    }
    $(document).ready(function() {
      load(<?php echo $_SESSION['usrid']; ?>);
      showaddress(<?php echo $_SESSION['usrid']; ?>);
    });

    payhere.onCompleted = function onCompleted(orderID) {
      console.log("Payment completed. OrderID:" + orderID);
      clearlocalstorage(section);
    };
    payhere.onDismissed = function onDismissed() {
      console.log("Payment dismissed");
      deleteorder(orderID);
    };
    payhere.onError = function onError(error) {
      console.log("Error:" + error);
    };
    const orderID = <?php echo (mt_rand(1111111, 9999999)) . (intval(microtime(true) * 1000)); ?>;
    var payment = {
      "sandbox": true,
      "merchant_id": "121XXXX", // Replace your Merchant ID
      "return_url": undefined, // Important
      "cancel_url": undefined, // Important
      "notify_url": "http://slimnfit.lk/service/notify.php",
      "order_id": orderID,
      "items": items,
      "amount": dataset.common.totprice,
      "currency": "LKR",
      "first_name": $("#firstName").val(),
      "last_name": $("#lastName").val(),
      "email": $("#form20").val(),
      "phone": $("#form19").val(),
      "address": $("#form14").val() + "," + $("#form15").val(),
      "city": "Colombo",
      "country": "Sri Lanka"
    };
  </script>
  <stule>
</head>

<body class="skin-light">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand" href="https://mdbecommerce.com/">
          <i class="fab fa-mdb fa-3x" alt="mdb logo"></i>
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
              <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
          <h3 class="mb-0">Checkout</h3>
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
          <div class="col-lg-8 mb-4">

            <!-- Card -->
            <div class="card wish-list pb-1">
              <div class="card-body">

                <h5 class="mb-2">Billing details</h5>

                <!-- Grid row -->
                <div class="form-row">

                  <!-- Grid column -->
                  <div class="col">

                    <!-- First name -->
                    <div class="md-form md-outline mb-0">
                      <input type="text" id="firstName" class="form-control mb-0 mb-lg-2">
                      <label for="firstName" class="label">First name</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col">
                    <!-- Last name -->
                    <div class="md-form md-outline">
                      <input type="text" id="lastName" class="form-control">
                      <label for="lastName" class="label">Last name</label>
                    </div>

                  </div>
                  <!-- Grid column -->


                </div>
                <!-- Grid row -->

                <!-- Company name -->
                <!-- <div class="md-form md-outline my-0">
                  <input type="text" id="companyName" class="form-control mb-0">
                  <label for="companyName">Company name (optional)</label>
                </div> -->

                <!-- Country -->
                <!-- <div class="d-flex flex-wrap">
                  <div class="select-outline position-relative w-100">
                    <select class="mdb-select md-form md-outline">
                      <option value="" disabled selected>Choose your option</option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>Country</label>
                  </div>
                </div> -->

                <div class="md-outline">
                  <!-- Address Part 1 -->
                  <div class="md-form md-outline">
                    <input type="text" id="form14" placeholder="House number or name" class="form-control">
                    <label for="form14" class="label">Address</label>
                  </div>

                  <!-- Address Part 2 -->
                  <div class="md-form md-outline">
                    <input type="text" id="form15" placeholder="Street" class="form-control">
                    <label for="form15" class="label">Address</label>
                  </div>
                  <!-- Address Part 2 -->
                  <div class="md-form md-outline">
                    <input type="text" id="form16" placeholder="Suberb(optional)" class="form-control">
                    <label for="form16" class="label">Address</label>
                  </div>
                  <div class="form-row">
                    <div class="col-4">
                      <div class="md-form md-outline mt-0">
                        <input type="text" id="form17" class="form-control" placeholder="Town / City" required="">
                        <label for="form17" class="label">Address</label>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="md-form md-outline mt-0">
                        <input type="text" id="form18" class="form-control" placeholder="Postcode / ZIP" required="">
                        <label for="form18" class="">Address</label>
                        <div class="valid-feedback">
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="md-form md-outline mt-0">
                        <!-- <input type="text" id="form18" class="form-control" placeholder="Postcode / ZIP" required="" >
                        <label for="form18" class="">Address</label> -->
                        <button type="submit" class="btn btn-light btn-block waves-effect waves-light" id="btnaddnewaddress" style="line-height: .5;text-transform: unset;">Add a New Address</button>
                        <div class="valid-feedback">
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- <div class="form-row">
                  <div class = "col"> -->
                <!-- Town / City -->
                <!-- <div class="md-form md-outline">
                      <input type="text" id="form17" class="form-control">
                      <label for="form17">Town / City</label>
                    </div>
                  </div> 
                  <div class = "col">-->
                <!-- Postcode / ZIP -->
                <!-- <div class="md-form md-outline">
                      <input type="text" id="form16" class="form-control">
                      <label for="form16">Postcode / ZIP</label>
                    </div>
                  </div>
                </div> -->
                <!-- Phone -->


                <!-- Email address -->
                <div class="md-form md-outline">
                  <input type="email" id="form20" class="form-control">
                  <label for="form20" class="label">Email address</label>
                </div>
                <div class="form-row">
                  <div class="col-8">
                    <div class="md-form md-outline mt-0">
                      <input type="text" id="form19" class="form-control" required="">
                      <label for="form19" class="label">Phone</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="md-form md-outline mt-0">
                      <button type="submit" class="btn btn-light btn-block waves-effect waves-light" id="" style="line-height: .5;text-transform: unset;">Change</button>
                      <div class="valid-feedback">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Additional information -->
                <!-- <div class="md-form md-outline">
                  <textarea id="form76" class="md-textarea form-control" rows="4"></textarea>
                  <label for="form76">Additional information</label>
                </div>

                <div class="form-check pl-0 mb-4 mb-lg-0">
                  <input type="checkbox" class="form-check-input filled-in" id="new3">
                  <label class="form-check-label small text-uppercase card-link-secondary" for="new3">Create an
                    account?</label>
                </div> -->

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
                    <span id='tempamount'></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center px-0" id="navbarDropdownMenuLink3">
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                      <strong>The total amount of</strong>
                    </div>
                    <span><strong id='totamount'></strong></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                      <div>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                        <label class="form-check-label" for="flexRadioDefault1"> Cash on delivary </label>
                      </div>
                      <div>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
                        <label class="form-check-label" for="flexRadioDefault2"> PayHere </label>
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="form-check">
                  <button type="submit" class="btn btn-primary btn-block waves-effect waves-light" id='checkout'>Make purchase</button>
                </div>
              </div>
            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">
              <div class="card-body">
                <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  Add a discount code (optional)
                  <span><i class="fas fa-chevron-down pt-1"></i></span>
                </a>

                <div class="collapse" id="collapseExample">
                  <div class="mt-3">
                    <div class="md-form md-outline mb-0">
                      <input type="text" id="discount-code" class="form-control font-weight-light" placeholder="Enter discount code">
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

      </section>
      <!--Section: Block Content-->


    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="mdladdnewaddress">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="d-flex align-items-center h-100">
            <div class="container text-center py-5">
              <h3 class="mb-0">Order Details</h3>
            </div>
          </div>
          <div class="container">
            <div class="md-outline">
              <!-- Address Part 1 -->
              <div class="md-form md-outline">
                <input type="text" id="form142" placeholder="House number or name" class="form-control">
                <label for="form142" class="label">Address</label>
              </div>

              <!-- Address Part 2 -->
              <div class="md-form md-outline">
                <input type="text" id="form152" placeholder="Street" class="form-control">
                <label for="form152" class="label">Address</label>
              </div>
              <!-- Address Part 2 -->
              <div class="md-form md-outline">
                <input type="text" id="form162" placeholder="Suberb(optional)" class="form-control">
                <label for="form162" class="label">Address</label>
              </div>
              <div class="form-row addressfooter">
                <div class="col">
                  <div class="md-form md-outline mt-0">
                    <input type="text" id="form172" class="form-control" placeholder="Town / City" required="">
                    <label for="form172" class="label">Address</label>
                  </div>
                </div>
                <div class="col">
                  <div class="md-form md-outline mt-0">
                    <input type="text" id="form182" class="form-control" placeholder="Postcode / ZIP" required="">
                    <label for="form182" class="">Address</label>
                    <div class="valid-feedback">
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="md-form md-outline mt-0">
                    <!-- <input type="text" id="form18" class="form-control" placeholder="Postcode / ZIP" required="" >
                        <label for="form18" class="">Address</label> -->
                    <button type="submit" class="btn btn-light btn-block waves-effect waves-light" id="" style="line-height: .5;text-transform: unset;">Add</button>
                    <div class="valid-feedback">
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="addressview row mb-4">
                
              </div>
            </div>
          </div>
        </div>
      </div>
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