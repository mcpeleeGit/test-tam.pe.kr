<?php
require(__DIR__ . '/api/common/route.php');
Route::init($_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="kr">

<head>
    <title>Kakao API Platform TAM Test Site</title>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
</head>

<body>
    <div class="container">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
    </div>

    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">Kakao API Test</h3>

                <div>
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title h5">
                                    <a href="/kakao.php">카카오 로그인(싱크)</a>
                                </div>
                                <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                                <a href="/kakao_talk_channel.php">[카카오톡 채널]</a> 
                                <a href="/kakao_talk_social.php">[카카오톡 소셜]</a>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title h5">
                                    <a href="http://test-tam.pe.kr/kakao_talk_message.html">테스트</a>
                                </div>
                                <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                                <a href="/inapp_check.php">[inapp check]</a>
                                <a href="/facebook.php">[Facebook]</a>
                                <a class="p-2 link-secondary" href="/firebase.php">Firebase authetication OIDC 테스트</a><a class="p-2 link-secondary" href="/okta.php">OKTA OIDC 테스트</a>
                                <a target="_blank" href="/msg_test.php">[카카오톡 공유 버튼 링크]</a>
                                <a href="/js_sdk_v1_1.43.5.php">[Kakao Javascript SDK v1.43.5]</a>
                                <a href="/og_tag.php">[Open Graph Tag]</a>
                                <a href="/followChannel.php">[카카오톡 채널 간편 추가 with 사용자 액션 유무에 따른 차이]</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title h5">
                                    <a href="https://devtalk.kakao.com/t/rest-api-node-js/119865">rest api 예제</a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="https://devtalk.kakao.com/t/rest-api-node-js/119865">[node.js]</a> 
                                <a href="https://devtalk.kakao.com/t/rest-api-php/115056">[php]</a> 
                                <a href="https://devtalk.kakao.com/t/rest-api-java-spring-boot/115579">[java (spring boot)]</a>
                                <a href="https://devtalk.kakao.com/t/rest-api-c-asp-net-core/117166">[c# (asp.net core)]</a>
                                <a href="https://devtalk.kakao.com/t/rest-api-c-asp-net-6-0-nuget-library/123358">[c# (asp.net 6.0 nuget library)]</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h4 class="fst-italic">DevTalk-개발자 포럼</h4>
                        <p class="mb-0">
                            <a href="https://devtalk.kakao.com/t/faq/114724" target="_blank">Faq 목록 입니다</a>
                        </p>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Category</h4>
                        <ol class="list-unstyled mb-0">
                            <li>
                                <a href="https://devtalk.kakao.com/c/notice/108" target="_blank">Notice / 공지</a>
                            </li>
                        </ol>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Elsewhere</h4>
                        <ol class="list-unstyled">
                            <li>
                                <a target="_blank" href="https://developers.kakao.com/terms/latest/ko/site-policies">카카오 디벨로퍼스 운영 정책</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://developers.kakao.com/terms/latest/ko/site-policies">카카오 디벨로퍼스 보안 권장사항</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://developers.kakao.com/tool/rest-api/open/get/v2-user-me">REST API 테스트</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://developers.kakao.com/tool/template-builder/app">메시지 템플릿 빌더</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://developers.kakao.com/tool/demo/login/login">JS SDK 데모</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://developers.kakao.com/tool/debugger/sharing">공유 디버거</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://developers.kakao.com/tool/resource/login">이미지 리소스 다운로드</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>
</body>

</html>