<!DOCTYPE html>
<html lang="kr">

<head>
  <title>Kakao API Platform TAM Test Site - Legacy JS SDK v1</title>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
  <script type="text/javascript" src="/script/kakao-1.43.5.min.js"></script>
  <script type="text/javascript">
    Kakao.init('2d68640b56d986af5c8a48505c7c8c71');
  </script>
  <script type="text/javascript">
    function login() {
      Kakao.Auth.login({
        success: function(authObj) {
          console.log('로그인 성공');
          Kakao.API.request({
            url: '/v2/user/me',
            success: function(res) {
              console.log(res);
              alert("로그인 성공");
            },
            fail: function(error) {
              alert("로그인 실패");
            }
          });
        },
        fail: function(err) {
          console.log('로그인 실패');
        },
      })
    }

    function logout() {
      if (!Kakao.Auth.getAccessToken()) {
        console.log('Not logged in.');
        return;
      }
      console.log(Kakao.Auth.getAccessToken()); //before Logout
      Kakao.Auth.logout(function() {
        console.log("logout");
        //★ 추가 할 것 : 로그아웃 성공 후 처리 
      });
    }

    function logoutWithKakaoAccount() {
      location.href = 'https://kauth.kakao.com/oauth/logout?client_id=2d68640b56d986af5c8a48505c7c8c71&logout_redirect_uri=http://test-tam.pe.kr/js_sdk_v1.php';
    }

    function unlink() {
      Kakao.API.request({
          url: '/v1/user/unlink',
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }

    function me() {
      Kakao.API.request({
          url: '/v2/user/me',
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }

    function update_profile() {
      Kakao.API.request({
        url: '/v1/user/update_profile',
        data: {
          properties: {
            'nickname': 'update profile test value'
          },
        },
        success: function(response) {
          console.log(response);
        },
        fail: function(error) {
          console.log(error);
        }
      });
    }

    function shipping_address() {
      Kakao.API.request({
        url: '/v1/user/shipping_address',
        success: function(response) {
          console.log(response);
        },
        fail: function(error) {
          console.log(error);
        }
      });
    }

    function scopes() {
      Kakao.API.request({
        url: '/v2/user/scopes',
        success: function(response) {
          console.log(response);
        },
        fail: function(error) {
          console.log(error);
        }
      });
    }

    function revoke_scopes() {
      Kakao.API.request({
        url: '/v2/user/revoke/scopes',
        data: {
          scopes: ['gender']
        },
        success: function(response) {
          console.log(response);
        },
        fail: function(error) {
          console.log(error);
        }
      });
    }

    function terms() {
      Kakao.API.request({
        url: '/v1/user/service/terms',
        success: function(response) {
          console.log(response);
        },
        fail: function(error) {
          console.log(error);
        }
      });
    }
  </script>
  <script type="text/javascript">
    function login_authorize() {
      Kakao.Auth.authorize({
        redirectUri: encodeURI('http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php')
      });
    }

    function login_scope() {
      Kakao.Auth.authorize({
        redirectUri: encodeURI('http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php'),
        scope: 'friends,talk_message',
      });
    }

    function login_prompt_none() {
      Kakao.Auth.authorize({
        redirectUri: encodeURI('http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php'),
        prompts: 'none',
      });
    }

    function login_service_terms() {
      Kakao.Auth.authorize({
        redirectUri: encodeURI('http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php'),
        serviceTerms: 'consignment',
      });
    }

    function login_nonce() {
      Kakao.Auth.authorize({
        redirectUri: encodeURI('http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php'),
        nonce: 'nonce'
      });
    }

    function login_prompt_login() {
      Kakao.Auth.authorize({
        redirectUri: encodeURI('http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php'),
        prompts: 'login'
      });
    }
  </script>
  <script type="text/javascript">
    function share() {
      Kakao.Share.sendDefault({
        objectType: 'feed',
        content: {
          title: 'Kakao API Platform',
          description: 'Kakao API Platform Test Site',
          imageUrl: 'http://<?= $_SERVER['HTTP_HOST'] ?>/images/k.ico',
          link: {
            mobileWebUrl: 'http://<?= $_SERVER['HTTP_HOST'] ?>',
            webUrl: 'http://<?= $_SERVER['HTTP_HOST'] ?>'
          }
        },
        buttons: [{
          title: 'Go to Kakao API Platform',
          link: {
            mobileWebUrl: 'http://<?= $_SERVER['HTTP_HOST'] ?>',
            webUrl: 'http://<?= $_SERVER['HTTP_HOST'] ?>'
          }
        }]
      });
    }

    function share_installtalk() {
      var kakao_title = document.querySelector("h1.name").textContent;
      var kakao_url = window.location.href;
      var kakao_imageUrl = document.querySelector(".thumbnail .ThumbImage").src;
      Kakao.Link.sendDefault({
        objectType: 'feed',
        content: {
          title: kakao_title,
          // description: '카카오공유하기 시 설명',
          imageUrl: kakao_imageUrl,
          link: {
            mobileWebUrl: kakao_url,
            webUrl: kakao_url
          },
        },
        // 카카오톡 미설치 시 카카오톡 설치 경로이동
        installTalk: true,
      })
    }

    function defaultImageCheck() {
      Kakao.Share.sendDefault({
        objectType: 'feed',
        content: {
          title: "타이틀",
          description: "설명",
          imageUrl: "https://imagedelivery.net/9PYUDgg_yiUa2u-j77sFBg/f1f0b4d7-edfc-4319-2657-9470c23f4200/tog",
          link: {
            mobileWebUrl: document.location.href,
            webUrl: document.location.href,
          },
        },
        buttons: [{
          title: '자세히 보기',
          link: {
            mobileWebUrl: document.location.href,
            webUrl: document.location.href,
          },
        }]
      });
    }


    function customTemplateArgs() {
      Kakao.Share.sendCustom({
        templateId: 102112,
        templateArgs: {
          "description": "테크업계 면접 준비에 특화된 AI 모의면접 서비스를 무료로 3회 누려보세요! https://www.interview-prep.xyz/?ref=XLMMZLRK1Z",
          "mobileWebUrl": "https://www.interview-prep.xyz/?ref=XLMMZLRK1Z",
          "webUrl": "https://www.interview-prep.xyz/?ref=XLMMZLRK1Z"
        }
      });
    }

    function share_callback() {

      // 공유할 링크 및 메시지
      const link = 'https://dev-m.dongwonmall.com/index.do';
      const text = '동원몰 카카오톡 공유 테스트';
      const cmSeq = '0000000009666795';

      // 카카오톡 공유 API 호출
      Kakao.Link.sendDefault({
        objectType: 'feed',
        content: {
          title: '동원몰 카카오톡 공유하기 테스트',
          description: '동원몰 카카오톡 공유하기 테스트 입니다.',
          imageUrl: 'https://image.thebanchan.co.kr/tbcImg/web/images/event/240704_summer/type04_800.jpg', // 이미지 URL을 여기에 추가합니다.
          link: {
            mobileWebUrl: link,
            webUrl: link
          }
        },
        buttons: [{
          title: '공유하기테스트',
          link: {
            mobileWebUrl: link,
            webUrl: link
          }
        }],
        serverCallbackArgs: { // 사용자 정의 파라미터 설정
          cmSeq: cmSeq
        }
      });
    }


    function scrap_param() {
      Kakao.Share.sendScrap({
        requestUrl: 'http://www.posco.co.kr/homepage/docs/kor7/jsp/prcenter/press/s91c600110v.jsp',
        installTalk: true
      });
    }

    function send() {
      Kakao.API.request({
        url: '/v2/api/talk/memo/default/send',
        data: {
          template_object: {
            object_type: 'feed',
            content: {
              title: '카카오톡 링크 4.0',
              description: '디폴트 템플릿 FEED',
              image_url: 'https://mud-kage.kakao.com/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png',
              link: {
                web_url: 'https://developers.kakao.com',
                mobile_web_url: 'https://developers.kakao.com',
              },
            },
            item_content: {
              profile_text: 'Kakao',
              profile_image_url: 'https://mud-kage.kakao.com/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png',
              title_image_url: 'https://mud-kage.kakao.com/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png',
              title_image_text: 'Cheese cake',
              title_image_category: 'Cake',
              items: [{
                  item: 'Cake1',
                  item_op: '1000원',
                },
                {
                  item: 'Cake2',
                  item_op: '2000원',
                },
                {
                  item: 'Cake3',
                  item_op: '3000원',
                },
                {
                  item: 'Cake4',
                  item_op: '4000원',
                },
                {
                  item: 'Cake5',
                  item_op: '5000원',
                },
              ],
              sum: 'Total',
              sum_op: '15000원',
            },
            social: {
              like_count: 100,
              comment_count: 200,
            },
            button_title: '바로 확인',
          },
        },
        success: function(response) {
          console.log(response);
        },
        fail: function(error) {
          console.log(error);
        },
      });
    }

    function profile() {
      Kakao.API.request({
        url: '/v1/api/talk/profile',
        success: function(response) {
          console.log(response);
        },
        fail: function(error) {
          console.log(error);
        }
      });
    }

    function addChannel() {
      Kakao.Channel.addChannel({
        channelPublicId: '_ZeUTxl'
      });
    }

    function navi() {
      Kakao.Navi.start({
        name: '현대백화점 판교점',
        x: 127.11205203011632,
        y: 37.39279717586919,
        coordType: 'wgs84',
      });
    }


    function selectShippingAddress() {
      Kakao.Auth.selectShippingAddress()
        .then(function(selectedAddress) {
          // 배송지 가져오기
          return Kakao.API.request({
            url: '/v1/user/shipping_address',
            data: {
              address_id: selectedAddress.address_id,
            },
          });
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }


    function share_default_invalid_parameter() {
      const mainTitle = '동원몰 카카오톡 공유하기 테스트';
      const description = '동원몰 카카오톡 공유하기 테스트 입니다.';
      const imageUrl = 'https://image.thebanchan.co.kr/tbcImg/web/images/event/240704_summer/type04_800.jpg';
      const linkUrl = 'https://dev-m.dongwonmall.com/index.do';

      Kakao.Share.sendDefault({
          objectType: 'feed',
          content: 
          {
            title: mainTitle, 
            description: description,
            imageUrl: imageUrl,
            link: {
              mobileWebUrl: linkUrl,
              webUrl: linkUrl
            }
          },
          buttons: [
            {
              title: '웹으로 보기',
              link: {
                mobileWebUrl: linkUrl,
                webUrl: linkUrl
              }
            },
            {
              title: '앱으로 보기',
              link: {
                androidExecParams: 'url=test',
                iosExecParams: 'url=test'
              }
            }
          ]
      }); 
      Kakao.Share.cleanup();
    }

  </script>
</head>

<body>
  <div class="container">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
  </div>

  <main class="container">

    <div class="row g-5">
      <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">Kakao Legacy Javascript SDK v1 Test</h3>

        <div>
          <div class="card-deck">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5">
                  <a href="javascript:login()">카카오 로그인(팝업방식)</a>
                </div>
                <p class="card-text">
                  -
                </p>
              </div>
              <div class="card-footer">
                [<a href="javascript:logout()">로그아웃</a>]
                [<a href="javascript:logoutWithKakaoAccount()">카카오계정과 함께 로그아웃</a>]
                [<a href="javascript:unlink()">연결끊기</a>]
                [<a href="javascript:me()">사용자 정보 가져오기</a>]
                [<a href="javascript:update_profile()">사용자 정보 저장하기</a>]
                [<a href="javascript:shipping_address()">배송지 가져오기</a>]
                [<a href="javascript:scopes()">동의 내역 확인하기</a>]
                [<a href="javascript:revoke_scopes()">동의 철회하기</a>]
                [<a href="javascript:terms()">서비스 약관 동의 내역 확인하기</a>]
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="card-title h5">
                  <a href="javascript:login_authorize()">카카오 로그인(리다이렉트방식)</a>
                </div>
                <p class="card-text">
                  [<a href="javascript:login_scope()">추가 항목 동의 받기</a>]
                  [<a href="javascript:login_prompt_none()">카카오톡에서 자동 로그인하기</a>]
                  [<a href="javascript:login_service_terms()">서비스 약관 선택해 동의 받기</a>]
                  [<a href="javascript:login_nonce()">OpenID Connect ID 토큰 발급하기</a>]
                  [<a href="javascript:login_prompt_login()">기존 로그인 여부와 상관없이 로그인하기</a>]
                </p>
              </div>
              <div class="card-footer">
                -
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="card-title h5">
                  <a href="javascript:share()">카카오톡 공유</a>
                </div>
                <p class="card-text">
                  - 기본 템플릿 :
                  <a href="javascript:share_installtalk()">카카오톡 공유 : installtalk</a>
                  [<a href="javascript:defaultImageCheck()">ImageCheck</a>]
                  <br />
                  - 커스텀 템플릿 :
                  [<a href="javascript:customTemplateArgs()">templateArgsCheck</a>]
                </p>
              </div>
              <div class="card-footer">
                -[<a href="javascript:share_callback()">콜백 테스트</a>]
                [<a href="javascript:scrap_param()">스크랩 Param 테스트</a>]
              </div>
              <div class="card-footer">
                -[<a href="javascript:share_default_invalid_parameter()">디폴트 템플릿(유효하지 않은 파라미터)</a>]
              </div>
            </div>
          </div>
          <div class="card-deck">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5">
                  <a href="javascript:send()">카카오톡 메시지</a>
                </div>
                <p class="card-text">-</p>
              </div>
              <div class="card-footer">
                -
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="card-title h5">
                  <a href="javascript:profile()">카카오톡 소셜</a>
                </div>
                <p class="card-text">-</p>
              </div>
              <div class="card-footer">
                -
              </div>
            </div>
            <div class="card-deck">
              <div class="card">
                <div class="card-body">
                  <div class="card-title h5">
                    <a href="javascript:selectShippingAddress()">배송지 </a>
                  </div>
                  <p class="card-text">-</p>
                </div>
                <div class="card-footer">
                  -
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="card-title h5">
                  <a href="javascript:addChannel()">카카오톡 채널</a>
                </div>
                <p class="card-text">-</p>
              </div>
              <div class="card-footer">
                -
              </div>
            </div>
          </div>
          <div class="card-deck">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5">
                  <a href="javascript:navi()">카카오 내비</a>
                </div>
                <p class="card-text">-</p>
              </div>
              <div class="card-footer">
                -
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem">
          <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Legacy JavaScript SDK v1</h4>
            <p class="mb-0">
              <a href="https://developers.kakao.com/docs/latest/ko/javascript/getting-started-v1" target="_blank">Download</a>
            </p>
          </div>

          <div class="p-4">
            <h4 class="fst-italic">Category</h4>
            <ol class="list-unstyled mb-0">
              <li>
                <a href="https://developers.kakao.com/docs/latest/ko/kakaologin/js-v1" target="_blank">카카오 로그인</a>
              </li>
              <li>
                <a href="https://developers.kakao.com/docs/latest/ko/message/js-link" target="_blank">카카오톡 공유</a>
              </li>
              <li>
                <a href="https://developers.kakao.com/docs/latest/ko/message/js-v1" target="_blank">카카오톡 메시지</a>
              </li>
              <li>
                <a href="https://developers.kakao.com/docs/latest/ko/kakaotalk-social/js-v1" target="_blank">카카오톡 소셜</a>
              </li>
              <li>
                <a href="https://developers.kakao.com/docs/latest/ko/kakaotalk-channel/js-v1" target="_blank">카카오톡 채널</a>
              </li>
              <li>
                <a href="https://developers.kakao.com/docs/latest/ko/kakaonavi/js" target="_blank">카카오 내비</a>
              </li>
            </ol>
          </div>

          <div class="p-4">
            <h4 class="fst-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li>
                <a target="_blank" href="https://github.com/kakao-tam/">kakao-tam Github</a>
              </li>
              <li>
                <a target="_blank" href="https://kakao-tam.tistory.com/">Kakao-TAM blog</a>
              </li>
              <li>
                <a target="_blank" href="https://developers.kakao.com/terms/latest/ko/site-policies">카카오 디벨로퍼스 운영 정책</a>
              </li>
              <li>
                <a target="_blank" href="https://developers.kakao.com/terms/latest/ko/site-policies">카카오 디벨로퍼스 보안 권장사항</a>
              </li>
              <li>
                <a target="_blank" href="https://developers.kakao.com/tool/rest-api/open/get/v2-user-me">REST API 테스트</a>
              </li>
              <li>
                <a target="_blank" href="https://developers.kakao.com/tool/template-builder/app">메시지 템플릿 빌더</a>
              </li>
              <li>
                <a target="_blank" href="https://developers.kakao.com/tool/demo/login/login">JS SDK 데모</a>
              </li>
              <li>
                <a target="_blank" href="https://developers.kakao.com/tool/debugger/sharing">공유 디버거</a>
              </li>
              <li>
                <a target="_blank" href="https://developers.kakao.com/tool/resource/login">이미지 리소스 다운로드</a>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>
</body>

</html>