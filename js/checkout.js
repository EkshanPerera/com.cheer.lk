function load(usrid) {
    $("#totamount").text("Rs." + dataset['common'].totprice);
    $("#tempamount").text("Rs." + dataset['common'].subamount);
    switch (dataset['common'].shiping) {
        case "shipping1":
            $("#navbarDropdownMenuLink3").html("Colombo 1 - 15 <span id=\"shipment\"></span>");
            $("#shipment").text("Rs. 250");
            break;
        case "shipping2":

            $("#navbarDropdownMenuLink3").html("Colombo suburbs <span id=\"shipment\"></span>");
            $("#shipment").text("Rs. 300");
            break;
        case "shipping3":
            $("#navbarDropdownMenuLink3").html("Outside Colombo <span id=\"shipment\"></span>");
            $("#shipment").text("Rs. 350");
            break;
        default:
            break;
    }
    $.ajax({
        url: "https://cheer.lk/Service/user.bakend.php",
        method: "post",
        dataType: "json",
        data: { 'operation': 'load', 'usrid': usrid },
        success: function (data) {
            $('.label').addClass('active');
            $("#firstName").val(data.RESULT[0].firstname);
            $("#lastName").val(data.RESULT[0].lastname);
            $("#form14").val(data.RESULT[0].addressline01);
            $("#form15").val(data.RESULT[0].addressline02);
            $("#form16").val(data.RESULT[0].addressline03);
            $("#form17").val(data.RESULT[0].addressline04);
            $("#form18").val(data.RESULT[0].postalcode);
            $("#form19").val('0' + data.RESULT[0].deftpno.substring(2, 11));
            $("#form20").val(data.RESULT[0].email);
            $("#firstName").prop("disabled", true);
            $("#lastName").prop("disabled", true);
            $("#form19").prop("disabled", true);
            $("#form20").prop("disabled", true);
            if (data.RESULT[0].addressid) {
                $("#addressfooter").html();
                $("#form14").prop("disabled", true);
                $("#form15").prop("disabled", true);
                $("#form16").prop("disabled", true);
                $("#form17").prop("disabled", true);
                $("#form18").prop("disabled", true);
                changeaddresstlpid(data.RESULT[0].addressid, data.RESULT[0].telephoneid);
            } else {
                $("#form14").prop("disabled", false);
                $("#form15").prop("disabled", false);
                $("#form16").prop("disabled", false);
                $("#form17").prop("disabled", false);
                $("#form18").prop("disabled", false);
                changeaddresstlpid(0, data.RESULT[0].telephoneid);
            }
        }
    })

}
function addaddress(usrid){
    var addressline01 = $("#form142").val(data.RESULT[0].addressline01);
    var addressline02 = $("#form152").val(data.RESULT[0].addressline02);
    var addressline03 = $("#form162").val(data.RESULT[0].addressline03);
    var addressline04 = $("#form172").val(data.RESULT[0].addressline04);
    var postalcode    = $("#form182").val(data.RESULT[0].postalcode);
    $.ajax({
        url:'https://cheer.lk/Service/user.bakend.php',
        method:'post',
        dataType:'json',
        data:{'operation':'addadress','usrid':usrid,'addressline01':addressline01,'addressline02':addressline02,'addressline03':addressline03,'addressline04':addressline04,'postalcode':postalcode},
        success:function(data){
                    
        }
    })
}
function showaddress(usrid){
    $.ajax({
        url:'https://cheer.lk/Service/user.bakend.php',
        method:'post',
        dataType:'json',
        data:{'operation': 'showaddress', 'usrid': usrid },
        success: function(data){
            var dataline = "";
            $.each(data.ADDRESS, function (i, itemSUb) {

                dataline +="<div class='col'>"
                            +"<input class='form-check-input' type='radio' name='flexRadioDefault' id='addradio"+ i +"'>"
                            +"<label class='form-check-label' for='addradio"+ i +"'>"+itemSUb.addressline01+",</br>"+itemSUb.addressline02+",</br>"+itemSUb.addressline03+",</br>"+itemSUb.addressline04+",</br>"+itemSUb.postalcode+"</label>"
                            +"</div>";
            });
            
            $(".addressview").html(dataline)
            
        }
    })
}

let addressid;
let telephoneid;
function changeaddresstlpid(addid, tlpid) {
    addressid = addid;
    telephoneid = tlpid;
}
function clearlocalstorage(section) {
    localStorage.removeItem(section);
}

