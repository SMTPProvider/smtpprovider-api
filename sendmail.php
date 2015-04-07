<?php

$url = "http://smtpprovider.com/api/"; # URL to SMTPPROVIDER API file
$postfields["command"] = "Send_mail";
$postfields["APIKey"] = "abcd123456";
$postfields["ContentType"] = "HTML";
$postfields["FromEmail"] = "test@test.com";
$postfields["FromName"] = "testname";
$postfields["ToEmail"] = "test1@test.com,test2@test.com";
$postfields["ToName"] = "testname1,testname2";
$postfields["MessageBody"] = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head> <body>
This is test email. </body>
</html>' ;


$query_string = "";
foreach ($postfields AS $k=>$v) $query_string .= "$k=".urlencode($v)."&";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$jsondata = curl_exec($ch);
if (curl_error($ch)) die("Connection Error: ".curl_errno($ch).' - '.curl_error($ch));
curl_close($ch);

$arr = json_decode($jsondata); # Decode JSON String

print_r($arr); # Output XML Response as Array

?>
