<?php
$user = "94713471353";
$password = "9736";
$message = $_POST["message"];
$text = urlencode($message);
$to = $_POST["tpno"];
$response = array();
$baseurl ="http://www.textit.biz/sendmsg";
$url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
$ret = file($url);

$res= explode(":",$ret[0]);

if (trim($res[0])=="OK")
{
    $response["RESULT"] = "SUCCESS";
    $response["res"] = $res;
}
else
{
    $response["RESULT"] = "FAIL";
    $response["res"] = $res;
}

    echo json_encode($response);
?>