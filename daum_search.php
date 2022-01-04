<script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
<script type="text/javascript">
      kakaoPixel('541043381581099928').pageView();
      kakaoPixel('541043381581099928').search({
        keyword: 'test'
      });
</script>
<?php

 $url = "https://dapi.kakao.com/v2/search/web?query=test";
 $REST_API_KEY = "4408b5bb51bdf4c89879e933556a21e8"; 
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_POST, false);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_HTTP200ALIASES, array(400));
 
 $header = "KakaoAK ".$REST_API_KEY; 
 $headers = array();
 $headers[] = "Authorization: ".$header;
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 
 $res = curl_exec ($ch);
 $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 curl_close ($ch);
 
 //echo json_encode($res, JSON_UNESCAPED_UNICODE); //Enter a URL to \\u003cb\\u003etest\\u003c\/b\\u003e Not a valid URL 

//echo utf8_decode(json_encode($res));

 $output = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
    return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
  }, $res);

echo  $output;

echo json_encode("\u003cJSON_UNESCAPED_UNICODE", JSON_UNESCAPED_UNICODE);

echo json_encode("\u003cJSON_HEX_TAG", JSON_HEX_TAG);

?>
