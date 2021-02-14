<?php
require('KakaoVisionAPIService.php');
$KakaoVisionAPIService = new KakaoVisionAPIService();
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
    <title>카카오 비전</title>

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="/toastrWrapper.js"></script>
</head>

<body>
    <header>
        <nav class="navbar-expand-sm navbar-toggleable-sm ng-white border-bottom box-shadow mb-3 navbar navbar-light">
            <div class="container"><a class="navbar-brand" href="/"><img src="/img/icon/googsu.png" class="logo" alt="logo">Kakao API Test</a>
                <h1>카카오 비전</h1>
            </div>
        </nav>
    </header>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <h2>얼굴 검출</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?= $lang == "" ? 'active' : '' ?>" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $lang == "JavaScript" ? 'active' : '' ?>" data-toggle="tab" href="#JavaScript">JavaScript</a>
                    </li>                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade <?= $lang == "" ? 'show active' : '' ?>" id="PHP">
                        <p></p>
                        <img src="http://test-tam.pe.kr/test/child.jpg" alt="ReBoPA" />
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= json_encode($KakaoVisionAPIService->faceDetect("http://test-tam.pe.kr/test/child.jpg")) ?>
                        </div>
                    </div>
                    <div class="tab-pane fade <?= $lang == "JavaScript" ? 'show active' : '' ?>" id="JavaScript">
                        <p></p>
                        <pre><code class="JavaScript">
$.ajax({
    type: "POST",
    beforeSend: function (request) {
        request.setRequestHeader("Authorization", "KakaoAK {JavaScript Key}");
    },
    url: "https://dapi.kakao.com/v2/vision/face/detect",
    data: "image_url=" + escape("{image full url}"),
    processData: false,
    success: function (rtn) {
        console.log(rtn);
    }
});      
                        </code></pre>
                    </div>                    
                </div>
            </li>
            <li class="list-group-item">
                <h2>상품 검출</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?= $lang == "" ? 'active' : '' ?>" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade <?= $lang == "" ? 'show active' : '' ?>" id="PHP">
                        <p></p>
                        <img src="http://test-tam.pe.kr/test/fashion.jpg" alt="ReBoPA" />
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= json_encode($KakaoVisionAPIService->productDetect("http://test-tam.pe.kr/test/fashion.jpg")) ?>
                        </div>
                    </div>
                </div>
            </li>         
            <li class="list-group-item">
                <h2>성인 이미지 판별</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?= $lang == "" ? 'active' : '' ?>" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade <?= $lang == "" ? 'show active' : '' ?>" id="PHP">
                        <p></p>
                        <img src="http://test-tam.pe.kr/test/treatment.jpg" alt="ReBoPA" />
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= json_encode($KakaoVisionAPIService->adultDetect("http://test-tam.pe.kr/test/treatment.jpg")) ?>
                        </div>
                    </div>
                </div>
            </li>         
            <li class="list-group-item">
                <h2>썸네일 생성</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?= $lang == "" ? 'active' : '' ?>" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade <?= $lang == "" ? 'show active' : '' ?>" id="PHP">
                        <p></p>
                        <img src="http://test-tam.pe.kr/test/cat.png" alt="ReBoPA" />
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= json_encode($KakaoVisionAPIService->thumbnailCrop("http://test-tam.pe.kr/test/cat.png", 200, 200)) ?>
                        </div>
                    </div>
                </div>
            </li>               
            <li class="list-group-item">
                <h2>썸네일 검출</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?= $lang == "" ? 'active' : '' ?>" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade <?= $lang == "" ? 'show active' : '' ?>" id="PHP">
                        <p></p>
                        <img src="http://test-tam.pe.kr/test/cat.png" alt="ReBoPA" />
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= json_encode($KakaoVisionAPIService->thumbnailDetect("http://test-tam.pe.kr/test/cat.png", 200, 200)) ?>
                        </div>
                    </div>
                </div>
            </li>       
            <li class="list-group-item">
                <h2>멀티태그 생성</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?= $lang == "" ? 'active' : '' ?>" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade <?= $lang == "" ? 'show active' : '' ?>" id="PHP">
                        <p></p>
                        <img src="http://test-tam.pe.kr/test/suit.jpg" alt="ReBoPA" />
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= json_encode($KakaoVisionAPIService->multitagGenerate("http://test-tam.pe.kr/test/suit.jpg")) ?>
                        </div>
                    </div>
                </div>
            </li>                                      
            <li class="list-group-item">
                <h2>OCR</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?= $lang == "" ? 'active' : '' ?>" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade <?= $lang == "" ? 'show active' : '' ?>" id="PHP">
                        <p></p>
                        <img src="http://test-tam.pe.kr/img/whatisrebopaw.jpg" alt="ReBoPA" />
                        <div id="Response" class="alert alert-success" role="alert" style="overflow:hidden;word-wrap:break-word;" class="w-100 p-3">
                            <?= json_encode($KakaoVisionAPIService->textOcr("http://test-tam.pe.kr/img/whatisrebopaw.jpg")) ?>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>