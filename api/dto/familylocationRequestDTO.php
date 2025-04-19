<?php
class FamilylocationRequestDTO {
    public function __construct()
    {
        Request::setParam($this);
    }   
    
    public $myuuid;
    public $mylatlng;
    public $familyuuid;
    public $familylatlng;
}
?> 