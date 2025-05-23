<?php
class familylocationDAO extends dao
{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    public function findFamilylocationByUuid($familylocationRequestDTO)
    {
        $sql = "SELECT 
                    id,
                    uuid,
                    latlng,
                    familyuuid
                  FROM familylocation 
                 WHERE uuid= '".$familylocationRequestDTO->familyuuid."'
                 AND familyuuid= '".$familylocationRequestDTO->myuuid."'
                 ORDER BY id DESC
                 LIMIT 1
                ";
        return $this->getSqlResult($sql);
    }

    public function insertFamilylocation($familylocationRequestDTO)
    {
        $sql = "INSERT INTO familylocation (uuid, latlng, familyuuid) VALUES ('"
                    .$familylocationRequestDTO->myuuid."', '"
                    .$familylocationRequestDTO->mylatlng."', '"
                    .$familylocationRequestDTO->familyuuid."')";
        return $this->execute($sql);
    }
}
