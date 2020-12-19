<?php
require('KakaoAPIService.php');
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
    <!--bootstrapcdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>PHP Simple Pack - KakaoAPIService.php 사용방법</title>
</head>

<body>
    <header>
        <nav class="navbar-expand-sm navbar-toggleable-sm ng-white border-bottom box-shadow mb-3 navbar navbar-light">
            <div class="container"><a class="navbar-brand" href="/"><img src="/img/icon/googsu.png" class="logo" alt="logo">Kakao API Test</a>
                <h1>PHP Simple Pack - KakaoAPIService.php 사용방법</h1>
            </div>
        </nav>
    </header>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <h3>1. KakaoAPIService.php DownLoad 와 기본 설정</h3>
                PHP Simple Pack : <a href="https://github.com/kakao-tam/KakaoAPIForPHPSimplePack"> Github KakaoAPIService.php DownLoad</a>
                <pre><code class="php">

// * KakaoAPIService.php 파일의 생성자에 JAVASCRIPT_KEY, REST_API_KEY, REDIRECT_URI, CLIENT_SECRET 를 각각 설정합니다.
// * JAVASCRIPT_KEY, REST_API_KEY : https://developers.kakao.com > 내 애플리케이션 > 앱 설정 > 요약 정보
// * REDIRECT_URI : https://developers.kakao.com > 내 애플리케이션 > 제품 설정 > 카카오 로그인
// * CLIENT_SECRET : https://developers.kakao.com > 내 애플리케이션 > 제품 설정 > 카카오 로그인 > 보안

public function __construct()
{   //★ 수정 할 것
    $this->JAVASCRIPT_KEY = "2d68640b56d986af5c8a48505c7c8c71";
    $this->REST_API_KEY = "4408b5bb51bdf4c89879e933556a21e8";
    $this->CLIENT_SECRET = "QZhr9itOs0mxVRDxIvuOfOLzjZMc5q1U";
    $this->REDIRECT_URI = urlencode("http://".$_SERVER['HTTP_HOST']."/PHPSimplePack.php");

    session_start();
}
                        </code></pre>
                <h3>2. import와 선언</h3>
                <pre><code class="php">
&lt;?php
require('KakaoAPIService.php');
$KakaoAPIService = new KakaoAPIService();
?&gt;
                        </code></pre>
                <h3>끝.</h3>
                <p>
                    * 아래 유형별 API를 한줄 호출하여 사용하면 됩니다. <br/>
                    * <b>아래 "카카오계정으로 로그인" 버튼을 클릭하여 로그인 시, 로그인 후 호출 가능한 API의 결과도 확인 할 수 있습니다.</b><br/>
                    * 초보 개발자도 쉽게 사용하도록 단일 클래스에 구조적 프로그래밍으로 구현했습니다. 가져다 마음대로 수정해서 사용해도됩니다.
                </p>
            </li>
        </ul>
    </div>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <h2>카카오 로그인 - 로그인 링크 가져오기</h2>
                <p>로그인 페이지의 로그인 버튼 or 이미지에 링크를 설정합니다.</p>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP">
                        <p></p>
                        <?php
                        $KakaoAPIService = new KakaoAPIService();
                        ?>
                        <a href="<?= $KakaoAPIService->getKakaoLoginLink() ?>"><img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /></a>
                        <p></p>
                        <pre><code class="php">
&lt;a href="&lt;?= $KakaoAPIService->getKakaoLoginLink() ?&gt;"&gt;
    &lt;img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" /&gt;
&lt;/a&gt;                        
                        </code></pre>
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <h2>카카오 로그인 - 로그인 콜백 처리</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP1">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP1">
                        <p></p>
                        <div id="Response1" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getToken() ?>
                        </div>
                        <div id="Response2" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getProfile() ?>
                        </div>
                        <p></p>
                        <pre><code class="php">
//토큰 조회
&lt;?= $KakaoAPIService->getToken() ?&gt;
//프로필 조회
&lt;?= $KakaoAPIService->getProfile() ?&gt;
                        </code></pre>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <h2>카카오 로컬 - 주소 조회</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP2">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP2">
                        <p></p>
                        <div id="Response3" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getAddress("전북 삼성동 100") ?>
                        </div>
                        <p></p>
                        <pre><code class="php">
//주소 조회
&lt;?= $KakaoAPIService->getAddress("전북 삼성동 100") ?&gt;
                        </code></pre>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <h2>카카오 로컬 - 좌표로 행정구역정보 받기</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP2">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP2">
                        <p></p>
                        <div id="Response3" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getCoord2regioncode(127.1086228, 37.4012191) ?>
                        </div>
                        <p></p>
                        <pre><code class="php">
//좌표로 행정구역정보 받기
&lt;?= $KakaoAPIService->getCoord2regioncode(127.1086228, 37.4012191) ?&gt;
                        </code></pre>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <h2>카카오 로컬 - 좌표로 주소 변환하기</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP2">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP2">
                        <p></p>
                        <div id="Response3" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getCoord2address(127.1086228, 37.4012191) ?>
                        </div>
                        <p></p>
                        <pre><code class="php">
//좌표로 주소 변환하기
&lt;?= $KakaoAPIService->getCoord2address(127.1086228, 37.4012191) ?&gt;
                        </code></pre>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <h2>카카오 로컬 - 좌표계 변환</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP2">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP2">
                        <p></p>
                        <div id="Response3" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getTranscoord(127.1086228, 37.4012191) ?>
                        </div>
                        <p></p>
                        <pre><code class="php">
//좌표계 변환
&lt;?= $KakaoAPIService->getTranscoord(127.1086228, 37.4012191) ?&gt;
                        </code></pre>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <h2>카카오 로컬 - 키워드로 장소 검색</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP2">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP2">
                        <p></p>
                        <div id="Response3" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getKeywordAddress("카카오프렌즈", 127.1086228, 37.4012191) ?>
                        </div>
                        <p></p>
                        <pre><code class="php">
//키워드로 장소 검색
&lt;?= $KakaoAPIService->getKeywordAddress("카카오프렌즈", 127.1086228, 37.4012191) ?&gt;
                        </code></pre>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <h2>카카오 로컬 - 카테고리로 장소 검색</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP2">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP2">
                        <p></p>
                        <div id="Response3" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getCategoryAddress("PM9", 127.1086228, 37.4012191, 100) ?>
                        </div>
                        <p></p>
                        <pre><code class="php">
//카테고리로 장소 검색
&lt;?= $KakaoAPIService->getCategoryAddress("PM9", 127.1086228, 37.4012191) ?&gt;
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
    </script>
</body>

</html>