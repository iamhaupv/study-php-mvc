<?php

class HomeModel
{
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
}