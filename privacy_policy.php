<!DOCTYPE html>
<html lang="kr">
<head>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
    <style>
        main.container {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        main.container h1 {
            color: #000;
            border-bottom: 2px solid #4285f4;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        main.container h2 {
            color: #333;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        main.container p {
            margin-bottom: 15px;
        }
        main.container ul {
            margin-bottom: 15px;
            padding-left: 20px;
        }
        main.container li {
            margin-bottom: 8px;
        }
        main.container .last-updated {
            color: #666;
            font-size: 0.9em;
            margin-top: 30px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
    </div>

    <main class="container">
        <h1>개인정보 처리방침</h1>

        <h2>1. 개인정보의 처리 목적</h2>
        <p>본 개인정보 처리방침은 [서비스명]이 제공하는 서비스의 이용조건 및 절차, 회사와 이용자의 권리·의무 및 책임사항을 규정함을 목적으로 합니다.</p>

        <h2>2. 수집하는 개인정보 항목</h2>
        <ul>
            <li>필수항목: 이메일 주소, 이름</li>
            <li>선택항목: 프로필 이미지</li>
            <li>자동수집항목: IP 주소, 쿠키, 서비스 이용 기록, 접속 로그</li>
        </ul>

        <h2>3. 개인정보의 수집 및 이용목적</h2>
        <ul>
            <li>서비스 제공 및 운영</li>
            <li>서비스 이용에 따른 본인확인, 개인식별, 연령확인, 불만처리 등 민원처리</li>
            <li>서비스 이용에 따른 통지사항 전달</li>
            <li>서비스 이용에 따른 통계</li>
        </ul>

        <h2>4. 개인정보의 보유 및 이용기간</h2>
        <p>회원 탈퇴 시까지 (단, 관련 법령에 따라 일정 기간 보관이 필요한 정보는 해당 기간 동안 보관)</p>

        <h2>5. 개인정보의 파기</h2>
        <p>회원 탈퇴 시 즉시 파기하며, 전자적 파일 형태로 저장된 개인정보는 복구 및 재생이 불가능한 방법으로 영구 삭제됩니다.</p>

        <h2>6. 이용자 권리와 행사방법</h2>
        <ul>
            <li>개인정보 열람요구</li>
            <li>오류 등이 있을 경우 정정 요구</li>
            <li>삭제요구</li>
            <li>처리정지 요구</li>
            <li>동의 철회</li>
        </ul>

        <h2>7. 개인정보의 안전성 확보 조치</h2>
        <ul>
            <li>관리적 조치: 내부관리계획 수립·시행, 정기적 직원 교육</li>
            <li>기술적 조치: 개인정보처리시스템 등의 접근권한 관리, 접근통제시스템 설치, 고유식별정보 등의 암호화</li>
            <li>물리적 조치: 전산실, 자료보관실 등의 접근통제</li>
        </ul>

        <h2>8. 개인정보 자동 수집 장치의 설치·운영 및 거부에 관한 사항</h2>
        <p>쿠키를 통해 이용자의 가입 및 이용, 방문 및 이용형태, 인기 검색어, 이용자 규모 등을 파악하여 이용자에게 최적화된 정보를 제공합니다.</p>

        <h2>9. 개인정보 보호책임자</h2>
        <p>회사명: test-tam.pe.kr.<br>
        이메일: mcpelee@hotmail.com</p>

        <div class="last-updated">
            최종 수정일: 2025년 3월 21일
        </div>
    </main>

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>
</body>
</html> 