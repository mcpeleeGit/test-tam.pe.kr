<?php
require('api/dao/familylocationDAO.php');
require('api/vo/familylocationResponseVO.php');
require('api/transformer/familylocationTransformer.php');

class familylocationService extends service
{
    protected $familylocationDAO;

    public function __construct($isDbCon = 'N')
    {
        parent::__construct($isDbCon);
        $this->familylocationDAO = new familylocationDAO($this->pdo);
    }

    public function getData($familylocationRequestDTO)
    {
        header("Content-Type:application/json;charset=UTF-8");
        echo ($this->getFamilylocation($familylocationRequestDTO));
    }

    private function getFamilylocation($familylocationRequestDTO)
    {
        ($this->familylocationDAO)->insertFamilylocation($familylocationRequestDTO);
        $result = ($this->familylocationDAO)->findFamilylocationByUuid($familylocationRequestDTO);
        $familylocationResponseVO = familylocationTransformer::transform($result, new familylocationResponseVO());
        echo (json_encode($familylocationResponseVO, JSON_UNESCAPED_UNICODE));
    }
}
