<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

session_start();

$client_id = ' this is rest api key ';
$client_secret = ' this is client secret key ';
$domain = 'http://localhost:4000';
$redirect_uri = $domain . '/api.php?action=redirect';
$kauth_host = 'https://kauth.kakao.com';
$kapi_host = 'https://kapi.kakao.com';
$template_object = [
    'object_type' => 'text',
    'text' => 'Hello, world!',
    'link' => [
        'web_url' => 'https://developers.kakao.com',
        'mobile_web_url' => 'https://developers.kakao.com'
    ]
];

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

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'authorize':
        $scope = $_GET['scope'] ?? '';
        $scopeParam = $scope ? "&scope=" . urlencode($scope) : "";
        header("Location: {$kauth_host}/oauth/authorize?client_id={$client_id}&redirect_uri={$redirect_uri}&response_type=code{$scopeParam}");
        exit;

    case 'redirect':
        $params = [
            'grant_type' => 'authorization_code',
            'client_id' => $client_id,
            'redirect_uri' => $redirect_uri,
            'client_secret' => $client_secret,
            'code' => $_GET['code']
        ];
        
        $headers = ['Content-Type: application/x-www-form-urlencoded'];
        $response = call('POST', $kauth_host."/oauth/token", $params, $headers);
        echo json_encode($response);
        if (isset($response['access_token'])) {
            $_SESSION['key'] = $response['access_token'];
            header("Location: {$domain}/index.html?login=success");
        }
        exit;

    case 'profile':
        $uri = $kapi_host . "/v2/user/me";
        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $_SESSION['key']
        ];
        $response = call('POST', $uri, [], $headers);
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;

    case 'friends':
        $uri = $kapi_host . "/v1/api/talk/friends";
        $headers = ['Authorization: Bearer ' . $_SESSION['key']];
        $response = call('GET', $uri, [], $headers);
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;

    case 'message':
        $uri = $kapi_host . "/v2/api/talk/memo/default/send";
        $params = ['template_object' => json_encode($template_object)];
        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $_SESSION['key']
        ];
        
        $response = call('POST', $uri, $params, $headers);
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;

    case 'friend-message':
        $uri = $kapi_host . "/v1/api/talk/friends/message/default/send";
        $uuid = $_GET['uuid'] ?? '';
        
        $params = [
            'receiver_uuids' => "[$uuid]",
            'template_object' => json_encode($template_object)
        ];
        
        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $_SESSION['key']
        ];
        
        $response = call('POST', $uri, $params, $headers);
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;

    case 'logout':
        $uri = $kapi_host . "/v1/user/logout";
        $headers = ['Authorization: Bearer ' . $_SESSION['key']];
        $response = call('POST', $uri, [], $headers);
        session_destroy();
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;

    case 'unlink':
        $uri = $kapi_host . "/v1/user/unlink";
        $headers = ['Authorization: Bearer ' . $_SESSION['key']];
        $response = call('POST', $uri, [], $headers);
        session_destroy();
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
} 