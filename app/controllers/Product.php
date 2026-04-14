<?php

class Product extends Controller
{
    public $data = [];
    private $productModel;
    public function __construct()
    {
       $this->productModel = $this->model("ProductModel");
    }

    public function index(){
        $home = $this->productModel->getAll();
        $dataHome = $home;
        $this->data['students'] = $dataHome;
        $this->data['content'] = "contact";
        $this->render('layouts/main', $this->data);
    }

    public function product_list(){
        echo "Product list";
    }


}