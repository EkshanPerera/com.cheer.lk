<?php

date_default_timezone_set('Asia/Colombo');
include "../includes/dbcon.php";
$responce = array();
$merchant_id           = $_POST['merchant_id'];
$order_id              = $_POST['order_id'];
$payhere_amount        = $_POST['payhere_amount'];
$payhere_currency      = $_POST['payhere_currency'];
$status_code           = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];
$custom_1              = $_POST['custom_1'];
$merchant_secret = 'XXXXXXXXXXXXX'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)
$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );
if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
     $sql = "INSERT INTO payments(orderid,paidamount,overpament,satus) SELECT orderid,'".$payhere_amount ."','".$payhere_amount ."' - orders.totprice,'Paid' FROM  orders WHERE trackingno = '".$order_id."'";
    if(mysqli_query($conn,$sql)){
        $responce['RESULT'] = 'SUCCESS';
        if($custom_1 == 'buynow'){
            
        }elseif ($custom_1 == 'cart') {
           
        }
    }
    mysqli_close($conn);
}
?>