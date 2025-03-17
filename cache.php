<?php
class PageCache {
    private $cacheTime = 3600; // 1시간
    private $debugMode = true;
    private $etag;

    public function __construct() {
        $this->etag = $this->generateETag();
    }

    private function generateETag() {
        return md5($_SERVER['REQUEST_URI'] . filemtime(__FILE__));
    }

    private function setClientCache() {
        header('Cache-Control: public, max-age=' . $this->cacheTime);
        header('ETag: "' . $this->etag . '"');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime(__FILE__)) . ' GMT');
    }

    private function checkClientCache() {
        $ifNoneMatch = isset($_SERVER['HTTP_IF_NONE_MATCH']) ? stripslashes($_SERVER['HTTP_IF_NONE_MATCH']) : false;
        $ifModifiedSince = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? stripslashes($_SERVER['HTTP_IF_MODIFIED_SINCE']) : false;
        
        if ($ifNoneMatch && $ifNoneMatch == '"' . $this->etag . '"') {
            header('HTTP/1.1 304 Not Modified');
            return true;
        }
        
        if ($ifModifiedSince && strtotime($ifModifiedSince) >= filemtime(__FILE__)) {
            header('HTTP/1.1 304 Not Modified');
            return true;
        }
        
        return false;
    }

    public function start() {
        $this->setClientCache();
        if ($this->checkClientCache()) {
            exit;
        }
        $this->displayCacheStatus();
    }

    private function displayCacheStatus() {
        if (!$this->debugMode) return;

        echo '<!-- Cache Status -->';
        echo '<div id="cache-status" style="position: fixed; bottom: 10px; right: 10px; 
            background: rgba(0,0,0,0.8); color: white; padding: 10px; border-radius: 5px; 
            font-family: monospace; font-size: 12px; z-index: 9999;">';
        echo '<div><strong>Browser Cache:</strong><br>';
        echo 'ETag: ' . $this->etag . '<br>';
        echo 'Last-Modified: ' . gmdate('Y-m-d H:i:s', filemtime(__FILE__)) . '<br>';
        echo 'Cache-Control: ' . $this->cacheTime . 's</div>';
        echo '</div>';

        // 브라우저 캐시 상태를 JavaScript로 확인
        echo '<script>
        (function() {
            function checkBrowserCache() {
                var cacheStatus = document.getElementById("cache-status");
                if (!cacheStatus) return;
                
                var browserCacheInfo = "";
                
                if (window.performance) {
                    var perf = window.performance;
                    var entries = perf.getEntriesByType("navigation");
                    
                    if (entries.length > 0) {
                        var entry = entries[0];
                        var type = entry.type;
                        var color = "#F44336";
                        
                        if (type === "back_forward_cache") {
                            color = "#2196F3";
                        } else if (type === "reload" && entry.transferSize === 0) {
                            color = "#4CAF50";
                            type = "from_cache";
                        }
                        
                        browserCacheInfo = "<br>Load Type: <span style=\'color: " + color + "\'>" + type + "</span>";
                    }
                }
                
                var divs = cacheStatus.getElementsByTagName("div");
                if (divs.length > 0) {
                    divs[0].innerHTML += browserCacheInfo;
                }
            }
            
            if (document.readyState === "complete") {
                checkBrowserCache();
            } else {
                window.addEventListener("load", checkBrowserCache);
            }
        })();
        </script>';
    }
}

// 캐시 인스턴스 생성
$cache = new PageCache();

// 캐시 시작
$cache->start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cache Test</title>
</head>
<body>
    <h1>페이지 캐시 테스트 (클라이언트 브라우저 캐시)</h1>
    <p>현재 시간: <?php echo date('Y-m-d H:i:s'); ?></p>
    <p>이 내용은 브라우저 캐시에 1시간 동안 저장됩니다.</p>
</body>
</html> 