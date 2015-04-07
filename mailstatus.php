<?php

$url = "http://smtpprovider.com/api/"; # URL to SMTPPROVIDER API file
$postfields["command"] = "Mail_status";
$postfields["APIKey"] = "abcd123456";
$postfields["PrevDuration"] = "1";
$postfields["RequiredEmail"] = "test@test.com";

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
