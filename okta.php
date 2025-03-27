<!DOCTYPE html>
<html lang="kr">
<head>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
    <style>
        main.container {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 200px);
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 90%;
        }
        main.container h1 {
            color: #000;
            border-bottom: 2px solid #4285f4;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        main.container .login-btn {
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
            margin: 20px auto;
        }
        main.container .login-btn:hover {
            background-color: #E6CF00;
        }
        main.container .login-btn img {
            width: 20px;
            height: 20px;
        }
        main.container .user-info {
            display: none;
            margin-top: 20px;
            padding: 15px;
            background: #f8f8f8;
            border-radius: 4px;
            text-align: left;
        }
        main.container .user-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        main.container .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        main.container .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
    </div>

    <main class="container">
        <h1>OKTA OIDC 카카오 로그인</h1>
        <button id="kakaoLoginBtn" class="login-btn">
            <img src="https://developers.kakao.com/assets/img/about/logos/kakaotalksharing/kakaotalk_sharing_btn_medium.png" alt="카카오톡">
            카카오로 로그인
        </button>
        <div id="userInfo" class="user-info">
            <img id="userPhoto" src="" alt="프로필 사진">
            <p>이름: <span id="userName"></span></p>
            <p>이메일: <span id="userEmail"></span></p>
            <button id="logoutBtn" class="logout-btn">로그아웃</button>
        </div>
    </main>

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>

    <script>
        // 랜덤 문자열 생성 함수
        function generateRandomString(length) {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let result = '';
            for (let i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return result;
        }

        // OKTA 설정
        const oktaConfig = {
            clientId: '4408b5bb51bdf4c89879e933556a21e8',
            idpId: '0oapy6dolivNIdRrX697',
            authorizeUrl: 'https://trial-9470369.okta.com/oauth2/v1/authorize',
            redirectUri: window.location.origin + '/okta.php',
            responseType: 'code',
            responseMode: 'query',
            scope: 'openid profile email',
            state: generateRandomString(32),
            nonce: generateRandomString(32)
        };

        // 카카오 로그인 버튼 클릭 이벤트
        $('#kakaoLoginBtn').on('click', function() {
            const authUrl = `${oktaConfig.authorizeUrl}?` +
                `idp=${oktaConfig.idpId}&` +
                `client_id=${oktaConfig.clientId}&` +
                `response_type=${oktaConfig.responseType}&` +
                `response_mode=${oktaConfig.responseMode}&` +
                `scope=${encodeURIComponent(oktaConfig.scope)}&` +
                `redirect_uri=${encodeURIComponent(oktaConfig.redirectUri)}&` +
                `state=${oktaConfig.state}&` +
                `nonce=${oktaConfig.nonce}`;

            window.location.href = authUrl;
        });

        // 로그아웃 버튼 클릭 이벤트
        $('#logoutBtn').on('click', function() {
            // 세션/쿠키 삭제
            document.cookie.split(";").forEach(function(c) { 
                document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); 
            });
            
            // UI 업데이트
            $('#userInfo').hide();
            $('#kakaoLoginBtn').show();
        });

        // URL 파라미터에서 인증 코드 확인
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const code = urlParams.get('code');
            const state = urlParams.get('state');
            
            if (code && state === oktaConfig.state) {
                // 인증 코드가 있으면 사용자 정보 요청
                // 실제 구현시에는 서버 사이드에서 토큰 교환 및 사용자 정보 요청
                // 여기서는 예시로 하드코딩된 정보 표시
                $('#userPhoto').attr('src', 'https://developers.kakao.com/assets/img/about/logos/kakaotalksharing/kakaotalk_sharing_btn_medium.png');
                $('#userName').text('카카오 사용자');
                $('#userEmail').text('user@example.com');
                $('#userInfo').show();
                $('#kakaoLoginBtn').hide();
            }
        });
    </script>
</body>
</html> 