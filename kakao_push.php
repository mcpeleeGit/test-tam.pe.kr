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
    <title>푸시 알림</title>
</head>

<body>
    <header>
        <nav class="navbar-expand-sm navbar-toggleable-sm ng-white border-bottom box-shadow mb-3 navbar navbar-light">
            <div class="container"><a class="navbar-brand" href="/"><img src="/img/icon/googsu.png" class="logo" alt="logo">Kakao API Test</a>
                <h1>푸시 알림</h1>
            </div>
        </nav>
    </header>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#PHP">PHP</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="PHP">
                        <p></p>

                        <?php
                        $title = 'Push';
                        $message = 'Message!';
                        $tokens = "fFNn5qhnR72frgAlLXaJqI:APA91bG5m4ZEzsODVsahQCmJsVbp6BUzCwBB0CwbdYhYZT6dmsAnIxJ-f06e9Y1opAE5zgQNBTeZ1gmQjX0hV5OY5U7gmSAnmUJ02cvRvGi-HMVj5Zu_5R3IPoKmFYRTnxr5XX0ykcK0";
                        //'dPmhvpypTqGKXiCDnGnfvk:APA91bEKN5XvGy5vPEQ7SrDyNTVfmQdoL8oXrcWT0mEqN-5UdL9HFkGlpqjfycwK9wAb4rQOvvCXDssfDxw1GL3eGB8loG1LFeFbHudg7JT2-91LW3smMid3qq_8AxoM9Yb1V0gIybnD';
                        //"fWVfy_37Q9WVU-s5qQ5MqE:APA91bFPc56-fp4VfCCPGuKZmZZwuTgGN9bloLRMqDTZ1V_Xqcx2Hx0boNQfU0O3g5wxt4niH0bKM_fRRktleiWdoPzS079dOGU5vsFf8dJYrOORoutR_6FTLmlB_hpV4TV69hZK1e0-";

                        $googlekey = 'AAAAYEn4qqc:APA91bH0LlVAH7uD4KjnivV8My-PZPH10U5Baxmz-KFECGmTSZWroD7kg3j4RHMNbbwyJOsaprcjK2cc7S7ndkShJRf_NPiHDfxg6Abc1p79FyJt2AOi5PSufl8fotcdxpqks1tjDKvn';
                        $url = 'https://fcm.googleapis.com/fcm/send';
                        $msg = array(
                            'title' => $title,
                            'body' => $message,
                            'message' => $message
                        );


                        $fields = array(
                            'registration_ids' => array($tokens),
                            'notification' => array("title" => $title, "body" => $message),
                            'data' => $msg
                        );

                        $headers = array(
                            'Authorization:key=' . $googlekey,
                            'Content-Type: application/json'
                        );

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                        $result = curl_exec($ch);
                        if ($result === FALSE) {
                            echo "Curl failed:" . curl_error($ch);
                        } else {
                            echo "success:" . curl_error($ch);
                        }
                        curl_close($ch);
                        ?>
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