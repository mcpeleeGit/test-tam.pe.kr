<?php
// Kakao In-App Browser friendly file download endpoint
// Ref: https://devtalk.kakao.com/t/topic/146168

declare(strict_types=1);

// ---------- Configuration ----------
$allowedBaseDirs = [
    realpath(__DIR__ . '/images'),
    realpath(__DIR__ . '/cbt'),
];

// ---------- Helpers ----------
function respondError(int $statusCode, string $message): void {
    if (!headers_sent()) {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        header('X-Content-Type-Options: nosniff');
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');
    }
    echo json_encode(['error' => $message], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function isPathAllowed(string $absolutePath, array $allowedBases): bool {
    foreach ($allowedBases as $base) {
        if ($base !== false && strpos($absolutePath, $base) === 0) {
            return true;
        }
    }
    return false;
}

function detectMimeType(string $filePath): string {
    $default = 'application/octet-stream';
    if (function_exists('finfo_open')) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if ($finfo) {
            $mime = finfo_file($finfo, $filePath) ?: $default;
            finfo_close($finfo);
            return $mime;
        }
    }
    return $default;
}

function sendDownloadHeaders(string $filename, int $filesize, string $mime): void {
    // Content headers per Kakao guidance
    header('Content-Type: ' . $mime);
    $basename = basename($filename);
    $encoded = rawurlencode($basename);
    header(
        'Content-Disposition: attachment; filename="' . $basename . '"; filename*=UTF-8\'' . $encoded
    );
    if ($filesize >= 0) {
        header('Content-Length: ' . (string)$filesize);
    }
    header('X-Content-Type-Options: nosniff');
    header('Cache-Control: private, must-revalidate');
}

function outputDataUrlPage(string $downloadUrl, string $suggestedName): void {
    if (!headers_sent()) {
        header('Content-Type: text/html; charset=utf-8');
        header('X-Content-Type-Options: nosniff');
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');
    }
    $safeUrl = htmlspecialchars($downloadUrl, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $safeName = htmlspecialchars($suggestedName, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    echo '<!doctype html><html lang="ko"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">'
        . '<title>다운로드 준비중…</title></head><body>'
        . '<a id="hiddenLink" style="display:none"></a>'
        . '<script>(function(){\n'
        . 'var url = "' . $safeUrl . '";\n'
        . 'var filename = "' . $safeName . '";\n'
        . 'var xhr = new XMLHttpRequest();\n'
        . 'xhr.open("GET", url, true);\n'
        . 'xhr.responseType = "blob";\n'
        . 'xhr.onload = function(){\n'
        . '  if (xhr.status >= 200 && xhr.status < 300){\n'
        . '    var blob = xhr.response;\n'
        . '    var reader = new FileReader();\n'
        . '    reader.onloadend = function(){\n'
        . '      var a = document.getElementById("hiddenLink");\n'
        . '      a.href = reader.result;\n'
        . '      a.download = filename;\n'
        . '      a.click();\n'
        . '      setTimeout(function(){ window.close && window.close(); }, 400);\n'
        . '    };\n'
        . '    reader.readAsDataURL(blob);\n'
        . '  } else {\n'
        . '    document.body.innerHTML = "다운로드 실패: " + xhr.status;\n'
        . '  }\n'
        . '};\n'
        . 'xhr.onerror = function(){ document.body.innerHTML = "네트워크 오류로 다운로드 실패"; };\n'
        . 'xhr.send();\n'
        . '})();</script>'
        . '</body></html>';
    exit;
}

function outputBlobUrlPage(string $downloadUrl, string $suggestedName): void {
    if (!headers_sent()) {
        header('Content-Type: text/html; charset=utf-8');
        header('X-Content-Type-Options: nosniff');
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');
    }
    $safeUrl = htmlspecialchars($downloadUrl, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $safeName = htmlspecialchars($suggestedName, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    echo '<!doctype html><html lang="ko"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">'
        . '<title>다운로드 준비중…</title></head><body>'
        . '<script>(function(){\n'
        . 'var url = "' . $safeUrl . '";\n'
        . 'var filename = "' . $safeName . '";\n'
        . 'fetch(url, { credentials: "include" }).then(function(res){\n'
        . '  if (!res.ok) throw new Error("HTTP " + res.status);\n'
        . '  return res.blob();\n'
        . '}).then(function(blob){\n'
        . '  var objectUrl = (window.URL || window.webkitURL).createObjectURL(blob);\n'
        . '  var a = document.createElement("a");\n'
        . '  a.style.display = "none";\n'
        . '  a.href = objectUrl;\n'
        . '  a.download = filename;\n'
        . '  document.body.appendChild(a);\n'
        . '  a.click();\n'
        . '  setTimeout(function(){\n'
        . '    (window.URL || window.webkitURL).revokeObjectURL(objectUrl);\n'
        . '    if (a && a.parentNode) a.parentNode.removeChild(a);\n'
        . '    window.close && window.close();\n'
        . '  }, 400);\n'
        . '}).catch(function(err){\n'
        . '  document.body.innerHTML = "다운로드 실패: " + (err && err.message ? err.message : err);\n'
        . '});\n'
        . '})();</script>'
        . '</body></html>';
    exit;
}

function outputLinkPage(string $rawUrl, string $suggestedName): void {
    if (!headers_sent()) {
        header('Content-Type: text/html; charset=utf-8');
        header('X-Content-Type-Options: nosniff');
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');
    }
    $safeUrl = htmlspecialchars($rawUrl, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $safeName = htmlspecialchars($suggestedName, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    // Android 전용 <a download>와 기본 헤더 기반 링크, iOS dataUrl 폴백 링크 제공
    echo '<!doctype html><html lang="ko"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">'
        . '<title>파일 다운로드 링크</title>'
        . '<style>body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;line-height:1.6;padding:20px}a{display:block;margin:10px 0;color:#0b67ff;text-decoration:none}small{color:#666}</style>'
        . '</head><body>'
        . '<h1>파일 다운로드</h1>'
        . '<p>파일명: ' . $safeName . '</p>'
        . '<a href="' . $safeUrl . '">일반 다운로드(권장: 헤더 기반)</a>'
        . '<a href="' . $safeUrl . '" download>Android: download 속성 사용</a>'
        . '<a href="' . $safeUrl . '&mode=bloburl">Blob URL 폴백(createObjectURL)</a>'
        . '<a href="' . $safeUrl . '&mode=dataurl">iOS: dataUrl 폴백(소용량 권장)</a>'
        . '<small>참고: 환경에 따라 일부 링크는 동작 방식이 다를 수 있습니다.</small>'
        . '</body></html>';
    exit;
}

// ---------- Main ----------
// Get query params
$fileParam = isset($_GET['file']) ? (string)$_GET['file'] : '';
$mode = isset($_GET['mode']) ? (string)$_GET['mode'] : '';

if ($fileParam === '') {
    respondError(400, 'file 파라미터가 필요합니다. 예) ?file=images/kakao.png');
}

// Basic sanitization
if (strpos($fileParam, "\0") !== false) {
    respondError(400, '잘못된 요청입니다.');
}

// Prevent absolute paths and traversal
if ($fileParam[0] === '/' || preg_match('#\\\\|\.{2}#', $fileParam)) {
    respondError(403, '허용되지 않은 경로입니다.');
}

// Resolve absolute path from project root
$candidatePath = realpath(__DIR__ . '/' . $fileParam);
if ($candidatePath === false || !is_file($candidatePath)) {
    respondError(404, '파일을 찾을 수 없습니다.');
}

// Check allowlist
if (!isPathAllowed($candidatePath, $allowedBaseDirs)) {
    respondError(403, '해당 경로는 다운로드가 허용되지 않습니다.');
}

$filesize = (int)filesize($candidatePath);
$mime = detectMimeType($candidatePath);
$downloadName = basename($candidatePath);

// Link helper page mode: present ready-to-use download links
if ($mode === 'link') {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $script = $_SERVER['SCRIPT_NAME'] ?? '/download.php';
    // base raw link without mode
    $baseQuery = http_build_query(['file' => $fileParam]);
    $rawUrl = $scheme . '://' . $host . $script . '?' . $baseQuery;
    outputLinkPage($rawUrl, $downloadName);
}

// Optional: Blob URL fallback page using createObjectURL
if ($mode === 'bloburl') {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $script = $_SERVER['SCRIPT_NAME'] ?? '/download.php';
    $query = http_build_query(['file' => $fileParam]);
    $rawUrl = $scheme . '://' . $host . $script . '?' . $query;
    outputBlobUrlPage($rawUrl, $downloadName);
}

// Optional: iOS dataUrl fallback page
if ($mode === 'dataurl') {
    // Rebuild URL without mode parameter to fetch the raw file
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $script = $_SERVER['SCRIPT_NAME'] ?? '/download.php';
    $query = http_build_query(['file' => $fileParam]);
    $rawUrl = $scheme . '://' . $host . $script . '?' . $query;
    outputDataUrlPage($rawUrl, $downloadName);
}

// Send headers and stream file
if (function_exists('fastcgi_finish_request')) {
    // ensure only file content goes to client; we still keep buffering control below
}

// Clean output buffers before sending file
while (ob_get_level() > 0) {
    ob_end_clean();
}

sendDownloadHeaders($downloadName, $filesize, $mime);

// Stream file contents
$fp = fopen($candidatePath, 'rb');
if ($fp === false) {
    respondError(500, '파일을 열 수 없습니다.');
}

// Output in chunks to be memory-friendly
set_time_limit(0);
while (!feof($fp)) {
    $buffer = fread($fp, 8192);
    if ($buffer === false) {
        break;
    }
    echo $buffer;
    flush();
}
fclose($fp);
exit;


