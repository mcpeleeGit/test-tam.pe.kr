<?php
class dbconn extends PDO
{
    public function __construct()
    {
        parent::__construct('mysql:host=localhost;dbname=leedongha;charset=utf8mb4', 'leedongha', 'googsu!2#');
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
