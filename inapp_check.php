<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>카카오톡 인앱브라우저 다운로드 테스트</title>
    <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
    <script type="text/javascript" src="https://t1.kakaocdn.net/kakao_js_sdk/v1/kakao.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        Kakao.init('2d68640b56d986af5c8a48505c7c8c71');
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }
        .section h3 {
            margin-top: 0;
            color: #333;
            border-bottom: 2px solid #FEE500;
            padding-bottom: 10px;
        }
        .download-btn {
            background-color: #FEE500;
            color: #000000;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px 5px;
            display: inline-block;
            text-decoration: none;
        }
        .download-btn:hover {
            background-color: #E6CF00;
        }
        .download-btn.secondary {
            background-color: #007bff;
            color: white;
        }
        .download-btn.secondary:hover {
            background-color: #0056b3;
        }
        .download-btn.success {
            background-color: #28a745;
            color: white;
        }
        .download-btn.success:hover {
            background-color: #1e7e34;
        }
        .info {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
            font-size: 14px;
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
            margin: 20px auto;
        }
        #kakaotalk-sharing-btn:hover {
            background-color: #E6CF00;
        }
        #kakaotalk-sharing-btn img {
            width: 20px;
            height: 20px;
        }
        .test-area {
            margin-top: 15px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>카카오톡 인앱브라우저 다운로드 테스트</h1>
        
        <!-- 카카오톡 공유 섹션 -->
        <div class="section">
            <h3>카카오톡 공유하기</h3>
            <button id="kakaotalk-sharing-btn">
                <img src="https://developers.kakao.com/assets/img/about/logos/kakaotalksharing/kakaotalk_sharing_btn_medium.png" alt="카카오톡 공유하기">
                카카오톡으로 공유하기
            </button>
        </div>

        <!-- 방법 1: Blob createObjectURL 방식 -->
        <div class="section">
            <h3>방법 1: Blob createObjectURL 방식</h3>
            <div class="info">
                <strong>설명:</strong> axios로 이미지를 blob으로 받아서 createObjectURL로 다운로드 링크 생성
            </div>
            <button class="download-btn" onclick="downloadImageBlob()">이미지 다운로드 (Blob)</button>
            <div class="test-area" id="test-area-1">
                <p>테스트 결과가 여기에 표시됩니다.</p>
            </div>
        </div>

        <!-- 방법 2: FileReader readAsDataURL 방식 -->
        <div class="section">
            <h3>방법 2: FileReader readAsDataURL 방식</h3>
            <div class="info">
                <strong>설명:</strong> blob을 FileReader로 base64 DataURL로 변환하여 다운로드
            </div>
            <button class="download-btn secondary" onclick="downloadImageDataURL()">이미지 다운로드 (DataURL)</button>
            <div class="test-area" id="test-area-2">
                <p>테스트 결과가 여기에 표시됩니다.</p>
            </div>
        </div>

        <!-- 방법 3: Static 파일 다운로드 -->
        <div class="section">
            <h3>방법 3: Static 파일 다운로드</h3>
            <div class="info">
                <strong>설명:</strong> 직접 파일 경로로 다운로드 링크 생성
            </div>
            <a href="images/test.webp" class="download-btn success" download="test-image.webp">이미지 다운로드 (Static)</a>
            <a href="og_tag.php" class="download-btn success" download="og_tag.php">PHP 파일 다운로드</a>
            <div class="test-area" id="test-area-3">
                <p>Static 파일 다운로드는 브라우저 기본 동작을 사용합니다.</p>
            </div>
        </div>
    </div>

    <script>
        // 카카오톡 공유 기능
        $('#kakaotalk-sharing-btn').on('click', function () {
            Kakao.Share.sendCustom({
                templateId: 57826,
                templateArgs: {
                    title: "카카오톡 인앱브라우저 다운로드 테스트",
                    description: "다양한 다운로드 방식을 테스트해보세요",
                },
            });
        });

        // 방법 1: Blob createObjectURL 방식
        async function downloadImageBlob() {
            const testArea = document.getElementById('test-area-1');
            testArea.innerHTML = '<p>다운로드 중...</p>';
            
            try {
                // 테스트용 이미지 URL (실제 API 엔드포인트로 변경 필요)
                const imageUrl = 'images/test.webp';
                
                const response = await fetch(imageUrl);
                const blob = await response.blob();
                
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'downloaded-image.webp';
                document.body.appendChild(a);
                a.click();
                a.remove();
                window.URL.revokeObjectURL(url);
                
                testArea.innerHTML = '<p style="color: green;">✅ 다운로드 성공! (Blob 방식)</p>';
            } catch (error) {
                testArea.innerHTML = `<p style="color: red;">❌ 다운로드 실패: ${error.message}</p>`;
                console.error('Download error:', error);
            }
        }

        // 방법 2: FileReader readAsDataURL 방식
        async function downloadImageDataURL() {
            const testArea = document.getElementById('test-area-2');
            testArea.innerHTML = '<p>다운로드 중...</p>';
            
            try {
                // 테스트용 이미지 URL
                const imageUrl = 'images/test.webp';
                
                const response = await fetch(imageUrl);
                const blob = await response.blob();
                
                const dataUrl = await blobToDataURL(blob);
                const a = document.createElement('a');
                a.href = dataUrl;
                a.download = 'downloaded-image-dataurl.webp';
                a.textContent = '이미지 다운로드';
                a.className = 'download-btn secondary';
                
                // 기존 내용을 지우고 새로운 링크 추가
                testArea.innerHTML = '';
                testArea.appendChild(a);
                
                // 다운로드 실행
                a.click();
                
                // 성공 메시지 추가
                const successMsg = document.createElement('p');
                successMsg.style.color = 'green';
                successMsg.textContent = '✅ 다운로드 성공! (DataURL 방식)';
                testArea.appendChild(successMsg);
                
            } catch (error) {
                testArea.innerHTML = `<p style="color: red;">❌ 다운로드 실패: ${error.message}</p>`;
                console.error('Download error:', error);
            }
        }

        // Blob을 DataURL로 변환하는 함수
        function blobToDataURL(blob) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onloadend = () => {
                    resolve(reader.result);
                };
                reader.onerror = reject;
                reader.readAsDataURL(blob);
            });
        }

        // 페이지 로드 시 인앱브라우저 감지
        window.onload = function() {
            const isKakaoInApp = /KAKAOTALK/i.test(navigator.userAgent);
            const isInApp = /KAKAOTALK|FB_IAB|FBAN|FBIOS|Instagram|Line/i.test(navigator.userAgent);
            
            if (isKakaoInApp) {
                document.body.insertAdjacentHTML('afterbegin', 
                    '<div style="background: #FEE500; padding: 10px; text-align: center; font-weight: bold;">카카오톡 인앱브라우저에서 실행 중</div>'
                );
            } else if (isInApp) {
                document.body.insertAdjacentHTML('afterbegin', 
                    '<div style="background: #007bff; color: white; padding: 10px; text-align: center; font-weight: bold;">인앱브라우저에서 실행 중</div>'
                );
            }
        };
    </script>
</body>
</html>