<?php
require('api/dao/famoussayingDAO.php');
require('api/vo/famoussayingRequestVO.php');
require('api/vo/famoussayingResponseVO.php');
require('api/transformer/famoussayingTransformer.php');

class famoussayingService extends service
{
    protected $famoussayingDAO;

    public function __construct($isDbCon = 'N')
    {
        parent::__construct($isDbCon);
        $this->famoussayingDAO = new famoussayingDAO($this->pdo);
    }

    public function getData()
    {
        header("Content-Type:application/json;charset=UTF-8");
        echo ($this->getRandomFamousSaying());
    }

    private function getRandomFamousSaying()
    {
        $famoussayingCount = ($this->famoussayingDAO)->findFamoussayingCount();
        $famoussayingRequestVO = famoussayingTransformer::transform(rand(1, $famoussayingCount), new famoussayingRequestVO());
        $result = ($this->famoussayingDAO)->findFamoussayingById($famoussayingRequestVO);
        $famoussayingResponseVO = famoussayingTransformer::transformResult($result, new famoussayingResponseVO());
        return json_encode($famoussayingResponseVO, JSON_UNESCAPED_UNICODE);
    }
}
