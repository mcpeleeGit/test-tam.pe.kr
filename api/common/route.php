<?php
class Route
{
    public static function init($reqUri)
    {
        if (Route::isAPI($reqUri)) {
            Route::routeApi($reqUri);
            exit;
        }
    }

    private static function isPHP($reqUri)
    {
        return (substr('php', -3))  ? true : false;
    }

    private static function isAPI($reqUri)
    {
        if (strlen($reqUri) < 4) return false;
        return substr($reqUri, 0, 4) == '/api' ? true : false;
    }

    private static function routeApi($reqUri)
    {
        //one time include
        require('api/common/constant.php');
        require('api/common/service.php');
        require('api/common/dao.php');
        require('api/common/request.php');
        require('api/common/response.php');

        $url = preg_split('#/#', $reqUri);
        require($url[1] . '/controller/' . $url[2] . 'Controller.php');

        Response::jsonheader();

        $ctr_name = $url[2] . 'Controller';
        $ctr = new $ctr_name();
        if (isset($url[3]) && $url[3] != '') {
            $fullName   = $url[3];
            $searchName = '?';
            $pos        = strpos($fullName, $searchName);
            if ($pos === false) {
                $functionName = $url[3];
            } else {
                $functionName = explode('?', $url[3]);
                $functionName = $functionName[0];
            }

            $ctr->{$functionName}();
        } else {
            $ctr->defaultMethod();
        }
    }
}
