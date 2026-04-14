<?php

class Connection
{
    private static $instance = null, $conn = null;

    private function __construct($config){

        try {
            $dsn = 'mysql:dbname=' . $config['db'] . ';host=' . $config['host'];
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];
            $con = new PDO($dsn, $config['user'], $config['password'], $options);
            self::$conn = $con;
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public static function getInstance($config){
        if(self::$instance==null){
            new Connection($config);
            self::$instance =  self::$conn;
        }
        return self::$instance;
    }
}