<?php
date_default_timezone_set('Asia/Colombo');
include "../includes/dbcon.php";
$section    = $_POST["section"];
$operation  = $_POST["operation"];
$responce = array();
if($section == "sign-up"){
    if($operation == "tpvalidation"){
        $tpno       = $_POST["tpno"];
        $sql        = "(SELECT deftpno FROM users WHERE deftpno = '". $tpno."' AND STATUS ='A') UNION (SELECT VALUE FROM telephone WHERE VALUE = '". $tpno."' AND STATUS ='A')" ;
        $result     =  mysqli_query($conn,$sql);
        $json_arry  = mysqli_fetch_assoc($result);
        if($json_arry){
            $responce["RESULT"] = "FAIL";
        }else{
            $responce["RESULT"] =  "SUCCESS" ;
        };
        mysqli_close($conn);
        echo json_encode($responce);
    }elseif($operation == "emailvalidation"){
        $email      = $_POST["email"];
        $sql        = "SELECT email FROM users WHERE email = '". $email."' AND STATUS ='A'";
        $result     =  mysqli_query($conn,$sql);
        $json_arry  = mysqli_fetch_assoc($result);
        if($json_arry!=null){
            $responce["RESULT"] = "FAIL";
        }else{
            $responce["RESULT"] =  "SUCCESS" ;
        };
        mysqli_close($conn);
        echo json_encode($responce);
    }elseif($operation == "add"){
        $tpno       =  $_POST["tpno"];
        $firstname  =  $_POST["firstname"];
        $lastname   =  $_POST["lastname"];
        $password   =  $_POST["password"];
        $email      =  $_POST["email"];
        $passwordhash =  crypt($password,'$1$$');
        $sql = "INSERT INTO users (firstname, lastname, deftpno, email, password) VALUES ('".$firstname."', '".$lastname."', '".$tpno."', '".$email."' ,'".$passwordhash."');";
        if(mysqli_query($conn,$sql)){
            $last_id = mysqli_insert_id($conn);
            $sql  = "INSERT INTO telephone(userid,value,def,status) VALUES ('".$last_id."','".$tpno."','Y','A')";
            if(mysqli_query($conn,$sql)){
                header("Location: http://slimnfit.lk/sign-in");
            }else{
                echo("<script type='text/javascript'>window.history.back()</script>");
            } 
        }else{
            echo("<script type='text/javascript'>window.history.back()</script>");
        }
        mysqli_close($conn);
    }elseif($operation == "addmdl"){
        $tpno       =  $_POST["tpno"];
        $firstname  =  $_POST["firstname"];
        $lastname   =  $_POST["lastname"];
        $password   =  $_POST["password"];
        $email      =  $_POST["email"];
        $passwordhash =  crypt($password,'$1$$');
        $sql = "INSERT INTO users (firstname, lastname, deftpno, email, password) VALUES ('".$firstname."', '".$lastname."', '".$tpno."', '".$email."' ,'".$passwordhash."');";
        if(mysqli_query($conn,$sql)){
            $last_id = mysqli_insert_id($conn);
            $sql  = "INSERT INTO telephone(userid,value,def,status) VALUES ('".$last_id."','".$tpno."','Y','A')";
            if(mysqli_query($conn,$sql)){
                $responce["RESULT"] = "SUCCESS"; 
            }else{
                $responce["RESULT"] = "FAIL";
            } 
        }else{
            $responce["RESULT"] = "FAIL";
        }
        mysqli_close($conn);
        echo json_encode($responce);
    }
}elseif ($section=="sign-in") {
    if($operation == "sign-in"){
        session_start();
        $email = $_POST["email"];
        $password = crypt($_POST["password"],'$1$$');
        $sql = "SELECT usrid,firstname,password FROM users WHERE email = '".$email."' and status = 'A'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_row($result);  
            $passwordhash =  password_hash($row[2], PASSWORD_DEFAULT);
            if(password_verify($password, $passwordhash)){
                $_SESSION['usrid'] = $row[0];
                $_SESSION['usrname'] = $row[1];
                $responce['RESULT'] = "SUCCESS"; 
            }
            else{
                $responce['RESULT'] = "FAIL"; 
            }
        }else{
            $responce['RESULT'] = "FAIL"; 
        }
        
        mysqli_close($conn);
        echo json_encode($responce);
    }
    
}elseif($section == "ordering"){
    if($operation == "placeorder"){
        $dataset        = $_POST['dataset']; 
        $usrid          = $_POST['userid'];
        $orderrefid     = $_POST['orderID'];
        $paymentmethod  = $_POST['paymentmethod'];
        $addressid      = $_POST['addressid'];
        $telephoneid    = $_POST['telephoneid'];  
        $addressline01  = $_POST['addressline01'];
        $addressline02  = $_POST['addressline02'];
        $addressline03  = $_POST['addressline03'];
        $addressline04  = $_POST['addressline04'];
        $postalcode     = $_POST['postalcode'];

        if($addressid == '0'){
            $sql = "INSERT INTO address ( userid, addressline01, addressline02, addressline03, addressline04, postalcode, def, status) VALUES ('".$usrid."', '".$addressline01."', '".$addressline02."', '".$addressline03."', '".$addressline04."', '".$postalcode."', 'Y', 'A');";
            if(mysqli_query($conn,$sql)){
                $addressid = mysqli_insert_id($conn); 
            }
           
        }
        $sql = "INSERT INTO orders(usrid,addressid,telephoneid,time,date,trackingno,trackingstage,paymentmethod,price,shiping,totprice,status) SELECT '".$usrid."','".$addressid."','".$telephoneid."','".date('H:i:s',time())."','".date('Y-m-d',time())."','".$orderrefid."','0',$paymentmethod,'".$dataset['common']['subamount']."',shipping.amount,'".$dataset['common']['totprice']."','In progress' FROM shipping WHERE refid ='".$dataset['common']['shiping']."' AND status = 'A'";
        if(mysqli_query($conn,$sql)){
            $responce["RESULT"] = "SUCCESS"; 
            foreach ($dataset['items'] as  $value) {
                $sql = "INSERT INTO orderitems (orderid,mappingid,itemcount,totprice)  SELECT orderid,mapping.mapid,'".$value['itemcount']."','".$value['price']."' FROM orders INNER JOIN(SELECT mapid  FROM variantmapping 
                                                                        INNER JOIN(SELECT attrid from variantattributes WHERE VALUE = '".$value['size']."' AND variantattributes.STATUS= 'A' )sizeid ON variantmapping.sizemap = sizeid.attrid 
                                                                        INNER JOIN(SELECT attrid from variantattributes WHERE VALUE = '".$value['colour']."' AND variantattributes.STATUS= 'A')colourid  ON variantmapping.colourmap = colourid.attrid 
                                                                        INNER JOIN(SELECT prid from product WHERE prcode = '".$value['ModelNo']."' and product.status = 'A')productid  WHERE variantmapping.prid = productid.prid AND variantmapping.STATUS= 'A')mapping 
                                                                    WHERE trackingno = '".$orderrefid."'";
                if(mysqli_query($conn,$sql)){
                    $responce["RESULT"] = "SUCCESS"; 
                }else{
                    $responce["RESULT"] = "FAIL1";
                }      
            }
        }else{
            $responce["RESULT"] = "FAIL" . $sql;
        }   
        $sql = "SELECT orderitemid,mappingid,itemcount FROM  orderitems INNER JOIN orders ON orderitems.orderid = orders.orderid WHERE trackingno = '".$orderrefid."'";
        $orderitems = array();
        $resuts    = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($resuts)){
            $orderitems[] = $row;
        }
        foreach ($orderitems as  $value) {
            $sql = "INSERT INTO stockallocation (stockid,orderitemid,itemcount,status) SELECT stock.stockid,'".$value['orderitemid']."','".$value['itemcount']."','Pending' FROM stock WHERE status = 'O' AND mapid='".$value['mappingid']."'";
                if(mysqli_query($conn,$sql)){
                    $responce["RESULT"] = "SUCCESS";
                    $_SESSION['ordering'] = true;
                    $_SESSION['orderprosessed'] = true; 
                }else{
                    $responce["RESULT"] = "FAIL2";
                }         
        }
        mysqli_close($conn);
        echo json_encode($responce);
    }else if($operation == "deleteorder"){
        $orderrefid = $_POST['orderID'];
        $sql = "DELETE stockallocation,orderitems,orders FROM stockallocation INNER JOIN orderitems  INNER JOIN orders ON orderitems.orderid = orders.orderid WHERE orders.trackingno = '".$orderrefid."' AND orderitems.orderitemid = stockallocation.orderitemid";
        if(mysqli_query($conn,$sql)){
            $responce["RESULT"] = "SUCCESS"; 
        }else{
            $responce["RESULT"] = "FAIL3";
        }         
        mysqli_close($conn);
        echo json_encode($responce);
    }
}elseif($section == "address"){
    if($operation == "add"){
        $usrid = $_POST["usrid"];
        $addressline01  = $_POST['addressline01'];
        $addressline02  = $_POST['addressline02'];
        $addressline03  = $_POST['addressline03'];
        $addressline04  = $_POST['addressline04'];
        $postalcode     = $_POST['postalcode'];
        $sql = "INSERT INTO address(usrid,addressline01,addressline02,addressline03,addressline04,postalcode,def) VALUES('".$usrid."')";
    }
}
?>
