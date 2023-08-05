function load() {
    $('#cntrycod').attr('disabled', true);
}

let tpvalidity = false;
function sendnverify(operation, tpno) {
    var OTP;
    var interval;
    if (tpno != "") {
        if (operation == "send") {
            this.OTP = generateOTP();
            alert(this.OTP);
            var duration = 60 * 5;
            var timer = duration, minutes, seconds;
            this.interval = setInterval(function () {

                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                $("#passwordHelpBlock").text("(" + minutes + ":" + seconds + ")");
                // console.log("("+ minutes + ":" + seconds+")");
                if (--timer < 0) {
                    timer = duration;
                }
                if (seconds == "00" && minutes == "00") {
                    alert(this.interval);
                    clearInterval(this.interval);
                    $("#passwordHelpBlock").text("(05:00)");
                    $("#btnverify").text("resend");
                    $("#btnverify").attr("id", "btnsend");
                }

            }, 1000);
            var interval = this.interval;
            // $.ajax({
            //     url: "../Service/sms.api.php",
            //     method: "post",
            //     dataType: "json",
            //     data: { "tpno": "94" + tpno, "message": "Dear customer,your OTP is " + this.OTP + "" },
            //     success: function (data) {
            //         if (data.RESULT == "FAIL") {
            //             clearInterval(interval);
            //             $("#onetimepassword").val(null);
            //             toastr.error("Please check the number", "Something went wrong", { timeOut: 3500 });
            //             $("#passwordHelpBlock").text("(05:00)");
            //             $("#btnverify").text("resend");
            //             $("#btnverify").attr("id", "btnsend");
            //         }
            //     }
            // });
            $("#telephonenumber").attr('readonly', true);
            $("#btnsend").text("verify");
            $("#btnsend").attr("id", "btnverify");
        } else if (operation == "verify") {
            clearInterval(this.interval);
            $("#telephonenumber").attr('readonly', true);
            if ($("#onetimepassword").val() == this.OTP) {
                clearInterval(this.interval);
                toastr.success("", "Your telephone number is verified", { timeOut: 3500 });
                tpvalidity = true;
                $("#btnverify").attr("id", "btnsverified");
                $("#egtp").removeClass("text-danger");
                $("#egtp").addClass("text-success");
                $("#egtp").html("<i class=\"fas fa-check\"></i> Telephone number is verified");
                $("#btnsverified").text("Verifird");
                $("#telephonenumber").attr('readonly', true);
                $("#btnsverified").removeClass("btn-light");
                $("#btnsverified").addClass("btn-success");
                $("#telephonenumber").addClass("disable");
            } else {
                clearInterval(this.interval);
                toastr.error("Your telephone number could not verify", "OTP did not match", { timeOut: 3500 });
                $("#onetimepassword").val(null);
                $("#btnverify").text("resend");
                $("#btnverify").attr("id", "btnsend");
                $("#telephonenumber").attr('readonly', false);

            }
            $("#passwordHelpBlock").text("(05:00)");

        }
    }
}
let mobile;
function generateOTP() {
    var digits = '0123456789';
    let OTP = '';
    for (let i = 0; i < 6; i++) {
        OTP += digits[Math.floor(Math.random() * 10)];
    }
    return OTP;
}

function destroyMask(string, validation) {
    if (validation == "TLP") {
        return string.replace(/\D/g, '').substring(0, 9);
    } else if (validation == "OTP") {
        return string.replace(/\D/g, '').substring(0, 6);
    }
}
let pwvalidity = false;
function validation(mobile) {
    $.ajax({
        url: "../Service/site.services.php",
        method: "POST",
        dataType: "json",
        data: { "section": "sign-up", "operation": "tpvalidation", "tpno": "94" + mobile },
        success: function (data) {
            
            if (data.RESULT == "SUCCESS") {
                sendnverify("send", mobile);
            }
            else {
                toastr.error("Please try another number", "Telephone number alredy exists", { timeOut: 3500 });
            }
        }
    })
}
let tempemailvalidity;
let emailvalidity;
function emailvalidation() {

    if (email == undefined || email == "") {
        $("#egemail").removeClass("text-success");
        $("#egemail").addClass("text-danger");
        $("#egemail").html("<i class=\"fas fa-info-circle\"></i> Email cannot be null ");
    } else {
        $.ajax({
            url: "../Service/site.services.php",
            method: "POST",
            dataType: "json",
            data: { "section": "sign-up", "operation": "emailvalidation", "email": email },
            success: function (data) {
                if (data.RESULT == "SUCCESS") {
                    $("#egemail").removeClass("text-danger");
                    $("#egemail").addClass("text-success");
                    $("#egemail").html("<i class=\"fas fa-check\"></i> Valid email format");
                    callback(true);
                } else {
                    $("#egemail").removeClass("text-success");
                    $("#egemail").addClass("text-danger");
                    $("#egemail").html("<i class=\"fas fa-info-circle\"></i> Email is alredy exists ");
                    callback(false);
                }
            }
        })
    }
}
function callback(bool) {
    emailvalidity = bool;
}
function isvalidate() {
    var firstname = $("#materialRegisterFormFirstName").val();
    var lastname = $("#materialRegisterFormLastName").val();

    emailvalidation();
    if (tpvalidity == false || pwvalidity == false || emailvalidity == false || email == undefined || email == "" || firstname == "" || lastname == "") {
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
        $("#section").val("sign-up");
        $("#operation").val("add");
        return true;
    }

}