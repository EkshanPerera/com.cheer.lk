// $(document).on("click","#buynow",function(){
//     var product = $("#product").text();
//     var procount = $(".quantity").val();
//     var size = $('input[name=materialExampleRadios]:checked', '#form').attr("id");
//     $.redirect('cart.php', {'product': product,'procount':procount,'size':size},'post');   

// })

$(document).on("click","#addtocart",function(){
    addtocart();
});
$(document).on("click","#buynow",function(){
    buynow();
});
$(document).on("click",".controller",function(){
    toastr.clear();
    if($('input[name=sizeinput]:checked').val()=="on" && $('input[name=colourinput]:checked').val()=="on"){
        availability($('input[name=colourinput]:checked').attr('id'),$('input[name=sizeinput]:checked').attr('id'),$('.quantity').val());
    }
   
})
$(document).on("click",".form-check-input-colour",function(){
    toastr.clear();
    if($('input[name=sizeinput]:checked').val()=="on"){
        availability($('input[name=colourinput]:checked').attr('id'),$('input[name=sizeinput]:checked').attr('id'),$('.quantity').val());
    }
   
})
$(document).on("click",".form-check-input",function(){
    toastr.clear();
    if($('input[name=colourinput]:checked').val()=="on"){
        availability($('input[name=colourinput]:checked').attr('id'),$('input[name=sizeinput]:checked').attr('id'),$('.quantity').val());
    }
})