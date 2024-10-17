<?php

class category {
    private $id;
    private $name;
    private $techno_id;
    private $pdo;

    public function __construct(database $db)
    {
        $this->pdo = $db->connectDatabase();    
    }    
}