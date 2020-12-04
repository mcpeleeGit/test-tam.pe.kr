<?php
class LoginService extends service {  

    public function excuteLogin(){

        $client_id = "4408b5bb51bdf4c89879e933556a21e8";
        $redirect_uri = urlencode("http://localhost/callBackForKakao.php");
        $kakaoLoginUrl = "Location: https://kauth.kakao.com/oauth/authorize?client_id=".$client_id."&redirect_uri=".$redirect_uri."&response_type=code";

        header($kakaoLoginUrl);
        die();
    }

    public function callBackLogin($LoginCallBackRequestDTO){

        $client_id = "4408b5bb51bdf4c89879e933556a21e8"; 
        $client_secret = "QZhr9itOs0mxVRDxIvuOfOLzjZMc5q1U"; 
        $redirect_uri = urlencode("http://localhost/api/kakao/login/callBackLogin");
        $returnUrl = "https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=".$client_id."&redirect_uri=".$redirect_uri."&code=".$LoginCallBackRequestDTO->code."&client_secret=".$client_secret;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $returnUrl);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array();
        $loginResponse = curl_exec ($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        
        var_dump($loginResponse); // Kakao API 서버로 부터 받아온 값
        $accessToken= json_decode($loginResponse)->access_token; //Access Token만 따로 뺌
        echo "<br><br> accessToken : ".$accessToken."<br><br><br>";        
    }
}
?>