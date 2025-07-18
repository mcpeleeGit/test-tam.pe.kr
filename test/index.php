<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>카카오 커머스 메타태그 테스트</title>
</head>
<body>
    <h1>카카오 커머스 메타태그 테스트</h1>
    <table border="1" cellpadding="6" style="border-collapse:collapse; min-width:700px;">
        <thead>
            <tr>
                <th>유형</th>
                <th>Full URL</th>
                <th>복사</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="/test/basic.php">기본형 상품 예시</a></td>
                <td><span id="url-basic">http://test-tam.pe.kr/test/basic.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-basic', 'msg-basic')">복사</button>
                    <span id="msg-basic" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/basic_case1.php">기본형 상품 예시 case1</a></td>
                <td><span id="url-basic-case1">http://test-tam.pe.kr/test/basic_case1.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-basic-case1', 'msg-basic-case1')">복사</button>
                    <span id="msg-basic-case1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/basic_case2.php">기본형 상품 예시 case2</a></td>
                <td><span id="url-basic-case2">http://test-tam.pe.kr/test/basic_case2.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-basic-case2', 'msg-basic-case2')">복사</button>
                    <span id="msg-basic-case2" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/basic_case3.php">기본형 상품 예시 case3</a></td>
                <td><span id="url-basic-case3">http://test-tam.pe.kr/test/basic_case3.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-basic-case3', 'msg-basic-case3')">복사</button>
                    <span id="msg-basic-case3" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/basic_case4.php">기본형 상품 예시 case4</a></td>
                <td><span id="url-basic-case4">http://test-tam.pe.kr/test/basic_case4.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-basic-case4', 'msg-basic-case4')">복사</button>
                    <span id="msg-basic-case4" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/basic_case5.php">기본형 상품 예시 case5</a></td>
                <td><span id="url-basic-case5">http://test-tam.pe.kr/test/basic_case5.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-basic-case5', 'msg-basic-case5')">복사</button>
                    <span id="msg-basic-case5" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/review1.php">리뷰형_1 상품 예시</a></td>
                <td><span id="url-review1">http://test-tam.pe.kr/test/review1.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review1', 'msg-review1')">복사</button>
                    <span id="msg-review1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/review2.php">리뷰형_2 상품 예시</a></td>
                <td><span id="url-review2">http://test-tam.pe.kr/test/review2.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review2', 'msg-review2')">복사</button>
                    <span id="msg-review2" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/review3.php">리뷰형_3 상품 예시</a></td>
                <td><span id="url-review3">http://test-tam.pe.kr/test/review3.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review3', 'msg-review3')">복사</button>
                    <span id="msg-review3" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/badge.php">뱃지 상품 예시</a></td>
                <td><span id="url-badge">http://test-tam.pe.kr/test/badge.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-badge', 'msg-badge')">복사</button>
                    <span id="msg-badge" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/highlight.php">키컨텐츠 상품 예시</a></td>
                <td><span id="url-highlight">http://test-tam.pe.kr/test/highlight.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-highlight', 'msg-highlight')">복사</button>
                    <span id="msg-highlight" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/coupon.php">쿠폰형 상품 예시</a></td>
                <td><span id="url-coupon">http://test-tam.pe.kr/test/coupon.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-coupon', 'msg-coupon')">복사</button>
                    <span id="msg-coupon" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/wowdiscount.php">가격정보플러스_와우할인 상품 예시</a></td>
                <td><span id="url-wowdiscount">http://test-tam.pe.kr/test/wowdiscount.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-wowdiscount', 'msg-wowdiscount')">복사</button>
                    <span id="msg-wowdiscount" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/membership.php">적립액 상품 예시</a></td>
                <td><span id="url-membership">http://test-tam.pe.kr/test/membership.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-membership', 'msg-membership')">복사</button>
                    <span id="msg-membership" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
        </tbody>
    </table>
    <script>
    function copyToClipboard(urlId, msgId) {
        const text = document.getElementById(urlId).textContent;
        navigator.clipboard.writeText(text).then(function() {
            const msg = document.getElementById(msgId);
            msg.style.display = 'inline';
            setTimeout(function() {
                msg.style.display = 'none';
            }, 1500);
        }, function(err) {
            alert('복사 실패: ' + err);
        });
    }
    </script>
</body>
</html>
