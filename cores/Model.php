<?php

class Model
{
    protected $db;
    protected $table;

    public function __construct()
    {
        global $db_config;
        $this->db = Connection::getInstance($db_config);
    }
    // get all item
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM {$this->table}";
            return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }
    // get item by id
    public function getById($id){
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(["id" => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?? null;
        }catch (PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }
    // add item
    public function add($data){
        try {
            $keys = array_keys($data);
            echo "<pre>";
            print_r($keys);
            echo "</pre>";
            $fields = implode(", ", $keys);
            echo "<pre>";
            print_r($fields);
            echo "</pre>";
            $placeholders = ":" . implode(", :", $keys);
            echo "<pre>";
            print_r($placeholders);
            echo "</pre>";
            $sql = "insert into {$this->table} ($fields) values ($placeholders)";
            echo $sql;
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($data);
        }catch (Exception $e){
            echo $e->getMessage();
            return null;
        }
    }
    // delete item
    public function delete($id){
        try {
            $sql = "delete from {$this->table} where id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(["id" => $id]);
            return $stmt->rowCount();
        }catch (Exception $e){
            echo $e->getMessage();
            return null;
        }
    }
    // edit item
    public function edit($data, $id){
        $sets = [];
        foreach ($data as $key => $value) {
            $sets[] = "{$key} = :{$key}";
        }
        $string = implode(", ", $sets);
        $sql = "update {$this->table} set {$string} where id = :id";
        $stmt = $this->db->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);
    }
}