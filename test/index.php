<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>카카오 커머스 메타태그 테스트</title>
    <script src="https://t1.kakaocdn.net/kakao_js_sdk/2.7.5/kakao.min.js" integrity="sha384-dok87au0gKqJdxs7msEdBPNnKSRT+/mhTVzq+qOhcL464zXwvcrpjeWvyj1kCdq6" crossorigin="anonymous"></script>
    <script type="text/javascript">
        Kakao.init('2d68640b56d986af5c8a48505c7c8c71');
    </script>
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
                <td><a href="/test/review1_case1.php">리뷰형_1 상품 예시 case1</a></td>
                <td><span id="url-review1-case1">http://test-tam.pe.kr/test/review1_case1.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review1-case1', 'msg-review1-case1')">복사</button>
                    <span id="msg-review1-case1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/review1_case2.php">리뷰형_1 상품 예시 case2</a></td>
                <td><span id="url-review1-case2">http://test-tam.pe.kr/test/review1_case2.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review1-case2', 'msg-review1-case2')">복사</button>
                    <span id="msg-review1-case2" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/review1_case3.php">리뷰형_1 상품 예시 case3</a></td>
                <td><span id="url-review1-case3">http://test-tam.pe.kr/test/review1_case3.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review1-case3', 'msg-review1-case3')">복사</button>
                    <span id="msg-review1-case3" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/review1_case4.php">리뷰형_1 상품 예시 case4</a></td>
                <td><span id="url-review1-case4">http://test-tam.pe.kr/test/review1_case4.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review1-case4', 'msg-review1-case4')">복사</button>
                    <span id="msg-review1-case4" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/review1_case5.php">리뷰형_1 상품 예시 case5</a></td>
                <td><span id="url-review1-case5">http://test-tam.pe.kr/test/review1_case5.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review1-case5', 'msg-review1-case5')">복사</button>
                    <span id="msg-review1-case5" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
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
                <td><a href="/test/review2_case1.php">리뷰형_2 상품 예시 case1</a></td>
                <td><span id="url-review2-case1">http://test-tam.pe.kr/test/review2_case1.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review2-case1', 'msg-review2-case1')">복사</button>
                    <span id="msg-review2-case1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/review2_case2.php">리뷰형_2 상품 예시 case2</a></td>
                <td><span id="url-review2-case2">http://test-tam.pe.kr/test/review2_case2.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review2-case2', 'msg-review2-case2')">복사</button>
                    <span id="msg-review2-case2" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/review2_case3.php">리뷰형_2 상품 예시 case3</a></td>
                <td><span id="url-review2-case3">http://test-tam.pe.kr/test/review2_case3.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review2-case3', 'msg-review2-case3')">복사</button>
                    <span id="msg-review2-case3" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/review2_case4.php">리뷰형_2 상품 예시 case4</a></td>
                <td><span id="url-review2-case4">http://test-tam.pe.kr/test/review2_case4.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review2-case4', 'msg-review2-case4')">복사</button>
                    <span id="msg-review2-case4" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
            </tr>
            <tr>
                <td><a href="/test/review2_case5.php">리뷰형_2 상품 예시 case5</a></td>
                <td><span id="url-review2-case5">http://test-tam.pe.kr/test/review2_case5.php</span></td>
                <td>
                    <button onclick="copyToClipboard('url-review2-case5', 'msg-review2-case5')">복사</button>
                    <span id="msg-review2-case5" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
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

    <h2 style="margin-top: 40px;">외부 Boostlink 테스트</h2>
    <table border="1" cellpadding="6" style="border-collapse:collapse; min-width:700px;">
        <thead>
            <tr>
                <th>유형</th>
                <th>Full URL</th>
                <th>복사</th>
                <th>OS공유</th>
                <th>카카오톡공유</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_badge_01_1.html" target="_blank">Boostlink 뱃지 01_1</a></td>
                <td><span id="url-boostlink-badge-01-1">http://34.9.208.145/rich/boostlink_badge_01_1.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-badge-01-1', 'msg-boostlink-badge-01-1')">복사</button>
                    <span id="msg-boostlink-badge-01-1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-badge-01-1', 'Boostlink 뱃지 01_1')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_badge_01_1.html', 'Boostlink 뱃지 01_1')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_badge_01_2.html" target="_blank">Boostlink 뱃지 01_2</a></td>
                <td><span id="url-boostlink-badge-01-2">http://34.9.208.145/rich/boostlink_badge_01_2.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-badge-01-2', 'msg-boostlink-badge-01-2')">복사</button>
                    <span id="msg-boostlink-badge-01-2" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-badge-01-2', 'Boostlink 뱃지 01_2')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_badge_01_2.html', 'Boostlink 뱃지 01_2')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_base_1.html" target="_blank">Boostlink 기본 1</a></td>
                <td><span id="url-boostlink-base-1">http://34.9.208.145/rich/boostlink_base_1.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-base-1', 'msg-boostlink-base-1')">복사</button>
                    <span id="msg-boostlink-base-1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-base-1', 'Boostlink 기본 1')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_base_1.html', 'Boostlink 기본 1')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_coupon_01_1.html" target="_blank">Boostlink 쿠폰 01_1</a></td>
                <td><span id="url-boostlink-coupon-01-1">http://34.9.208.145/rich/boostlink_coupon_01_1.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-coupon-01-1', 'msg-boostlink-coupon-01-1')">복사</button>
                    <span id="msg-boostlink-coupon-01-1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-coupon-01-1', 'Boostlink 쿠폰 01_1')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_coupon_01_1.html', 'Boostlink 쿠폰 01_1')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_coupon_01_2.html" target="_blank">Boostlink 쿠폰 01_2</a></td>
                <td><span id="url-boostlink-coupon-01-2">http://34.9.208.145/rich/boostlink_coupon_01_2.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-coupon-01-2', 'msg-boostlink-coupon-01-2')">복사</button>
                    <span id="msg-boostlink-coupon-01-2" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-coupon-01-2', 'Boostlink 쿠폰 01_2')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_coupon_01_2.html', 'Boostlink 쿠폰 01_2')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_discounttype_01_1.html" target="_blank">Boostlink 할인타입 01_1</a></td>
                <td><span id="url-boostlink-discounttype-01-1">http://34.9.208.145/rich/boostlink_discounttype_01_1.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-discounttype-01-1', 'msg-boostlink-discounttype-01-1')">복사</button>
                    <span id="msg-boostlink-discounttype-01-1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-discounttype-01-1', 'Boostlink 할인타입 01_1')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_discounttype_01_1.html', 'Boostlink 할인타입 01_1')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_keycon_01_1.html" target="_blank">Boostlink 키컨텐츠 01_1</a></td>
                <td><span id="url-boostlink-keycon-01-1">http://34.9.208.145/rich/boostlink_keycon_01_1.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-keycon-01-1', 'msg-boostlink-keycon-01-1')">복사</button>
                    <span id="msg-boostlink-keycon-01-1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-keycon-01-1', 'Boostlink 키컨텐츠 01_1')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_keycon_01_1.html', 'Boostlink 키컨텐츠 01_1')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_point_01_1.html" target="_blank">Boostlink 포인트 01_1</a></td>
                <td><span id="url-boostlink-point-01-1">http://34.9.208.145/rich/boostlink_point_01_1.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-point-01-1', 'msg-boostlink-point-01-1')">복사</button>
                    <span id="msg-boostlink-point-01-1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-point-01-1', 'Boostlink 포인트 01_1')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_point_01_1.html', 'Boostlink 포인트 01_1')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_point_01_2.html" target="_blank">Boostlink 포인트 01_2</a></td>
                <td><span id="url-boostlink-point-01-2">http://34.9.208.145/rich/boostlink_point_01_2.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-point-01-2', 'msg-boostlink-point-01-2')">복사</button>
                    <span id="msg-boostlink-point-01-2" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-point-01-2', 'Boostlink 포인트 01_2')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_point_01_2.html', 'Boostlink 포인트 01_2')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_review_01_1.html" target="_blank">Boostlink 리뷰 01_1</a></td>
                <td><span id="url-boostlink-review-01-1">http://34.9.208.145/rich/boostlink_review_01_1.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-review-01-1', 'msg-boostlink-review-01-1')">복사</button>
                    <span id="msg-boostlink-review-01-1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-review-01-1', 'Boostlink 리뷰 01_1')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_review_01_1.html', 'Boostlink 리뷰 01_1')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_review_02_1.html" target="_blank">Boostlink 리뷰 02_1</a></td>
                <td><span id="url-boostlink-review-02-1">http://34.9.208.145/rich/boostlink_review_02_1.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-review-02-1', 'msg-boostlink-review-02-1')">복사</button>
                    <span id="msg-boostlink-review-02-1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-review-02-1', 'Boostlink 리뷰 02_1')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_review_02_1.html', 'Boostlink 리뷰 02_1')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_review_02_2.html" target="_blank">Boostlink 리뷰 02_2</a></td>
                <td><span id="url-boostlink-review-02-2">http://34.9.208.145/rich/boostlink_review_02_2.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-review-02-2', 'msg-boostlink-review-02-2')">복사</button>
                    <span id="msg-boostlink-review-02-2" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-review-02-2', 'Boostlink 리뷰 02_2')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_review_02_2.html', 'Boostlink 리뷰 02_2')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_review_03_1.html" target="_blank">Boostlink 리뷰 03_1</a></td>
                <td><span id="url-boostlink-review-03-1">http://34.9.208.145/rich/boostlink_review_03_1.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-review-03-1', 'msg-boostlink-review-03-1')">복사</button>
                    <span id="msg-boostlink-review-03-1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-review-03-1', 'Boostlink 리뷰 03_1')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_review_03_1.html', 'Boostlink 리뷰 03_1')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/boostlink_review_03_2.html" target="_blank">Boostlink 리뷰 03_2</a></td>
                <td><span id="url-boostlink-review-03-2">http://34.9.208.145/rich/boostlink_review_03_2.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-boostlink-review-03-2', 'msg-boostlink-review-03-2')">복사</button>
                    <span id="msg-boostlink-review-03-2" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-boostlink-review-03-2', 'Boostlink 리뷰 03_2')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/boostlink_review_03_2.html', 'Boostlink 리뷰 03_2')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/commerce_default1.html" target="_blank">Commerce 기본 1</a></td>
                <td><span id="url-commerce-default1">http://34.9.208.145/rich/commerce_default1.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-commerce-default1', 'msg-commerce-default1')">복사</button>
                    <span id="msg-commerce-default1" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-commerce-default1', 'Commerce 기본 1')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/commerce_default1.html', 'Commerce 기본 1')">카카오톡공유</button>
                </td>
            </tr>
            <tr>
                <td><a href="http://34.9.208.145/rich/commerce_default1_2.html" target="_blank">Commerce 기본 1_2</a></td>
                <td><span id="url-commerce-default1-2">http://34.9.208.145/rich/commerce_default1_2.html</span></td>
                <td>
                    <button onclick="copyToClipboard('url-commerce-default1-2', 'msg-commerce-default1-2')">복사</button>
                    <span id="msg-commerce-default1-2" class="copy-msg" style="color:green; margin-left:8px; display:none;">복사됨!</span>
                </td>
                <td>
                    <button onclick="shareUrl('url-commerce-default1-2', 'Commerce 기본 1_2')">OS공유</button>
                </td>
                <td>
                    <button onclick="shareToKakao('http://34.9.208.145/rich/commerce_default1_2.html', 'Commerce 기본 1_2')">카카오톡공유</button>
                </td>
            </tr>
        </tbody>
    </table>
    <script>
    function copyToClipboard(urlId, msgId) {
        const text = document.getElementById(urlId).textContent;
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(function() {
                const msg = document.getElementById(msgId);
                msg.style.display = 'inline';
                setTimeout(function() {
                    msg.style.display = 'none';
                }, 1500);
            }, function(err) {
                alert('복사 실패: ' + err);
            });
        } else {
            // fallback for unsupported browsers
            const tempInput = document.createElement('input');
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            try {
                document.execCommand('copy');
                const msg = document.getElementById(msgId);
                msg.style.display = 'inline';
                setTimeout(function() {
                    msg.style.display = 'none';
                }, 1500);
            } catch (err) {
                alert('복사 실패: ' + err);
            }
            document.body.removeChild(tempInput);
        }
    }

    function shareUrl(urlId, title) {
        const url = document.getElementById(urlId).textContent;
        
        if (navigator.share) {
            navigator.share({
                title: title,
                url: url
            }).then(() => {
                console.log('공유 성공');
            }).catch((error) => {
                console.log('공유 실패:', error);
                // 공유 실패 시 클립보드에 복사
                copyToClipboard(urlId, '');
                alert('OS 공유가 지원되지 않습니다. URL이 클립보드에 복사되었습니다.');
            });
        } else {
            // Web Share API가 지원되지 않는 경우 클립보드에 복사
            copyToClipboard(urlId, '');
            alert('OS 공유가 지원되지 않습니다. URL이 클립보드에 복사되었습니다.');
        }
    }

    function shareToKakao(url, title) {
        Kakao.Share.sendScrap({
            requestUrl: url,
        });
    }
    </script>
</body>
</html>


