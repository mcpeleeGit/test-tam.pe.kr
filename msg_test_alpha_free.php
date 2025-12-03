<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>카카오톡 공유 테스트 (Alpha Free)</title>
    <style>
      body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        margin: 32px;
        background: #f7f7f9;
      }
      h1 {
        margin-bottom: 12px;
      }
      p.desc {
        color: #666;
        margin-bottom: 24px;
      }
      .case {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px;
        margin-bottom: 16px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      }
      .case .info {
        flex: 1;
        color: #333;
      }
      .case button {
        padding: 10px 18px;
        border: none;
        border-radius: 8px;
        background: #fee500;
        color: #000;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.1s ease;
      }
      .case button:hover {
        transform: translateY(-1px);
      }
      .case button:active {
        transform: translateY(1px);
      }
      code {
        background: #efefef;
        padding: 2px 6px;
        border-radius: 4px;
      }
    </style>
    <script src="https://alpha-developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script>

      function __kakaoShareDefault() {
        Kakao.cleanup();
        Kakao.init('1cfd213b6e172004b11ceb8ad94678a2');
        Kakao.Share.sendDefault({
          objectType: 'text',
          text:
            '기본 템플릿으로 제공하는 텍스트 템플릿은 텍스트를 최대 200자까지 표시할 수 있습니다. 텍스트 템플릿은 텍스트 영역과 하나의 기본 버튼을 가집니다. 임의의 버튼을 설정할 수도 있습니다. 여러 장의 이미지, 프로필 정보 등 보다 확장된 형태의 카카오톡 공유는 다른 템플릿을 이용해 보낼 수 있습니다.',
          link: {
            mobileWebUrl: 'https://developers.kakao.com',
            webUrl: 'https://developers.kakao.com',
          },
        });
      }
      function __kakaoShareDefaultWithDomain() {
        Kakao.cleanup();
        Kakao.init('aa4d21b6c69665e0f22f9d270c564b3d');
        Kakao.Share.sendDefault({
          objectType: 'text',
          text:
            '기본 템플릿으로 제공하는 텍스트 템플릿은 텍스트를 최대 200자까지 표시할 수 있습니다. 텍스트 템플릿은 텍스트 영역과 하나의 기본 버튼을 가집니다. 임의의 버튼을 설정할 수도 있습니다. 여러 장의 이미지, 프로필 정보 등 보다 확장된 형태의 카카오톡 공유는 다른 템플릿을 이용해 보낼 수 있습니다.',
          link: {
            mobileWebUrl: 'https://developers.kakao.com',
            webUrl: 'https://developers.kakao.com',
          },
        });
      }
      function __kakaoShareDefaultWithRestKey() {
        Kakao.cleanup();
        Kakao.init('475c10f29cd250c70ed54e1571478093');
        Kakao.Share.sendDefault({
          objectType: 'text',
          text:
            '기본 템플릿으로 제공하는 텍스트 템플릿은 텍스트를 최대 200자까지 표시할 수 있습니다. 텍스트 템플릿은 텍스트 영역과 하나의 기본 버튼을 가집니다. 임의의 버튼을 설정할 수도 있습니다. 여러 장의 이미지, 프로필 정보 등 보다 확장된 형태의 카카오톡 공유는 다른 템플릿을 이용해 보낼 수 있습니다.',
          link: {
            mobileWebUrl: 'https://developers.kakao.com',
            webUrl: 'https://developers.kakao.com',
          },
        });
      }
      function __kakaoShareCustom() {
        Kakao.cleanup();
        Kakao.init('6508a55b4b5f6916622e6608aba832c8');
        Kakao.Share.sendCustom({
          templateId: 402006
        });
      }
    </script>
  </head>
  <body>
    <h1>카카오톡 공유 테스트 (Alpha Free)</h1>
    
    <div class="info">ID 1174335 BIZAPP TEST / 앱 대표 도메인 (https://developers.kakao.com) / 서비스 플랫폼 (https://devtalk.kakao.com, https://developers.kakao.com) </div>
    <section class="case">
      <div class="info">카카오톡 공유용 앱키추가-사이트도메인 없음 : 4019 에러</div>
      <button type="button" id="btn-share-default" onclick="__kakaoShareDefault()">공유하기</button>
    </section>
    <section class="case">
      <div class="info">카카오톡 공유용 앱키추가-사이트도메인 있음</div>
      <div class="info">출처 : 서비스플랫폼 https://devtalk.kakao.com</div>
      <div class="info">버튼 : https://developers.kakao.com</div>
      <button type="button" id="btn-share-default" onclick="__kakaoShareDefaultWithDomain()">공유하기</button>
    </section>
    <section class="case">
      <div class="info">카카오톡공유에 REST KEY 사용하면? : 4019 에러</div>
      <button type="button" id="btn-share-default" onclick="__kakaoShareDefaultWithRestKey()">공유하기</button>
    </section>
    <section class="case">
      <div class="info">커스텀템플릿용 앱키 : 공통링크 기본웹도메인</div>
      <div class="info">출처 : 서비스플랫폼 https://devtalk.kakao.com</div>
      <div class="info">버튼 : 서비스플랫폼 https://devtalk.kakao.com</div>
      <button type="button" id="btn-share-default" onclick="__kakaoShareCustom()">공유하기</button>
    </section>
    <div class="info">ID 1173312 OIDC TAM TEST (비즈앱) / 앱 대표 도메인 (없음) / 서비스 플랫폼 (없음) </div>
    <section class="case">
      <div class="info">커스텀 템플릿 테스트 </div>
      <div class="info">출처 : 서비스플랫폼 https://devtalk.kakao.com</div>
      <div class="info">버튼 : 서비스플랫폼 https://devtalk.kakao.com</div>
      <button type="button" id="btn-share-default" onclick="__kakaoShareCustom()">공유하기</button>
    </section>
  </body>
</html>