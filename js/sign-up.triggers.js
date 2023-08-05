$(document).on("click", "#btnsend", function () {
    mobile = $("#telephonenumber").val();
    if (mobile.substr(0, 1) == "7" && mobile.length == "9") {
        if (emailvalidity == false) {
            toastr.error("Please try another email", "Email is alredy exists", { timeOut: 3500 });
        } else {
            validation(mobile);
        }
    } else {
        toastr.error("Please check the number", "Something went wrong", { timeOut: 3500 });
    }
});
$(document).on("click", "#btnverify", function () {
    sendnverify("verify");
});
$(document).on("input", "#telephonenumber", function () {
    $("#telephonenumber").val(destroyMask($("#telephonenumber").val(), "TLP"));
});
$(document).on("input", "#onetimepassword", function () {
    $("#onetimepassword").val(destroyMask($("#onetimepassword").val(), "OTP"));
});
$(document).on("input", "#defaultForm-pass", function () {
    if (this.value.match(/^(?=.*\d)[0-9a-zA-Z!@#$%^&*]{8,}$/)) {
        pwvalidity = true;
        $("#materialRegisterFormPasswordHelpBlock").removeClass("text-danger");
        $("#materialRegisterFormPasswordHelpBlock").addClass("text-success");
        $("#materialRegisterFormPasswordHelpBlock").html("<i class=\"fas fa-check\"></i> Password is okay");

    } else {
        pwvalidity = false;
        $("#materialRegisterFormPasswordHelpBlock").removeClass("text-success");
        $("#materialRegisterFormPasswordHelpBlock").addClass("text-danger");
        $("#materialRegisterFormPasswordHelpBlock").html("<i class=\"fas fa-info-circle\"></i> At least 8 characters and 1 digit");
    }
})
$(document).on("focusout", "#materialRegisterFormemail", function () {
    if (tempemailvalidity) {
        emailvalidation();
    }
});
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
email = $("#materialRegisterFormemail").val();
$(document).on("input", "#materialRegisterFormemail", function () {
    $("#materialRegisterFormemail").val($("#materialRegisterFormemail").val().toLowerCase());
    email = $("#materialRegisterFormemail").val();
    if (validateEmail(email)) {
        $("#egemail").removeClass("text-danger");
        $("#egemail").addClass("text-success");
        $("#egemail").html("<i class=\"fas fa-check\"></i> Valid email format");
        tempemailvalidity = true;
    } else {
        $("#egemail").removeClass("text-success");
        $("#egemail").addClass("text-danger");
        $("#egemail").html("<i class=\"fas fa-info-circle\"></i> invalid email format");
        tempemailvalidity = false;

    }
})

