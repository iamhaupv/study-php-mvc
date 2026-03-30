<?php
class App{
    private $__controller;
    private $__action;
    private $__params;
    private $__routes;
    public function __construct()
    {
        $this->__routes = new Route();
        global $routes;
        if(!empty($routes['default_controller'])){
            $this->__controller = $routes['default_controller'];
        }
        $this->__action = "index";
        $this->__params = [];
        $this->handleURL();

    }
    public function getURL(){
        if(!empty($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
        }
        else{
            $url = "/";
        }
        return $url;
    }
    // handle url
    public function handleURL () {
        $url = $this->getURL();

        $url = $this->__routes->handleRoute($url);

        $urlArr = array_filter(explode("/", $url)) ;

        $urlArr = array_values($urlArr);



        if(!empty($urlArr[0])){
            $this->__controller = ucfirst($urlArr[0]);
        }else{
            $this->__controller = ucfirst($this->__controller);
        }

        // handle controller
        if(file_exists(__DIR_ROOT_ . "/app/controllers/" . $this->__controller . ".php")){
            require_once __DIR_ROOT_ . "/app/controllers/" . $this->__controller . ".php";
            if(class_exists($this->__controller)){
                $this->__controller = new $this->__controller();
            }else{
                $this->loadError404();
            }
            unset($urlArr[0]);
        }else{
            $this->loadError404();
        }
        // handle action (method)
        if(!empty($urlArr[1])){
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        // handle params
        $this->__params = $urlArr;

        // handle check method exist
        if(method_exists($this->__controller, $this->__action)){
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        }else{

            $this->loadError404();
        }
    }
    public function loadError404($name = 'Error404'){
        if(file_exists("app/errors/" . $name . ".php")){
            require_once "app/errors/" . $name . ".php";
        }
    }
}