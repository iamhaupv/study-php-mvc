<?php

class HomeModel extends Model
{
    protected $tableName = 'student';
    public function index(){
        echo "Home Model";
    }
    public function about(){
        echo "About Model";
    }
    public function contact(){
        return [
            "person 1", "person 2", "person 3"
        ];
    }

    public function getAll(){
        return $this->getAll();
    }
}