<?php
require('api/kakao/service/LoginService.php');

class LoginController {
    public function defaultMethod(){
        KakaoService = new LoginService(Constants::DB_CONN);
        KakaoService->excuteLogin();
    }
}   
?>


