
function fillSideNav() {
  $.ajax({
    url: "Service/index.backend.php",
    method: "post",
    dataType: "json",
    data: { "operation": "sidenav" },
    success: function (data) {
      console.log(data)
      var resultset = ""
      $.each(data.MAIN, function (i, itemMain) {
        resultset += "<li class='treeview-animated-items'>"
          + "<a class='closed'>"
          + "<i class='fas fa-angle-right '></i>"
          + "<span class='font-weight-bold text-uppercase'>" + itemMain.discreption + "</span>"
          + "</a>"
          + "<ul class='nested'>"
        $.each(data.SUB, function (i, itemSUb) {
          if (itemMain.cat_id == itemSUb.cat_id) {
            if (itemSUb.disreption != null) {
              resultset += "<li id='snavli' style='padding-left: 1rem;'>"
                + "<div class='treeview-animated-element font-weight-bold'>" + itemSUb.disreption
                + "<div class='subcd' style='display:none'>" + itemSUb.cat_id + itemSUb.subct_id + "</div>"
                + "</li>"
            }
          };
        });
        resultset += "</ul></li>";
      });
      $("div.snavcont").html(resultset);
      $('.treeview-animated').mdbTreeview();
    }
  });
}
function fillSideNavOrg() {
  $.ajax({
    url: "Service/index.backend.php",
    method: "post",
    dataType: "json",
    data: { "operation": "sidenav" },
    success: function (data) {
      var resultset = "<p class='mb-4'>return to <a href='#allproducs' class='card-link-secondary' id='all'><strong>ALL PRODUCTS</strong></a></p>";
      $.each(data.MAIN, function (i, itemMain) {
        $.each(data.SUB, function (i, itemSUb) {
          if (itemMain.catid == itemSUb.parentid) {
            resultset += "<p class='mb-3'><a href='#" + itemSUb.description.toLowerCase() + "' class='card-link-secondary snav' id='" + itemSUb.refcode + "'>" + itemSUb.description + "</a></p>";
          };
        });
      });
      $("div.snavcont").html(resultset);

    }
  });
}
$(document).on("click", ".navbar-toggler", function () {
  $.ajax({
    url: "Service/index.backend.php",
    method: "post",
    dataType: "json",
    data: { "operation": "sidenav" },
    success: function (data) {
      var liset = "<li class='nav-item'><a href='#!' class='nav-link navbar-link-2 waves-effect'><span class='badge badge-pill red'>1</span><i class='fas fa-shopping-cart pl-0'></i></a></li>";
      $.each(data.MAIN, function (i, itemMain) {
        $.each(data.SUB, function (i, itemSUb) {
          if (itemMain.catid == itemSUb.parentid) {
            liset += "<li class='nav-item'><a href='#" + itemSUb.description + "' class='nav-link waves-effect snav' id='" + itemSUb.refcode + "'>" + itemSUb.description + "</a></li>";
          };
        });
      });
      // $("ul.snavcontul").html(liset);
    }
  });
})

function loadProduct(subcgcode) {

  if (localStorage['cart'] != undefined) {
    $(".badge").text(Object.keys(JSON.parse(localStorage.getItem("cart"))).length);
  }
  var subcgcode = subcgcode;
  $.ajax({
    url: "Service/index.backend.php",
    method: "post",
    dataType: "json",
    data: { "operation": "showProducts", "subcgcode": subcgcode },
    success: function (data) {

      var product = "";

      resultset = "";
      //   resultset+="<div class='card wish-list mb-4'>"
      //               +"<div class='card-body'>"
      //                 +"<section class='text-center'>"
      //     if(subcgcode=="ALL"){ 
      //       product=itemMain.discreption + " PRODUCTS"
      //     }else{
      //       product=data.SUB[0].disreption
      //     }             
      //     resultset+= "<h5 class='black-text  font-weight-bold text-uppercase' style='margin : 0'><strong>"+product  +"</strong> </h5></br>"
      //                 +"<hr class='mb-4' style='margin-top: 0'>"
      //                 +  "<div class='row'>"
      //     product ="";          
      $.each(data.SUB, function (i, itemMain) {
        resultset +=/*"<div class='card wish-list mb-4'>"
                    +"<div class='card-body'>"
                      +*/"<section class='text-center'>"
          + "<h5 class='black-text  font-weight-bold text-uppercase' style='margin : 0'><strong>" + data.SUB[i].description + "</strong> </h5></br>"
          + "<hr class='mb-4' style='margin-top: 0'>"
          + "<div class='row'>"
        product = "";
        $.each(data.RESULTS, function (i, item) {
          if (itemMain.refcode == item.prcode.substring(0, 4)) {

            resultset += "<div class=\"col-md-3 mb-5\">"
              + "<!-- Card -->         "
              + "<div class=\"\">"
              + "  <div class=\"view zoom overlay rounded z-depth-2\">"
              + "    <img class=\"img-fluid w-100\" src=\"img\\productsimg\\" + item.mimg + "\" alt=\"Sample\">"
            if (item.itemcount == '0') {
              resultset += "<h4 class=\"mb-0\"><span class=\"badge badge-success badge-pill badge-news\">Out of stock</span></h4>"
            }
            resultset += "    <a href=\"product/?" + md5("model") + "=" + item.prcode + "\" id=\"prcade\">"
              + "      <div class=\"mask waves-effect waves-light\">"
              + "        <img class=\"img-fluid w-100\" src=\"img\\productsimg\\" + item.mimg + "\">"
              + "        <div class=\"mask rgba-black-slight waves-effect waves-light\"></div>"
              + "      </div>"
              + "    </a>"
              + "  </div>"
              + "  <div class=\"text-center pt-4\">"
              + "    <h6>" + item.brandingname + "</h6>"
              // if (item.saleornot == '0'){
              //   resultset += "<h6>Rs."+item.newprice+"</h6>"
              // }else{
              //   resultset+="<h6>"
              //               +"<span class='text-danger mr-1'>Rs."+item.newprice+"</span>"
              //               +"<span class='text-grey'><s>Rs."+item.initprice+"</s></span>"
              //             +"</h6>"
              // }
              + "    <p><span class=\"mr-1\"><strong>" + item.price + "</strong></span></p>"

              + "  </div>"
              + "</div>"
              + "<!-- Card -->"
              + "</div>";
          }
        });
        resultset += "</div></section><!--</div></div>-->";

      });


      $("div.productWin").css("padding-top", "0px");
      $("div.productWin").html(resultset);
      fadepageloder();

    }
  })

}

// function saveHome(home){
//   var varhome = home;
//   $(document).on("click","body #home",function(){
//     $("#main").html(varhome);
//     $("#test").val("ALL");
//     loadProduct($("#test").val());
// });
// }


