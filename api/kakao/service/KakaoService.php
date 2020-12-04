<?php
class KakaoService extends service {  

    public function excuteLogin($loginRequestDTO){

        $client_id = "4408b5bb51bdf4c89879e933556a21e8";
        $redirect_uri = urlencode("http://".$hostname."/api/kakao/Login/callBackLogin");
        $kakaoLoginUrl = "Location: https://kauth.kakao.com/oauth/authorize?client_id=".$client_id."&redirect_uri=".$redirect_uri."&response_type=code";

        header($kakaoLoginUrl);
        die();
    }

    public function callBackLogin(){

    }
}
?>