<?php
$access_token = '4McPHleDzC3v/FBfOIZnMw41p/dahvfMhGX38BQXlrRlJbbm863d2tlYG94iva9maJtpincSkoSIF+uTX+2jcwNKK7OYM5ILIqZDSM/cLIeIv7+3zA5YfT+q/HK8x5jbqb14WVC8t9Gj476JBwBtFgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
