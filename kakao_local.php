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
    <title>카카오톡 로컬</title>
</head>

<body>
    <header>
        <nav class="navbar-expand-sm navbar-toggleable-sm ng-white border-bottom box-shadow mb-3 navbar navbar-light">
            <div class="container"><a class="navbar-brand" href="/"><img src="/img/icon/googsu.png" class="logo" alt="logo">Kakao API Test</a>
                <h1>카카오톡 로컬</h1>
            </div>
        </nav>
    </header>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <h2>Kakao REST API 주소 검색 </h2>
                PHP Simple Pack - KakaoAPIService.php DownLoad : <a href="https://github.com/kakao-tam/KakaoAPIForPHPSimplePack">https://github.com/kakao-tam/KakaoAPIForPHPSimplePack</a>
            </li>
        </ul>
    </div>

    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <h2>주소 검색</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP">
                        <p></p>
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            GET dapi.kakao.com/v2/local/search/address.json HTTP/1.1 Authorization: KakaoAK {REST_API_KEY}
                        </div>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getAddress("전북 삼성동 100") ?>
                        </div>
                        <pre><code class="php">
public function getAddress($query){
    $callUrl = "https://dapi.kakao.com/v2/local/search/address.json?query=".urlencode($query);
    $headers = array();
    $headers[] = "Authorization: KakaoAK " . $this->REST_API_KEY;
    $response = KakaoAPIService::excuteCurl($callUrl, "GET", $headers);
    return KakaoAPIService::getReturnKey($response, "meta");     
}
                        </code></pre>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <h2>좌표로 행정구역정보 받기</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP">
                        <p></p>
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            GET dapi.kakao.com/v2/local/geo/coord2regioncode.json HTTP/1.1 Authorization: KakaoAK {REST_API_KEY}
                        </div>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getCoord2regioncode(127.1086228, 37.4012191) ?>
                        </div>
                        <pre><code class="php">
public function getCoord2regioncode($x, $y){
    $callUrl = "https://dapi.kakao.com/v2/local/geo/coord2regioncode.json?x=".$x."&y=".$y;
    $headers[] = "Authorization: KakaoAK " . $this->REST_API_KEY;
    $response = KakaoAPIService::excuteCurl($callUrl, "GET", $headers);
    return KakaoAPIService::getReturnKey($response, "meta");                 
}
                        </code></pre>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <h2>좌표로 주소 변환하기</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP">
                        <p></p>
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            GET dapi.kakao.com/v2/local/geo/coord2address.json HTTP/1.1 Authorization: KakaoAK {REST_API_KEY}
                        </div>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getCoord2address(127.1086228, 37.4012191) ?>
                        </div>
                        <pre><code class="php">
public function getCoord2address($x, $y){
    $callUrl = "https://dapi.kakao.com/v2/local/geo/coord2address.json?x=".$x."&y=".$y;
    $headers[] = "Authorization: KakaoAK " . $this->REST_API_KEY;
    $response = KakaoAPIService::excuteCurl($callUrl, "GET", $headers);
    return KakaoAPIService::getReturnKey($response, "meta");        
}    
                        </code></pre>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <h2>좌표계 변환</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP">
                        <p></p>
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            GET dapi.kakao.com/v2/local/geo/transcoord.json HTTP/1.1 Authorization: KakaoAK {REST_API_KEY}
                        </div>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getTranscoord(160710.37729270622, -4388.879299157299) ?>
                        </div>
                        <pre><code class="php">
public function getTranscoord($x, $y){
    $callUrl = "https://dapi.kakao.com/v2/local/geo/transcoord.json?x=".$x."&y=".$y;
    $headers[] = "Authorization: KakaoAK " . $this->REST_API_KEY;
    $response = KakaoAPIService::excuteCurl($callUrl, "GET", $headers);
    return KakaoAPIService::getReturnKey($response, "meta");        
}    
                        </code></pre>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <h2>키워드로 장소 검색</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP">
                        <p></p>
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            GET dapi.kakao.com/v2/local/search/keyword.json HTTP/1.1 Authorization: KakaoAK {REST_API_KEY}
                        </div>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getKeywordAddress("카카오프렌즈", 127.1086228, 37.4012191) ?>
                        </div>
                        <pre><code class="php">
public function getKeywordAddress($query, $x, $y, $radius=1000){
    $callUrl = "https://dapi.kakao.com/v2/local/search/keyword.json?query=".urlencode($query)."&x=".$x."&y=".$y."&radius=".$radius;
    $headers[] = "Authorization: KakaoAK " . $this->REST_API_KEY;
    $response = KakaoAPIService::excuteCurl($callUrl, "GET", $headers);
    return KakaoAPIService::getReturnKey($response, "meta");
}   
                        </code></pre>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <h2>카테고리로 장소 검색</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="PHP">
                        <p></p>
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            GET dapi.kakao.com/v2/local/search/keyword.json HTTP/1.1 Authorization: KakaoAK {REST_API_KEY}
                        </div>
                        <div id="Response" class="alert alert-primary" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= $KakaoAPIService->getCategoryAddress("PM9", 127.1086228, 37.4012191) ?>
                        </div>
                        <pre><code class="php">
public function getCategoryAddress($category_group_code, $x, $y, $radius=1000){
    $callUrl = "https://dapi.kakao.com/v2/local/search/category.json?category_group_code=".$category_group_code."&x=".$x."&y=".$y."&radius=".$radius;
    $headers[] = "Authorization: KakaoAK " . $this->REST_API_KEY;
    $response = KakaoAPIService::excuteCurl($callUrl, "GET", $headers);
    return KakaoAPIService::getReturnKey($response, "meta");
}   
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