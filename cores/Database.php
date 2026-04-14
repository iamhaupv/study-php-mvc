<?php

class Database
{
    private $__conn;

    public function __construct(){
        global $db_config;
        $this->__conn = Connection::getInstance($db_config);
    }

    public function query($query){
        $statement = $this->__conn->prepare($query);
        $statement->execute();
        return $statement;
    }
}