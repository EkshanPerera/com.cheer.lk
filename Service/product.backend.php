<?php
    include "../includes/dbcon.php";
    $operation = $_POST["operation"];
    if($operation == "load"){
        $productcode = $_POST["product"];
        $sql_arr = array();
        $sql_arr[0]= "SELECT VALUE1,VALUE2,VALUE3,VALUE4,VALUE5 from siteattributes INNER  JOIN product ON product.prid = siteattributes.prid WHERE descreptionid = 3 and prcode = '".$productcode."' ;" ;
        $sql_arr[1]= "SELECT variantattributes.value   AS size    from variantattributes INNER JOIN(SELECT distinct variantmapping.sizemap AS mapid from variantmapping INNER JOIN product ON product.prid = variantmapping.prid WHERE prcode = '".$productcode."' AND  variantmapping.status = 'A') S ON S.mapid = attrId WHERE variantattributes.status = 'A'";
        $sql_arr[2]= "SELECT variantattributes.value   AS colours  from variantattributes INNER JOIN(SELECT distinct variantmapping.colourmap AS mapid from variantmapping INNER JOIN product ON product.prid = variantmapping.prid WHERE prcode = '".$productcode."' AND  variantmapping.status = 'A') S ON S.mapid = attrId WHERE variantattributes.status = 'A'";
        $sql_arr[3]= "SELECT brandingname,product.description AS description,category.description as category,minormaxprice.minprice AS minprice,minormaxprice.maxprice AS maxprice,inventorycount.itemcount AS itemcount FROM product 
                        INNER JOIN siteattributes ON  product.prid = siteattributes.prid 
                            LEFT OUTER JOIN (SELECT variantmapping.prid as prid,ifnull(sum(stocknitems.itemcount),0) as itemcount FROM variantmapping 
                                LEFT OUTER JOIN (SELECT stock.mapid,(inventory.itemcount - ifnull(allocation.itemcount,0)) AS itemcount FROM stock INNER JOIN inventory ON inventory.stockid = stock.stockid 
                                        LEFT OUTER JOIN  (select stockid,ifnull(sum(stockallocation.itemcount),0) AS itemcount from stockallocation WHERE STATUS = 'In use'  GROUP BY stockallocation.stockid)allocation  ON allocation.stockid = stock.stockid   WHERE stock.status='O')stocknitems 
                                        ON variantmapping.mapid = stocknitems.mapid GROUP BY variantmapping.prid)inventorycount ON inventorycount.prid = product.prid 
                            INNER JOIN category ON product.catid = category.catid  
                            INNER JOIN(SELECT min(price)AS minprice,max(price)AS maxprice,variantmapping.prid AS prid  FROM pricing 
                        INNER JOIN variantmapping ON pricing.mappingid = variantmapping.mapid where variantmapping.status='A' and pricing.status='A' group by variantmapping.prid)minormaxprice ON  product.prid = minormaxprice.prid
                        WHERE   prcode = '".$productcode."'";
                    // "SELECT brandingname,product.description AS description,category.description as category,minormaxprice.minprice AS minprice,minormaxprice.maxprice AS maxprice,inventorycount.itemcount AS itemcount FROM product 
                    //     INNER JOIN siteattributes ON  product.prid = siteattributes.prid 
                    //     LEFT OUTER JOIN (SELECT variantmapping.prid as prid,ifnull(sum(stocknitems.itemcount),0) as itemcount FROM variantmapping 
                    //                 LEFT OUTER JOIN (SELECT stock.mapid,itemcount FROM stock INNER JOIN inventory ON inventory.stockid = stock.stockid WHERE stock.status='O')stocknitems 
                    //                 ON variantmapping.mapid = stocknitems.mapid GROUP BY variantmapping.prid)inventorycount ON inventorycount.prid = product.prid 
                    //     INNER JOIN category ON product.catid = category.catid  
                    //     INNER JOIN(SELECT min(price)AS minprice,max(price)AS maxprice,variantmapping.prid AS prid  FROM pricing 
                    //         INNER JOIN variantmapping ON pricing.mappingid = variantmapping.mapid where variantmapping.status='A' and pricing.status='A' group by variantmapping.prid)minormaxprice ON  product.prid = minormaxprice.prid
                    //     WHERE   prcode = '".$productcode."' ";
        $modules   = array("Image","sizes","colours","properties");
        $json_arry = array();
        $response = array();
        for($x=0;$x<count($sql_arr);$x++){
            $json_arry = [];
            $sql = $sql_arr[$x];  
            $results = mysqli_query($conn,$sql);
           
            while($row = mysqli_fetch_assoc($results)){
                $json_arry[] = $row;
            }
            $response[$modules[$x]] = $json_arry; 
        }
        if($json_arry){
            $response["RESULTS"] = "success"; 
        }else {
            $response["RESULTS"] = "null";
        }
        mysqli_close($conn);
        echo json_encode($response);
    }
     else if($operation == "availability"){
        $color  =$_POST["Colour"];
        $size   =$_POST["Size"];
        $prcode =$_POST["model"]; 
        $json_arry = array();
        $response = array();
        $mappingsql = "SELECT mapid  FROM variantmapping INNER JOIN(SELECT attrid from variantattributes WHERE VALUE = '".$size."' AND variantattributes.STATUS= 'A' )sizeid ON variantmapping.sizemap = sizeid.attrid 
                        INNER JOIN(SELECT attrid from variantattributes WHERE VALUE = '".$color."' AND variantattributes.STATUS= 'A')colourid  ON variantmapping.colourmap = colourid.attrid 
                        INNER JOIN(SELECT prid from product WHERE prcode = '".$prcode."' and product.status = 'A')productid  WHERE variantmapping.prid = productid.prid AND variantmapping.STATUS= 'A';";
        $result = mysqli_query($conn,$mappingsql);
        $mapid = mysqli_fetch_assoc($result)["mapid"];
        $pricingsql = "SELECT price FROM pricing WHERE mappingid = '".$mapid."' AND pricing.status = 'A'";
        $result = mysqli_query($conn,$pricingsql);
        $json_arry = mysqli_fetch_assoc($result);
        $response["price"] = $json_arry;
        $inventorycountsql = "SELECT itemcount FROM inventory INNER JOIN stock ON stock.stockid  = inventory.stockid WHERE  stock.mapid = '".$mapid ."' and  stock.status = 'O';";
        $result = mysqli_query($conn,$inventorycountsql);
        $inventorycount = mysqli_fetch_assoc($result);
        $response['inventorycount'] = $inventorycount;
        $allocatedcountsql = "SELECT SUM(itemcount) as itemcount FROM stockallocation INNER JOIN stock ON stock.stockid  = stockallocation.stockid WHERE  stock.mapid = '".$mapid ."' and  stock.status = 'O' and stockallocation.status = 'In use';";
        $result = mysqli_query($conn,$allocatedcountsql);
        $allocatedcount = mysqli_fetch_assoc($result);
        $response['allocatedcount']  = $allocatedcount;
        mysqli_close($conn);
        echo json_encode($response);
     }
    else if($operation == "relatedpro"){
        $category  = $_POST["category"];
        $model     = $_POST["model"];
        $sql       = "SELECT brandingname,prcode,price,VALUE1 AS mimg FROM product 
                        INNER JOIN(SELECT min(price)AS price,variantmapping.prid AS prid  FROM pricing 
                            INNER JOIN variantmapping ON pricing.mappingid = variantmapping.mapid where variantmapping.status='A' and pricing.status='A' group by variantmapping.prid) minprice 
                            ON  product.prid = minprice.prid 
                        INNER JOIN siteattributes ON  product.prid = siteattributes.prid 
                        INNER JOIN category ON product.catid = category.catid WHERE siteattributes.descreptionid=3 AND product.status='A' AND  substr(prcode,1,4) = '".$category."' AND  prcode <> '".$model."' ORDER BY rand() limit 4; ";
        $json_arry = array();
        $response  = array();
        $resuts    = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($resuts)){
            $json_arry[] = $row;
        }
        $response["RESULTS"] = $json_arry;
        mysqli_close($conn);
        echo json_encode($response);
    }
?>