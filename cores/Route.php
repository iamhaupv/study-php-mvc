<?php

class Route
{
    public function handleRoute($url){
        global $routes;
        unset($routes['default_controller']);
        $url = trim($url, '/');
        $handleURL = $url;
        if(!empty($routes)){
            foreach ($routes as $key => $value) {
                if(preg_match("~" . $key . "~is", $url)){
                    $handleURL = preg_replace("~" . $key . "~is", $value, $url);
                    break;
                }
            }
        }
        return $handleURL;
    }
}