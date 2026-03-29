<?php
class Controller
{
    public function model($model){
        if(file_exists(__DIR_ROOT_ . "/app/models/" . $model . ".php")){
            require_once __DIR_ROOT_ . "/app/models/" . $model . ".php";
            if(class_exists($model)){
                return new $model();
            }
        }
        return null;
    }
    public function render($view, $data){
        extract($data);
        if(file_exists(__DIR_ROOT_ . "/app/views/" . $view. ".php")){
            require_once __DIR_ROOT_ . "/app/views/" . $view. ".php";
        }
    }
}