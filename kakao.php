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
//echo $_GET["pt"];
//echo $_GET["docnum"];
?>
<?php
$_SESSION["session"] = "session_value";


$cookie_option = array(
    'expires' => time() + 31556926,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => false,
    'httponly' => false
);
setcookie('workershigh_user_session', $_SESSION["session"], $cookie_option);
setcookie('compare_user_session', $_SESSION["session"], time() + 31556926, '/', $_SERVER['HTTP_HOST']);
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
    <!--highlight.js cdn-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/highlight.min.js"></script>
    <!--bootstrapcdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--toastr-->
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="/toastrWrapper.js?test1"></script>


    <title>카카오 로그인 //developers.kakao.com/sdk/js/kakao.min.js</title>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script>
        // SDK를 초기화 합니다. 사용할 앱의 JavaScript 키를 설정해 주세요.
        Kakao.init('<?= $JAVASCRIPT_KEY ?>'); //★ 수정 할 것
        // SDK 초기화 여부를 판단합니다.
        console.log(Kakao.isInitialized());
    </script>
    <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
    <script type="text/javascript">
        kakaoPixel('541043381581099928').pageView();
    </script>
</head>

<body>
    <div class="container">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
    </div>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <h2>로그인</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#JavaScript">JavaScript SDK 로그인(Redirect)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#JavaScript1">JavaScript SDK 로그인(PopUp)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="JavaScript">
                        
                        <a href="https://accounts.kakao.com">카카오 계정 페이지</a>
                        <script type="text/javascript">
                            const code = location.search.split('?code=')[1];
                            if (code !== undefined) {
                                logoutWithKakaoAjax(code);
                            }

                            function logoutWithKakaoAjax(code) {
                                const JS_APP_KEY = "2d68640b56d986af5c8a48505c7c8c71";
                                const REDIRECT_URI = "http://localhost/kakao.php";
                                const makeFormData = params => {
                                    const searchParams = new URLSearchParams()
                                    Object.keys(params).forEach(key => {
                                        searchParams.append(key, params[key])
                                    })
                                    return searchParams
                                }

                                $.ajax({
                                    type: "POST",
                                    url: 'https://kauth.kakao.com/oauth/token',
                                    data: {
                                        grant_type: 'authorization_code',
                                        client_id: JS_APP_KEY,
                                        redirect_uri: REDIRECT_URI,
                                        code
                                    },
                                    beforeSend: function(xhr) {
                                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded;charset=utf-8");
                                    },
                                    success: function(res) {
                                        console.log("jquery");
                                        console.log(res);
                                    }
                                });
                            }
                        </script>


                        <h2>Axios Auth 테스트</h2>
                        <script type="text/javascript">
                            //axios.get('https://kauth.kakao.com/oauth/authorize?client_id=4408b5bb51bdf4c89879e933556a21e8&redirect_uri=http://localhost/kakao.php&response_type=code', {params: {},withCredentials: false,});
                        </script>


                        <p></p>
                        <p>Kakao JavaScript SDK를 이용한 Redirect방식 로그인은 Kakao인증 후, CallBack Url이 호출됩니다. 즉, CallBack Url이 호출된 이후에는 REST API 방식 사용</p>
                        <a id="custom-login-btn" href="javascript:loginWithKakao()"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
                        <script type="text/javascript">
                            function loginWithKakao() {
                                Kakao.Auth.authorize({
                                    //serviceTerms: ' ', //sms
                                    //prompt: 'none', v1에서 지원 안함
                                    //throughTalk: false,
                                    //scope: 'name,shipping_address',
                                    redirectUri: encodeURI('http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php') //★ 수정 할 것

                                })
                            }
                        </script>
                        <p></p>
                        <pre><code class="JavaScript">
Kakao.init('{JAVASCRIPT_KEY}'); //★ 수정 할 것 : SDK를 초기화 합니다. 사용할 앱의 JavaScript 키를 설정해 주세요.
console.log(Kakao.isInitialized()); // SDK 초기화 여부를 판단합니다.

function loginWithKakao() {
    Kakao.Auth.authorize({
        redirectUri: encodeURI('http://localhost/callBackForKakao.php') //★ 수정 할 것
    })
}                       </code></pre>
                        <pre><code class="language-html">
<a id="custom-login-btn" href="javascript:loginWithKakao()"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
                        </code></pre>
                    </div>
                    <div class="tab-pane fade show" id="JavaScript1">

                        <p></p>
                        <p>Kakao JavaScript SDK를 이용한 PopUp방식 로그인은 Kakao인증 후, CallBack Url 호출하지 않습니다. 즉, Kakao인증 이후에는 로그인 후 처리 및 액세스 토큰 저장을 Script에서 해야합니다.</p>
                        <a id="custom-login-btn" href="javascript:loginWithKakaoPopUp()"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
                        <script type="text/javascript">
                            function loginWithKakaoPopUp() {
                                Kakao.Auth.login({
                                    success: function(authObj) {
                                        console.log("success")
                                        console.log(JSON.stringify(authObj));
                                        Kakao.Auth.setAccessToken(authObj.access_token);
                                        //★ 추가 할 것 : 로그인 성공 후 처리 
                                    },
                                    fail: function(err) {
                                        console.log("fail")
                                        console.log(JSON.stringify(err))
                                    },
                                    always: function(sc, fc) {
                                        console.log("always")
                                        console.log(JSON.stringify(sc))
                                        console.log(JSON.stringify(fc))
                                    }
                                })
                            }
                        </script>
                        <p></p>
                        <pre><code class="JavaScript">
Kakao.init('{JAVASCRIPT_KEY}'); //★ 수정 할 것 : SDK를 초기화 합니다. 사용할 앱의 JavaScript 키를 설정해 주세요.
console.log(Kakao.isInitialized()); // SDK 초기화 여부를 판단합니다.

function loginWithKakaoPopUp() {
    Kakao.Auth.login({
        success: function(authObj) {
            alert(JSON.stringify(authObj));
            Kakao.Auth.setAccessToken(authObj.access_token);
            //★ 추가 할 것 : 로그인 성공 후 처리 
        },
        fail: function(err) {
            alert(JSON.stringify(err))
        },
    })
}</code></pre>
                        <pre><code class="language-html">
<a id="custom-login-btn" href="javascript:loginWithKakaoPopUp()"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
</code></pre>













                        <h2>Axios Unlink test</h2>
                        <button type="button" class="btn btn-primary" onclick="javascript:AxiosUnlink()">Axios Unlink test</button>
                        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                        <script type="text/javascript">
                            function AxiosUnlink() {
                                AxiosUnlinktest()
                                    .then(({
                                        data
                                    }) => {
                                        console.log('AxiosUnlinktest:', data)
                                    })
                                    .catch(err => {
                                        console.error('AxiosUnlinktest:', err)
                                    })
                            }


                            function AxiosUnlinktest2() {
                                const JS_APP_KEY = "4ac81d20d480a5f0a4341acd56f003c3";
                                const makeFormData = params => {
                                    const searchParams = new URLSearchParams()
                                    Object.keys(params).forEach(key => {
                                        searchParams.append(key, params[key])
                                    })

                                    return searchParams
                                }

                                return axios({
                                    method: 'POST',
                                    headers: {
                                        'Access-Control-Allow-Origin': '*',
                                        'content-type': 'application/x-www-form-urlencoded;charset=utf-8',
                                        Authorization: 'KakaoAK ' + JS_APP_KEY
                                    },
                                    url: 'https://kapi.kakao.com/v1/user/unlink',
                                    data: makeFormData({
                                        target_id: 1615828740,
                                        target_id_type: 'user_id'
                                    })
                                })
                            }



                            function AxiosUnlinktest() {
                                const JS_APP_KEY = "4408b5bb51bdf4c89879e933556a21e8";
                                const makeFormData = params => {
                                    const searchParams = new URLSearchParams()
                                    Object.keys(params).forEach(key => {
                                        searchParams.append(key, params[key])
                                    })

                                    return searchParams
                                }

                                return axios({
                                    method: 'POST',
                                    headers: {
                                        'content-type': 'application/x-www-form-urlencoded;charset=utf-8',
                                        'Authorization': 'KakaoAK ' + JS_APP_KEY
                                    },
                                    url: 'https://dapi.kakao.com/v2/search/web',
                                    data: makeFormData({
                                        query: 'test'
                                    })
                                })
                            }
                        </script>


                        <h2>JavaScript SDK 로그아웃</h2>
                        <p>JavaScript SDK로 로그인(PopUp)한 경우만 사용, Redirect로그인 or REST API 로그인은 이후 로직 REST API로 로그아웃 구현 해야함.</p>
                        <p>JavaScript SDK를 사용하고자 한다면, Kakao.Auth.setAccessToken(authObj.access_token); 설정 후 사용</p>
                        <button type="button" class="btn btn-primary" onclick="javascript:logoutWithKakao()">Kakao LogOut</button>
                        <script type="text/javascript">
                            function logoutWithKakao() {
                                if (!Kakao.Auth.getAccessToken()) {
                                    console.log('Not logged in.');
                                    return;
                                }
                                console.log(Kakao.Auth.getAccessToken()); //before Logout
                                Kakao.Auth.logout(function() {
                                    console.log(Kakao.Auth.getAccessToken()); //after Logout
                                    console.log("LogOut Success");
                                    //★ 추가 할 것 : 로그아웃 성공 후 처리 
                                });
                            }
                        </script>
                        <pre><code class="JavaScript">
function logoutWithKakao() {
    if (!Kakao.Auth.getAccessToken()) {
        console.log('Not logged in.');
        alert("Not logged in.");
        return;
    }
    console.log(Kakao.Auth.getAccessToken()); //before Logout
    Kakao.Auth.logout(function() {
        console.log(Kakao.Auth.getAccessToken()); //after Logout
        alert("LogOut Success");
        //★ 추가 할 것 : 로그아웃 성공 후 처리 
    });
}               </code></pre>




                        <h2>JavaScript 연결 끊기</h2>
                        <p>JavaScript SDK로 로그인(PopUp)한 경우만 사용, Redirect로그인 or REST API 로그인은 이후 로직 REST API로 로그아웃 구현 해야함.</p>
                        <p>JavaScript SDK를 사용하고자 한다면, Kakao.Auth.setAccessToken(authObj.access_token); 설정 후 사용</p>
                        <button type="button" class="btn btn-primary" onclick="javascript:unlinkWithKakao()">Kakao UnLink</button>
                        <script type="text/javascript">
                            function unlinkWithKakao() {
                                Kakao.API.request({
                                    url: '/v1/user/unlink',
                                    success: function(response) {
                                        console.log(response);
                                    },
                                    fail: function(error) {
                                        console.log(error);
                                    }
                                });
                            }
                        </script>
                        <pre><code class="JavaScript">
function unlinkWithKakao() {
    Kakao.API.request({
        url: '/v1/user/unlink',
        success: function(response) {
            console.log(response);
        },
        fail: function(error) {
            console.log(error);
        }
    });
}               </code></pre>

                        <h2>JavaScript 사용자 정보 가져오기</h2>
                        <p>JavaScript SDK로 로그인(PopUp)한 경우만 사용, Redirect로그인 or REST API 로그인은 이후 로직 REST API로 로그아웃 구현 해야함.</p>
                        <p>JavaScript SDK를 사용하고자 한다면, Kakao.Auth.setAccessToken(authObj.access_token); 설정 후 사용</p>
                        <button type="button" class="btn btn-primary" onclick="javascript:profileWithKakao()">Kakao Profile</button>
                        <p id="userid"></p>
                        <p id="nickname"></p>
                        <img id="profile_image" />
                        <img id="thumbnail_image" />
                        <script type="text/javascript">
                            function profileWithKakao() {
                                Kakao.API.request({
                                    url: '/v2/user/me',
                                    success: function(response) {
                                        console.log(response);
                                        document.getElementById("userid").innerText = response.id;
                                        document.getElementById("nickname").innerText = response.kakao_account.profile.nickname;
                                        document.getElementById("profile_image").src = response.properties.profile_image;
                                        document.getElementById("thumbnail_image").src = response.properties.thumbnail_image;
                                    },
                                    fail: function(error) {
                                        console.log(error);
                                    }
                                });
                            }
                        </script>
                        <pre><code class="JavaScript">
function profileWithKakao() {
    Kakao.API.request({
        url: '/v2/user/me',
        success: function(response) {
            console.log(response);
            document.getElementById("userid").innerText = response.id;
            document.getElementById("nickname").innerText = response.kakao_account.profile.nickname;
            document.getElementById("profile_image").src = response.properties.profile_image;
            document.getElementById("thumbnail_image").src = response.properties.thumbnail_image;
        },
        fail: function(error) {
            console.log(error);
        }
    });
}               </code></pre>


                    </div>
                    <div class="tab-pane fade" id="PHP">
                        <p></p>
                        <h4><a href="/PHPSimplePack.php">PHP Simple Pack 참고</a></h4>
                        <h4><a href="/kakaoCurlTest.php">PHP Curl Test</a></h4>
                        <p></p>
                        <p>/oauth/authorize 요청은 Url만 호출 하므로 언어에 상관 없이 처리 가능합니다. 다만, CallBack Url설정 시, 인코딩을 해야합니다.</p>
                        <!--REST API Login-->
                        <?php
                        //state는 Cross-Site Request Forgery(CSRF) 공격으로부터 보호하기 위해 난수 설정 후, 콜백 페이지에서 검증할 수 있는 기능이나
                        //로그인 후, 원래 페이지로 돌아가기 위한 파라메터로 사용하기도 함.
                        $state = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/kakao.php?test=한글&p=인코딩");
                        $client_id = $REST_API_KEY; //★ 수정 할 것
                        $redirect_uri = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/callBackForKakao.php"); //★ 수정 할 것
                        $kakaoLoginUrl = "https://kauth.kakao.com/oauth/authorize?client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&response_type=code&state=" . $state;
                        ?>
                        <a href="<?= $kakaoLoginUrl ?>"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
                        <p></p>
                        <!--talk profile-->
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            GET kauth.kakao.com/oauth/authorize HTTP/1.1
                        </div>
                        <pre><code class="php">
//state는 Cross-Site Request Forgery(CSRF) 공격으로부터 보호하기 위해 난수 설정 후, 콜백 페이지에서 검증할 수 있는 기능이나
//로그인 후, 원래 페이지로 돌아가기 위한 파라메터로 사용하기도 함.
$state = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/returnPage.php?test=한글&p=인코딩"); 
$client_id = $REST_API_KEY; //★ 수정 할 것
$redirect_uri = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/callBackForKakao.php"); //★ 수정 할 것
$kakaoLoginUrl = "https://kauth.kakao.com/oauth/authorize?client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&response_type=code&state=" . $state;
                        </code></pre>

                        <!--REST API LogOut With Kakao-->
                        <?php
                        $redirect_uri = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/kakao.php"); //★ 수정 할 것
                        $kakaoLogOutUrl = "https://kauth.kakao.com/oauth/logout?client_id=" . $client_id . "&logout_redirect_uri=" . $redirect_uri;
                        ?>
                        <a href="<?= $kakaoLogOutUrl ?>">LogOut</a>
                        <p></p>
                        <?= 'https://pf-link.kakao.com/qr/_hyMVC/pages/_aI?q?query=' . urlencode('state=store%3D1') ?>
                    </div>
                    
                </div>
            </li>
        </ul>
    </div>


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

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-47335028-5"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-47335028-5');

    //alert(document.referrer);
</script>
HTTP_USER_AGENT <?php echo $_SERVER['HTTP_USER_AGENT']; ?><br />
HTTP_REFERER <?= $_SERVER['HTTP_REFERER'] ?><br />
URL ENCODING <?= "https://msearch.shopping.naver.com/search/all?query=" . urlencode("박막례+밀키트") ?><br />
<a href="http://test-tam.pe.kr/kakao.php" target="_blank" rel="me nofollow noopener noreferrer">http://test-tam.pe.kr/kakao.php</a>
<a href="http://test-tam.pe.kr/kakao.php">no _blank</a>
<a href="http://pf.kakao.com/_xgTNZs/chat">http://pf.kakao.com/_xgTNZs/chat</a>
<?php
$_SERVER['HTTP_USER_AGENT'] = "UA CHANGE";
echo $_SERVER['HTTP_USER_AGENT'];
?>
<br /><br /><br />
<?= "this is session : " . $_SESSION["session"] ?>
<br /><br /><br />
<?= "this is cookie : " . $_COOKIE['workershigh_user_session'] ?>
<br /><br /><br />
<?= "this is cookie : " . $_COOKIE['compare_user_session'] ?>
<script>
    const cat = localStorage.getItem("myCat");

    if (cat === null) {
        document.write("response.write : null");
        localStorage.setItem("myCat", "<br/>Tom");
    } else {
        document.write(cat);
        console.log("not null");
    }
</script>

<script>
    // 스토리지 테스트 유틸리티
    const StorageTest = {
        // localStorage 테스트
        testLocalStorage() {
            document.write('1. LocalStorage 테스트');
            try {
                localStorage.setItem('test-key', 'test-value');
                const value = localStorage.getItem('test-key');
                document.write('✅ localStorage 쓰기 성공:', value);
                localStorage.removeItem('test-key');
                document.write('✅ localStorage 삭제 성공');
            } catch (e) {
                document.write('❌ localStorage 에러:', e);
            }
        },

        // sessionStorage 테스트
        testSessionStorage() {
            document.write('2. SessionStorage 테스트');
            try {
                sessionStorage.setItem('test-key', 'test-value');
                const value = sessionStorage.getItem('test-key');
                document.write('✅ sessionStorage 쓰기 성공:', value);
                sessionStorage.removeItem('test-key');
                document.write('✅ sessionStorage 삭제 성공');
            } catch (e) {
                document.write('❌ sessionStorage 에러:', e);
            }
        },

        // 쿠키 테스트
        testCookie() {
            document.write('3. Cookie 테스트');
            try {
                document.cookie = 'test-key=test-value;path=/';
                const cookies = document.cookie;
                document.write('현재 쿠키:', cookies);
                if (cookies.includes('test-key=test-value')) {
                    document.write('✅ 쿠키 쓰기 성공');
                } else {
                    document.write('❌ 쿠키 쓰기 실패');
                }
            } catch (e) {
                document.write('❌ 쿠키 에러:', e);
            }
        },

        // URL 파라미터 테스트
        testURLParams() {
            document.write('4. URL 파라미터 테스트');
            try {
                const url = new URL(window.location.href);
                url.searchParams.set('test-key', 'test-value');
                document.write('테스트 URL:', url.toString());
                const param = url.searchParams.get('test-key');
                document.write('✅ URL 파라미터 접근 성공:', param);
            } catch (e) {
                document.write('❌ URL 파라미터 에러:', e);
            }
        },

        // 환경 정보 출력
        logEnvironmentInfo() {
            document.write('환경 정보');
            document.write('UserAgent:', navigator.userAgent);
            document.write('Platform:', navigator.platform);
            document.write('웹뷰 여부:', /kakao|twitter/i.test(navigator.userAgent));
        },

        // 모든 테스트 실행
        runAllTests() {
            document.write('=== 스토리지 가용성 테스트 시작 ===');
            this.logEnvironmentInfo();
            this.testLocalStorage();
            this.testSessionStorage();
            this.testCookie();
            this.testURLParams();
            document.write('=== 테스트 완료 ===');
        }
    };

    // 테스트 실행
    StorageTest.runAllTests();
</script>