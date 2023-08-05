 <?php
    include "../includes/dbcon.php";
    $operation = $_POST["operation"];

    if ($operation == "sidenav") {
        $status = array();
        $sql_arr = array("select refcode,description from category where mapping ='parent' and status = 'A'", "select concat(refcode,catcode) as refcode,description from category where mapping='child' and status = 'A'");
        $res_arr = array("MAIN", "SUB");
        $json_arry = array();
        $response = array();

        for ($x = 0; $x < count($sql_arr); $x++) {
            $json_arry = [];
            $sql = $sql_arr[$x];
            $resuts = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($resuts)) {
                $json_arry[] = $row;
            }

            $response[$res_arr[$x]] = $json_arry;
        }
        mysqli_close($conn);
        echo json_encode($response);
    }
    if ($operation == "showProducts") {
        $subCgCode = $_POST["subcgcode"];
        $json_arry = array();
        $response  = array();
        $sql_arr   = array();
        $res_arr   = array("RESULTS", "MAIN", "SUB");
        $sql = "";

        if ($subCgCode == "ALL") {
            $sql = "SELECT brandingname,prcode,price,VALUE2 AS mimg ,inventorycount.itemcount as itemcount FROM product 
                    INNER JOIN(SELECT min(price)AS price,variantmapping.prid AS prid  FROM pricing 
                        INNER JOIN variantmapping ON pricing.mappingid = variantmapping.mapid where variantmapping.status='A' and pricing.status='A' group by variantmapping.prid) minprice 
                    ON  product.prid = minprice.prid 
                    LEFT OUTER JOIN (SELECT variantmapping.prid as prid,ifnull(sum(stocknitems.itemcount),0) as itemcount FROM variantmapping 
                                    LEFT OUTER JOIN (SELECT stock.mapid,(inventory.itemcount - ifnull(allocation.itemcount,0)) AS itemcount FROM stock INNER JOIN inventory ON inventory.stockid = stock.stockid 
                                        LEFT OUTER JOIN  (select stockid,ifnull(sum(stockallocation.itemcount),0) AS itemcount from stockallocation WHERE STATUS = 'In use'  GROUP BY stockallocation.stockid)allocation  ON allocation.stockid = stock.stockid   WHERE stock.status='O')stocknitems 
                                        ON variantmapping.mapid = stocknitems.mapid GROUP BY variantmapping.prid)inventorycount ON inventorycount.prid = product.prid 
                    INNER JOIN siteattributes ON  product.prid = siteattributes.prid 
                    INNER JOIN category ON product.catid = category.catid WHERE siteattributes.descreptionid=3 and product.status='A'; ";
            $sql_arr[0] = $sql;
            $sql_arr[1] = "select refcode,description from category where mapping ='parent' and category.status='A'";
            $sql_arr[2] = "select concat(refcode,catcode) as refcode,description from category where mapping='child' and category.status='A'";
        } else {
            $sql = "SELECT brandingname,prcode,price,VALUE2 AS mimg ,inventorycount.itemcount as itemcount FROM product 
                    INNER JOIN(SELECT min(price)AS price,variantmapping.prid AS prid  FROM pricing 
                        INNER JOIN variantmapping ON pricing.mappingid = variantmapping.mapid where variantmapping.status='A' and pricing.status='A' group by variantmapping.prid) minprice 
                    ON  product.prid = minprice.prid 
                    LEFT OUTER JOIN (SELECT variantmapping.prid as prid,ifnull(sum(stocknitems.itemcount),0) as itemcount FROM variantmapping 
                                    LEFT OUTER JOIN (SELECT stock.mapid,(inventory.itemcount - ifnull(allocation.itemcount,0)) AS itemcount FROM stock INNER JOIN inventory ON inventory.stockid = stock.stockid 
                                        LEFT OUTER JOIN  (select stockid,ifnull(sum(stockallocation.itemcount),0) AS itemcount from stockallocation WHERE STATUS = 'In use'  GROUP BY stockallocation.stockid)allocation  ON allocation.stockid = stock.stockid   WHERE stock.status='O')stocknitems 
                                        ON variantmapping.mapid = stocknitems.mapid GROUP BY variantmapping.prid)inventorycount ON inventorycount.prid = product.prid 
                    INNER JOIN siteattributes ON  product.prid = siteattributes.prid 
                    INNER JOIN category ON product.catid = category.catid WHERE siteattributes.descreptionid=3 AND product.status='A' and  substr(prcode,1,4) = '" . $subCgCode . "'; ";
            $sql_arr[0] = $sql;
            $sql_arr[1] = "select refcode,description from category where mapping ='parent' and refcode = '" . substr($subCgCode, 0, 2) . "' and category.status='A'";
            $sql_arr[2] = "select concat(refcode,catcode) as refcode,description from category where mapping='child' and concat(refcode,catcode) = '" . $subCgCode . "' and category.status='A'";
        }

        for ($x = 0; $x < count($sql_arr); $x++) {
            $json_arry = [];
            $sqlqu = $sql_arr[$x];
            $resuts = mysqli_query($conn, $sqlqu);
            while ($row = mysqli_fetch_assoc($resuts)) {
                $json_arry[] = $row;
            }
            $response[$res_arr[$x]] = $json_arry;
        }
        mysqli_close($conn);
        echo json_encode($response);
    }



    ?>