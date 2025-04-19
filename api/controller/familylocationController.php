<?php
require('api/service/familylocationService.php');
require('api/dto/FamilylocationRequestDTO.php');
class familylocationController
{

    public function defaultMethod()
    {
        $FamilylocationService = new familylocationService(Constants::DB_CONN);
        $FamilylocationService->getData(new familylocationRequestDTO());
    }
}
