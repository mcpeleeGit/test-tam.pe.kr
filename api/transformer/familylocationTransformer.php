<?php
class familylocationTransformer
{
    public static function transform($result, $familylocationResponseVO)
    {
        $familylocationResponseVO->id = $result['id'];
        $familylocationResponseVO->uuid = $result['uuid'];
        $familylocationResponseVO->latlng = $result['latlng'];
        return $familylocationResponseVO;
    }

}
