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
  <title>카카오 IP 목록</title>
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
            border-bottom: 2px solid #fee500;
            padding-bottom: 10px;
        }
        main.container .ip-section {
            margin: 20px 0;
            padding: 15px;
            background: #f8f8f8;
            border-radius: 5px;
        }
        main.container .ip-section h2 {
            color: #000;
            margin-top: 0;
        }
        main.container .ip-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        main.container .ip-item {
            background: #fee500;
            color: #000;
            padding: 5px 10px;
            border-radius: 3px;
            font-family: monospace;
        }
        main.container .error {
            color: #ff0000;
            padding: 10px;
            background: #ffe6e6;
            border-radius: 5px;
            margin: 10px 0;
        }
        main.container .info {
            color: #666;
            font-size: 0.9em;
            margin: 10px 0;
        }
    </style>
</head>

<body>
  <div class="container">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
  </div>

  <main class="container">
  
        <h1>카카오 IP 목록</h1>
        
        <?php if ($error): ?>
            <div class="error">
                <strong>에러 발생:</strong> <?php echo formatErrorMessage($error); ?>
            </div>
        <?php endif; ?>

        <?php if ($http_code === 200 && $result): ?>
            <?php if (isset($result['inbound'])): ?>
                <div class="ip-section">
                    <h2>인바운드 IP 목록</h2>
                    <div class="ip-list">
                        <?php foreach ($result['inbound'] as $ip): ?>
                            <span class="ip-item"><?php echo formatErrorMessage($ip); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (isset($result['outbound'])): ?>
                <div class="ip-section">
                    <h2>아웃바운드 IP 목록</h2>
                    <div class="ip-list">
                        <?php foreach ($result['outbound'] as $ip): ?>
                            <span class="ip-item"><?php echo formatErrorMessage($ip); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="info">
                <p>마지막 업데이트: <?php echo date('Y-m-d H:i:s'); ?></p>
                <p>총 IP 수: <?php echo count($result['inbound'] ?? []) + count($result['outbound'] ?? []); ?></p>
            </div>
        <?php else: ?>
            <div class="error">
                <strong>API 응답 오류:</strong> HTTP 상태 코드 <?php echo $http_code; ?>
                <?php if ($result && isset($result['msg'])): ?>
                    <br>에러 메시지: <?php echo formatErrorMessage($result['msg']); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
   
  </main>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>
</body>

</html>
