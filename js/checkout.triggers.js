$(document).on("click","#checkout",function(){
    if($('input[name=flexRadioDefault]:checked').val()=="on"){
        if($('input[id=flexRadioDefault2]:checked').val()=="on"){
            placeorder(orderID,1,function(output){
                if(output == "SUCCESS"){
                    payhere.startPayment(payment);
                }
            });
        }else if($('input[id=flexRadioDefault1]:checked').val()=="on"){
            placeorder(orderID,2,function(output){
                if(output == "SUCCESS"){
                    clearlocalstorage(section);
                    window.location.href = "http://slimnfit.lk/myprofile";
                }
            });
        }
    }
    else{
        toastr.error("","Please select the options", {timeOut: 2500});
    }   
});
$(document).on("click","#btnaddnewaddress",function(){
    $("#mdladdnewaddress").modal('show');
})