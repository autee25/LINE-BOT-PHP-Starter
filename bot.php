<?php 
  define('UPLOAD_DIR', 'tmp_image/');
	/*Get Data From POST Http Request*/
	$datas = file_get_contents('php://input');
	/*Decode Json From LINE Data Body*/
	$deCode = json_decode($datas,true);

	file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

  $LINEDatas['token'] = "IawcYaKBnjaxcA2Lzf8tKi2lvj+1Omj2tVnCeCiZg6hXq7Het6OrljcDTWflu2WFaJtpincSkoSIF+uTX+2jcwNKK7OYM5ILIqZDSM/cLIdsCpAq60JwhRHkYSfdMra55ou8YzkUY4M/lQusIi06RgdB04t89/1O/w1cDnyilFU=";

  $messageType = $deCode['events'][0]['message']['type'];
  if($messageType == 'image'){
    $LINEDatas['messageId'] = $deCode['events'][0]['message']['id'];
    $results = getContent($LINEDatas);
    if($results['result'] == 'S'){
      $file = UPLOAD_DIR . uniqid() . '.png';
      $success = file_put_contents($file, $results['response']);
    }
  }

  function getContent($datas)
  {
    $datasReturn = [];
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.line.me/v2/bot/message/".$datas['messageId']."/content",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer ".$datas['token'],
        "cache-control: no-cache"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if($err){
      $datasReturn['result'] = 'E';
      $datasReturn['message'] = $err;
    }else{
      $datasReturn['result'] = 'S';
      $datasReturn['message'] = 'Success';
      $datasReturn['response'] = $response;
    }

    return $datasReturn;
  }
?> 
