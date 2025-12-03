<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>(Sandbox) 카카오톡 공유 테스트</title>
    <style>
      body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        margin: 32px;
        background: #f4f6f8;
      }
      h1 {
        margin-bottom: 8px;
      }
      p.desc {
        color: #555;
        margin-bottom: 24px;
      }
      section.case {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 18px;
        margin-bottom: 16px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      }
      .info {
        flex: 1;
        color: #222;
      }
      button.share-btn {
        border: none;
        border-radius: 8px;
        background: #fee500;
        color: #000;
        font-weight: 600;
        padding: 10px 18px;
        cursor: pointer;
      }
      code {
        background: #eee;
        padding: 2px 6px;
        border-radius: 4px;
      }
    </style>
    <script src="https://sandbox-developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const DEFAULT_APP_KEY = 'SANDBOX_JAVASCRIPT_KEY';
        const params = new URLSearchParams(window.location.search);
        const kakaoAppKey = params.get('appKey') || DEFAULT_APP_KEY;

        if (!window.Kakao) {
          alert('카카오 SDK가 로드되지 않았습니다.');
          return;
        }

        try {
          if (window.Kakao.isInitialized()) {
            window.Kakao.cleanup();
          }
          window.Kakao.init(kakaoAppKey);
        } catch (err) {
          console.error('Kakao.init 실패', err);
          alert('Kakao.init 실패: ' + err.message);
          return;
        }

        const shareButton = document.getElementById('btn-sandbox-share');
        shareButton?.addEventListener('click', function () {
          window.Kakao.Share.sendDefault({
            objectType: 'feed',
            content: {
              title: '(Sandbox) 기본 공유 테스트',
              description: 'Sandbox 환경에서 카카오톡 공유하기 기본 케이스입니다.',
              imageUrl: window.location.origin + '/images/opengraph-image.jpg',
              link: {
                mobileWebUrl: window.location.origin,
                webUrl: window.location.origin,
              },
            },
            buttons: [
              {
                title: '테스트 페이지',
                link: {
                  mobileWebUrl: window.location.origin + '/msg_test_sandbox_free.php',
                  webUrl: window.location.origin + '/msg_test_sandbox_free.php',
                },
              },
            ],
          });
        });
      });
    </script>
  </head>
  <body>
    <h1>카카오톡 공유 테스트 (Sandbox)</h1>
    <p class="desc">
      쿼리 파라미터 <code>?appKey=SANDBOX_APP_KEY</code> 를 사용하면 다양한 앱키로 빠르게 테스트할 수 있습니다.
    </p>

    <section class="case">
      <div class="info">
        <strong>Case 1. 기본 카카오톡 공유</strong>
        <p>Sandbox SDK + Feed 템플릿으로 제목/설명/이미지를 공유합니다.</p>
      </div>
      <button type="button" class="share-btn" id="btn-sandbox-share">공유하기</button>
    </section>
  </body>
</html>