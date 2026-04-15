<?php

class User extends Controller
{
    public $userModel;
    public $data = [];
    public function __construct(){
        $this->userModel = $this->model('UserModel');
    }
    public function index(){
        echo "This is the index page";
    }
    public function getAllUsers(){
        $this->data['subcontent']['users'] = $this->userModel->getAll();
        $this->data['css'] = ['user/style.css'];
        $this->data['content'] = 'users/users_list';
        $this->render('layouts/main', $this->data);
    }
    public function addUser(){
        $this->data['subcontent'] = [];
        $this->data['css'] = ['user/style.css'];
        $this->data['content'] = 'users/add_user';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->data['subcontent']['user_name'] = $_POST['user_name'] ?? null;
            $this->data['subcontent']['pass_word'] = $_POST['pass_word'] ?? null;
            if(empty($this->data['subcontent']['user_name']) || empty($this->data['subcontent']['pass_word'])){
                $this['subcontent']['message'] = 'All fields are required';
            }else{
                $result = $this->userModel->add($this->data['subcontent']);
                if($result){
                    header("Location: /study-php-mvc/users");
                    exit;
                }else{
                    $this->data['subcontent']['message'] = 'Add user failed';
                }
            }
        }
        $this->render('layouts/main', $this->data);
    }
    public function editUser($id){
        $this->data['subcontent'] = [];
        $this->data['css'] = ['user/style.css'];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->data['subcontent']['user_name'] = $_POST['user_name'] ?? null;
            $this->data['subcontent']['pass_word'] = $_POST['pass_word'] ?? null;
            if(empty($this->data['subcontent']['user_name']) || empty($this->data['subcontent']['pass_word'])){
                $this->data['subcontent']['message'] = 'All fields are required';
            }else{
                $result = $this->userModel->edit($this->data['subcontent'], $id);
                if($result){
                    header("Location: /study-php-mvc/users");
                    exit;
                }else{
                    $this->data['subcontent']['message'] = 'Edit user failed';
                }
            }
        }
        $this->render('layouts/main', $this->data);
    }
    public function deleteUser($id){
        if(!empty($id)){
            $result = $this->userModel->delete($id);
            if($result){
                header("Location: /study-php-mvc/users");
            }else{
                $this['subcontent']['message'] = 'Delete user failed';
            }
        }
    }
    public function getUserById($id){
        $this->data['subcontent']['user'] = $this->userModel->getById($id);
        $this->data['content'] = 'users/edit_user';
        $this->data['css'] = ['user/style.css'];
        $this->render('layouts/main', $this->data);
    }
}