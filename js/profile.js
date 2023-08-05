function loadusr(usrid) {
    $.ajax({
        url: "http://slimnfit.lk/Service/user.bakend.php",
        method: "post",
        dataType: "json",
        data: { 'operation': 'load', 'usrid': usrid },
        success: function (data) {
            console.log(data);
        }
    })
}

function loadordes(usrid) {
    var resultset = "";
    $.ajax({
        url: "http://slimnfit.lk/Service/user.bakend.php",
        method: "post",
        dataType: "json",
        data: { 'operation': 'loadorders', 'usrid': usrid },
        success: function (data) {
            $.each(data.ORDERS, function (i, item) {
                resultset +=
                    " <div class=\"col-md-6 mb-4\">" +
                    "     <div class=\"card mb-4\">" +
                    "         <div class=\"card-body\">" +
                    "             <p class=\"mb-4\"><span class=\"text-primary font-italic me-1\">Tracking # : </span>" + item.trackingno + "</p>" +
                    "             <p class=\"mb-1\" style=\"font-size: .77rem;\">Status</p>"
                if (item.trackingstage <= data.TRACKINGPRM[0].value) {
                    resultset +=
                        "             <div class=\"progress rounded mb-4\" style=\"height: 5px;\">" +
                        "             <div class=\"progress-bar\" role=\"progressbar\" style=\"width: " + item.trackingstage / data.TRACKINGPRM[0].value * 100 + "%\" aria-valuenow=\"80\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>" +
                        "             </div>"
                    for (let i = 0; i <= item.trackingstage; i++) {
                        resultset +=
                            "<p class=\"mb-1\" style=\"font-size: .77rem;\">" + data.TRACKINGSTAGES[i].description + "   <i class=\"fas fa-check fa-sm text-success\"></i> </p>";
                    }
                }
                else {
                    resultset +=
                        "<p class=\"mb-1 text-danger\" style=\"font-size: .77rem;\">" + data.TRACKINGSTAGES[item.trackingstage].description + "</p>"
                }

                resultset += "<a href=\"javascript:void(0)\" data-mdb-toggle=\"modal\" id=\"" + item.trackingno + "\" class=\"detailsmdl\"><p class=\"mb-1\" style=\"font-size: .77rem;\"><i class=\"fas fa-info-circle fa-sm\"></i>  Details</p> </a>" +
                    "         </div>" +
                    "     </div>" +
                    " </div>";

            })
            $(".productwin").html(resultset);
        }
    })
}

function showproducts(usrid, trackingno) {
    var resultset = "<hr class=\"mb-4\"></hr>";
    $.ajax({
        url: "http://slimnfit.lk/Service/user.bakend.php",
        method: "post",
        dataType: "json",
        data: { 'operation': 'showproducts', 'usrid': usrid, 'trackingno': trackingno },
        success: function (data) {
            $.each(data.PRODUCTS, function (i, item) {
                resultset += "<div class=\"row mb-4\">"
                    + "<div class=\"col-md-5 col-lg-3 col-xl-3\">"
                    + "<div class=\"view zoom overlay z-depth-1 rounded mb-3 mb-md-0\">"
                    + "<img class=\"img-fluid w-100\""
                    + " src=\"..\\img\\productsimg\\" + item.mimg + "\" alt=\"Sample\">"
                    + "<a href=\"#!\">"
                    + "<div class=\"mask waves-effect waves-light\">"
                    + "<img class=\"img-fluid w-100\""
                    + " src=\"..\\img\\productsimg\\" + item.mimg + "\">"
                    + "<div class=\"mask rgba-black-slight waves-effect waves-light\"></div>"
                    + "</div>"
                    + "</a>"
                    + "</div>"
                    + "</div>"
                    + "<div class=\"col-md-7 col-lg-9 col-xl-9\">"
                    + "<div>"
                    + "<div class=\"d-flex justify-content-between\">"
                    + "<div>"
                    + "<h5>" + item.brandingname + "</h5>"
                    + "<p class=\"mb-3 text-muted text-uppercase small modelno\" id=\"" + item.ModelNo + "\">" + item.description + " - " + item.ModelNo + "</p>"
                    + "<p class=\"mb-2 text-muted text-uppercase small colour\">Color: <label class=\"btn rounded-circle " + item.colour + " p-3 m-2 waves-effect waves-light colour\" id=" + item.colour + "></lable></p>"
                    + "<p class=\"mb-3 text-muted text-uppercase small size\" id=\"" + item.size + "\">Size: " + item.size + "</p>"
                    + "<p class=\"mb-3 text-muted text-uppercase small size\">Quantity: " + item.itemcount + " Item/s</p>"
                    + "</div>"
                    + "<div>"
                    // +"<div class=\"def-number-input number-input safari_only mb-0\">"
                    // +"<button onclick=\"this.parentNode.querySelector('input[type=number]').stepDown()\" "
                    // +" class=\"minus controller\" style=\"vertical-align: middle;\"></button>"
                    // +"<input class=\"quantity\" min=\"1\"  name=\"quantity\"  value=\""+item.itemcount+"\"  type=\"number\" id='itemcount"+i+"' readonly>"
                    // +"<button onclick=\"this.parentNode.querySelector('input[type=number]').stepUp()\""
                    // +" class=\"plus controller\" style=\"vertical-align: middle;\"></button>"
                    // +"</div>"
                    + "<small id=\"notepasswordHelpBlock\" class=\"form-text text-muted text-center\">"
                    // +"(Note, "+stockcount+" pieces left)"
                    + "</small>"
                    + "</div>"
                    + "</div>"
                    + "<div class=\"d-flex justify-content-between align-items-center\">"
                    // +"<div>"
                    // +"<a href=\"#!\" type=\"button\" class=\"card-link-secondary small text-uppercase mr-3\"><i"
                    //     +" class=\"fas fa-trash-alt mr-1\"></i> Remove item </a>"
                    // +"<a href=\"#!\" type=\"button\" class=\"card-link-secondary small text-uppercase\"><i"
                    //     +" class=\"fas fa-heart mr-1\"></i> Move to wish list </a>"
                    // +"</div>"
                    // +"<p class=\"mb-0\"><span><strong id='itemprice"+i+"' class='itemprice'>"+item.price+"</strong></span></p>"
                    + "</div>"
                    + "</div>"
                    + "</div>"
                    + "</div>"
                    + "<hr class=\"mb-4\"></hr>";
                $("div.itemlist").html(resultset);
                $("#productdetails").modal('show');

            })
        }

    })
}