<?php
require('KakaoAPIService.php');
$KakaoAPIService = new KakaoAPIService();

$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
$KakaoAPIService->REDIRECT_URI = urlencode($protocol . $_SERVER['HTTP_HOST'] . "/callBackForKakao.php");
$actual_link = urlencode($protocol . $_SERVER["HTTP_HOST"] . "/kakao_talk_message.php?lang=php");

$lang="";
if(isset($_GET["lang"])){
    $lang = $_GET["lang"];
}

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
    <title>카카오톡 메세지</title>
    <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
    <script>
        Kakao.init('<?= $KakaoAPIService->JAVASCRIPT_KEY ?>'); //★ 수정 할 것 : SDK를 초기화 합니다. 사용할 앱의 JavaScript 키를 설정해 주세요.
        console.log(Kakao.isInitialized()); // SDK 초기화 여부를 판단합니다.
    </script>
</head>

<body>
    <header>
        <nav class="navbar-expand-sm navbar-toggleable-sm ng-white border-bottom box-shadow mb-3 navbar navbar-light">
            <div class="container"><a class="navbar-brand" href="/"><img src="/img/icon/googsu.png" class="logo" alt="logo">Kakao API Test</a>
                <h1>카카오톡 메세지</h1>
            </div>
        </nav>
    </header>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <h2>나에게 기본 메시지 보내기</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?=$lang==""? 'active':''?>" data-toggle="tab" href="#JavaScript">JavaScript</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$lang=="php"? 'active':''?>" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade <?=$lang==""? 'show active':''?>" id="JavaScript">
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
    function defaultSend() {
        document.getElementById("Response").innerText = "Response";
        Kakao.API.request({
            url: '/v2/api/talk/memo/default/send',
            data: {
                template_object: {
                    object_type: 'feed',
                    content: {
                        title: '카카오톡 링크 4.0',
                        description: '디폴트 템플릿 FEED',
                        image_url:
                            'http://mud-kage.kakao.co.kr/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png',
                        link: {
                            web_url: 'https://developers.kakao.com',
                            mobile_web_url: 'https://developers.kakao.com',
                        },
                    },
                    social: {
                        like_count: 100,
                        comment_count: 200,
                    },
                    button_title: '바로 확인',
                },
            },
            success: function (response) {
                document.getElementById("Response").innerText = JSON.stringify(response);
            },
            fail: function (error) {
                document.getElementById("Response").innerText = error;
            },
        });
    }        

    function defaultScrapSend() {
        document.getElementById("Response").innerText = "Response";
        Kakao.API.request({
            url: '/v2/api/talk/memo/scrap/send',
            data: {
                request_url: 'http://test-tam.pe.kr',
            },
            success: function (response) {
                document.getElementById("Response").innerText = JSON.stringify(response);
            },
            fail: function (error) {
                document.getElementById("Response").innerText = error;
            },
        });
    }

    function defaultTemplateSend() {
        document.getElementById("Response").innerText = "Response";
        Kakao.API.request({
            url: '/v2/api/talk/memo/send',
            data: {
                template_id: 41666,
            },
            success: function (response) {
                document.getElementById("Response").innerText = JSON.stringify(response);
            },
            fail: function (error) {
                document.getElementById("Response").innerText = error;
            },
        });
    }

    function friendSend() {
        document.getElementById("Response").innerText = "Response";
        Kakao.API.request({
            url: '/v1/api/talk/friends/message/default/send',
            data: {
                receiver_uuids: ['rZysnKWWpp6ni7KEvIy4jLuXpJShk6ef_A'],
                template_object: {
                    object_type: 'feed',
                    content: {
                        title: '카카오톡 링크 4.0',
                        description: '디폴트 템플릿 FEED',
                        image_url:
                            'http://mud-kage.kakao.co.kr/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png',
                        link: {
                            web_url: 'https://developers.kakao.com',
                            mobile_web_url: 'https://developers.kakao.com',
                        },
                    },
                    social: {
                        like_count: 100,
                        comment_count: 200,
                    },
                    button_title: '바로 확인',
                },
            },
            success: function (response) {
                document.getElementById("Response").innerText = JSON.stringify(response);
            },
            fail: function (error) {
                document.getElementById("Response").innerText = error;
            },
        });
    }                                                
</script>
<p></p>
<a id="custom-login-btn" href="javascript:loginWithKakaoPopUp()"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
<button type="button" class="btn btn-primary btn-sm" onclick="javascript:defaultSend()">나에게 기본 메시지 보내기</button>
<button type="button" class="btn btn-primary btn-sm" onclick="javascript:defaultScrapSend()">나에게 스크랩 메시지 보내기</button>
<button type="button" class="btn btn-primary btn-sm" onclick="javascript:defaultTemplateSend()">나에게 템플릿 메시지 보내기</button>
<button type="button" class="btn btn-primary btn-sm" onclick="javascript:friendSend()">친구에게 기본 메시지 보내기</button>  
<p></p>
<div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">Response</div>
<pre><code class="JavaScript" id="sample"></code></pre>
                    </div>
                    <div class="tab-pane fade <?=$lang=="php"? 'show active':''?>" id="PHP">
                        <p></p>
                        <script type="text/javascript">
                            function loginWithKakao() {
                                Kakao.Auth.authorize({
                                    redirectUri: 'http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php' //★ 수정 할 것
                                })
                            }
                        </script>
                        <a href="<?=$KakaoAPIService->getKakaoLoginLinkAndReturnUrl($actual_link)?>"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
                        <a href="<?=$KakaoAPIService->getAuthorizeLink("talk_message,friends", $actual_link)?>" class="btn btn-primary">메세지 발송 권한 획득</a>
                        <p></p>
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            POST kapi.kakao.com/v2/api/talk/memo/default/send HTTP/1.1 Authorization: Bearer {ACCESS_TOKEN}
                        </div>
                        <?php
$data = 'template_object={    "object_type": "feed",    "content": {        "title": "디저트 사진",        "description": "아메리카노, 빵, 케익",        "image_url": "http://mud-kage.kakao.co.kr/dn/NTmhS/btqfEUdFAUf/FjKzkZsnoeE4o19klTOVI1/openlink_640x640s.jpg",        "image_width": 640,        "image_height": 640,        "link": {        "web_url": "http://www.daum.net",        "mobile_web_url": "http://m.daum.net",        "android_execution_params": "contentId=100",        "ios_execution_params": "contentId=100"        }    },    "social": {        "like_count": 100,        "comment_count": 200,        "shared_count": 300,        "view_count": 400,        "subscriber_count": 500    },    "buttons": [        {        "title": "웹으로 이동",        "link": {            "web_url": "http://www.daum.net",            "mobile_web_url": "http://m.daum.net"        }        },        {        "title": "앱으로 이동",        "link": {            "android_execution_params": "contentId=100",            "ios_execution_params": "contentId=100"        }        }    ]}';
$res = $KakaoAPIService->sendMessage($data);
$data = 'template_object={    "object_type": "list",    "header_title": "WEEKELY MAGAZINE",    "header_link": {        "web_url": "http://www.daum.net",        "mobile_web_url": "http://m.daum.net",        "android_execution_params": "main",        "ios_execution_params": "main"    },    "contents": [        {        "title": "자전거 라이더를 위한 공간",        "description": "매거진",        "image_url": "http://mud-kage.kakao.co.kr/dn/QNvGY/btqfD0SKT9m/k4KUlb1m0dKPHxGV8WbIK1/openlink_640x640s.jpg",        "image_width": 640,        "image_height": 640,        "link": {            "web_url": "http://www.daum.net/contents/1",            "mobile_web_url": "http://m.daum.net/contents/1",            "android_execution_params": "/contents/1",            "ios_execution_params": "/contents/1"        }        },        {        "title": "비쥬얼이 끝내주는 오레오 카푸치노",        "description": "매거진",        "image_url": "http://mud-kage.kakao.co.kr/dn/boVWEm/btqfFGlOpJB/mKsq9z6U2Xpms3NztZgiD1/openlink_640x640s.jpg",        "image_width": 640,        "image_height": 640,        "link": {            "web_url": "http://www.daum.net/contents/2",            "mobile_web_url": "http://m.daum.net/contents/2",            "android_execution_params": "/contents/2",            "ios_execution_params": "/contents/2"        }        },        {        "title": "감성이 가득한 분위기",        "description": "매거진",        "image_url": "http://mud-kage.kakao.co.kr/dn/NTmhS/btqfEUdFAUf/FjKzkZsnoeE4o19klTOVI1/openlink_640x640s.jpg",        "image_width": 640,        "image_height": 640,        "link": {            "web_url": "http://www.daum.net/contents/3",            "mobile_web_url": "http://m.daum.net/contents/3",            "android_execution_params": "/contents/3",            "ios_execution_params": "/contents/3"        }        }    ],    "buttons": [        {        "title": "웹으로 이동",        "link": {            "web_url": "http://www.daum.net",            "mobile_web_url": "http://m.daum.net"        }        },        {        "title": "앱으로 이동",        "link": {            "android_execution_params": "main",            "ios_execution_params": "main"        }        }    ]}';
$res = $KakaoAPIService->sendMessage($data);                        
$data = 'template_object={    "object_type": "location",    "content": {        "title": "카카오 판교오피스",        "description": "카카오 판교오피스 위치입니다.",        "image_url": "https://mud-kage.kakao.com/dn/drTdbB/bWYf06POFPf/owUHIt7K7NoGD0hrzFLeW0/kakaolink40_original.png",        "image_width": 800,        "image_height": 800,        "link": {        "web_url": "https://developers.kakao.com",        "mobile_web_url": "https://developers.kakao.com/mobile",        "android_execution_params": "platform=android",        "ios_execution_params": "platform=ios"        }    },    "buttons": [        {        "title": "웹으로 보기",        "link": {            "web_url": "https://developers.kakao.com",            "mobile_web_url": "https://developers.kakao.com/mobile"        }        }    ],    "address": "경기 성남시 분당구 판교역로 235 에이치스퀘어 N동 7층",    "address_title": "카카오 판교오피스"}';
$res = $KakaoAPIService->sendMessage($data);
$data = 'template_object={    "object_type": "commerce",    "content": {        "title": "Ivory long dress (4 Color)",        "image_url": "http://mud-kage.kakao.co.kr/dn/RY8ZN/btqgOGzITp3/uCM1x2xu7GNfr7NS9QvEs0/kakaolink40_original.png",        "image_width": 640,        "image_height": 640,        "link": {        "web_url": "https://style.kakao.com/main/women/contentId=100",        "mobile_web_url": "https://style.kakao.com/main/women/contentId=100",        "android_execution_params": "contentId=100",        "ios_execution_params": "contentId=100"        }    },    "commerce": {        "regular_price": 208800,        "discount_price": 146160,        "discount_rate": 30    },    "buttons": [        {        "title": "구매하기",        "link": {            "web_url": "https://style.kakao.com/main/women/contentId=100/buy",            "mobile_web_url": "https://style.kakao.com/main/women/contentId=100/buy",            "android_execution_params": "contentId=100&buy=true",            "ios_execution_params": "contentId=100&buy=true"        }        },        {        "title": "공유하기",        "link": {            "web_url": "https://style.kakao.com/main/women/contentId=100/share",            "mobile_web_url": "https://style.kakao.com/main/women/contentId=100/share",            "android_execution_params": "contentId=100&share=true",            "ios_execution_params": "contentId=100&share=true"        }        }    ]}';
$res = $KakaoAPIService->sendMessage($data);
$data = 'template_object={        "object_type": "text",        "text": "텍스트 영역입니다. 최대 200자 표시 가능합니다.",        "link": {            "web_url": "https://developers.kakao.com",            "mobile_web_url": "https://developers.kakao.com"        },        "button_title": "바로 확인"    }';
$res = $KakaoAPIService->sendMessage($data);
                        ?>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">result_code : <?= $res->result_code ?></div>
                        <pre><code class="php">

//text
$data = 'template_object={
        "object_type": "text",
        "text": "텍스트 영역입니다. 최대 200자 표시 가능합니다.",
        "link": {
            "web_url": "https://developers.kakao.com",
            "mobile_web_url": "https://developers.kakao.com"
        },
        "button_title": "바로 확인"
    }';
$res = $KakaoAPIService->sendMessage($data);
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
        document.getElementById("sample").innerHTML = document.getElementById("JavaScript").innerHTML.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
        hljs.initHighlightingOnLoad();
    </script>
</body>

</html>
