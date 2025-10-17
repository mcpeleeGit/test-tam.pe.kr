<html>
    <head>
        <title>Download Script</title>
    </head>
    <body>
        <h1>Download Script</h1>
        <p>쿼리스트링으로 <code>?file=상대경로</code> 와 선택적으로 <code>&name=파일명</code>을 전달하세요.</p>
        <p>예) <code>/download_script.php?file=images/kakao.png&amp;name=kakao.png</code></p>

        <button id="downloadBtn">다운로드 실행</button>

        <script>
        (function () {
            function getParam(name) {
                var params = new URLSearchParams(window.location.search);
                return params.get(name) || '';
            }

            function buildDownloadUrl(fileParam) {
                // download.php는 헤더 기반 다운로드를 제공. 원본 파일을 GET으로 받아 Blob 처리
                var url = new URL(window.location.origin + '/download.php?file=images/kakao.png&name=kakao.png');
                url.searchParams.set('file', fileParam);
                return url.toString();
            }

            function triggerBlobDownload(rawUrl, filename) {
                return fetch(rawUrl, { credentials: 'include' })
                    .then(function (res) {
                        if (!res.ok) throw new Error('HTTP ' + res.status);
                        return res.blob();
                    })
                    .then(function (blob) {
                        var objectUrl = (window.URL || window.webkitURL).createObjectURL(blob);
                        var a = document.createElement('a');
                        a.style.display = 'none';
                        a.href = objectUrl;
                        if (filename) a.download = filename;
                        document.body.appendChild(a);
                        a.click();
                        setTimeout(function () {
                            (window.URL || window.webkitURL).revokeObjectURL(objectUrl);
                            if (a && a.parentNode) a.parentNode.removeChild(a);
                        }, 400);
                    });
            }

            var file = getParam('file');
            var name = getParam('name');
            var rawUrl = file ? buildDownloadUrl(file) : '';

            var btn = document.getElementById('downloadBtn');
            btn.addEventListener('click', function () {
                if (!file) {
                    alert('file 파라미터가 필요합니다. 예: ?file=images/kakao.png');
                    return;
                }
                triggerBlobDownload(rawUrl, name || file.split('/').pop()).catch(function (err) {
                    alert('다운로드 실패: ' + (err && err.message ? err.message : err));
                });
            });

            // 파라미터가 있으면 자동 실행
            if (file) {
                triggerBlobDownload(rawUrl, name || file.split('/').pop()).catch(function () {
                    // 실패 시 버튼으로 재시도 가능
                });
            }
        })();
        </script>
    </body>
</html>