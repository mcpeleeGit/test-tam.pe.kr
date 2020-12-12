<?php
session_start();
$APP_ADMIN_KEY = "72462462f6fc9baad63f2de2ad3d865b";
$REST_API_KEY = "4408b5bb51bdf4c89879e933556a21e8";
$JAVASCRIPT_KEY = "2d68640b56d986af5c8a48505c7c8c71";
$CHANNEL_ID = "_GVVxnK";

if (isset($_GET["sess"]) && $_GET["sess"] == "clear") {
    unset($_SESSION["accessToken"]);
    unset($_SESSION["accessAgree"]);
}
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
    <link href="/static/css/2.86aa6515.chunk.css" rel="stylesheet">
    <link href="/static/css/main.a583af82.chunk.css" rel="stylesheet">
    <!--highlight.js cdn-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/highlight.min.js"></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>
    <!--bootstrapcdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>카카오 로그인(REST API)</title>
    <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
    <script>
        // SDK를 초기화 합니다. 사용할 앱의 JavaScript 키를 설정해 주세요.
        Kakao.init('<?= $JAVASCRIPT_KEY ?>'); //★ 수정 할 것
        // SDK 초기화 여부를 판단합니다.
        console.log(Kakao.isInitialized());
    </script>
</head>

<body>
    <header>
        <nav class="navbar-expand-sm navbar-toggleable-sm ng-white border-bottom box-shadow mb-3 navbar navbar-light">
            <div class="container"><a class="navbar-brand" href="/"><img src="/img/icon/googsu.png" class="logo" alt="logo">Kakao API Test</a>
                <h1>카카오 로그인(REST API)</h1>
            </div>
        </nav>
    </header>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <h2>JavaScript SDK 로그인(Redirect)</h2>
                <a id="custom-login-btn" href="javascript:loginWithKakao()"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
                <script type="text/javascript">
                    function loginWithKakao() {
                        Kakao.Auth.authorize({
                            redirectUri: 'http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php' //★ 수정 할 것
                        })
                    }
                </script>
                <pre><code class="JavaScript">
// SDK를 초기화 합니다. 사용할 앱의 JavaScript 키를 설정해 주세요.
Kakao.init('{JAVASCRIPT_KEY}'); //★ 수정 할 것
// SDK 초기화 여부를 판단합니다.
console.log(Kakao.isInitialized());

function loginWithKakao() {
    Kakao.Auth.authorize({
        redirectUri: 'http://localhost/callBackForKakao.php' //★ 수정 할 것
    })
}                
                </code></pre>
            </li>

            <li class="list-group-item">
                <h2>REST API 로그인</h2>
                <?php
                //state는 Cross-Site Request Forgery(CSRF) 공격으로부터 보호하기 위해 난수 설정 후, 콜백 페이지에서 검증할 수 있는 기능이나
                //로그인 후, 원래 페이지로 돌아가기 위한 파라메터로 사용하기도 함.
                $state = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/returnPage.php?test=한글&p=인코딩");
                $client_id = $REST_API_KEY; //★ 수정 할 것
                $redirect_uri = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/callBackForKakao.php"); //★ 수정 할 것
                $kakaoLoginUrl = "https://kauth.kakao.com/oauth/authorize?client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&response_type=code&state=" . $state;
                ?>
                <a href="<?= $kakaoLoginUrl ?>"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
                <pre><code class="PHP">
//state는 Cross-Site Request Forgery(CSRF) 공격으로부터 보호하기 위해 난수 설정 후, 콜백 페이지에서 검증할 수 있는 기능이나
//로그인 후, 원래 페이지로 돌아가기 위한 파라메터로 사용하기도 함.
$state = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/returnPage.php?test=한글&p=인코딩"); 
$client_id = $REST_API_KEY; //★ 수정 할 것
$redirect_uri = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/callBackForKakao.php"); //★ 수정 할 것
$kakaoLoginUrl = "https://kauth.kakao.com/oauth/authorize?client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&response_type=code&state=" . $state;
                </code></pre>
            </li>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>