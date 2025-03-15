<?php
class dao
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    protected function getResult($sql, $object)
    {
        $sth = ($this->pdo)->prepare($sql);

        $reflect = new ReflectionClass($object);
        $props   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ($props as $prop) {
            $sth->bindValue(':' . $prop->getName(), $object->{$prop->getName()}, PDO::PARAM_STR);
        }

        $sth->execute();
        $row = $sth->fetch();
        return $row;
    }

    protected function getResultList($sql, $object)
    {
        $sth = ($this->pdo)->prepare($sql);

        $reflect = new ReflectionClass($object);
        $props   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ($props as $prop) {
            $sth->bindValue(':' . $prop->getName(), $object->{$prop->getName()}, PDO::PARAM_STR);
        }

        $sth->execute();
        $row = $sth->fetch();
        return $row['result'];
    }

    protected function getCount($sql, $object = null)
    {
        $sth = ($this->pdo)->prepare($sql);

        if ($object != null) {
            $reflect = new ReflectionClass($object);
            $props   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
            foreach ($props as $prop) {
                $sth->bindValue(':' . $prop->getName(), $object->{$prop->getName()}, PDO::PARAM_STR);
            }
        }

        $sth->execute();
        return $sth->fetchColumn();
    }
}
