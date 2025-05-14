<?php
// k.ico.php

// 캐시 조건 검사용 헤더 설정
header('Content-Type: image/x-icon');
header('Cache-Control: public, max-age=86400'); // 1일 캐시
header('ETag: "test123"');

// 요청 헤더 검사
$clientEtag = isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : '';

if ($clientEtag === '"test123"') {
    // 클라이언트가 이미 캐시한 경우
    http_response_code(304);
    exit;
}

// 실제 아이콘 응답
readfile(__DIR__ . '/k.ico');