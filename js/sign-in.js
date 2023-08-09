$(document).on("click", "#btnsignin", function () {
    $("div.info").html("");
    var form = $("#logging");
    var url = form.attr('action');
    var email = $("#email").val();
    var password = $("#password").val();
    if (email == "" || password == ""); else {
        $.ajax({
            method: "POST",
            url: url,
            dataType: "json",
            data: form.serialize(),
            success: function (data) {
                if (data.RESULT == "SUCCESS") {
                    if (document.referrer == "") {
                        window.location.href = "http://cheer.lk";
                    } else {
                        window.history.back();
                    }
                } else {
                    $("div.info").html("<small id='passwordHelpBlock' class='form-text text-muted text-center text-danger'><i class=\"fas fa-info-circle\"></i> Your account email or password is incorrect.</small>");
                }
            }
        });
    }

});

