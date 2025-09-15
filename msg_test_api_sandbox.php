<?php
session_start();

$kapi_host = 'https://sandbox-kapi.kakao.com';

function getMessageCustomTemplate() {
    return [
        'template_id' => 4136
    ];
}

function getMessageTemplateOneBtnNoAppParam($btn) {
    return [
        'object_type' => 'feed',
        'content' => [
            'title' => '카카오톡 공유 테스트',
            'description' => '카카오톡 공유 기능 테스트입니다.',
            'image_url' => 'https://developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png',
            'link' => [
                'mobile_web_url' => 'https://developers.kakao.com/status',
                'web_url' => 'https://developers.kakao.com/status'
            ]
        ],
        'buttons' => [
            [
                'title' => '보기',
                'link' => [
                    'mobile_web_url' => $btn,
                    'web_url' => $btn
                ]
            ]
        ],
        'social' => [
            'like_count' => 286,
            'comment_count' => 45,
            'shared_count' => 845
        ]
    ];
}

function getMessageTemplateOneBtn($btn) {
    return [
        'object_type' => 'feed',
        'content' => [
            'title' => '카카오톡 공유 테스트',
            'description' => '카카오톡 공유 기능 테스트입니다.',
            'image_url' => 'https://developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png',
            'link' => [
                'mobile_web_url' => 'https://developers.kakao.com/status',
                'web_url' => 'https://developers.kakao.com/status'
            ]
        ],
        'buttons' => [
            [
                'title' => '보기',
                'link' => [
                    'mobile_web_url' => $btn,
                    'web_url' => $btn,
                    'androidExecParams' => $btn,
                    'iosExecParams' => $btn
                ]
            ]
        ],
        'social' => [
            'like_count' => 286,
            'comment_count' => 45,
            'shared_count' => 845
        ]
    ];
}
function getMessageTemplate($btn_mo_url, $btn_pc_url) {
    return [
        'object_type' => 'feed',
        'content' => [
            'title' => '카카오톡 공유 테스트',
            'description' => '카카오톡 공유 기능 테스트입니다.',
            'image_url' => 'https://developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png',
            'link' => [
                'mobile_web_url' => 'https://developers.kakao.com/status',
                'web_url' => 'https://developers.kakao.com/status'
            ]
        ],
        'buttons' => [
            [
                'title' => '웹으로 보기',
                'link' => [
                    'mobile_web_url' => $btn_mo_url,
                    'web_url' => $btn_pc_url
                ]
            ],
            [
                'title' => '앱으로 보기',
                'link' => [
                    'androidExecParams' => $btn_mo_url,
                    'iosExecParams' => $btn_pc_url
                ]
            ]
        ],
        'social' => [
            'like_count' => 286,
            'comment_count' => 45,
            'shared_count' => 845
        ]
    ];
}

function call($method, $uri, $params = [], $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $uri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, !empty($params) ? http_build_query($params) : '');
    }
    
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return json_decode($response, true);
}

$uri = $kapi_host . "/v2/api/talk/memo/default/send";
$template_object = "";
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    switch($type) {
        case 'none':
            $template_object = getMessageTemplate('https://developers.kakao.com/docs/latest/ko/index','https://developers.kakao.com/docs/latest/ko/index');
            break;
        case 'none_empty':
            $template_object = getMessageTemplate('','');
            break;
        case 'none_diff':
            $template_object = getMessageTemplate('https://naver.com','https://naver.com');
            break;
        case 'web_only':
            $template_object = getMessageTemplate('https://developers.kakao.com/docs/latest/ko/index','https://developers.kakao.com/docs/latest/ko/index');
            break;
        case 'web_only_empty':
            $template_object = getMessageTemplate('','');
            break;
        case 'web_only_empty_one_btn':
            $template_object = getMessageTemplateOneBtn('');
            break;
        case 'web_only_empty_one_btn_no_app_param':
            $template_object = getMessageTemplateOneBtnNoAppParam('');
            break;
        case 'android_only':
            $template_object = getMessageTemplate('https://developers.kakao.com/docs/latest/ko/index','https://developers.kakao.com/docs/latest/ko/index');
            break;
        case 'android_only_empty':
            $template_object = getMessageTemplate('','');
            break;
        case 'all':
            $template_object = getMessageTemplate('https://developers.kakao.com/docs/latest/ko/index','https://developers.kakao.com/docs/latest/ko/index');
            break;
        case 'all_empty':
            $template_object = getMessageTemplate('','');
            break;
        case 'all_diff':
            $template_object = getMessageTemplate('https://naver.com','https://naver.com');
            break;
        case 'all_empty_one_btn':
            $template_object = getMessageTemplateOneBtn('');
            break;
        case 'all_custom':
        case 'all_custom_wx_so_mx':
        case 'all_custom_wx_so_mo':
        case 'all_custom_wo_so_mx':
        case 'all_custom_wo_so_mo':
            //$template_object = getMessageCustomTemplate();
            $uri = $kapi_host . "/v2/api/talk/memo/send";
            break;
    }
} 
if ($type == 'all_custom') {
    $params = ['template_id' => 4136];
}
else if ($type == 'all_custom_wx_so_mx') {
    $params = ['template_id' => 4137];
}
else if ($type == 'all_custom_wx_so_mo') {
    $params = ['template_id' => 4138];
}
else if ($type == 'all_custom_wo_so_mx') {
    $params = ['template_id' => 4139];
}
else if ($type == 'all_custom_wo_so_mo') {
    $params = ['template_id' => 4140];
}
else {
    $params = ['template_object' => json_encode($template_object)];
}

$headers = [
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Bearer ' . $_SESSION['access_token']
];

$response = call('POST', $uri, $params, $headers);
header('Content-Type: application/json');
echo json_encode($response);


        