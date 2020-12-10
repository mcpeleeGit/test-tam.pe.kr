<?php
   session_start();
?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
   <meta name="theme-color" content="#000000">
   <base href="/" />
   <link rel="manifest" href="/manifest.json">
   <link rel="shortcut icon" href="/favicon.ico">
   <title>Googsu WebApplication1</title>
   <link href="/static/css/2.86aa6515.chunk.css" rel="stylesheet">
   <link href="/static/css/main.a583af82.chunk.css" rel="stylesheet">
   <title>카카오톡 채널</title>
   <!--highlight.js cdn-->
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/styles/default.min.css">
   <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/highlight.min.js"></script>
   <script>
      hljs.initHighlightingOnLoad();
   </script>
   <!--bootstrapcdn-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
   <header>
      <nav class="navbar-expand-sm navbar-toggleable-sm ng-white border-bottom box-shadow mb-3 navbar navbar-light">
         <div class="container"><a class="navbar-brand" href="/"><img src="/img/icon/googsu.png" class="logo" alt="logo">Kakao API Test</a>
         <h1>인가코드 받기(CallBack Page)</h1>
         </div>
      </nav>
   </header>
   <div class="container">

      <ul class="list-group">
         <li class="list-group-item">
            <h2>액세스 토큰 받기</h2>
            <p>사전 설정된 콜백페이지로 인가 코드를 파라메터로 받아 액세스 토큰 조회.</p>
            <pre><code class="php">
$code = $_GET["code"]; // 서버로 부터 토큰을 발급받을 수 있는 코드를 받아옵니다.
$client_id = "4444444444444444444444444444"; //★ 수정 할 것
$client_secret = "QQQQQQQQQQQQQQQQQQQQQQQQQQQQQ"; //★ 수정 할 것 (보안 설정을 켰다면 사용)
$redirect_uri = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/callBackForKakao.php"); //★ 수정 할 것 (앞에서 설정한 것과 동일하게)
$returnUrl = "https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&code=" . $code . "&client_secret=" . $client_secret;

$isPost = false;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $returnUrl);
curl_setopt($ch, CURLOPT_POST, $isPost);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = array();
$loginResponse = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);  

$accessToken= json_decode($loginResponse)->access_token;
var_dump($loginResponse); // Kakao API Return Json
         </code></pre>
            <?php
            //토큰 조회
            $code = $_GET["code"]; // 서버로 부터 토큰을 발급받을 수 있는 코드를 받아옵니다.
            $client_id = "4408b5bb51bdf4c89879e933556a21e8"; //★ 수정 할 것
            $client_secret = "QZhr9itOs0mxVRDxIvuOfOLzjZMc5q1U"; //★ 수정 할 것 (보안 설정을 켰다면 사용)
            $redirect_uri = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/callBackForKakao.php"); //★ 수정 할 것 (앞에서 설정한 것과 동일하게)
            $returnUrl = "https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&code=" . $code . "&client_secret=" . $client_secret;

            $isPost = false;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $returnUrl);
            curl_setopt($ch, CURLOPT_POST, $isPost);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $headers = array();
            $loginResponse = curl_exec($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $accessToken = "";
            if( isset( json_decode($loginResponse)->access_token )){               
               $accessToken = json_decode($loginResponse)->access_token;
            }
            ?>
            <div class="alert alert-primary" role="alert" style="display:inline-block;">
            <?php
            var_dump($loginResponse); // Kakao API Return Json
            ?>
            </div>   
         </li>
         <li class="list-group-item">
            <h2>사용자 정보 가져 오기</h2>
            <p>액세스 토큰을 이용하여 사전 동의된 사용자 정보조회</p>
            <pre><code class="php">
//프로필 조회
$header = "Bearer " . $accessToken; // Bearer 다음에 공백 추가
$data = array(
'propertyKeys' => 'kakao_account.email'
);
$getProfileUrl = "https://kapi.kakao.com/v2/user/me";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $getProfileUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //POST로 보낼 데이터 지정하기

$headers = array();
$headers[] = "Authorization: " . $header;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$profileResponse = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

var_dump($profileResponse); // Kakao API 서버로 부터 받아온 값
         </code></pre>
            <?php
            //프로필 조회
            $header = "Bearer " . $accessToken; // Bearer 다음에 공백 추가
            $data = array(
               'propertyKeys' => 'kakao_account.email'
            );
            $getProfileUrl = "https://kapi.kakao.com/v2/user/me";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $getProfileUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //POST로 보낼 데이터 지정하기

            $headers = array();
            $headers[] = "Authorization: " . $header;
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $profileResponse = curl_exec($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            ?>
            <div class="alert alert-primary" role="alert" style="display:inline-block;">
            <?php
            var_dump($profileResponse); // Kakao API 서버로 부터 받아온 값
            ?>
            </div>            
            
         </li>
         <li class="list-group-item">
            <h2>카카오 인가 후, 자체 후속처리</h2>
            <p>카카오 인가 후, 세션처리 또는 고객 정보 저장 등. 카카오와 무관한 사이트 전용 처리 </p>
            <pre><code class="php">
session_start();
$_SESSION["accessToken"] = $accessToken;
echo $_SESSION["accessToken"];

if($_GET["state"] == "accessAgree"){
$_SESSION["accessAgree"] = $_GET["state"];
echo $_SESSION["accessAgree"];
}
         </code></pre>
            <?php
            //액세스 토큰, 세션 저장
            $_SESSION["accessToken"] = $accessToken;
            echo $_SESSION["accessToken"];
            //로그인이 아닌 "추가 항목 동의 받기"로 콜백 받은 경우 세션 처리
            if ($_GET["state"] == "accessAgree") {
               $_SESSION["accessAgree"] = $_GET["state"];
               echo $_SESSION["accessAgree"];
            }
            ?>
         </li>
         <li class="list-group-item">
            <a href="/">Top Page</a><br />
            <a href="/kakao_talk_channel.php">Kakao_talk_channel Sample Page</a><br />
         </li>
         <li class="list-group-item"></li>
      </ul>
   </div>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>