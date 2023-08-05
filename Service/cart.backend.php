<?php
    include "../includes/dbcon.php";
    $operation = $_POST["operation"];
    if($operation == "validation"){
        $color  =$_POST["Colour"];
        $size   =$_POST["Size"];
        $prcode =$_POST["model"]; 
        $json_arry = array();
        $response = array();
        $sql = "SELECT price,mapping.mimg AS mimg,mapping.brandingname AS brandingname,category.description as description  FROM pricing 
                    INNER JOIN(SELECT mapid,mimg.value1 AS mimg,productid.brandingname AS brandingname FROM variantmapping INNER JOIN(SELECT attrid from variantattributes WHERE VALUE = '".$size."' AND variantattributes.STATUS= 'A' )sizeid ON variantmapping.sizemap = sizeid.attrid 
						  INNER JOIN(SELECT attrid from variantattributes WHERE VALUE = '".$color."' AND variantattributes.STATUS= 'A')colourid  ON variantmapping.colourmap = colourid.attrid
						  INNER JOIN(SELECT value1,prid FROM siteattributes WHERE descreptionid = '3')mimg ON mimg.prid =variantmapping.prid
                          INNER JOIN(SELECT prid,brandingname from product WHERE prcode = '".$prcode."' and product.status = 'A')productid  ON variantmapping.prid = productid.prid AND variantmapping.STATUS= 'A')mapping  ON mappingid = mapping.mapid AND pricing.status = 'A'
                    INNER JOIN(SELECT description FROM category WHERE SUBSTRING('".$prcode."',1,2)= category.refcode AND SUBSTRING('".$prcode."',3,2) = category.catcode)category ; "; 
        $result = mysqli_query($conn,$sql);
        $json_arry[] = mysqli_fetch_assoc($result);
        $response["RESULT"] = $json_arry;
        mysqli_close($conn);
        echo json_encode($response);
     }
?>