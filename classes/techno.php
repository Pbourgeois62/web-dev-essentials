<?php

class techno {
    private $id;
    private $name;
    private $pdo;

    public function __construct(database $db)
    {
        $this->pdo = $db->connectDatabase();    
    }
}