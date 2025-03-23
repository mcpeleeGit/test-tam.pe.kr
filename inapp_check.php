<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>카카오톡 공유하기</title>
    <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
    <script type="text/javascript" src="https://t1.kakaocdn.net/kakao_js_sdk/v1/kakao.min.js"></script>
    <script type="text/javascript">
        Kakao.init('2d68640b56d986af5c8a48505c7c8c71');
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }
        .container {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        #kakaotalk-sharing-btn {
            background-color: #FEE500;
            color: #000000;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0 auto;
        }
        #kakaotalk-sharing-btn:hover {
            background-color: #E6CF00;
        }
        #kakaotalk-sharing-btn img {
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <button id="kakaotalk-sharing-btn">
            <img src="https://developers.kakao.com/assets/img/about/logos/kakaotalksharing/kakaotalk_sharing_btn_medium.png" alt="카카오톡 공유하기">
            카카오톡으로 공유하기
        </button>
    </div>

    <script>
        $('#kakaotalk-sharing-btn').on('click', function () {
            const inviteCode = $('#text-invite-code').val();

            Kakao.Share.sendCustom({
                templateId: 57826,
                templateArgs: {
                    inviteCode: inviteCode,
                },
            });
        });
    </script>
</body>
</html>