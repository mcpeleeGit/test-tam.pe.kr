<?php
// 쿠키 생성 함수
function createCookie($name, $value) {
    $expiry = time() + (30 * 24 * 60 * 60); // 30일
    setcookie($name, $value, $expiry, "/");
    echo "쿠키 '{$name}'가 생성되었습니다.<br>";
}

// 쿠키 삭제 함수
function deleteCookie($name) {
    setcookie($name, '', time() - 3600, "/");
    echo "쿠키 '{$name}'가 삭제되었습니다.<br>";
}

// 버튼 클릭에 따라 함수 호출
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        createCookie("exampleCookie", "exampleValue");
    } elseif (isset($_POST['delete'])) {
        deleteCookie("exampleCookie");
    }
}

// 쿠키 내용 표시 함수
function displayCookie($name) {
    if (isset($_COOKIE[$name])) {
        echo "쿠키 '{$name}'의 값: " . $_COOKIE[$name] . "<br>";
    } else {
        echo "쿠키 '{$name}'가 존재하지 않습니다.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>쿠키 관리</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="create">쿠키 생성</button>
        <button type="submit" name="delete">쿠키 삭제</button>
    </form>

    <h2>쿠키 내용</h2>
    <?php
    // 쿠키 내용 표시
    displayCookie("exampleCookie");
    ?>
</body>
</html>
