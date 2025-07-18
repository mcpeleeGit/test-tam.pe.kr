<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>리뷰형_2 상품 예시 - 필수/옵션 일부 누락 케이스1</title>
    <!-- OG Tags -->
    <meta property="og:title" content="폴라도레 KC인증 ...">
    <meta property="og:image" content="https://test.com/image.png">
    <meta property="og:site_name" content="쿠팡">
    <!-- Kakao Commerce Tags (리뷰형_2) -->
    <meta property="kakao:commerce:product_image_url" content="https://test.com/image.png">
    <meta property="kakao:commerce:product_name" content="폴라도레 KC인증 ...">
    <meta property="kakao:commerce:price" content="21900">
    <meta property="kakao:commerce:first_button_title" content="구매하기">
    <!-- 누락: kakao:commerce:product_review_rating_icon (필수) -->
    <meta property="kakao:commerce:product_review_count" content="1415">
    <!-- 옵션 -->
    <meta property="kakao:template_type" content="commerce_review">
    <!-- 누락: kakao:commerce:regular_price (옵션) -->
    <meta property="kakao:commerce:discount_rate" content="22">
</head>
<body>
    <h1>리뷰형_2 상품 예시 - 필수/옵션 일부 누락 케이스1</h1>
    <p>이 페이지는 <b>필수/옵션 항목이 일부 누락된</b> 카카오 커머스 리뷰형_2 메타 태그 예시입니다.</p>
    <h2>누락된 항목</h2>
    <table border="1" cellpadding="4" style="border-collapse:collapse;">
        <tr><th>property</th><th>구분</th></tr>
        <tr><td>kakao:commerce:product_review_rating_icon</td><td>필수</td></tr>
        <tr><td>kakao:commerce:regular_price</td><td>옵션</td></tr>
    </table>
    <h2>head 내 메타태그 정보</h2>
    <p><strong>OG Tags</strong></p>
    <table border="1" cellpadding="4" style="border-collapse:collapse;">
        <tr><th>property</th><th>content</th></tr>
        <tr><td>og:title</td><td>폴라도레 KC인증 ...</td></tr>
        <tr><td>og:image</td><td>https://test.com/image.png</td></tr>
        <tr><td>og:site_name</td><td>쿠팡</td></tr>
    </table>
    <p><strong>Kakao Commerce Tags (리뷰형_2)</strong></p>
    <table border="1" cellpadding="4" style="border-collapse:collapse;">
        <tr><th>property</th><th>content</th><th>구분</th></tr>
        <tr><td>kakao:commerce:product_image_url</td><td>https://test.com/image.png</td><td>필수</td></tr>
        <tr><td>kakao:commerce:product_name</td><td>폴라도레 KC인증 ...</td><td>필수</td></tr>
        <tr><td>kakao:commerce:price</td><td>21900</td><td>필수</td></tr>
        <tr><td>kakao:commerce:first_button_title</td><td>구매하기</td><td>필수</td></tr>
        <tr style="background:#ffecec"><td>kakao:commerce:product_review_rating_icon</td><td><i>누락</i></td><td>필수</td></tr>
        <tr><td>kakao:commerce:product_review_count</td><td>1415</td><td>필수</td></tr>
        <tr><td>kakao:template_type</td><td>commerce_review</td><td>옵션</td></tr>
        <tr style="background:#ffecec"><td>kakao:commerce:regular_price</td><td><i>누락</i></td><td>옵션</td></tr>
        <tr><td>kakao:commerce:discount_rate</td><td>22</td><td>옵션</td></tr>
    </table>
</body>
</html> 