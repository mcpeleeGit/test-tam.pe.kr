<?php
session_start();

$gobackuri = "javascript:history.back()";
if (isset($_GET["state"])) {
   $state = $_GET["state"];
   if (substr($state, 0, 4) == 'http') {
      $gobackuri = $state;
   }
}

?>
<?php
//sleep(5);
?>

<!doctype html>
<html lang="kr">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
   <meta name="theme-color" content="#000000">
   <base href="/" />
   <link rel="manifest" href="/manifest.json">
   <link rel="shortcut icon" href="/favicon.ico">
   <link href="/static/css/2.86aa6515.chunk.css" rel="stylesheet">
   <link href="/static/css/main.a583af82.chunk.css" rel="stylesheet">
   <title>인가코드 받기(CallBack Page)</title>
   <!--highlight.js cdn-->
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/styles/default.min.css">
   <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/highlight.min.js"></script>
   <script>
      hljs.initHighlightingOnLoad();
   </script>
   <!--bootstrapcdn-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
   <script type="text/javascript">
      kakaoPixel('541043381581099928').pageView();
      kakaoPixel('541043381581099928').completeRegistration();

      function close() {
         window.close();
      }
   </script>
</head>


<body>
   <header>
      <nav class="navbar-expand-sm navbar-toggleable-sm ng-white border-bottom box-shadow mb-3 navbar navbar-light">
         <div class="container"><a class="navbar-brand" href="/">Kakao API Test</a>

            <h1>
               인가코드 받기(CallBack Page)
            </h1>
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
            if (isset(json_decode($loginResponse)->access_token)) {
               $accessToken = json_decode($loginResponse)->access_token;
            }
            ?>
            <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3"><?= var_dump($loginResponse); ?></div>
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
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //POST로 보낼 데이터 지정하기

            $headers = array();
            $headers[] = "Authorization: " . $header;
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $profileResponse = curl_exec($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            ?>
            <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3"><?= var_dump($profileResponse); ?></div>
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
            echo "accessToken : " . $_SESSION["accessToken"] . "<br/>";
            if (isset($_GET["state"])) {
               //로그인이 아닌 "추가 항목 동의 받기"로 콜백 받은 경우 세션 처리
               if ($_GET["state"] == "accessAgree") {
                  $_SESSION["accessAgree"] = $_GET["state"];
                  echo "accessAgree call : " . $_SESSION["accessAgree"] . "<br/>";
               } else {
                  echo "state : " . $_GET["state"] . "<br/>";
               }
            }
            ?>
         </li>
         <li class="list-group-item">
            <h3>돌아가기</h3>
            ▶ <a href="/">Top Page</a><br />
            ▶ <a href="/js_sdk_v1.php">js_sdk_v1.php</a><br />
            ▶ <a href="/js_sdk_v2.php">js_sdk_v2.php</a><br />
            <a href="javascript:close()" class="btn btn-primary" onclick="close()">close</a>
            <a href="<?= $gobackuri ?>" class="btn btn-primary">Go Back</a>
            <?php
            if (isset($_GET["continue"])) {
               echo "▶ <a href='" . $_GET["continue"] . "'>" . $_GET["continue"] . "</a><br />";
            }
            ?>
         </li>
         <li class="list-group-item"></li>
      </ul>
   </div>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-47335028-5"></script>
<script>
   window.dataLayer = window.dataLayer || [];

   function gtag() {
      dataLayer.push(arguments);
   }
   gtag('js', new Date());

   gtag('config', 'UA-47335028-5');

   //alert(location.href);
   // 싱크 플러그인 하프뷰 닫기
   //location.href = "<?= $_GET["continue"] ?>";
</script>