<?php
session_start();
$APP_ADMIN_KEY = "72462462f6fc9baad63f2de2ad3d865b";
$REST_API_KEY = "4408b5bb51bdf4c89879e933556a21e8";
$JAVASCRIPT_KEY = "2d68640b56d986af5c8a48505c7c8c71";
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
    <!--highlight.js cdn-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/highlight.min.js"></script>
    <!--bootstrapcdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>카카오톡 소셜</title>
    <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
    <script>
        // SDK를 초기화 합니다. 사용할 앱의 JavaScript 키를 설정해 주세요.
        Kakao.init('<?= $JAVASCRIPT_KEY ?>'); //★ 수정 할 것
        // SDK 초기화 여부를 판단합니다.
        console.log(Kakao.isInitialized());
    </script>
    <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
    <script type="text/javascript">
        kakaoPixel('541043381581099928').addToCart({
            id: 'kakao_talk_social'
        });
    </script>
</head>

<body>
    <header>
        <nav class="navbar-expand-sm navbar-toggleable-sm ng-white border-bottom box-shadow mb-3 navbar navbar-light">
            <div class="container"><a class="navbar-brand" href="/">Kakao API Test</a>
                <h1>카카오톡 소셜</h1>
            </div>
        </nav>
    </header>
    eeerwerwerwerwerwere
    <?php
    // $url = "https://kapi.kakao.com/v2/push/send?uuids=[1]&push_message={}";
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $header = "KakaoAK 2d91bd51f8b59ecfc699619321614477";
    // $headers = array();
    // $headers[] = "Authorization: " . $header;
    // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // $res = curl_exec($ch);
    // $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // curl_close($ch);
    // var_dump($res);
    ?>

    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <h2>프로필 가져오기</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#JavaScript">JavaScript</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="JavaScript">

                        <script type="text/javascript">
                            function loginWithKakaoPopUp() {
                                Kakao.Auth.login({
                                    success: function(authObj) {
                                        document.getElementById("Response").innerText = JSON.stringify(authObj);
                                        Kakao.Auth.setAccessToken(authObj.access_token);
                                    },
                                    fail: function(err) {
                                        document.getElementById("Response").innerText = JSON.stringify(err);
                                    },
                                })
                            }

                            function talkProfileWithKakao() {
                                Kakao.API.request({
                                    url: '/v1/api/talk/profile',
                                    success: function(response) {
                                        document.getElementById("Response").innerText = JSON.stringify(response);
                                        document.getElementById("talk_nickname").innerText = response.nickName;
                                        document.getElementById("talk_profile_image").src = response.profileImageURL;
                                        document.getElementById("talk_thumbnail_image").src = response.thumbnailURL;
                                        document.getElementById("talk_countryISO").innerText = response.countryISO;
                                    },
                                    fail: function(error) {
                                        document.getElementById("Response").innerText = error;
                                    }
                                });
                            }
                        </script>
                        <p></p>
                        <a id="custom-login-btn" href="javascript:loginWithKakaoPopUp()"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
                        <button type="button" class="btn btn-primary btn-lg" onclick="javascript:talkProfileWithKakao()">talk Profile</button>

                        <div id="talk_nickname"></div>
                        <div id="talk_countryISO"></div>
                        <img id="talk_profile_image" class="logo2" />
                        <img id="talk_thumbnail_image" class="logo2" />
                        <p></p>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">Response</div>
                        <pre><code class="JavaScript">
Kakao.init('{JAVASCRIPT_KEY}'); //★ 수정 할 것 : SDK를 초기화 합니다. 사용할 앱의 JavaScript 키를 설정해 주세요.
console.log(Kakao.isInitialized()); // SDK 초기화 여부를 판단합니다.

function loginWithKakaoPopUp() {
    Kakao.Auth.login({
        success: function(authObj) {
            document.getElementById("Response").innerText = JSON.stringify(authObj);
            Kakao.Auth.setAccessToken(authObj.access_token);
        },
        fail: function(err) {
            document.getElementById("Response").innerText = JSON.stringify(err);
        },
    })
}

function talkProfileWithKakao() {
    Kakao.API.request({
        url: '/v1/api/talk/profile',
        success: function(response) {
            document.getElementById("Response").innerText = JSON.stringify(response);
            document.getElementById("talk_nickname").innerText = response.nickName;
            document.getElementById("talk_profile_image").src = response.profileImageURL;
            document.getElementById("talk_thumbnail_image").src = response.thumbnailURL;
            document.getElementById("talk_countryISO").innerText = response.countryISO;
        },
        fail: function(error) {
            document.getElementById("Response").innerText = error;
        }
    });
}
                        </code></pre>
                        <pre><code class="language-html">
<a id="custom-login-btn" href="javascript:loginWithKakaoPopUp()"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
<button type="button" class="btn btn-primary btn-lg" onclick="javascript:talkProfileWithKakao()">talk Profile</button>

<div id="talk_nickname"></div>
<div id="talk_countryISO"></div>
<img id="talk_profile_image" class="logo2" />
<img id="talk_thumbnail_image" class="logo2" />
<p></p>
<div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;"  class="w-100 p-3">Response</div>
                        </code></pre>
                    </div>
                    <div class="tab-pane fade" id="PHP">
                        <p></p>
                        <!--REST API Login-->
                        <?php
                        $client_id = $REST_API_KEY;
                        $redirect_uri = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/callBackForKakao.php");
                        $kakaoLoginUrl = "https://kauth.kakao.com/oauth/authorize?client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&response_type=code&state=login&scope=talk_message";
                        ?>
                        <a href="<?= $kakaoLoginUrl ?>"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>scope=talk_message,friends
                        <p></p>
                        <!--talk profile-->
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            GET kapi.kakao.com/v1/api/talk/profile HTTP/1.1 Authorization: Bearer {ACCESS_TOKEN}
                        </div>
                        <?php
                        $url = "https://kapi.kakao.com/v1/api/talk/profile";
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $header = "Bearer " . $_SESSION["accessToken"];
                        $headers = array();
                        $headers[] = "Authorization: " . $header;
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                        $res = curl_exec($ch);
                        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);
                        ?>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3"><?= var_dump($res) ?></div>
                        <pre><code class="php">
$url = "https://kapi.kakao.com/v1/api/talk/profile";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$header = "Bearer " . $_SESSION["accessToken"];
$headers = array();
$headers[] = "Authorization: " . $header;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$res = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
                        </code></pre>
                    </div>
                </div>
            </li>


            <li class="list-group-item">
                <h2>친구 목록 가져오기</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#JavaScript1">JavaScript</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#PHP1">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="JavaScript1">

                        <script type="text/javascript">
                            function talkFriendListAuthorizeWithKakao() {
                                Kakao.Auth.login({
                                    scope: 'talk_message,friends',
                                    success: function(response) {
                                        document.getElementById("Response1").innerText = JSON.stringify(response);
                                    },
                                    fail: function(error) {
                                        document.getElementById("Response1").innerText = error;
                                    }
                                });
                            }

                            function talkFriendListWithKakao() {
                                Kakao.API.request({
                                    url: '/v1/api/talk/friends',
                                    success: function(response) {
                                        document.getElementById("Response1").innerText = JSON.stringify(response);
                                    },
                                    fail: function(error) {
                                        document.getElementById("Response1").innerText = error;
                                    }
                                });
                            }
                        </script>

                        <p></p>
                        <button type="button" class="btn btn-primary btn-lg" onclick="javascript:talkFriendListAuthorizeWithKakao()">talk Friend List authorize</button>
                        <button type="button" class="btn btn-primary btn-lg" onclick="javascript:talkFriendListWithKakao()">talk Friend List</button>
                        <p></p>
                        <div id="Response1" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">Response</div>

                        <pre><code class="JavaScript">
function talkFriendListAuthorizeWithKakao() {
    Kakao.Auth.login({
        scope: 'talk_message,friends',
        success: function(response) {
            console.log(response);
        },
        fail: function(error) {
            console.log(error);
        }
    });
}

function talkFriendListWithKakao() {
    Kakao.API.request({ 
        url: '/v1/api/talk/friends',
        success: function(response) {
            console.log(response);
            document.getElementById("friend_list").innerText = JSON.stringify(response);
        },
        fail: function(error) {
            console.log(error);
        }
    });
}
                        </code></pre>
                        <pre><code class="language-html">
<button type="button" class="btn btn-primary btn-lg" onclick="javascript:talkFriendListAuthorizeWithKakao()">talk Friend List authorize</button>
<button type="button" class="btn btn-primary btn-lg" onclick="javascript:talkFriendListWithKakao()">talk Friend List</button>
<p></p>
<div id="Response1" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">Response</div>
                        </code></pre>


                    </div>
                    <div class="tab-pane fade" id="PHP1">
                        <p></p>
                        <!--talk friend-->
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            GET kapi.kakao.com/v1/api/talk/friends HTTP/1.1 Authorization: Bearer {ACCESS_TOKEN}
                        </div>
                        <?php
                        $url = "https://kapi.kakao.com/v1/api/talk/friends?limit=3&order=asc";
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $header = "Bearer " . $_SESSION["accessToken"];
                        $headers = array();
                        $headers[] = "Authorization: " . $header;
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                        $res = curl_exec($ch);
                        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                        foreach (json_decode($res)->elements as $obj) {
                            echo $obj->profile_nickname;
                        }

                        curl_close($ch);
                        ?>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3"><?= var_dump($res) ?></div>
                        <pre><code class="php">
$url = "https://kapi.kakao.com/v1/api/talk/friends";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$header = "Bearer " . $_SESSION["accessToken"];
$headers = array();
$headers[] = "Authorization: " . $header;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$res = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
                        </code></pre>

                    </div>
                </div>
            </li>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        hljs.initHighlightingOnLoad();
        document.querySelectorAll("code").forEach(function(element) {
            element.innerHTML = element.innerHTML.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
        });
    </script>
</body>

</html>