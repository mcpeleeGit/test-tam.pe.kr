<!DOCTYPE html>
<html lang="ko">
<head>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
    <title>API 호출 테스트</title>
</head>
<body>
    <div class="container">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
    </div>

    <main class="container" style="margin-top:30px;">
        <h1>API 호출 테스트 페이지</h1>
        <p>여기서 각종 API 호출을 테스트할 수 있습니다.</p>
        <!-- 여기에 실제 API 테스트용 폼이나 버튼, 결과 출력 등을 추가하면 됩니다. -->
        <div id="api-test-area">
            <button class="btn btn-primary" onclick="alert('API 호출 예시!')">API 호출 테스트 버튼</button>
        </div>
    </main>

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>
</body>
</html>
