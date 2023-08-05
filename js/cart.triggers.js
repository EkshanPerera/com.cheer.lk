$(document).on("click", "#btnsignin", function () {
    sign();
});
$(document).on("click", "#registerlink", function () {
    signupmdl();
});
$(document).on("click", "#btnsignup", function () {
    if (isvalidatemdl()) {
        var form = $("#reg");
        var url = form.attr('action');
        $.ajax({
            method: "POST",
            url: url,
            dataType: "json",
            data: form.serialize(),
            success: function (data) {
                if (data.RESULT == "SUCCESS") {
                    $("#signupmdl").modal('hide');
                    $("#signinmdl").modal('show');
                } else {
                    $("div.info").html("<small id='passwordHelpBlock' class='form-text text-muted text-center text-danger'><i class=\"fas fa-info-circle\"></i> Your account email or password is incorrect.</small>");
                }
            }
        });
    }


});
$(document).on("click", ".dropdown-shippingitems", function () {
    if ($(this).attr("id") == "shipping1") {
        $("#shipment").text("Rs. 250");
        $("#navbarDropdownMenuLink3").text("Colombo 1 - 15");
        $("#navbarDropdownMenuLink3").addClass("shipping1");
        $("#navbarDropdownMenuLink3").removeClass("shipping2");
        $("#navbarDropdownMenuLink3").removeClass("shipping3");
    } else if ($(this).attr("id") == "shipping2") {
        $("#shipment").text("Rs. 300");
        $("#navbarDropdownMenuLink3").text("Colombo suburbs");
        $("#navbarDropdownMenuLink3").addClass("shipping2");
        $("#navbarDropdownMenuLink3").removeClass("shipping1");
        $("#navbarDropdownMenuLink3").removeClass("shipping3");
    }
    else if ($(this).attr("id") == "shipping3") {
        $("#shipment").text("Rs. 350");
        $("#navbarDropdownMenuLink3").text("Outside Colombo");
        $("#navbarDropdownMenuLink3").addClass("shipping3");
        $("#navbarDropdownMenuLink3").removeClass("shipping1");
        $("#navbarDropdownMenuLink3").removeClass("shipping2");
    }
    totalcount();
})

$(document).on("click", ".controller", function () {
    var modelno = $(this).parent().parent().parent().children().children(".modelno").attr("id");
    var colour = $(this).parent().parent().parent().children().children(".colour").children(".colour").attr("id");
    var size = $(this).parent().parent().parent().children().children(".size").attr("id");
    var quantity = $(this).parent().children(".quantity").val();
    var priceid = $(this).parent().parent().parent().parent().children(".align-items-center").children(".mb-0").children().children().attr("id");

    availability(modelno, colour, size, quantity, priceid);


})
