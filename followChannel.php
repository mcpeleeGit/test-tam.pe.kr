<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>카카오톡 채널 간편 추가 테스트</title>
    <script src="https://t1.kakaocdn.net/kakao_js_sdk/2.7.6/kakao.min.js" integrity="sha384-WAtVcQYcmTO/N+C1N+1m6Gp8qxh+3NlnP7X1U7qP6P5dQY/MsRBNTh+e1ahJrkEm" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Malgun Gothic', sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #fee500;
            text-align: center;
            margin-bottom: 30px;
        }
        .section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fafafa;
        }
        .channel-button {
            background-color: #fee500;
            color: #000;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            display: block;
            margin: 20px auto;
            transition: background-color 0.3s;
        }
        .channel-button:hover {
            background-color: #fdd835;
        }
        .channel-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        .info {
            background-color: #e3f2fd;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            border-left: 4px solid #2196f3;
        }
        .error {
            background-color: #ffebee;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            border-left: 4px solid #f44336;
        }
        .success {
            background-color: #e8f5e8;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            border-left: 4px solid #4caf50;
        }
        .code-block {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            overflow-x: auto;
            margin: 15px 0;
        }
        .status {
            text-align: center;
            font-weight: bold;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>카카오톡 채널 간편 추가 테스트</h1>
        
        <div class="section">
            <h2>카카오 SDK 초기화 상태</h2>
            <div id="init-status" class="status">초기화 중...</div>
            
        </div>

        <div class="section">
            <h2>카카오톡 채널 간편 추가</h2>
            <p>아래 버튼을 클릭하여 카카오톡 채널을 간편하게 추가할 수 있습니다.</p>
            
            <button id="follow-channel-btn" class="channel-button" onclick="followChannel()">
                카카오톡 채널 추가하기
            </button>

            <button class="channel-button" onclick="followChannel()">
                카카오톡 채널 수동 클릭 추가하기
            </button>
            
            <div id="follow-result" class="status"></div>
            
            <div class="info">
                <strong>사용된 함수:</strong> Kakao.Channel.followChannel()<br>
                <strong>채널 ID:</strong> '_tExcIs' (예시)
            </div>
        </div>

        <div class="section">
            <h2>구현 코드 예시</h2>
            <div class="code-block">
// 카카오 SDK 초기화
Kakao.init('YOUR_APP_KEY');

// 카카오톡 채널 간편 추가
function followChannel() {
    Kakao.Channel.followChannel({
        channelPublicId: '_tExcIs' // 카카오톡 채널 프로필 ID
    })
    .then(function(result) {
        console.log('채널 추가 성공:', result);
        // 성공 처리
    })
    .catch(function(error) {
        console.log('채널 추가 실패:', error);
        // 실패 처리
    });
}
            </div>
        </div>

        <div class="section">
            <h2>카카오톡 채널 추가 방식 비교</h2>
            <div class="info">
                <strong>카카오톡 채널 간편 추가 (권장):</strong><br>
                • 별도의 확인 절차 없이 응답으로 결과를 확인할 수 있음<br>
                • Kakao.Channel.followChannel() 사용<br>
                • 사용자 경험이 더 좋음
            </div>
            <div class="info">
                <strong>카카오톡 채널 추가:</strong><br>
                • 사용자가 카카오톡 앱에서 직접 확인 후 추가<br>
                • Kakao.Channel.addChannel() 사용<br>
                • 더 안전하지만 사용자 경험이 상대적으로 떨어짐
            </div>
        </div>

        <div class="section">
            <h2>주의사항</h2>
            <div class="error">
                <strong>중요:</strong><br>
                • 카카오톡 채널 간편 추가는 사용자가 서비스에 로그인되어 있어야 합니다.<br>
                • 채널 프로필 ID는 카카오톡 채널 홈 URL에서 확인할 수 있습니다.<br>
                • 앱 설정에서 카카오톡 채널 연결이 되어 있어야 합니다.
            </div>
        </div>
    </div>

    <script>
        // 카카오 SDK 초기화
        Kakao.init('2d68640b56d986af5c8a48505c7c8c71');
        
        // 초기화 상태 확인
        if (Kakao.isInitialized()) {
            document.getElementById('init-status').innerHTML = '✅ 초기화 완료';
            document.getElementById('init-status').style.color = '#4caf50';
        } else {
            document.getElementById('init-status').innerHTML = '❌ 초기화 실패';
            document.getElementById('init-status').style.color = '#f44336';
        }

        // 카카오톡 채널 간편 추가 함수
        function followChannel() {
            const resultDiv = document.getElementById('follow-result');
            const button = document.getElementById('follow-channel-btn');
            
            // 버튼 비활성화
            button.disabled = true;
            button.textContent = '처리 중...';
            resultDiv.innerHTML = '';
            
            Kakao.Channel.followChannel({
                channelPublicId: '_tExcIs' // 카카오톡 채널 프로필 ID (예시)
            })
            .then(function(result) {
                console.log('채널 추가 성공:', result);
                resultDiv.innerHTML = '✅ 카카오톡 채널 추가 성공!';
                resultDiv.style.color = '#4caf50';
                
                // 성공 후 버튼 상태 복원
                setTimeout(() => {
                    button.disabled = false;
                    button.textContent = '카카오톡 채널 추가하기';
                }, 2000);
            })
            .catch(function(error) {
                console.log('채널 추가 실패:', error);
                resultDiv.innerHTML = '❌ 카카오톡 채널 추가 실패: ' + (error.message || '알 수 없는 오류');
                resultDiv.style.color = '#f44336';
                
                // 실패 후 버튼 상태 복원
                button.disabled = false;
                button.textContent = '카카오톡 채널 추가하기';
            });
        }

        // 페이지 로드 시 초기화 상태 확인
        window.onload = function() {
            if (Kakao.isInitialized()) {
                document.getElementById('init-status').innerHTML = '✅ 초기화 완료';
                document.getElementById('init-status').style.color = '#4caf50';
            } else {
                document.getElementById('init-status').innerHTML = '❌ 초기화 실패';
                document.getElementById('init-status').style.color = '#f44336';
            }
        };

        followChannel();
    </script>
</body>
</html>
