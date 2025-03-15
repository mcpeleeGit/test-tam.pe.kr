<?php
class famoussayingDAO extends dao
{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    public function findFamoussayingById($id)
    {
        $sql = 'SELECT 
                    id,
                    contents,
                    name
                  FROM quote 
                 WHERE id= :id
                ';
        return $this->getResult($sql, $id);
    }

    public function findFamoussayingCount()
    {
        $sql = 'SELECT 
                    COUNT(*) AS result
                  FROM quote
                ';
        return $this->getCount($sql);
    }
}
