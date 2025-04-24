<?php
session_start();
$access_token = '';
    $domain = $_SERVER['HTTP_HOST'];
    $redirect_uri = 'http://' . $domain . '/msg_test.php';
    $api_url = 'http://' . $domain . '/msg_test_api.php';
    if (isset($_GET['code'])) {
        $code = $_GET['code'];
        $state = $_GET['state'];

            // call access token
            $access_token = getAccessToken($code, $state, $redirect_uri);
            $_SESSION['access_token'] = $access_token;

    }

    function getAccessToken($code, $state, $redirect_uri) {
        $url = 'https://kauth.kakao.com/oauth/token';
        $params = [
          'grant_type' => 'authorization_code',
          'client_id' => getAppkey($state),
          'redirect_uri' => $redirect_uri,
          'code' => $code
        ];
        $headers = ['Content-Type: application/x-www-form-urlencoded'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, !empty($params) ? http_build_query($params) : '');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);
        if (isset($result['access_token'])) {
            return $result['access_token'];
        } else {
          //redirect to msg_test.php
            header('Location: msg_test.php');
            exit;
        }
    }

    function getAppkey($type) {
        switch($type) {
            case 'none':
                return 'ee86ed3034154bed5447477ec926ea26';
            case 'web_only':
                return '51e699fe9a1f2917184d8f80cced2a02';
            case 'android_only':
                return 'cdc816e52f7d79cbcbdb0ebd1c53c63e';
            case 'all':
                return '7ec7ffb84c36a79f3a62d2e7b6951391';
        }
    }
   
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>메시지 링크 테스트</title>
    <!-- 카카오 SDK 추가 -->
    <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
</head>
<body>
    <h1>메시지 링크 테스트</h1>
    
    <table class="share-table">
        <thead>
            <tr>
                <th>플랫폼 설정</th>
                <th>템플릿 종류</th>
                <th>실행</th>
                <th>PC</th>
                <th>Mobile</th>
            </tr>
        </thead>
        <tbody><!--플랫폼 정보 없음-->
            <tr>
                <td rowspan="5">플랫폼 정보 없음</td>
                <td rowspan="5">디폴트 템플릿</td>
                <td>  
                <button class="kakao-share-btn" onclick="shareDefault('none')">Web 카카오톡 공유하기</button>
              </td>
                <td> 4019 플랫폼 미등록 에러 </td>
                <td> </td>
            </tr>
            <tr>
                <td>  
                <button class="kakao-share-btn" onclick="shareDefaultLinkEmpty('none')">Web 카카오톡 공유하기 : 버튼 링크 빈값</button>
              </td>
                <td> 4019 플랫폼 미등록 에러 </td>
                <td> </td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="loginWithKakao('none')">카카오로그인</button>      
                  <button class="kakao-share-btn" onclick="msgDefault('none')">메시지 나에게 보내기</button>
                  <input type="text" value="<?=$access_token; ?>" id="access_token"/>
                </td>
                <td> 모든링크 작동 안함 (버튼 없음, 모바일에서 확인해주세요.) </td>
                <td> 모든링크 작동 안함 (버튼 없음)</td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="msgDefault('none_empty')">메시지 나에게 보내기 : 버튼 링크 빈값</button>
                </td>
                <td> 모든링크 작동 안함 (버튼 없음, 모바일에서 확인해주세요.) </td>
                <td> 모든링크 작동 안함 (버튼 없음)</td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="msgDefault('none_diff')">메시지 나에게 보내기 : 미등록 버튼 링크 </button>
                </td>
                <td> 모든링크 작동 안함 (버튼 없음, 모바일에서 확인해주세요.) </td>
                <td> 모든링크 작동 안함 (버튼 없음)</td>
            </tr>
            
<!--플랫폼 정보 Web Only-->
            <tr>
                <td rowspan="6">플랫폼 정보 Web Only</td>
                <td rowspan="6">디폴트 템플릿</td>
                <td>  
                <button class="kakao-share-btn" onclick="shareDefault('web_only')">Web 카카오톡 공유하기</button>
              </td>
                <td> 웹으로 보기 버튼 표기, <br/> 앱으로 보기 버튼 없음 </td>
                <td> 웹으로 보기 버튼 표기, <br/> 앱으로 보기 버튼 없음 </td>
            </tr>
            <tr>
                <td>  
                <button class="kakao-share-btn" onclick="shareDefaultLinkEmpty('web_only')">Web 카카오톡 공유하기 : 버튼 링크 빈값</button>
              </td>
                <td> 버튼 없음, 모바일에서 확인해주세요. </td>
                <td> 웹으로 보기 버튼 표기 (기본 도메인으로 대체) <br/> 앱으로 보기 버튼 없음 </td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="loginWithKakao('web_only')">카카오로그인</button>      
                  <button class="kakao-share-btn" onclick="msgDefault('web_only')">메시지 나에게 보내기</button>
                  <input type="text" value="<?=$access_token; ?>" id="access_token"/>
                </td>
                <td> 웹으로 보기 버튼 표기 <br/> 앱으로 보기 버튼 없음  </td>
                <td> 웹으로 보기 버튼 표기 <br/> 앱으로 보기 버튼 표기 (기본 도메인으로 대체)  </td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="msgDefault('web_only_empty')">메시지 나에게 보내기 : 버튼 링크 빈값</button>
                </td>
                <td> 버튼 없음, 모바일에서 확인해주세요. </td>
                <td> 웹으로 보기 버튼 표기 (기본 도메인으로 대체) <br/> 앱으로 보기 버튼 표기 (기본 도메인으로 대체) </td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="msgDefault('web_only_empty_one_btn')">메시지 나에게 보내기 : 버튼하나 링크 빈값 (앱파람 있음) </button>
                </td>
                <td> 버튼 없음, 모바일에서 확인해주세요. </td>
                <td> 보기 버튼 표기 (기본 도메인으로 대체) </td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="msgDefault('web_only_empty_one_btn_no_app_param')">메시지 나에게 보내기 : 버튼하나 링크 빈값 (앱파람 없음) </button>
                </td>
                <td> <font color="red">버튼 없음, 모바일에서 확인해주세요.</font> </td>
                <td> 보기 버튼 표기 (기본 도메인으로 대체) </td>
            </tr>
<!--플랫폼 정보 Android Only-->
            <tr>
                <td rowspan="4">플랫폼 정보 Android Only</td>
                <td rowspan="4">디폴트 템플릿</td>
                <td>  
                <button class="kakao-share-btn" onclick="shareDefault('android_only')">Web 카카오톡 공유하기</button>
              </td>
                <td> 4019 플랫폼 미등록 에러 </td>
                <td>  </td>
            </tr>
            <tr>
                <td>  
                <button class="kakao-share-btn" onclick="shareDefaultLinkEmpty('android_only')">Web 카카오톡 공유하기 : 버튼 링크 빈값</button>
              </td>
                <td> 4019 플랫폼 미등록 에러 </td>
                <td>   </td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="loginWithKakao('android_only')">카카오로그인</button>      
                  <button class="kakao-share-btn" onclick="msgDefault('android_only')">메시지 나에게 보내기</button>
                  <input type="text" value="<?=$access_token; ?>" id="access_token"/>
                </td>
                <td> 모든링크 작동 안함 (버튼 없음, 모바일에서 확인해주세요.) </td>
                <td> 웹으로 보기 버튼 표기 (앱 스킴 실행, 미설치 시 스토어로 이동) <br/> 앱으로 보기 버튼 표기 (앱 스킴 실행, 미설치 시 스토어로 이동)</td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="msgDefault('android_only_empty')">메시지 나에게 보내기 : 버튼 링크 빈값</button>
                </td>
                <td> 버튼 없음, 모바일에서 확인해주세요. </td>
                <td> 웹으로 보기 버튼 표기 (앱 스킴 실행, 미설치 시 스토어로 이동) <br/> 앱으로 보기 버튼 표기 (앱 스킴 실행, 미설치 시 스토어로 이동)  </font></td>
            </tr>

<!--플랫폼 정보 모두 있음-->
<tr>
                <td rowspan="12">플랫폼 정보 모두 있음</td>
                <td rowspan="6">디폴트 템플릿</td>
                <td>  
                <button class="kakao-share-btn" onclick="shareDefault('all')">Web 카카오톡 공유하기</button>
              </td>
                <td> 웹으로 보기 버튼 표기, <br/> 앱으로 보기 버튼 없음 </td>
                <td> 웹으로 보기 버튼 표기, <br/> <font color="red">앱으로 보기 버튼 없음</font> </td>
            </tr>
            <tr>
                <td>  
                <button class="kakao-share-btn" onclick="shareDefaultLinkEmpty('all')">Web 카카오톡 공유하기 : 버튼 링크 빈값</button>
              </td>
              <td> 버튼 없음, 모바일에서 확인해주세요. </td>
              <td> 웹으로 보기 버튼 표기 <font color="red">(앱 스킴 실행, 미설치 시 스토어로 이동)</font> <br/> <font color="red">앱으로 보기 버튼 없음</font> </td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="loginWithKakao('all')">카카오로그인</button>      
                  <button class="kakao-share-btn" onclick="msgDefault('all')">메시지 나에게 보내기</button>
                  <input type="text" value="<?=$access_token; ?>" id="access_token"/>
                </td>
                <td> 웹으로 보기 버튼 표기, <br/> 앱으로 보기 버튼 없음 </td>
                <td> 웹으로 보기 버튼 표기 <br/> 앱으로 보기 버튼 표기 (앱 스킴 실행, 미설치 시 스토어로 이동)</td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="msgDefault('all_empty')">메시지 나에게 보내기 : 버튼 링크 빈값</button>
                </td>
                <td> 버튼 없음, 모바일에서 확인해주세요. </td>
                <td> 웹으로 보기 버튼 표기 <font color="red">(앱 스킴 실행, 미설치 시 스토어로 이동)</font> <br/> 앱으로 보기 버튼 표기 (앱 스킴 실행, 미설치 시 스토어로 이동)  </font></td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="msgDefault('all_diff')">메시지 나에게 보내기 : 미등록 버튼 링크 </button>
                </td>
                <td> 웹으로 보기 버튼 표기  (기본 도메인으로 대체), <br/> 앱으로 보기 버튼 없음 </td>
                <td> 웹으로 보기 버튼 표기  (기본 도메인으로 대체), <br/> 앱으로 보기 버튼 표기 (앱 스킴 실행, 미설치 시 스토어로 이동)</td>
            </tr>
            <tr>
                <td>
                  <button class="kakao-share-btn" onclick="msgDefault('all_empty_one_btn')">메시지 나에게 보내기 : 버튼하나 링크 빈값 (앱파람 있음)  </button>
                </td>
                <td> 버튼 없음, 모바일에서 확인해주세요. </td>
                <td> 버튼 표기 (앱 스킴 실행, 미설치 시 스토어로 이동)</td>
            </tr>

            <tr>
                <td rowspan="6">커스텀 템플릿</td>
                <td>  
                <button class="kakao-share-btn" onclick="shareCustom('all')">Web 카카오톡 공유하기</button>
              </td>
                <td> 웹으로 보기 버튼 표기, <br/> 앱으로 보기 버튼 없음 </td>
                <td> 웹으로 보기 버튼 표기, <br/> 앱으로 보기 버튼 표기 (앱 스킴 실행, 미설치 시 스토어로 이동) </td>
            </tr>
            
            <tr>
                <td>   
                  <button class="kakao-share-btn" onclick="msgDefault('all_custom')">메시지 나에게 보내기</button>
                </td>
                <td> 웹으로 보기 버튼 표기, <br/> 앱으로 보기 버튼 없음 </td>
                <td> 웹으로 보기 버튼 표기 <br/> 앱으로 보기 버튼 표기 (앱 스킴 실행, 미설치 시 스토어로 이동)</td>
            </tr>
           
            <tr>
                <td>   
                  <button class="kakao-share-btn" onclick="msgDefault('all_custom_wx_so_mx')">메시지 나에게 보내기 : 웹X, 스킴O, 마켓X</button>
                </td>
                <td> 버튼 없음, 모바일에서 확인해주세요. </td>
                <td> 앱키 스킴앱으로 테스트해야함 (앱없으면 기본도메인으로 대체)</td>
            </tr>
            <tr>
                <td>   
                  <button class="kakao-share-btn" onclick="msgDefault('all_custom_wx_so_mo')">메시지 나에게 보내기 : 웹X, 스킴O, 마켓O</button>
                </td>
                <td> 버튼 없음, 모바일에서 확인해주세요. </td>
                <td> 버튼 있음, (앱 스킴 실행, 미설치 시 스토어로 이동)</td>
            </tr>
            <tr>
                <td>   
                  <button class="kakao-share-btn" onclick="msgDefault('all_custom_wo_so_mx')">메시지 나에게 보내기 : 웹O, 스킴O, 마켓X</button>
                </td>
                <td> 버튼 있음 </td>
                <td> 버튼 있음, (앱없으면 기본도메인으로 대체)</td>
            </tr>
            <tr>
                <td>   
                  <button class="kakao-share-btn" onclick="msgDefault('all_custom_wo_so_mo')">메시지 나에게 보내기 : 웹O, 스킴O, 마켓O</button>
                </td>
                <td> 버튼 있음 </td>
                <td> 버튼 있음, (앱 스킴 실행, 미설치 시 스토어로 이동)</td>
            </tr>
        </tbody>
    </table>

    <script>
        

        var domain = window.location.hostname;
        
        function getMessageTemplate(btn_mo_url, btn_pc_url) {
            return {
                objectType: 'feed',
                content: {
                    title: '카카오톡 공유 테스트',
                    description: '카카오톡 공유 기능 테스트입니다.',
                    imageUrl: 'https://developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png',
                    link: {
                        mobileWebUrl: 'https://developers.kakao.com/status',
                        webUrl: 'https://developers.kakao.com/status',
                    },
                },
                buttons: [
                    {
                        title: '웹으로 보기',
                        link: {
                            mobileWebUrl: btn_mo_url,
                            webUrl: btn_pc_url,
                        },
                    }
                ],
                social: {
                    likeCount: 286,
                    commentCount: 45,
                    sharedCount: 845,
                }
            };
        }
        
        // 앱키 설정
        function getAppKey(type) {
          switch(type) {
            case 'none':
              return '5084aee921a62441d2c67e697116aa09';
            case 'web_only':
              return '77e9a9a612b2ef1950906bf85421741f';
            case 'android_only':
              return '5b8b772c6bddb0b553760441add7e52c';
            case 'all':
              return '91ebd0858026d4b6c9f3726acbf11d21';
          }
        }
        // SDK 초기화 함수
        function initKakao(type) {
            Kakao.cleanup();
            Kakao.init(getAppKey(type));
        }

        // 기본 템플릿
        function shareDefault(type) {
            initKakao(type);
            Kakao.Share.sendDefault(getMessageTemplate('https://developers.kakao.com/docs/latest/ko/index','https://developers.kakao.com/docs/latest/ko/index'));
        }

        function shareCustom(type) {
            initKakao(type);
            Kakao.Share.sendCustom(
              {
                templateId: 120068
              }
            );
        }

        function shareDefaultLinkEmpty(type) {
            initKakao(type);
            Kakao.Share.sendDefault(getMessageTemplate('',''));
        }

        function loginWithKakao(type) {
            window.location.href = 'https://kauth.kakao.com/oauth/authorize?client_id=' + getAppKey(type) + '&redirect_uri=<?php echo $redirect_uri;?>&response_type=code&state='+type;
        }

        function REST_Call(type) {
            fetch('<?php echo $api_url;?>?type='+type)
            .then(response => response.json())
            .then(result => {
                if (result.error) {
                    alert('에러: ' + result.message);
                } else {
                    alert('메시지 전송 성공!');
                }
            })
            .catch(error => {
                alert('요청 실패: ' + error);
            });
        }

        // 기존 스크립트에 아래 함수를 추가합니다
        function msgDefault(type) {
            REST_Call(type);
        }
    </script>

    <style>
        body {
            font-family: 'Apple SD Gothic Neo', '맑은 고딕', 'Malgun Gothic', sans-serif;
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .share-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .share-table th,
        .share-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .share-table th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .share-table tr:hover {
            background-color: #f9f9f9;
        }

        .kakao-share-btn {
            padding: 8px 16px;
            background-color: #FEE500;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            color: #000000;
        }

        .kakao-share-btn:hover {
            background-color: #FDD835;
        }
        
    </style>
</body>
</html>
