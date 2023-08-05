function validateFirst() {
    if ($("#product").attr("class") == "null") {
        window.location.replace('../');
    }
}
function loadDetails() {
    if (localStorage['cart'] !== undefined) {
        $(".badge").text(Object.keys(JSON.parse(localStorage.getItem("cart"))).length);
    }
    var str = $("#product").text();
    $.ajax({
        url: "../Service/product.backend.php",
        method: "post",
        dataType: "json",
        data: { "operation": "load", "product": str },
        success: function (data) {
            console.log(data);
            var sizershtml = "";
            var colourhtml = "";
            if (data.RESULTS == "null") {
                window.location.replace('../');
            } else {
                $(".product_name").text(data.properties[0].brandingname);

                $(".prdescription").html(data.properties[0].description);
                $(".cat").text(data.properties[0].category);
                if (data.properties[0].minprice == data.properties[0].maxprice) {
                    $(".price").text("Rs. " + parseFloat(data.properties[0].minprice).toFixed(2));
                } else {
                    $(".price").text(("Rs. " + parseFloat(data.properties[0].minprice).toFixed(2)) + " - " + "Rs. " + parseFloat(data.properties[0].maxprice).toFixed(2));
                }
                if (data.properties[0].itemcount == '0') {
                    $("div.buyncart").html("<button type=\"button\" class=\"btn btn-default btn-md mr-1 mb-2 \" >Out of stock</button>");
                    $("#passwordHelpBlock").text("(No pieces left in total)");
                } else {
                    $("#passwordHelpBlock").text("(" + data.properties[0].itemcount + " pieces left in total)");
                }
                $("#aimg01").attr("href", "../img/productsimg/" + data.Image[0].VALUE1 + "");
                $("#img01").attr("src", "../img/productsimg/" + data.Image[0].VALUE1 + "");
                $("#navimg01").attr("src", "../img/productsimg/" + data.Image[0].VALUE1 + "");
                if (data.Image[0].VALUE2 != "") {
                    $("#aimg02").attr("href", "../img/productsimg/" + data.Image[0].VALUE2 + "");
                    $("#img02").attr("src", "../img/productsimg/" + data.Image[0].VALUE2 + "");
                    $("#navimg02").attr("src", "../img/productsimg/" + data.Image[0].VALUE2 + "");
                } else {
                    $("img").remove("#aimg02");
                    $("img").remove("#aimg02");
                    $("img").remove("#navimg02");
                }
                if (data.Image[0].VALUE3 != "") {
                    $("#aimg03").attr("href", "../img/productsimg/" + data.Image[0].VALUE3 + "");
                    $("#img03").attr("src", "../img/productsimg/" + data.Image[0].VALUE3 + "");
                    $("#navimg03").attr("src", "../img/productsimg/" + data.Image[0].VALUE3 + "");
                } else {
                    $("img").remove("#aimg03");
                    $("img").remove("#aimg03");
                    $("img").remove("#navimg03");
                }
                if (data.Image[0].VALUE4 != "") {
                    $("#aimg04").attr("href", "../img/productsimg/" + data.Image[0].VALUE4 + "");
                    $("#img04").attr("src", "../img/productsimg/" + data.Image[0].VALUE4 + "");
                    $("#navimg04").attr("src", "../img/productsimg/" + data.Image[0].VALUE4 + "");
                } else {
                    $("img").remove("#aimg04");
                    $("img").remove("#aimg04");
                    $("img").remove("#navimg04");
                }
                $(".size").html("Select size");
                $.each(data.sizes, function (i, item) {
                    sizershtml += "<div class='form-check form-check-inline pl-0'>"
                    if (item.size == "Free size") {
                        sizershtml += "<input type='radio' class='form-check-input' id='" + item.size + "' name='sizeinput' checked>"
                    } else {
                        sizershtml += "<input type='radio' class='form-check-input' id='" + item.size + "' name='sizeinput'>"
                    }
                    sizershtml += "<label class='form-check-label small text-uppercase card-link-secondary'"
                        + "for='" + item.size + "'>" + item.size + "</label>"
                        + "</div>";
                })
                $.each(data.colours, function (i, item) {
                    colourhtml += "<label class=\"btn rounded-circle " + item.colours + " p-3 m-2 waves-effect waves-light\">"
                        + "<input type=\"radio\" autocomplete=\"off\" name=\"colourinput\" id=" + item.colours + " class='form-check-input-colour'>"
                        + "</label>";
                })

                $("#form").html(sizershtml);
                $(".btn-color-group").html(colourhtml);

            }
            if (typeof changeTempVal === "function") {
                changeTempVal();
            }
        }
    })
    $.ajax({
        url: "../Service/product.backend.php",
        method: "post",
        dataType: "json",
        data: { "operation": "onetime", "cg": "Sub", "data": str.substring(0, 4) },
        success: function (data) {
            $("p.cat").text(data.RESULTS[0].disreption);
        }
    })
    $.ajax({
        url: "../Service/product.backend.php",
        method: "post",
        dataType: "json",
        data: { "operation": "relatedpro", "model": str, "category": str.substring(0, 4) },
        success: function (data) {
            var resultset = "";
            $.each(data.RESULTS, function (i, item) {

                resultset += "<div class='col-md-6 col-lg-3 mb-5'>"
                    + "<div class=''>"
                    + "<div class='view zoom overlay z-depth-2 rounded'>"
                    + "<a href='../product/?20f35e630daf44dbfa4c3f68f5399d8c=" + item.prcode + "' id='prcade'>"
                    + "<img class='img-fluid w-100'src='..\\img\\productsimg\\" + item.mimg + "' alt='Sample'>"
                    + "</a>"
                    + "</div>"
                    + "<div class='pt-4'>"
                    + "<h5>" + item.brandingname + "</h5>"
                // if (item.saleornot == '0'){
                //   resultset += "<h6>Rs."+item.newprice+"</h6>"
                // }else{
                //   resultset+="<h6>"
                //               +"<span class='text-danger mr-1'>Rs."+item.newprice+"</span>"
                //               +"<span class='text-grey'><s>Rs."+item.initprice+"</s></span>"
                //             +"</h6>"
                // }
                resultset += "<h6>Rs." + item.price + "</h6>"
                resultset += "</div>"
                    + "</div>"
                    + "</div>"

            });
            resultset += "</div></section></div></div>";
            $("div.relatedPro").html(resultset);

        }
    })
    fadepageloder();

}
function availability(Colour, Size, quantity) {
    var str = $("#product").text();
    var buyncart = "<button type=\"button\" class=\"btn btn-primary btn-md mr-1 mb-2\" id=\"buynow\" >Buy now</button>"
        + " <button type=\"button\" class=\"btn btn-light btn-md mr-1 mb-2\"  id=\"addtocart\"><i class=\"fas fa-shopping-cart pr-2\"></i>Add to"
        + " cart</button>";
    var btnoutofstock = "<button type=\"button\" class=\"btn btn-default btn-md mr-1 mb-2 \" >Out of stock</button>";
    $.ajax({
        url: "../Service/product.backend.php",
        method: "post",
        dataType: "json",
        data: { "operation": "availability", "model": str, "Colour": Colour, "Size": Size },
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
            if (stockcount == 0) {
                $("#passwordHelpBlock").text("(Note, 0 pieces left)");
                $('#buynow').attr('disabled', true);
                $('#addtocart').attr('disabled', true);
                $("div.buyncart").html(btnoutofstock);
                $(".quantity").attr({ 'max': '1' });
            } else {
                $("#passwordHelpBlock").text("(Note, " + stockcount + " pieces left)");
                $("div.buyncart").html(buyncart);
                $(".quantity").attr({ 'max': stockcount });
            }
            $("#itemprice").text("Rs. " + (parseFloat(quantity * data.price.price).toFixed(2)));
        }
    })
}
function addtocart() {
    if ($('input[name=sizeinput]:checked').val() != "on" || $('input[name=colourinput]:checked').val() != "on") {
        toastr.error("", "Please select the options", { timeOut: 2500 });
    } else {
        var ModelNo = $("#product").attr("class");
        var brandingname = $("#product_name").text();
        var itemcount = $(".quantity").val();
        var colour = $('input[name=colourinput]:checked').attr('id');
        var size = $('input[name=sizeinput]:checked').attr('id');
        var price = $("#itemprice").text();
        var cart = [];
        var adding = true;
        var resultset = "";
        if (localStorage['cart'] !== undefined) {
            $.each(JSON.parse(localStorage.getItem("cart")), function (i, item) {
                cart.push({ 'ModelNo': item.ModelNo, 'brandingname': brandingname, 'itemcount': item.itemcount, 'colour': item.colour, 'size': item.size, 'price': item.price });
            });
            $.each(cart, function (i, item) {
                if (item.ModelNo == ModelNo && item.colour == colour && item.size == size) {
                    adding = false;
                    cart[i]['itemcount'] = itemcount;
                    cart[i]['price'] = price;
                }
            });
        }
        if (adding) {
            cart.push({ 'ModelNo': ModelNo, 'brandingname': brandingname, 'itemcount': itemcount, 'colour': colour, 'size': size, 'price': price });
        }


        $(".badge").text(Object.keys(cart).length);
        localStorage.setItem("cart", JSON.stringify(cart));
        $("#txt").text("You now have " + Object.keys(cart).length + " items in your Shopping Cart.");
        $.each(cart, function (i, item) {
            resultset += "<li class=\"list-group-item justify-content-between\">"
                + "<b>" + item.brandingname + "</b></br> Size - " + item.size + "</br> Colour - " + item.colour + " "
                + "<span class=\"badge badge-success badge-pill\"> " + item.itemcount + "</span>"
                + "</li>";

        });
        $(".list-group").html(resultset);
        $("#fluidModalRightSuccess").modal("show");
        console.log(localStorage['cart']);
    }
}
function buynow() {
    if ($('input[name=sizeinput]:checked').val() != "on" || $('input[name=colourinput]:checked').val() != "on") {
        toastr.error("", "Please select the options", { timeOut: 2500 });
    } else {
        var ModelNo = $("#product").attr("class");
        var itemcount = $(".quantity").val();
        var brandingname = $("#product_name").text();
        var colour = $('input[name=colourinput]:checked').attr('id');
        var size = $('input[name=sizeinput]:checked').attr('id');
        var price = $("#itemprice").text();
        var cart = [];
        cart.push({ 'ModelNo': ModelNo, 'brandingname': brandingname, 'itemcount': itemcount, 'colour': colour, 'size': size, 'price': price });
        localStorage.setItem("buynow", JSON.stringify(cart));
        window.location.href = "http://slimnfit.lk/cart/?34a6e5d64ade17ef4e51612c50dd72f5=9b24bfb7d238ca1de5650f754e3f84de";
    }
}