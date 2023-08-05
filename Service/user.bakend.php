<?php
include "../includes/dbcon.php";
$operation = $_POST["operation"];
$response = array();
if ($operation == 'load'){
    $useid = $_POST['usrid'];
    $sql = "SELECT firstname, lastname, deftpno, email,postalcode,addressid,addressline01,addressline02,addressline03,addressline04,tlpId AS telephoneid FROM users LEFT OUTER JOIN (SELECT postalcode,addressid,addressline01,addressline02,addressline03,addressline04,userid from  address WHERE address.def = 'Y' AND address.status='A')address on address.userid = users.usrid 
            LEFT OUTER JOIN (SELECT tlpId,userid FROM telephone WHERE telephone.def = 'Y' AND telephone.status='A')telephone ON telephone.userid = users.usrid  WHERE usrid ='".$useid."' LIMIT 1;";
    $results = mysqli_query($conn,$sql);
    $json_arry = array();
    while($row = mysqli_fetch_assoc($results)){
        $json_arry[] = $row;
    }
    $response['RESULT'] = $json_arry;
    mysqli_close($conn);
    echo json_encode($response);
}elseif($operation == 'loadorders'){
    $useid = $_POST['usrid'];
    
    $sql = "SELECT DISTINCT trackingno,trackingstage,shiping,discount,orders.totprice FROM orders where orders.usrid = '".$useid."' ORDER BY orders.orderid DESC ; ";
    $results = mysqli_query($conn,$sql);
    $json_arry = array();
    while($row = mysqli_fetch_assoc($results)){
    $json_arry[] = $row;
    }
    $response['ORDERS'] = $json_arry;
    $sql = "SELECT value FROM parameters WHERE code  = 'TRSTGS' AND status = 'A'";
    $results = mysqli_query($conn,$sql);
    $json_arry = array();
    while($row = mysqli_fetch_assoc($results)){
    $json_arry[] = $row;
    }
    $response['TRACKINGPRM'] = $json_arry;
    $sql = "SELECT * FROM trackinstages";
    $results = mysqli_query($conn,$sql);
    $json_arry = array();
    while($row = mysqli_fetch_assoc($results)){
    $json_arry[] = $row;
    }
    $response['TRACKINGSTAGES'] = $json_arry;   
    mysqli_close($conn);
    echo json_encode($response);
}elseif($operation == 'showproducts'){
    $useid = $_POST['usrid'];
    $trackingno = $_POST['trackingno'];
    $sql = "SELECT trackingno,itemcount,size.value AS size,colour.value AS colour,prcode as ModelNo ,brandingname,category.description as description,mimg.value1 as  mimg  FROM orders INNER JOIN orderitems ON orders.orderid = orderitems.orderid 
                INNER JOIN variantmapping ON orderitems.mappingid = variantmapping.mapid 
                INNER JOIN (SELECT attrId,value from variantattributes)size ON size.attrId = variantmapping.sizemap
                INNER JOIN (SELECT attrId,value from variantattributes)colour ON colour.attrId = variantmapping.colourmap
                INNER JOIN product ON product.prid = variantmapping.prid 
                INNER JOIN(SELECT value1,prid FROM siteattributes WHERE descreptionid = '3')mimg ON mimg.prid =variantmapping.prid
                INNER JOIN category ON product.catid = category.catid
                where orders.usrid = '".$useid."' AND orders.trackingno='".$trackingno."';";
    $results = mysqli_query($conn,$sql);
    $json_arry = array();
    while($row = mysqli_fetch_assoc($results)){
        $json_arry[] = $row;
    }
    $response['PRODUCTS'] = $json_arry;
    mysqli_close($conn);
    echo json_encode($response); 
}elseif($operation == 'showaddress'){
    $useid = $_POST['usrid'];
    $sql = "SELECT postalcode,addressid,addressline01,addressline02,addressline03,addressline04 from  address WHERE address.def = 'Y' AND address.status='A' AND userid = '". $useid."'";
    $results = mysqli_query($conn,$sql);
    $json_arry = array();
    while($row = mysqli_fetch_assoc($results)){
        $json_arry[] = $row;
    }
    $response['ADDRESS'] = $json_arry;
    mysqli_close($conn);
    echo json_encode($response); 
}


?>
