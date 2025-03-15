<?php

class botService extends service
{
    public function __construct($isDbCon = 'N')
    {
        parent::__construct($isDbCon);
    }
    public function getData()
    {
        header("Content-Type:application/json;charset=UTF-8");
        if (isset($_POST["challenge"])) {
            $challenge = $_POST["challenge"];

            echo ('{ challenge: "' . $challenge . '" }');
        }
    }
}
