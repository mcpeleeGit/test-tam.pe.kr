<?php

//header("Location: http://kko.to/1tPrcxfvz", 302);

session_start();
$APP_ADMIN_KEY = "72462462f6fc9baad63f2de2ad3d865b";
$REST_API_KEY = "4408b5bb51bdf4c89879e933556a21e8";
$JAVASCRIPT_KEY = "2d68640b56d986af5c8a48505c7c8c71";
$CHANNEL_ID = "_xgTNZs";

if (isset($_GET["sess"]) && $_GET["sess"] == "clear") {
    unset($_SESSION["accessToken"]);
    unset($_SESSION["accessAgree"]);
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
    <script>
        hljs.initHighlightingOnLoad();
    </script>
    <!--bootstrapcdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>카카오톡 채널</title>
    <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
    <script type="text/javascript">
        kakaoPixel('541043381581099928').pageView();
        kakaoPixel('541043381581099928').viewContent({
            id: 'kakao_talk_channel'
        });
    </script>
</head>

<body>
    <header>
        <nav class="navbar-expand-sm navbar-toggleable-sm ng-white border-bottom box-shadow mb-3 navbar navbar-light">
            <div class="container"><a class="navbar-brand" href="/">Kakao API Test</a>
                <h1>카카오톡 채널</h1>
            </div>
        </nav>
    </header>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <h2>채널 추가/채팅 버튼</h2>
                <!--JavaScript Kakao SDK : 채널 추가, 채널 채팅 START-->
                <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
                <script>
                    // SDK를 초기화 합니다. 사용할 앱의 JavaScript 키를 설정해 주세요.
                    Kakao.init('<?= $JAVASCRIPT_KEY ?>'); //★ 수정 할 것
                    // SDK 초기화 여부를 판단합니다.
                    console.log(Kakao.isInitialized());
                </script>
                <a href="https://pf.kakao.com/_xgTNZs/chat">https://pf.kakao.com/_xgTNZs/chat</a>
                <a href="https://pf.kakao.com/_xgTNZs/friend">https://pf.kakao.com/_xgTNZs/friend</a>
                <table>
                    <tr>
                        <td>
                            <p id="kakao-add-channel-button"></p>
                        </td>
                        <td>
                            <p id="kakao-talk-channel-chat-button"></p>
                        </td>
                    </tr>
                </table>

                <script>
                    btn_added();

                    function btn_added() {
                        Kakao.Channel.createAddChannelButton({
                            container: '#kakao-add-channel-button',
                            lang: 'en',
                            channelPublicId: '<?= $CHANNEL_ID ?>' //★ 수정 할 것 채널 홈 URL에 명시된 id로 설정합니다.
                        });
                    }
                    btn_chat();

                    function btn_chat() {
                        Kakao.Channel.createChatButton({
                            container: '#kakao-talk-channel-chat-button',
                            lang: 'en',
                            channelPublicId: '<?= $CHANNEL_ID ?>' //★ 수정 할 것 카카오톡 채널 홈 URL에 명시된 id로 설정합니다.
                        });
                    }
                </script>
                <!--JavaScript Kakao SDK : 채널 추가, 채널 채팅 END-->
            </li>
            <li class="list-group-item">
                <h2>카카오톡 채널 관계 확인하기(고객용)</h2>
                <p>로그인한 고객의 채널 가입(&상태) 여부를 조회한다.</p>


                <?php
                $client_id = $REST_API_KEY; //★ 수정 할 것
                $redirect_uri = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/callBackForKakao.php"); //★ 수정 할 것
                $kakaoLoginUrl = "https://kauth.kakao.com/oauth/authorize?client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&response_type=code&state=accessToken";
                $kakaoAgree = "https://kauth.kakao.com/oauth/authorize?client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&response_type=code&scope=plusfriends&state=accessAgree";

                if (!isset($_SESSION["accessToken"])) {
                    echo ("1. <a href=" . $kakaoLoginUrl . ">카카오톡 로그인으로 AccessToken 취득하기</a><br/>");
                    die();
                } else {
                    echo ("1. 카카오톡 로그인으로 AccessToken 취득 완료. <a href=" . $kakaoLoginUrl . ">AccessToken 다시 취득하기</a><br/>");
                }
                echo " : " . $_SESSION["accessToken"]
                ?>
                <pre><code class="php">
$client_id = $REST_API_KEY; //★ 수정 할 것
$redirect_uri = urlencode("http://" . $_SERVER['HTTP_HOST'] . "/callBackForKakao.php"); //★ 수정 할 것                    
$kakaoLoginUrl = "https://kauth.kakao.com/oauth/authorize?client_id=" 
.$client_id."&redirect_uri=".$redirect_uri."&response_type=code&state=accessToken";
                </code></pre>
                <?php
                if (!isset($_SESSION["accessAgree"])) {
                    echo ("2. <a href=" . $kakaoAgree . ">plusfriends 동의받기</a><br/>");
                } else {
                    echo ("2. plusfriends 동의 완료. <a href='/kakao_talk_channel.php?sess=clear'>Session 초기화</a><br/>");
                }
                ?>
                <pre><code class="php">
$kakaoAgree = "https://kauth.kakao.com/oauth/authorize?client_id=" 
.$client_id."&redirect_uri=".$redirect_uri."&response_type=code&scope=plusfriends&state=accessAgree";
                </code></pre>

                3. AccessToken으로 채널 가입(&상태) 여부를 조회<br />
                <pre><code class="php">
$url = "https://kapi.kakao.com/v1/api/talk/plusfriends";
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

                <?php
                $url = "https://kapi.kakao.com/v1/api/talk/plusfriends";
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
                <div class="alert alert-primary" role="alert" style="display:inline-block;">
                    <?php
                    var_dump($res); // Kakao API 서버로 부터 받아온 값
                    ?>
                </div>
            </li>
            <li class="list-group-item">
                <hr />
                <h2>카카오톡 채널 관계 확인하기(관리자용)</h2>
                <p>관리자가 선택한 고객의 채널 가입(&상태) 여부를 조회한다.</p>
                <pre><code class="php">
$url = "https://kapi.kakao.com/v1/api/talk/plusfriends?target_id_type=user_id&target_id=1515035367";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$header = "KakaoAK " . $APP_ADMIN_KEY; //★ 수정 할 것
$headers = array();
$headers[] = "Authorization: " . $header;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$res = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch); 
            </code></pre>

                <?php
                $url = "https://kapi.kakao.com/v1/api/talk/channels?target_id_type=user_id&target_id=1515035367";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $header = "KakaoAK " . $APP_ADMIN_KEY; //★ 수정 할 것
                $headers = array();
                $headers[] = "Authorization: " . $header;
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $res = curl_exec($ch);
                $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                ?>
                <div class="alert alert-primary" role="alert" style="display:inline-block;">
                    <?php
                    var_dump($res); // Kakao API 서버로 부터 받아온 값
                    ?>
                </div>
            </li>
            <li class="list-group-item">
                <hr />
                <h2>카카오톡 채널 관계 알림 받기</h2>
                <p>"내 애플리케이션>카카오톡 채널>카카오톡 채널 추가/차단 콜백" 설정 시, 해당 API로 아래 값 전달</p>
                <pre><code class="json">
{"event":"added","id":"1111","id_type":"app_user_id","plus_friend_public_id":"_FLX","plus_friend_uuid":"@ad","updated_at":"2020-01-01T00:00:00Z"}
            </code></pre>
            </li>
            <li class="list-group-item">
                <hr />
                <h2>고객 관리: 파일 만들기</h2>
                <p>카카오 채널 멤버에 대한 추가 정보가 사이트에 있는 경우, 고객 관리 파일을 생성하고 관리한다.</p>
                <p>추가 정보는 조건별 고객 그룹핑에 활용되며 그룹별 메세지를 발송할 수 있다.</p>
                <pre><code class="json">
$url = "https://kapi.kakao.com/v1/talkchannel/create/target_user_file";
$ch = curl_init($url);
$data = array(
    'channel_public_id' => $CHANNEL_ID,
    'file_name' => '고객리스트',
    'schema' => array(
        '생년월일' => 'string',
        '성별' => 'string',
        'age' => 'number'
    )
);
$payload = json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$header = "KakaoAK " . $REST_API_KEY; //★ 수정 할 것
$headers = array('Content-Type:application/json');
$headers[] = "Authorization: " . $header;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
            </code></pre>
                <?php

                //for ($cnt = 23; $cnt <= 26; $cnt = $cnt + 1) {
                $url = "https://kapi.kakao.com/v1/talkchannel/create/target_user_file";
                $ch = curl_init($url);
                $data = array(
                    'channel_public_id' => $CHANNEL_ID,
                    'file_name' => '고객리스트20230116',
                    'schema' => array( //schema에는 자료형을 기술함.
                        '앱유저아이디' => 'string',
                        '이름' => 'string',
                        '생년월일' => 'string',
                        '지역' => 'string',
                        '성별' => 'string',
                        '연령' => 'number',
                        '구매금액' => 'number',
                        '가입일' => 'string',
                        '최근구매일' => 'string'
                    )
                );
                $payload = json_encode($data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

                $header = "KakaoAK " . $REST_API_KEY; //★ 수정 할 것
                $headers = array('Content-Type:application/json');
                $headers[] = "Authorization: " . $header;
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $res = curl_exec($ch);
                $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                //}

                ?>
                <div class="alert alert-primary" role="alert" style="display:inline-block;">
                    <?php
                    var_dump($res); // Kakao API 서버로 부터 받아온 값
                    ?>
                </div>
                <div class="alert alert-danger" role="alert" style="display:inline-block;">
                    INVALID_APP_ID(channel_public_id 불일치 or Json 구조 다름) / INVALID_FILE_NAME(이미 등록된 파일명)
                </div>

            </li>
            <li class="list-group-item">
                <hr />
                <h2>고객 관리: 파일 보기</h2>
                <p>기 등록된 추가 파일 정보를 조회</p>
                <pre><code class="json">
$url = "https://kapi.kakao.com/v1/talkchannel/target_user_file?channel_public_id=".$CHANNEL_ID;
$ch = curl_init($url);
$header = "KakaoAK " . $REST_API_KEY; //★ 수정 할 것
$headers = array('Content-Type:application/json');
$headers[] = "Authorization: " . $header;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
            </code></pre>
                <?php

                $url = "https://kapi.kakao.com/v1/talkchannel/target_user_file?channel_public_id=" . $CHANNEL_ID;
                $ch = curl_init($url);
                $header = "KakaoAK " . $REST_API_KEY; //★ 수정 할 것
                $headers = array('Content-Type:application/json');
                $headers[] = "Authorization: " . $header;
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $res = curl_exec($ch);
                $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                ?>
                <div class="alert alert-primary" role="alert" style="display:inline-block;">
                    <?php
                    var_dump($res); // Kakao API 서버로 부터 받아온 값
                    ?>
                </div>
            </li>
            <li class="list-group-item">
                <hr />
                <h2>고객 관리: 사용자 추가하기</h2>
                <pre><code class="json">
$url = "https://kapi.kakao.com/v1/talkchannel/update/target_users";
$ch = curl_init($url);
$data = array(
    'file_id' => 21274,
    'channel_public_id' => $CHANNEL_ID,
    'user_type' => 'app',
    'users' => array(
                array(
                    'id' => 1515035367,
                    'field' => array(
                        '생년월일' => '2000-01-01',
                        '성별' => '남자',
                        'age' => 19
                    )
                )
    )
);
$payload = json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$header = "KakaoAK " . $REST_API_KEY; 
$headers = array('Content-Type:application/json');
$headers[] = "Authorization: " . $header;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
$res = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
            </code></pre>
                <?php
                $url = "https://kapi.kakao.com/v1/talkchannel/update/target_users";
                $ch = curl_init($url);
                $data = array(
                    'file_id' => 33395,
                    'channel_public_id' => $CHANNEL_ID,
                    'user_type' => 'app',
                    'users' => array(
                        array(
                            'id' => 1615828740,
                            'field' => array(
                                '생년월일' => '2000-01-01',
                                '성별' => '남자',
                                'age' => 29,
                                '국가' => 'KR'
                            )
                        )
                    )
                );
                $payload = json_encode($data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

                $header = "KakaoAK " . $REST_API_KEY;
                $headers = array('Content-Type:application/json');
                $headers[] = "Authorization: " . $header;
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, 1);
                $res = curl_exec($ch);
                $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);


                ?>
                <div class="alert alert-primary" role="alert" style="display:inline-block;">
                    <?php
                    var_dump($res);


                    ?>
                </div>
            </li>

            <li class="list-group-item">
                <hr />
                <h2>고객 관리: 사용자 삭제하기</h2>
                <pre><code class="json">
$url = "https://kapi.kakao.com/v1/talkchannel/delete/target_users";
$ch = curl_init($url);
$data = array(
    'channel_public_id' => $CHANNEL_ID,
    'file_id' => 21274,
    'user_type' => 'app',
    'user_ids' => array(
                    array(
                        'id' => 1515035367
                    )
                )
);
$payload = json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$header = "KakaoAK " . $REST_API_KEY; 
$headers = array('Content-Type:application/json');
$headers[] = "Authorization: " . $header;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
            </code></pre>
                <?php





                ?>
                <div class="alert alert-primary" role="alert" style="display:inline-block;">
                    <?php
                    var_dump($res);
                    ?>
                </div>
            </li>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>