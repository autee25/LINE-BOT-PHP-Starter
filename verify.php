<?php
$access_token = 'IawcYaKBnjaxcA2Lzf8tKi2lvj+1Omj2tVnCeCiZg6hXq7Het6OrljcDTWflu2WFaJtpincSkoSIF+uTX+2jcwNKK7OYM5ILIqZDSM/cLIdsCpAq60JwhRHkYSfdMra55ou8YzkUY4M/lQusIi06RgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
