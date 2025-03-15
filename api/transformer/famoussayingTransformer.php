<?php
class famoussayingTransformer
{
    public static function transform($id, $famoussayingRequestVO)
    {
        $famoussayingRequestVO->id = $id;
        return $famoussayingRequestVO;
    }

    public static function transformResult($result, $famoussayingResponseVO)
    {
        $famoussayingResponseVO->contents = $result['contents'];
        $famoussayingResponseVO->name = $result['name'];
        return $famoussayingResponseVO;
    }
}
