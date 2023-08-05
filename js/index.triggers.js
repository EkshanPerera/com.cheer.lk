// $(document).on('click','#snavli',function(){
//    callFromSnav();
//    loadProduct($("#test").val());
//    $('html, body').animate({scrollTop: $(".productWin").offset().top}, "fast");
//   });
const spinners=" <div class=\"row d-flex justify-content-around align-items-center m-8\">"
              +"   <div class=\"spinner-border\" role=\"status\" style=\"padding: 50px;\">"
              +"      <span class=\"visually-hidden\"></span>"
              +"   </div> "
              +" </div>"
              +" <div class=\"row d-flex justify-content-around align-items-center m-8\">"
              +"   <div class=\"spinner-border\" role=\"status\" style=\"padding: 50px;\">"
              +"       <span class=\"visually-hidden\"></span>"
              +"   </div> "
              +" </div>"
              +" <div class=\"row d-flex justify-content-around align-items-center m-8\">"
              +"   <div class=\"spinner-border\" role=\"status\" style=\"padding: 50px;\">"
              +"       <span class=\"visually-hidden\"></span>"
              +"   </div> "
              +" </div>"
              +" <div class=\"row d-flex justify-content-around align-items-center m-8\"> "
              +"   <div class=\"spinner-border\" role=\"status\" style=\"padding: 50px;\">"
              +"       <span class=\"visually-hidden\"></span>"
              +"   </div>"
              +" </div>";        
$(document).on('click','.snav',function(){
   loadProduct($(this).attr('id'));
  //  $('html, body').animate({scrollTop: $(".padded").offset().top}, "fast");
   $("div.productWin").html(spinners);
  });

$(document).on('click','#all',function(){
  $("#test").val("ALL");
  loadProduct($("#test").val());
  // $('html, body').animate({scrollTop: $(".padded").offset().top}, "fast");
  $("div.productWin").html(spinners);
});

$(document).on('input','#searchproduct',function(){

});