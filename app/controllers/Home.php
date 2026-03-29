<?php

class Home extends Controller
{
    public function index(){
        echo "Home Page";
    }
    public function about(){
        $home = $this->model("HomeModel");
        $dataHome = $home->index();
        echo $dataHome;
    }
    public function contact () {
        $home = $this->model("HomeModel");
        $dataHome = $home->contact();
        $data["contact"] = $dataHome;
        $this->render("contact", $data);
    }
}