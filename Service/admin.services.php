<?php
date_default_timezone_set('Asia/Colombo');
    include "../includes/dbcon.php";
    $operation = $_POST["operation"];
    if ($operation == "stockmanagement"){
        $suboperation = $_POST["suboperation"];
        $model      = $_POST["model"];
        $colour     = $_POST["colour"];
        $size       = $_POST["size"];   
        $mapidsql   = "SELECT mapid  FROM variantmapping 
                        INNER JOIN(SELECT attrid from variantattributes WHERE VALUE = '".$size."' AND variantattributes.STATUS= 'A' )sizeid ON variantmapping.sizemap = sizeid.attrid 
                        INNER JOIN(SELECT attrid from variantattributes WHERE VALUE = '".$colour."' AND variantattributes.STATUS= 'A')colourid  ON variantmapping.colourmap = colourid.attrid 
                        INNER JOIN(SELECT prid from product WHERE prcode = '".$model."' and product.status = 'A')productid  WHERE variantmapping.prid = productid.prid AND variantmapping.STATUS= 'A';";
        $result = mysqli_query($conn,$mapidsql);
        $mapid  = mysqli_fetch_assoc($result)['mapid'];
        $responce = array();
        $today   = date("Y-m-d");
        $itemcount = 0;
        if($suboperation == 'openning'){
            if(isset($_POST['itemcount'])){
                $itemcount = $_POST['itemcount'];
                $openingsql = "INSERT INTO stock(mapid,openingdate,openingstock,status) VALUE('".$mapid."','".$today."','".$itemcount."','O');";
                $openingsql .="INSERT INTO inventory(stockid,itemcount) SELECT stock.stockid,stock.openingstock FROM stock WHERE stock.mapid = '".$mapid."' AND stock.status = 'O';";
                if(mysqli_multi_query($conn,$openingsql)){
                    $responce["RESULT"] = "SUCCESS";
                }else{
                    $responce["RESULT"] = "FAIL";
                };
                mysqli_close($conn);
                echo json_encode($responce);
            }
        }elseif($suboperation == 'refill'){
            if(isset($_POST['itemcount'])){
                $stockidsql = "SELECT stockid FROM stock WHERE mapid ='".$mapid."' AND stock.status = 'O';";
                $result = mysqli_query($conn,$stockidsql);
                $stockid  = mysqli_fetch_assoc($result)['stockid'];
                $itemcount = $_POST['itemcount'];
                $refillsql = "INSERT INTO stockrefill(stockid,itemcount,date,status) VALUE('".$stockid."','".$itemcount."','".$today."','O');";
                $refillsql .= "UPDATE inventory SET itemcount = itemcount + $itemcount WHERE stockid = '".$stockid."' ";
                if(mysqli_multi_query($conn,$refillsql)){
                    $responce["RESULT"] = "SUCCESS";
                }else{
                    $responce["RESULT"] = "FAIL ";
                };
                mysqli_close($conn);
                echo json_encode($responce);
            }
        }
        elseif ($suboperation == 'deleterefill') {
            if(isset($_POST['refillid'])){
                $stockidsql = "SELECT stockid FROM stock WHERE mapid ='".$mapid."' AND stock.status = 'O';";
                $result = mysqli_query($conn,$stockidsql);
                $stockid  = mysqli_fetch_assoc($result)['stockid'];
                $refillid = $_POST['refillid'];
                $deleterefillsql  = "UPDATE inventory SET itemcount = itemcount - (SELECT itemcount FROM stockrefill WHERE refillid = '".$refillid."')  WHERE stockid = '".$stockid."';";
                $deleterefillsql .= "UPDATE stockrefill SET status = 'D',stsdate = '".$today."' WHERE  refillid = '".$refillid."'";
                if(mysqli_multi_query($conn,$deleterefillsql)){
                    $responce["RESULT"] = "SUCCESS";
                }else{
                    $responce["RESULT"] = "FAIL ";
                };
                mysqli_close($conn);
                echo json_encode($responce);
            }
        }
        elseif($suboperation == 'closing'){
            $stockidsql  = "SELECT stockid FROM stock WHERE mapid ='".$mapid."' AND stock.status = 'O';";
            $result      = mysqli_query($conn,$stockidsql);
            $stockid     = mysqli_fetch_assoc($result)['stockid'];
            $closingsql  = "UPDATE stock SET closingdate = '".$today."',status = 'C', closingstock = (SELECT itemcount FROM inventory WHERE inventory.stockid = '".$stockid."') WHERE stock.stockid = '".$stockid."';";
            $closingsql .= "DELETE FROM inventory WHERE stockid = '".$stockid."';";
            $closingsql .= "UPDATE stockrefill SET stockrefill.status = 'C',stsdate = '".$today."' WHERE stockrefill.stockid ='".$stockid."' AND stockrefill.status = 'O';";
            if(mysqli_multi_query($conn,$closingsql)){
                $responce["RESULT"] = "SUCCESS";
            }else{
                $responce["RESULT"] = "FAIL ". mysqli_error($conn);
            };
            mysqli_close($conn);
            echo json_encode($responce);
        }
    }elseif($operation = "discountkey"){
        
    }
    

?>