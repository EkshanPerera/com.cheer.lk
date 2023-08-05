// function changeTempVal(){
//     var amount = $(".quantity").val()*parseFloat($("#price").text().substring(3));
//     var shipment = parseFloat($("#shipment").text().substring(3));
//     var totamt = amount + shipment;
//     $("#tempVal").text('Rs. '+amount);
//     $("#totamt").text('Rs. '+totamt);
// }
var section = "";
function loadcart() {
    section = 'cart';
    subtotamount();
    var resultset = "<hr class=\"mb-4\"></hr>";
    if (localStorage['cart'] !== undefined) {
        $(".badge").text(Object.keys(JSON.parse(localStorage.getItem("cart"))).length);
        $(".itemcount").text(Object.keys(JSON.parse(localStorage.getItem("cart"))).length);
        $.each(JSON.parse(localStorage.getItem("cart")), function (i, item) {
            $.ajax({
                url: "../Service/product.backend.php",
                method: "post",
                dataType: "json",
                data: { "operation": "availability", "Colour": item.colour, "Size": item.size, "model": item.ModelNo },
                success: function (availabledata) {
                    var inventorycount = availabledata.inventorycount;
                    var allocatedcount;
                    if (availabledata.allocatedcount == null)
                        allocatedcount = null;
                    else
                        allocatedcount = availabledata.allocatedcount['itemcount'];
                    var stockcount;
                    if (inventorycount == null) {
                        stockcount = 0;
                    } else {
                        if (allocatedcount == null) {
                            allocatedcount = 0;
                        }
                        stockcount = inventorycount.itemcount - allocatedcount;
                    };
                    $.ajax({
                        url: "../Service/cart.backend.php",
                        method: "post",
                        dataType: "json",
                        data: { "operation": "validation", "Colour": item.colour, "Size": item.size, "model": item.ModelNo },
                        success: function (data) {
                            if (stockcount >= item.itemcount) {
                                if (item.price.match(/[+-]?\d+(\.\d+)?/g)[0] / item.itemcount == parseFloat(data.RESULT[0].price)) {
                                    resultset += "<div class=\"row mb-4\">"
                                        + "<div class=\"col-md-5 col-lg-3 col-xl-3\">"
                                        + "<div class=\"view zoom overlay z-depth-1 rounded mb-3 mb-md-0\">"
                                        + "<img class=\"img-fluid w-100\""
                                        + " src=\"..\\img\\productsimg\\" + data.RESULT[0].mimg + "\" alt=\"Sample\">"
                                        + "<a href=\"#!\">"
                                        + "<div class=\"mask waves-effect waves-light\">"
                                        + "<img class=\"img-fluid w-100\""
                                        + " src=\"..\\img\\productsimg\\" + data.RESULT[0].mimg + "\">"
                                        + "<div class=\"mask rgba-black-slight waves-effect waves-light\"></div>"
                                        + "</div>"
                                        + "</a>"
                                        + "</div>"
                                        + "</div>"
                                        + "<div class=\"col-md-7 col-lg-9 col-xl-9\">"
                                        + "<div>"
                                        + "<div class=\"d-flex justify-content-between\">"
                                        + "<div>"
                                        + "<h5>" + data.RESULT[0].brandingname + "</h5>"
                                        + "<p class=\"mb-3 text-muted text-uppercase small modelno\" id=\"" + item.ModelNo + "\">" + data.RESULT[0].description + " - " + item.ModelNo + "</p>"
                                        + "<p class=\"mb-2 text-muted text-uppercase small colour\">Color: <label class=\"btn rounded-circle " + item.colour + " p-3 m-2 waves-effect waves-light colour\" id=" + item.colour + "></lable></p>"
                                        + "<p class=\"mb-3 text-muted text-uppercase small size\" id=\"" + item.size + "\">Size: " + item.size + "</p>"
                                        + "</div>"
                                        + "<div>"
                                        + "<div class=\"def-number-input number-input safari_only mb-0\">"
                                        + "<button onclick=\"this.parentNode.querySelector('input[type=number]').stepDown()\" "
                                        + " class=\"minus controller\" style=\"vertical-align: middle;\"></button>"
                                        + "<input class=\"quantity\" min=\"1\" max=\"" + stockcount + "\" name=\"quantity\"  value=\"" + item.itemcount + "\"  type=\"number\" id='itemcount" + i + "' readonly>"
                                        + "<button onclick=\"this.parentNode.querySelector('input[type=number]').stepUp()\""
                                        + " class=\"plus controller\" style=\"vertical-align: middle;\"></button>"
                                        + "</div>"
                                        + "<small id=\"notepasswordHelpBlock\" class=\"form-text text-muted text-center\">"
                                        + "(Note, " + stockcount + " pieces left)"
                                        + "</small>"
                                        + "</div>"
                                        + "</div>"
                                        + "<div class=\"d-flex justify-content-between align-items-center\">"
                                        + "<div>"
                                        + "<a href=\"#!\" type=\"button\" class=\"card-link-secondary small text-uppercase mr-3\"><i"
                                        + " class=\"fas fa-trash-alt mr-1\"></i> Remove item </a>"
                                        + "<a href=\"#!\" type=\"button\" class=\"card-link-secondary small text-uppercase\"><i"
                                        + " class=\"fas fa-heart mr-1\"></i> Move to wish list </a>"
                                        + "</div>"
                                        + "<p class=\"mb-0\"><span><strong id='itemprice" + i + "' class='itemprice'>" + item.price + "</strong></span></p>"
                                        + "</div>"
                                        + "</div>"
                                        + "</div>"
                                        + "</div>"
                                        + "<hr class=\"mb-4\"></hr>";
                                    $("div.itemlist").html(resultset);
                                    subtotamount();
                                }
                            }
                        }
                    })
                }
            })
        });
    } else {
        $("div.itemlist").html("<h1 class=\"text-primary mb-0\"><i class=\"fas fa-info-circle mr-1\"></i>Your shopping cart is empty</h1>");
        $(".itemcount").text("0");
    }
}

function availability(Model, Colour, Size, quantity, priceid) {
    $.ajax({
        url: "../Service/product.backend.php",
        method: "post",
        dataType: "json",
        data: { "operation": "availability", "model": Model, "Colour": Colour, "Size": Size },
        success: function (data) {
            var inventorycount = data.inventorycount;
            var allocatedcount;
            if (data.allocatedcount == null)
                allocatedcount = null;
            else
                allocatedcount = data.allocatedcount['itemcount'];
            var stockcount;
            if (inventorycount == null) {
                stockcount = 0;
            } else {
                if (allocatedcount == null) {
                    allocatedcount = 0;
                }
                stockcount = inventorycount.itemcount - allocatedcount;
            };
            if (quantity <= stockcount) {
                $("#" + priceid).text("Rs. " + (parseFloat(quantity * data.price.price).toFixed(2)));
                subtotamount();
            }

        }
    })
}

function loadbuynow() {
    section = 'buynow';
    if (localStorage['cart'] !== undefined) {
        $(".badge").text(Object.keys(JSON.parse(localStorage.getItem("cart"))).length);
    }
    if (localStorage['buynow'] !== undefined) {
        $(".init").text("");
        resultset = "<hr class=\"mb-4\"></hr>";
        $.each(JSON.parse(localStorage.getItem("buynow")), function (i, item) {
            $.ajax({
                url: "../Service/product.backend.php",
                method: "post",
                dataType: "json",
                data: { "operation": "availability", "Colour": item.colour, "Size": item.size, "model": item.ModelNo },
                success: function (availabledata) {
                    var inventorycount = availabledata.inventorycount;
                    var allocatedcount;
                    if (availabledata.allocatedcount == null)
                        allocatedcount = null;
                    else
                        allocatedcount = availabledata.allocatedcount['itemcount'];
                    var stockcount;
                    if (inventorycount == null) {
                        stockcount = 0;
                    } else {
                        if (allocatedcount == null) {
                            allocatedcount = 0;
                        }
                        stockcount = inventorycount.itemcount - allocatedcount;
                    };
                    $.ajax({
                        url: "../Service/cart.backend.php",
                        method: "post",
                        dataType: "json",
                        data: { "operation": "validation", "Colour": item.colour, "Size": item.size, "model": item.ModelNo },
                        success: function (data) {
                            if (stockcount >= item.itemcount) {
                                if (item.price.match(/[+-]?\d+(\.\d+)?/g)[0] / item.itemcount == parseFloat(data.RESULT[0].price)) {
                                    resultset += "<div class=\"row mb-4\">"
                                        + "<div class=\"col-md-5 col-lg-3 col-xl-3\">"
                                        + "<div class=\"view zoom overlay z-depth-1 rounded mb-3 mb-md-0\">"
                                        + "<img class=\"img-fluid w-100\""
                                        + " src=\"..\\img\\productsimg\\" + data.RESULT[0].mimg + "\" alt=\"Sample\">"
                                        + "<a href=\"#!\">"
                                        + "<div class=\"mask waves-effect waves-light\">"
                                        + "<img class=\"img-fluid w-100\""
                                        + " src=\"..\\img\\productsimg\\" + data.RESULT[0].mimg + "\">"
                                        + "<div class=\"mask rgba-black-slight waves-effect waves-light\"></div>"
                                        + "</div>"
                                        + "</a>"
                                        + "</div>"
                                        + "</div>"
                                        + "<div class=\"col-md-7 col-lg-9 col-xl-9\">"
                                        + "<div>"
                                        + "<div class=\"d-flex justify-content-between\">"
                                        + "<div>"
                                        + "<h5>" + data.RESULT[0].brandingname + "</h5>"
                                        + "<p class=\"mb-3 text-muted text-uppercase small modelno\" id=\"" + item.ModelNo + "\">" + data.RESULT[0].description + " - " + item.ModelNo + "</p>"
                                        + "<p class=\"mb-2 text-muted text-uppercase small colour\">Color: <label class=\"btn rounded-circle " + item.colour + " p-3 m-2 waves-effect waves-light colour\" id=" + item.colour + "></lable></p>"
                                        + "<p class=\"mb-3 text-muted text-uppercase small size\" id=\"" + item.size + "\">Size: " + item.size + "</p>"
                                        + "</div>"
                                        + "<div>"
                                        + "<div class=\"def-number-input number-input safari_only mb-0\">"
                                        + "<button onclick=\"this.parentNode.querySelector('input[type=number]').stepDown()\" "
                                        + " class=\"minus controller\" style=\"vertical-align: middle;\"></button>"
                                        + "<input class=\"quantity\" min=\"1\" max=\"" + stockcount + "\" name=\"quantity\"  value=\"" + item.itemcount + "\"  type=\"number\" id='itemcount" + i + "' readonly>"
                                        + "<button onclick=\"this.parentNode.querySelector('input[type=number]').stepUp()\""
                                        + " class=\"plus controller\" style=\"vertical-align: middle;\"></button>"
                                        + "</div>"
                                        + "<small id=\"notepasswordHelpBlock\" class=\"form-text text-muted text-center\">"
                                        + "(Note, " + stockcount + " pieces left)"
                                        + "</small>"
                                        + "</div>"
                                        + "</div>"
                                        + "<div class=\"d-flex justify-content-between align-items-center\">"
                                        + "<div>"
                                        + "<a href=\"#!\" type=\"button\" class=\"card-link-secondary small text-uppercase mr-3\"><i"
                                        + " class=\"fas fa-trash-alt mr-1\"></i> Remove item </a>"
                                        + "<a href=\"#!\" type=\"button\" class=\"card-link-secondary small text-uppercase\"><i"
                                        + " class=\"fas fa-heart mr-1\"></i> Move to wish list </a>"
                                        + "</div>"
                                        + "<p class=\"mb-0\"><span><strong id='itemprice" + i + "' class='itemprice'>" + item.price + "</strong></span></p>"
                                        + "</div>"
                                        + "</div>"
                                        + "</div>"
                                        + "</div>"
                                        + "<hr class=\"mb-4\"></hr>";
                                    $("div.itemlist").html(resultset);
                                    subtotamount();
                                }
                            }
                        }
                    })
                }
            })
        });
    } else {
        $("div.itemlist").html("<h1 class=\"text-primary mb-0\"><i class=\"fas fa-info-circle mr-1\"></i>Your shopping cart is empty</h1>");
    }
}
function sign() {
    $("div.info").html("");
    var form = $("#logging");
    var url = form.attr('action');
    var email = $("#email").val();
    var password = $("#password").val();
    if (email == "" || password == "");
    else {
        $.ajax({
            method: "POST",
            url: url,
            dataType: "json",
            data: form.serialize(),
            success: function (data) {
                console.log(data);
                if (data.RESULT == "SUCCESS") {
                    $("#signinmdl").modal('hide');
                    process();
                } else {
                    $("div.info").html("<small id='valditypasswordHelpBlock' class='form-text text-muted text-center text-danger'><i class=\"fas fa-info-circle\"></i> Your account email or password is incorrect.</small>");
                }
            }
        });
    }
}
function signup() {
    var form = $("#logging");
    var url = form.attr('action');
    var email = $("#email").val();
    var password = $("#password").val();
    if (email == "" || password == "");
    else {
        $.ajax({
            method: "POST",
            url: url,
            dataType: "json",
            data: form.serialize(),
            success: function (data) {
                console.log(data);
                if (data.RESULT == "SUCCESS") {
                    $("#signinmdl").modal('hide');
                    process();
                } else {
                    $("div.info").html("<small id='passwordHelpBlock' class='form-text text-muted text-center text-danger'><i class=\"fas fa-info-circle\"></i> Your account email or password is incorrect.</small>");
                }
            }
        });
    }
}

function signin() {
    $("#signinmdl").modal('show');
}
function signupmdl() {
    $("#signinmdl").modal('hide');
    $("#signupmdl").modal('show');
}
function process() {
    var dataset = [];
    var price;
    var itemcount;
    var request = [];
    if (section == "cart") {
        price = "";
        itemcount = "";
        if (localStorage['cart'] !== undefined) {
            $.each(JSON.parse(localStorage.getItem("cart")), function (i, item) {
                price = parseFloat($("#itemprice" + i).text().match(/[+-]?\d+(\.\d+)?/g));
                itemcount = $("#itemcount" + i).val();
                dataset.push({ 'ModelNo': item.ModelNo, 'brandingname': item.brandingname, 'itemcount': itemcount, 'colour': item.colour, 'size': item.size, 'price': price });
            });
        }
    } else if (section == "buynow") {
        price = "";
        itemcount = "";
        if (localStorage['buynow'] !== undefined) {
            price = parseFloat($("#itemprice0").text().match(/[+-]?\d+(\.\d+)?/g));
            $.each(JSON.parse(localStorage.getItem("buynow")), function (i, item) {
                itemcount = $("#itemcount" + i).val();
                dataset.push({ 'ModelNo': item.ModelNo, 'brandingname': item.brandingname, 'itemcount': itemcount, 'colour': item.colour, 'size': item.size, 'price': price });
            });
        }
    }
    request['items'] = dataset;
    request['section'] = section;
    request['common'] = { 'totprice': $("#total").text().match(/[+-]?\d+(\.\d+)?/g)[0], 'subamount': $("#subtotamount").text().match(/[+-]?\d+(\.\d+)?/g)[0], 'shiping': $("#navbarDropdownMenuLink3").attr("class").split(" ").pop() };
    $.redirect('http://slimnfit.lk/checkout/', { 'detaset': request }, 'post');
}
function isvalidatemdl() {
    var firstname = $("#materialRegisterFormFirstName").val();
    var lastname = $("#materialRegisterFormLastName").val();
    emailvalidation();
    if (tpvalidity == false || pwvalidity == false || emailvalidity == false || email == undefined || firstname == "" || lastname == "") {
        if (tpvalidity == false) {
            $("#egtp").addClass("text-danger");
            $("#egtp").html("<i class=\"fas fa-info-circle\"></i> Please validate your telephone number");
        }
        if (emailvalidity == false) {
            toastr.error("Please try another email", "Email is alredy exists", { timeOut: 3500 });
        }
        return false;
    } else {
        $("#egtp").removeClass("text-danger");
        $("#egtp").html("Ex. 712345678");
        $('#btnsignup').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> SIGN UP');
        $("#tpno").val('94' + mobile);
        $("#sectionsignup").val("sign-up");
        $("#operationsignup").val("addmdl");
        return true;
    }

}
function subtotamount() {
    var sum = 0.00;
    $(".itemprice").each(function () {
        sum += parseFloat($(this).text().match(/[+-]?\d+(\.\d+)?/g));

    });
    $("#subtotamount").text("Rs. " + sum);
    totalcount();
}
function totalcount() {
    var sum = 0.00;
    sum = parseFloat($("#subtotamount").text().match(/[+-]?\d+(\.\d+)?/g)) + parseFloat($("#shipment").text().match(/[+-]?\d+(\.\d+)?/g));
    $("#total").text("Rs. " + sum);
}