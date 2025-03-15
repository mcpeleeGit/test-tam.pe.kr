<?php
require('api/service/famoussayingService.php');

class famoussayingController
{

    public function defaultMethod()
    {
        $FamoussayingService = new famoussayingService(Constants::DB_CONN);
        $FamoussayingService->getData();
    }
}
