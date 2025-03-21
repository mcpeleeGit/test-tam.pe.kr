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
        <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Kakao JavaScript SDK V2</h1>
                <p class="lead my-3"></p>
                <p class="lead mb-0">
                    <a href="https://developers.kakao.com/docs/latest/ko/javascript/download" target="_blank" class="text-white fw-bold">Downloads...</a>
                </p>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <a href="/js_sdk_v1.php" class="stretched-link"><strong class="d-inline-block mb-2 text-primary">Kakao Javascript SDK v1 Test</strong></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <a href="/js_sdk_v2.php" class="stretched-link"><strong class="d-inline-block mb-2 text-primary">Kakao Javascript SDK v2 Test</strong></a>
                    </div>
                </div>
            </div>
        </div>

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
                                <a target="_blank" rel="noopener noreferrer" href="https://developers.kakao.com/docs/latest/ko/kakaologin/common">[KakaoGuide]</a>&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://kakao-tam.tistory.com/2">[Blog]</a>&nbsp;<a href="/kakao.php">[Sample]</a>&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://github.com/kakao-tam/KakaoAPIForPHP-REST-API-/blob/main/kakao.php">[Github]</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title h5">
                                    <a href="/kakao_talk_channel.php">카카오톡 채널</a>
                                </div>
                                <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                                <a target="_blank" rel="noopener noreferrer" href="https://developers.kakao.com/docs/latest/ko/kakaotalk-channel/common">[KakaoGuide]</a>&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://kakao-tam.tistory.com/14">[Blog]</a>&nbsp;<a href="/kakao_talk_channel.php">[Sample]</a>&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://github.com/kakao-tam/KakaoAPIForPHP-REST-API-/blob/main/kakao_talk_channel.php">[Github]</a>
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
                                <a target="_blank" rel="noopener noreferrer" href="https://developers.kakao.com/docs/latest/ko/kakaosync/common">[KakaoGuide]</a>&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://kakao-tam.tistory.com">[Blog]</a>&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://googsu.com">[Sample Site]</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title h5">
                                    <a href="/kakao_talk_social.php">카카오톡 소셜</a>
                                </div>
                                <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                                <a target="_blank" rel="noopener noreferrer" href="https://developers.kakao.com/docs/latest/ko/kakaotalk-social/common">[KakaoGuide]</a>&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://kakao-tam.tistory.com/3">[Blog]</a>&nbsp;<a href="/kakao_talk_social.php">[Sample]</a>&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://github.com/kakao-tam/KakaoAPIForPHP-REST-API-/blob/main/kakao_talk_social.php">[Github]</a>
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
                            <li>
                                <a href="https://devtalk.kakao.com/c/kakao-sync/115" target="_blank">카카오싱크(Kakao Sync)</a>
                            </li>
                            <li>
                                <a href="https://devtalk.kakao.com/c/android/16" target="_blank">android</a>
                            </li>
                            <li>
                                <a href="https://devtalk.kakao.com/c/ios/15" target="_blank">ios</a>
                            </li>
                            <li>
                                <a href="https://devtalk.kakao.com/c/javascript/18" target="_blank">javascript</a>
                            </li>
                            <li>
                                <a href="https://devtalk.kakao.com/c/flutter/198" target="_blank">flutter</a>
                            </li>
                            <li>
                                <a href="https://devtalk.kakao.com/c/rest-api/17" target="_blank">rest-api</a>
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