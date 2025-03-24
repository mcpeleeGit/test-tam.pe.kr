<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OKTA OIDC 카카오 로그인</title>
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
            max-width: 400px;
            width: 90%;
        }
        .login-btn {
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
        .login-btn:hover {
            background-color: #E6CF00;
        }
        .login-btn img {
            width: 20px;
            height: 20px;
        }
        .user-info {
            display: none;
            margin-top: 20px;
            padding: 15px;
            background: #f8f8f8;
            border-radius: 4px;
            text-align: left;
        }
        .user-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
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
    </div>

    <script>
        // OKTA 설정
        const oktaConfig = {
            clientId: '0oapyburr9sv1SM8i697', // OKTA 클라이언트 ID
            idpId: '0oapybsli0LvHY9en697',
            authorizeUrl: 'https://trial-9470369.okta.com/oauth2/v1/authorize',
            redirectUri: 'https://trial-9470369.okta.com/oauth2/v1/authorize/callback',
            responseType: 'code',
            responseMode: 'query',
            scope: 'openid email',
            state: 'random_state_string', // 실제 구현시 랜덤 문자열로 생성
            nonce: 'random_nonce_string'  // 실제 구현시 랜덤 문자열로 생성
        };

        // 카카오 로그인 버튼 클릭 이벤트
        $('#kakaoLoginBtn').on('click', function() {
            const authUrl = `${oktaConfig.authorizeUrl}?` +
                `idp=${oktaConfig.idpId}&` +
                `client_id=${oktaConfig.clientId}&` +
                `response_type=${oktaConfig.responseType}&` +
                `response_mode=${oktaConfig.responseMode}&` +
                `scope=${oktaConfig.scope}&` +
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
            
            if (code) {
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