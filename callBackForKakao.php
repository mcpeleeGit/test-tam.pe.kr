<?php

//토큰 조회
 $code = $_GET["code"]; // 서버로 부터 토큰을 발급받을 수 있는 코드를 받아옵니다.
 $client_id = "4408b5bb51bdf4c89879e933556a21e8"; //★ 수정 할 것
 $client_secret = "QZhr9itOs0mxVRDxIvuOfOLzjZMc5q1U"; //★ 수정 할 것 (보안 설정을 켰다면 사용)
 $redirect_uri = urlencode("http://".$_SERVER['HTTP_HOST']."/callBackForKakao.php"); //★ 수정 할 것 (앞에서 설정한 것과 동일하게)
 $returnUrl = "https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=".$client_id."&redirect_uri=".$redirect_uri."&code=".$code."&client_secret=".$client_secret;
 
 $isPost = false;
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $returnUrl);
 curl_setopt($ch, CURLOPT_POST, $isPost);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
 $headers = array();
 $loginResponse = curl_exec ($ch);
 $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 curl_close ($ch);
 
 var_dump($loginResponse); // Kakao API 서버로 부터 받아온 값
 $accessToken= json_decode($loginResponse)->access_token; //Access Token만 따로 뺌
 echo "<br><br> accessToken : ".$accessToken."<br><br><br>";

//프로필 조회
 $header = "Bearer ".$accessToken; // Bearer 다음에 공백 추가
 $data = array(
    'propertyKeys' => 'kakao_account.email'
);
 $getProfileUrl = "https://kapi.kakao.com/v2/user/me";
 
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $getProfileUrl);
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt ($ch, CURLOPT_POSTFIELDS, $data); //POST로 보낼 데이터 지정하기
 

 $headers = array();
 $headers[] = "Authorization: ".$header;
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 
 $profileResponse = curl_exec ($ch);
 $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 curl_close ($ch);
 
 var_dump($profileResponse); // Kakao API 서버로 부터 받아온 값
     
 $profileResponse = json_decode($profileResponse);
 
 $userId = $profileResponse->id;
 $userName = $profileResponse->properties->nickname;
 $userEmail = $profileResponse->kakao_account->email;
 
 echo "<br><br> Headers : ".$headers[0];
 echo "<br><br> accessToken : ".$accessToken;
 echo "<br><br> userId : ".$userId;
 echo "<br> userName : ".$userName;
 echo "<br> userEmail : ".$userEmail;
 
?>