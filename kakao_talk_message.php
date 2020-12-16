<?php
require('KakaoAPIService.php');
$KakaoAPIService = new KakaoAPIService();
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
                        <a class="nav-link active" data-toggle="tab" href="#JavaScript">JavaScript</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="JavaScript">

                        <script type="text/javascript">
                            function defaultSend() {
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
                        </script>
                        <p></p>
                        <button type="button" class="btn btn-primary btn-lg" onclick="javascript:defaultSend()">나에게 기본 메시지 보내기</button>
                        <p></p>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">Response</div>
                        <pre><code class="JavaScript">
<script type="text/javascript">
    function defaultSend() {
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
</script>
<p></p>
<button type="button" class="btn btn-primary btn-lg" onclick="javascript:defaultSend()">나에게 기본 메시지 보내기</button>
<p></p>
<div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">Response</div>
                        </code></pre>
                    </div>
                    <div class="tab-pane fade" id="PHP">
                        <p></p>
                        <!--REST API Login-->
                        <?php
                        $client_id = $REST_API_KEY;
                        $redirect_uri = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/callBackForKakao.php");
                        $kakaoLoginUrl = "https://kauth.kakao.com/oauth/authorize?client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&response_type=code&state=login&scope=talk_message,friends";
                        ?>
                        <a href="<?= $kakaoLoginUrl ?>"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>scope=talk_message,friends
                        <p></p>
                        <!--talk profile-->
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            GET kapi.kakao.com/v1/api/talk/profile HTTP/1.1 Authorization: Bearer {ACCESS_TOKEN}
                        </div>
                        <?php
                        
                        ?>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3"><?= var_dump($res) ?></div>
                        <pre><code class="php">

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


        <tr>
            <td>kakao Link Message</td>
            <td>
                
                <Button onclick="javascript:defaultScrapSend()">defaultScrapSend send</Button>
                <Button onclick="javascript:defaultTemplateSend()">defaultTemplateSend send</Button>
            </td>
        </tr>
        <tr>
            <td>kakao Link Message</td>
            <td>
                <Button onclick="javascript:friendSend()">friend send</Button>
            </td>
        </tr>
    </table>



        function defaultScrapSend() {
            Kakao.API.request({
                url: '/v2/api/talk/memo/scrap/send',
                data: {
                    request_url: 'http://leedongha.dothome.co.kr/',
                },
                success: function (response) {
                    console.log(response);
                },
                fail: function (error) {
                    console.log(error);
                },
            });
        }

        function defaultTemplateSend() {
            Kakao.API.request({
                url: '/v2/api/talk/memo/send',
                data: {
                    template_id: 41666,
                },
                success: function (response) {
                    console.log(response);
                },
                fail: function (error) {
                    console.log(error);
                },
            });
        }

        function friendSend() {
            Kakao.API.request({
                url: '/v1/api/talk/friends/message/default/send',
                data: {
                    receiver_uuids: ['rZysmaufrZStgbiOuY66jryQo5OmlKCY-A'],
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
                    console.log(response);
                },
                fail: function (error) {
                    console.log(error);
                },
            });
        }
    </script>

</body>

</html>