<?php

// API 설정
$api_url = 'https://kapi.kakao.com/v1/system/ips';
$api_key = '4408b5bb51bdf4c89879e933556a21e8'; // REST API 키를 여기에 입력하세요

// API 요청 헤더 설정
$headers = array(
    'Authorization: KakaoAK ' . $api_key,
    'Content-Type: application/json'
);

// cURL 초기화
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// API 호출
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

// 응답 처리
$result = json_decode($response, true);

// 에러 메시지 처리 함수
function formatErrorMessage($msg) {
    if (is_array($msg)) {
        return implode(', ', array_map(function($item) {
            return is_array($item) ? implode(', ', $item) : htmlspecialchars($item);
        }, $msg));
    }
    return htmlspecialchars($msg);
}
?>


<!DOCTYPE html>
<html lang="kr">

<head>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
  <title>Firebase 테스트</title>
    <style>
        main.container {
            font-family: Arial, sans-serif;
            margin: 20px auto;
            background: #f5f5f5;
            max-width: 1200px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        main.container h1 {
            color: #000;
            border-bottom: 2px solid #4285f4;
            padding-bottom: 10px;
        }
        main.container .status {
            margin: 20px 0;
            padding: 15px;
            background: #f8f8f8;
            border-radius: 5px;
        }
        main.container .status h2 {
            color: #000;
            margin-top: 0;
        }
        main.container .login-section {
            margin: 20px 0;
            padding: 15px;
            background: #f8f8f8;
            border-radius: 5px;
        }
        main.container .login-section h2 {
            color: #000;
            margin-top: 0;
        }
        main.container .user-info {
            display: none;
            margin-top: 15px;
            padding: 10px;
            background: #e8f0fe;
            border-radius: 5px;
        }
        main.container .user-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        main.container .user-info p {
            margin: 5px 0;
        }
        main.container .login-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        main.container .google-btn, main.container .kakao-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
        }
        main.container .google-btn {
            background-color: #4285f4;
            color: white;
        }
        main.container .google-btn:hover {
            background-color: #357abd;
        }
        main.container .kakao-btn {
            background-color: #FEE500;
            color: #000000;
        }
        main.container .kakao-btn:hover {
            background-color: #E6CF00;
        }
        main.container .google-btn img, main.container .kakao-btn img {
            width: 18px;
            height: 18px;
        }
        main.container .logout-btn {
            background-color: #dc3545;
            color: white;
            padding: 8px 16px;
            border: none;
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
    <h1>Firebase 테스트</h1>
    <div class="status">
        <h2>Firebase 상태</h2>
        <p>Firebase 초기화 상태: <span id="firebase-status">로딩 중...</span></p>
    </div>
    <div class="login-section">
        <h2>소셜 로그인</h2>
        <div class="login-buttons">
            <button id="googleLoginBtn" class="google-btn">
                <img src="https://www.google.com/favicon.ico" alt="Google">
                Google로 로그인
            </button>
            <button id="kakaoLoginBtn" class="kakao-btn">
                <img src="https://developers.kakao.com/assets/img/about/logos/kakaotalksharing/kakaotalk_sharing_btn_medium.png" alt="Kakao">
                카카오로 로그인
            </button>
        </div>
        <div id="userInfo" class="user-info">
            <img id="userPhoto" src="" alt="프로필 사진">
            <p>이름: <span id="userName"></span></p>
            <p>이메일: <span id="userEmail"></span></p>
            <p>로그인 제공자: <span id="userProvider"></span></p>
            <button id="logoutBtn" class="logout-btn">로그아웃</button>
        </div>
    </div>
  </main>

  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>

  <script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/11.5.0/firebase-app.js";
    import { getAnalytics, setAnalyticsCollectionEnabled, logEvent } from "https://www.gstatic.com/firebasejs/11.5.0/firebase-analytics.js";
    import { getAuth, signInWithPopup, GoogleAuthProvider, OAuthProvider, onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/11.5.0/firebase-auth.js";

    // Your web app's Firebase configuration
    const firebaseConfig = {
        apiKey: "AIzaSyDpkmdd3HqzotQ8iZIr09YgjqxlotH2_og",
        authDomain: "android-push-test-3fa67.firebaseapp.com",
        projectId: "android-push-test-3fa67",
        storageBucket: "android-push-test-3fa67.firebasestorage.app",
        messagingSenderId: "882029698506",
        appId: "1:882029698506:web:026f9a2e418acd98784333",
        measurementId: "G-ZSD5R5RKCJ"
    };

    try {
        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
        const auth = getAuth(app);
        
        // Analytics 수집 활성화
        setAnalyticsCollectionEnabled(analytics, true);
        
        // Firebase 초기화 성공
        document.getElementById('firebase-status').textContent = '초기화 완료';
        document.getElementById('firebase-status').style.color = '#4CAF50';
        
        // Analytics 이벤트 전송 테스트
        logEvent(analytics, 'page_view', {
            page_title: 'Firebase 테스트 페이지',
            page_location: window.location.href
        });

        // Google 로그인 버튼 이벤트
        document.getElementById('googleLoginBtn').addEventListener('click', async () => {
            try {
                const provider = new GoogleAuthProvider();
                const result = await signInWithPopup(auth, provider);
                const user = result.user;
                
                // 사용자 정보 표시
                document.getElementById('userPhoto').src = user.photoURL;
                document.getElementById('userName').textContent = user.displayName;
                document.getElementById('userEmail').textContent = user.email;
                document.getElementById('userProvider').textContent = 'Google';
                document.getElementById('userInfo').style.display = 'block';
                document.getElementById('googleLoginBtn').style.display = 'none';
                document.getElementById('kakaoLoginBtn').style.display = 'none';
                
                // 로그인 이벤트 전송
                logEvent(analytics, 'login', {
                    method: 'google'
                });
            } catch (error) {
                console.error('로그인 에러:', error);
                alert('로그인 중 오류가 발생했습니다.');
            }
        });

        // 카카오 로그인 버튼 이벤트
        document.getElementById('kakaoLoginBtn').addEventListener('click', async () => {
            try {
                const provider = new OAuthProvider('oidc.kakao');
                const result = await signInWithPopup(auth, provider);
                const user = result.user;
                
                // 사용자 정보 표시
                document.getElementById('userPhoto').src = user.photoURL;
                document.getElementById('userName').textContent = user.displayName;
                document.getElementById('userEmail').textContent = user.email;
                document.getElementById('userProvider').textContent = 'Kakao';
                document.getElementById('userInfo').style.display = 'block';
                document.getElementById('googleLoginBtn').style.display = 'none';
                document.getElementById('kakaoLoginBtn').style.display = 'none';
                
                // 로그인 이벤트 전송
                logEvent(analytics, 'login', {
                    method: 'kakao'
                });
            } catch (error) {
                console.error('로그인 에러:', error);
                alert('로그인 중 오류가 발생했습니다.');
            }
        });

        // 로그아웃 버튼 이벤트
        document.getElementById('logoutBtn').addEventListener('click', async () => {
            try {
                await signOut(auth);
                document.getElementById('userInfo').style.display = 'none';
                document.getElementById('googleLoginBtn').style.display = 'flex';
                document.getElementById('kakaoLoginBtn').style.display = 'flex';
                
                // 로그아웃 이벤트 전송
                logEvent(analytics, 'logout', {
                    method: document.getElementById('userProvider').textContent.toLowerCase()
                });
            } catch (error) {
                console.error('로그아웃 에러:', error);
                alert('로그아웃 중 오류가 발생했습니다.');
            }
        });

        // 인증 상태 변경 감지
        onAuthStateChanged(auth, (user) => {
            if (user) {
                // 로그인 상태
                document.getElementById('userPhoto').src = user.photoURL;
                document.getElementById('userName').textContent = user.displayName;
                document.getElementById('userEmail').textContent = user.email;
                document.getElementById('userProvider').textContent = user.providerData[0].providerId.split('.')[0];
                document.getElementById('userInfo').style.display = 'block';
                document.getElementById('googleLoginBtn').style.display = 'none';
                document.getElementById('kakaoLoginBtn').style.display = 'none';
            } else {
                // 로그아웃 상태
                document.getElementById('userInfo').style.display = 'none';
                document.getElementById('googleLoginBtn').style.display = 'flex';
                document.getElementById('kakaoLoginBtn').style.display = 'flex';
            }
        });

    } catch (error) {
        // Firebase 초기화 실패
        document.getElementById('firebase-status').textContent = '초기화 실패: ' + error.message;
        document.getElementById('firebase-status').style.color = '#f44336';
    }
  </script>
</body>

</html> 