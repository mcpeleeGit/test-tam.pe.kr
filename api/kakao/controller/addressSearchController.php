<?php
require('api/kakao/service/AddressSearchService.php');
require('api/kakao/dto/AddressSearchRequestDTO.php');

class addressSearchController {

    public function address(){
        $AddressSearchService = new AddressSearchService();
        $AddressSearchService->getAddress(new AddressSearchRequestDTO());
    }

}   
?>


