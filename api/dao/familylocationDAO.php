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
                    latlng
                  FROM familylocation 
                 WHERE uuid= :familyuuid
                 ORDER BY id DESC
                 LIMIT 1
                ';
        return $this->getResult($sql, $familylocationRequestDTO->familyuuid);
    }

    public function insertFamilylocation($familylocationRequestDTO)
    {
        $sql = 'INSERT INTO familylocation (uuid, latlng) VALUES (:myuuid, :mylatlng)';
        return $this->execute($sql, $familylocationRequestDTO->myuuid, $familylocationRequestDTO->mylatlng);
    }
}
