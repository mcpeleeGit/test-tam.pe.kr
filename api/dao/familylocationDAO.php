<?php
class familylocationDAO extends dao
{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    public function findFamilylocationByUuid($familylocationRequestDTO)
    {
        $sql = 'SELECT 
                    id,
                    uuid,
                    latlng,
                    familyuuid
                  FROM familylocation 
                 WHERE uuid= :familyuuid
                 ORDER BY id DESC
                 LIMIT 1
                ';
        return $this->getResult($sql, $familylocationRequestDTO->familyuuid);
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
