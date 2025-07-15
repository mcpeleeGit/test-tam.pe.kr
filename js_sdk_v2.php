<?php
session_start();
?>
<!DOCTYPE html>
<html lang="kr">

<head>
  <title>Kakao API Platform TAM Test Site - JS SDK v2</title>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
  <script src="https://t1.kakaocdn.net/kakao_js_sdk/2.7.4/kakao.min.js" integrity="sha384-DKYJZ8NLiK8MN4/C5P2dtSmLQ4KwPaoqAfyA/DfmEc1VDxu4yyC7wy6K1Hs90nka" crossorigin="anonymous"></script>
  <script type="text/javascript">
    Kakao.init('2d68640b56d986af5c8a48505c7c8c71');
    <?php
    if (isset($_SESSION["accessToken"])) {
      echo 'Kakao.Auth.setAccessToken("' . $_SESSION["accessToken"] . '");';
    }
    ?>
  </script>
  <script type="text/javascript">
    function logout() {
      Kakao.Auth.logout()
        .then(function(response) {
          console.log(Kakao.Auth.getAccessToken()); // null
        })
        .catch(function(error) {
          console.log('Not logged in.');
        });
    }

    function logoutWithKakaoAccount() {
      location.href = 'https://kauth.kakao.com/oauth/logout?client_id=2d68640b56d986af5c8a48505c7c8c71&logout_redirect_uri=http://test-tam.pe.kr/js_sdk_v2.php';
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
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }

    function scopes() {
      Kakao.API.request({
          url: '/v2/user/scopes',
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }

    function revoke_scopes() {
      Kakao.API.request({
          url: '/v2/user/revoke/scopes',
          data: {
            scopes: ['account_email', 'gender'],
          },
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }

    function terms() {
      Kakao.API.request({
          url: '/v2/user/service_terms',
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
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
        scope: 'account_email,friends,talk_message',
      });
    }

    function login_throughTalk_false() {
      Kakao.Auth.authorize({
        redirectUri: encodeURI('http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php'),
        throughTalk: false,
      });
    }

    function login_prompt_none() {
      Kakao.Auth.authorize({
        redirectUri: encodeURI('http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php'),
        prompt: 'none',
      });
    }

    function login_prompt_select_account() {
      Kakao.Auth.authorize({
        redirectUri: encodeURI('http://<?= $_SERVER['HTTP_HOST'] ?>/callBackForKakao.php'),
        prompt: 'select_account',
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
        prompt: 'login'
      });
    }
  </script>
  <script type="text/javascript">
    function share() {
      Kakao.Share.sendDefault({
        objectType: 'feed',
        content: {
          title: '오늘의 디저트',
          description: '아메리카노, 빵, 케익',
          imageUrl: 'https://mud-kage.kakao.com/dn/NTmhS/btqfEUdFAUf/FjKzkZsnoeE4o19klTOVI1/openlink_640x640s.jpg',
          link: {
            mobileWebUrl: 'https://developers.kakao.com',
            webUrl: 'https://developers.kakao.com',
          },
        },
        itemContent: {
          profileText: 'Kakao',
          profileImageUrl: 'https://mud-kage.kakao.com/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png',
          titleImageUrl: 'https://mud-kage.kakao.com/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png',
          titleImageText: 'Cheese cake',
          titleImageCategory: 'Cake',
          items: [{
              item: 'Cake1',
              itemOp: '1000원',
            },
            {
              item: 'Cake2',
              itemOp: '2000원',
            },
            {
              item: 'Cake3',
              itemOp: '3000원',
            },
            {
              item: 'Cake4',
              itemOp: '4000원',
            },
            {
              item: 'Cake5',
              itemOp: '5000원',
            },
          ],
          sum: '총 결제금액',
          sumOp: '15000원',
        },
        social: {
          likeCount: 10,
          commentCount: 20,
          sharedCount: 30,
        },
        buttons: [{
            title: '웹으로 이동',
            link: {
              mobileWebUrl: 'https://developers.kakao.com',
              webUrl: 'https://developers.kakao.com',
            },
          },
          {
            title: '앱으로 이동',
            link: {
              mobileWebUrl: 'https://developers.kakao.com',
              webUrl: 'https://developers.kakao.com',
            },
          },
        ],
      });
    }

    function defaultListSend() {
      Kakao.Share.sendDefault({
        objectType: 'list',
        headerTitle: 'WEEKLY MAGAZINE',
        headerLink: {
          mobileWebUrl: 'https://developers.kakao.com',
          webUrl: 'https://developers.kakao.com',
        },
        contents: [{
            title: '취미의 특징, 탁구',
            description: '스포츠',
            imageUrl: 'http://k.kakaocdn.net/dn/bDPMIb/btqgeoTRQvd/49BuF1gNo6UXkdbKecx600/kakaolink40_original.png',
            link: {
              mobileWebUrl: 'https://developers.kakao.com',
              webUrl: 'https://developers.kakao.com',
            },
          },
          {
            title: '크림으로 이해하는 커피이야기',
            description: '음식',
            imageUrl: 'http://k.kakaocdn.net/dn/QPeNt/btqgeSfSsCR/0QJIRuWTtkg4cYc57n8H80/kakaolink40_original.png',
            link: {
              mobileWebUrl: 'https://developers.kakao.com',
              webUrl: 'https://developers.kakao.com',
            },
          },
          {
            title: '감성이 가득한 분위기',
            description: '사진',
            imageUrl: 'http://k.kakaocdn.net/dn/c7MBX4/btqgeRgWhBy/ZMLnndJFAqyUAnqu4sQHS0/kakaolink40_original.png',
            link: {
              mobileWebUrl: 'https://developers.kakao.com',
              webUrl: 'https://developers.kakao.com',
            },
          },
        ],
        buttons: [{
            title: '웹으로 보기',
            link: {
              mobileWebUrl: 'https://developers.kakao.com',
              webUrl: 'https://developers.kakao.com',
            },
          },
          {
            title: '앱으로 보기',
            link: {
              mobileWebUrl: 'https://developers.kakao.com',
              webUrl: 'https://developers.kakao.com',
            },
          },
        ],
      });
    }

    function defaultLocationSend() {
      Kakao.Share.sendDefault({
        objectType: 'location',
        address: '경기 성남시 분당구 판교역로 166 3층',
        addressTitle: '카카오 판교오피스 카페톡',
        content: {
          title: '신메뉴 출시♥︎ 체리블라썸라떼',
          description: '이번 주는 체리블라썸라떼 1+1',
          imageUrl: 'http://k.kakaocdn.net/dn/bSbH9w/btqgegaEDfW/vD9KKV0hEintg6bZT4v4WK/kakaolink40_original.png',
          link: {
            mobileWebUrl: 'https://developers.kakao.com',
            webUrl: 'https://developers.kakao.com',
          },
        },
        social: {
          likeCount: 286,
          commentCount: 45,
          sharedCount: 845,
        },
        buttons: [{
          title: '웹으로 보기',
          link: {
            mobileWebUrl: 'https://developers.kakao.com',
            webUrl: 'https://developers.kakao.com',
          },
        }, ],
      });
    }

    function defaultCommerceSend() {
      Kakao.Share.sendDefault({
        objectType: 'commerce',
        content: {
          title: '언제 어디든, 더 쉽고 편하게 당신의 일상을 더 즐겁게, 헤이 라이언의 이야기를 들려드릴게요.',
          imageUrl: 'http://k.kakaocdn.net/dn/dScJiJ/btqB3cwK1Hi/pv5qHVwetz5RZfPZR3C5K1/kakaolink40_original.png',
          link: {
            mobileWebUrl: 'https://developers.kakao.com',
            webUrl: 'https://developers.kakao.com',
          },
        },
        commerce: {
          productName: '카카오미니',
          regularPrice: 100000,
          discountRate: 10,
          discountPrice: 90000,
        },
        buttons: [{
            title: '구매하기',
            link: {
              mobileWebUrl: 'https://developers.kakao.com',
              webUrl: 'https://developers.kakao.com',
            },
          },
          {
            title: '공유하기',
            link: {
              mobileWebUrl: 'https://developers.kakao.com',
              webUrl: 'https://developers.kakao.com',
            },
          },
        ],
      });
    }

    function defaultTextSend() {
      Kakao.Share.sendDefault({
        objectType: 'text',
        text: '기본 템플릿으로 제공되는 텍스트 템플릿은 텍스트를 최대 200자까지 표시할 수 있습니다. 텍스트 템플릿은 텍스트 영역과 하나의 기본 버튼을 가집니다. 임의의 버튼을 설정할 수도 있습니다. 여러 장의 이미지, 프로필 정보 등 보다 확장된 형태의 카카오톡 공유는 다른 템플릿을 이용해 보낼 수 있습니다.',
        link: {
          mobileWebUrl: 'https://developers.kakao.com',
          webUrl: 'https://developers.kakao.com',
        },
      });
    }

    function defaultCalendarSend() {
      Kakao.Share.sendDefault({
        objectType: 'calendar',
        idType: 'event',
        id: '${YOUR_EVENT_ID}',
        content: {
          title: '1월 신작 평론 모임',
          description: '따끈한 신작 감상평을 나누는 월간 모임에 초대합니다.',
          imageUrl: 'http://k.kakaocdn.net/dn/dFUqwp/bl3SUTqb2VV/VFSqyPpKUzZVVMcmotN9A0/kakaolink40_original.png',
          link: {
            webUrl: 'https://developers.kakao.com',
            mobileWebUrl: 'https://developers.kakao.com',
          },
        },
        buttons: [{
          title: '모임 주제 보기',
          link: {
            webUrl: 'https://developers.kakao.com',
            mobileWebUrl: 'https://developers.kakao.com',
          },
        }, ],
      });
    }

    function defaultScrapSend() {
      Kakao.Share.sendScrap({
        requestUrl: 'https://developers.kakao.com'
      });
    }

    function defaultExecutionParams() {
      Kakao.Share.sendDefault({
        objectType: 'feed',
        content: {
          title: "타이틀",
          description: "설명",
          imageUrl: "https://k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg",
          link: {
            mobileWebUrl: document.location.href,
            webUrl: document.location.href,
            androidExecutionParams: "path=" + encodeURIComponent(document.location.href),
            iosExecutionParams: "path=" + encodeURIComponent(document.location.href),
          },
        },
        buttons: [{
          title: '자세히 보기',
          link: {
            mobileWebUrl: document.location.href,
            webUrl: document.location.href,
            androidExecutionParams: "path=" + encodeURIComponent(document.location.href),
            iosExecutionParams: "path=" + encodeURIComponent(document.location.href),
          },
        }]
      });
    }

    function defaultNonExecutionParams() {
      Kakao.Share.sendDefault({
        objectType: 'feed',
        content: {
          title: "타이틀",
          description: "설명",
          imageUrl: "https://k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg",
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

    function custermCommerceSend() {
      Kakao.Share.sendCustom({
        templateId: 57826,
        templateArgs: {
          "title": "테스트상품",
          "imageUrl": "https://img1.daumcdn.net/thumb/S800x800/?scode=talkscrap&fname=http://k.kakaocdn.net/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png",
          "imageWidth": 150,
          "imageHeight": 150,
          "btn_title": "구매하기",
          'path': 'shop_view/?idx=303#review_detail',
          "regularPrice": 50000,
          "salepercent": 10,
          "salePrice": 45001
        }
      });
    }

    function custermCommerceSend2vs1() {
      Kakao.Share.sendCustom({
        templateId: 57826,
        templateArgs: {
          "title": "테스트상품",
          "imageUrl": "https://img1.daumcdn.net/thumb/S800x400/?scode=talkscrap&fname=http://k.kakaocdn.net/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png",
          "imageWidth": 200,
          "imageHeight": 100,
          "btn_title": "구매하기",
          'path': 'shop_view/?idx=303#review_detail',
          "regularPrice": 50000
        }
      });
    }


    function share_callback_template() {
      Kakao.Share.sendCustom({
        templateId: 57826,
        templateArgs: {
          "title": "테스트상품",
          "imageUrl": "https://img1.daumcdn.net/thumb/S800x400/?scode=talkscrap&fname=http://k.kakaocdn.net/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png",
          "imageWidth": 200,
          "imageHeight": 100,
          "btn_title": "구매하기",
          'path': 'shop_view/?idx=303#review_detail',
          "regularPrice": 50000
        },
        serverCallbackArgs: { // 사용자 정의 파라미터 설정
          test: 'test'
        }
      });
    }


    function share_callback() {

      // 공유할 링크 및 메시지
      const link = 'https://dev-m.dongwonmall.com/index.do';
      const text = '동원몰 카카오톡 공유 테스트';
      const cmSeq = '0000000009666795';

      // 카카오톡 공유 API 호출
      Kakao.Share.sendDefault({
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

    function defaultSendEmptyUrl() {
      Kakao.Share.sendDefault({
        objectType: 'feed',
        content: {
          title: '동원몰 카카오톡 공유하기 테스트',
          description: '동원몰 카카오톡 공유하기 테스트 입니다.',
          imageUrl: 'https://image.thebanchan.co.kr/tbcImg/web/images/event/240704_summer/type04_800.jpg',
          link: { 
            mobileWebUrl: '',
            webUrl: ''
          }
        }
      });
    }

    function custermCommerceSend1vs1() {
      Kakao.Share.sendCustom({
        templateId: 57826,
        templateArgs: {
          "title": "테스트상품",
          "imageUrl": "https://img1.daumcdn.net/thumb/S800x800/?scode=talkscrap&fname=http://k.kakaocdn.net/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png",
          "imageWidth": 100,
          "imageHeight": 100,
          "btn_title": "구매하기",
          'path': 'shop_view/?idx=303#review_detail',
          "regularPrice": 50000
        }
      });
    }

    function custermCommerceSendDynamic() {
      Kakao.Share.sendCustom({
        templateId: 50220
      });
    }
  </script>
  <script type="text/javascript">
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
        Kakao.Auth.selectShippingAddress({forceMobileLayout: true, enableBackButton: true})
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
                androidExecutionParams: 'url=test',
                androidExecutionParams: 'url=test'
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
        <h3 class="pb-4 mb-4 fst-italic border-bottom">Kakao Javascript SDK v2 Test</h3>

        <div>
          <div class="card-deck">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5">
                  <a href="javascript:login_authorize()">카카오 로그인(리다이렉트방식)</a>
                </div>
                <p class="card-text">
                  [<a href="javascript:login_scope()">추가 항목 동의 받기</a>]
                  [<a href="javascript:login_throughTalk_false()">카카오계정으로만 로그인하기</a>]
                  [<a href="javascript:login_prompt_none()">카카오톡에서 자동 로그인하기</a>]
                  [<a href="javascript:login_prompt_select_account()">카카오계정 간편로그인하기</a>]
                  [<a href="javascript:login_service_terms()">서비스 약관 선택해 동의 받기</a>]
                  [<a href="javascript:login_nonce()">OpenID Connect ID 토큰 발급하기</a>]
                  [<a href="javascript:login_prompt_login()">기존 로그인 여부와 상관없이 로그인하기</a>]
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
                  <a href="javascript:share()">카카오톡 공유 (기본 템플릿 피드)</a>
                </div>
                <p class="card-text">
                  - 기본 템플릿 :
                  [<a href="javascript:defaultListSend()">리스트</a>]
                  [<a href="javascript:defaultLocationSend()">위치</a>]
                  [<a href="javascript:defaultCommerceSend()">커머스</a>]
                  [<a href="javascript:defaultTextSend()">텍스트</a>]
                  [<a href="javascript:defaultCalendarSend()">캘린더 x</a>]
                  [<a href="javascript:defaultScrapSend()">스크랩</a>]
                  &nbsp;
                  [<a href="javascript:defaultExecutionParams()">ExecutionParams</a>]
                  [<a href="javascript:defaultNonExecutionParams()">NonExecutionParams</a>]
                  [<a href="javascript:defaultImageCheck()">ImageCheck</a>]

                  <br />
                  - 커스텀 템플릿 :
                  [<a href="javascript:custermCommerceSend()">커머스(150X150)</a>]
                  [<a href="javascript:custermCommerceSend1vs1()">커머스(100X100)</a>]
                  [<a href="javascript:custermCommerceSend2vs1()">커머스(200X100)</a>]
                  [<a href="javascript:custermCommerceSendDynamic()">커머스-다이나믹링크</a>]

                </p>
              </div>
              <div class="card-footer">
                -[<a href="javascript:share_callback()">콜백 테스트</a>]
                -[<a href="javascript:share_callback_template()">콜백 템플릿 테스트</a>]
                - [<a href="javascript:defaultSendEmptyUrl()">디폴트 템플릿(빈 URL)</a>]
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
            <h4 class="fst-italic">JavaScript SDK v2</h4>
            <p class="mb-0">
              <a href="https://developers.kakao.com/docs/latest/ko/javascript/download" target="_blank">Download</a>
            </p>
          </div>

          <div class="p-4">
            <h4 class="fst-italic">Category</h4>
            <ol class="list-unstyled mb-0">
              <li>
                <a href="https://developers.kakao.com/docs/latest/ko/kakaologin/js" target="_blank">카카오 로그인</a>
              </li>
              <li>
                <a href="https://developers.kakao.com/docs/latest/ko/message/js-link" target="_blank">카카오톡 공유</a>
              </li>
              <li>
                <a href="https://developers.kakao.com/docs/latest/ko/message/js" target="_blank">카카오톡 메시지</a>
              </li>
              <li>
                <a href="https://developers.kakao.com/docs/latest/ko/kakaotalk-social/js" target="_blank">카카오톡 소셜</a>
              </li>
              <li>
                <a href="https://developers.kakao.com/docs/latest/ko/kakaotalk-channel/js" target="_blank">카카오톡 채널</a>
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