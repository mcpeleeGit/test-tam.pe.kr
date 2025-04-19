<?php
class FamilylocationRequestDTO {
    public function __construct()
    {
        Request::setJsonParam($this);
    }   
    
    public $myuuid;
    public $mylatlng;
    public $familyuuid;
    public $familylatlng;
}
?> 