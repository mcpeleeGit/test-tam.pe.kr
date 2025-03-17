<?php
class PageCache {
    private $cachePath = 'cache/';
    private $cacheTime = 3600; // 1시간
    private $debugMode = true;

    public function __construct() {
        if (!is_dir($this->cachePath)) {
            mkdir($this->cachePath, 0777, true);
        }
    }

    public function start() {
        ob_start();
        $this->displayCacheStatus();
    }

    public function end($key) {
        $content = ob_get_contents();
        ob_end_flush();
        $this->saveCache($key, $content);
    }

    public function getCache($key) {
        $cacheFile = $this->getCacheFilePath($key);
        
        if ($this->isCacheValid($cacheFile)) {
            $content = file_get_contents($cacheFile);
            if ($this->debugMode) {
                $this->displayCacheInfo($cacheFile, true);
            }
            return $content;
        }
        
        if ($this->debugMode) {
            $this->displayCacheInfo($cacheFile, false);
        }
        return false;
    }

    private function saveCache($key, $content) {
        $cacheFile = $this->getCacheFilePath($key);
        file_put_contents($cacheFile, $content);
    }

    private function getCacheFilePath($key) {
        return $this->cachePath . md5($key) . '.cache';
    }

    private function isCacheValid($cacheFile) {
        if (!file_exists($cacheFile)) {
            return false;
        }

        $fileTime = filemtime($cacheFile);
        return (time() - $fileTime) < $this->cacheTime;
    }

    private function displayCacheStatus() {
        if (!$this->debugMode) return;

        echo '<!-- Cache Status -->';
        echo '<div id="cache-status" style="position: fixed; bottom: 10px; right: 10px; 
            background: rgba(0,0,0,0.8); color: white; padding: 10px; border-radius: 5px; 
            font-family: monospace; font-size: 12px; z-index: 9999;">';
        echo 'Cache Time: ' . date('Y-m-d H:i:s') . '<br>';
        echo 'Cache Duration: ' . $this->cacheTime . 's<br>';
        echo '</div>';
    }

    private function displayCacheInfo($cacheFile, $isHit) {
        $status = $isHit ? 'HIT' : 'MISS';
        $color = $isHit ? '#4CAF50' : '#F44336';
        
        if (file_exists($cacheFile)) {
            $fileTime = filemtime($cacheFile);
            $age = time() - $fileTime;
            $timeLeft = $this->cacheTime - $age;
            
            echo '<script>
                var cacheStatus = document.getElementById("cache-status");
                if (cacheStatus) {
                    cacheStatus.innerHTML += "Cache ' . $status . ': <span style=\'color: ' . $color . '\'>' . $status . '</span><br>";
                    cacheStatus.innerHTML += "Cache Age: ' . $age . 's<br>";
                    cacheStatus.innerHTML += "Time Left: ' . $timeLeft . 's";
                }
            </script>';
        }
    }
}

// 사용 예시
function getCacheKey() {
    return $_SERVER['REQUEST_URI'] . '_' . $_SERVER['QUERY_STRING'];
}

// 캐시 인스턴스 생성
$cache = new PageCache();

// 캐시 키 생성
$cacheKey = getCacheKey();

// 캐시된 내용이 있는지 확인
$cachedContent = $cache->getCache($cacheKey);

if ($cachedContent !== false) {
    // 캐시된 내용 출력
    echo $cachedContent;
    exit;
}

// 캐시 시작
$cache->start();

// 여기서부터 실제 페이지 내용
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cache Test</title>
</head>
<body>
    <h1>페이지 캐시 테스트</h1>
    <p>현재 시간: <?php echo date('Y-m-d H:i:s'); ?></p>
    <p>이 내용은 1시간 동안 캐시됩니다.</p>
</body>
</html>
<?php
// 캐시 종료 및 저장
$cache->end($cacheKey);
?> 