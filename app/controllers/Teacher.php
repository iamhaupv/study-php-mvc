<?php

class Teacher extends Controller
{
    public $data = [];
    protected $teacherModel;
    public function index(){
        $this->render('layouts/main');

    }
    public function __construct(){
        $this->teacherModel = $this->model('TeacherModel');
    }
    public function getAllTeachers(){
        $teachers = $this->teacherModel->getAll();
        $this->data['subcontent']['teachers'] = $teachers;
        $this->data['css'] = ['teacher/style.css', 'teacher/teacher_list.css'];
        $this->data['content'] = 'teachers/teacher_list';
        $this->render('layouts/main', $this->data);
    }
    public function getStudentById($id){
        $teacher = $this->teacherModel->getById($id);
        $data['teacher'] = $teacher;
        $this->render('teachers/edit_teacher', $data);
    }
//    public function addTeacher(){
//        $this->data['css'] = ['teacher/style.css'];
//        if($_SERVER['REQUEST_METHOD'] === 'POST'){
//            $this->data['first_name'] = $_POST['first_name'] ?? null;
//            $this->data['last_name'] = $_POST['last_name'] ?? null;
//            // validate
//            if(empty($this->data['first_name']) || empty($this->data['last_name'])){
//                $this->data['error'] = 'Data is empty';
//                $this->data['content'] = 'teachers/add_teacher';
//                $this->render('teachers/add_teacher', $this->data);
//                return;
//            }
//            $result = $this->teacherModel->add($this->data);
//            $this->data['content'] = 'teachers/add_teacher';
//            if($result){
//                header("Location: /study-php-mvc/teachers");
//                exit;
//            }else{
//                $this->data['error'] = "Thêm thất bại";
//                $this->render('teachers/add_teacher', $this->data);
//            }
//        }else{
//            $this->data['content'] = 'teachers/add_teacher';
//            $this->render('teachers/add_teacher');
//        }
//    }
    public function addTeacher(){

        $this->data['css'] = ['teacher/style.css'];
        $this->data['subcontent'] = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // 🔥 lưu vào subcontent
            $this->data['subcontent']['first_name'] = $_POST['first_name'] ?? null;
            $this->data['subcontent']['last_name'] = $_POST['last_name'] ?? null;

            // 🔥 validate đúng chỗ
            if(
                empty($this->data['subcontent']['first_name']) ||
                empty($this->data['subcontent']['last_name'])
            ){
                $this->data['subcontent']['error'] = 'Data is empty';
                $this->data['content'] = 'teachers/add_teacher';

                $this->render('layouts/main', $this->data);
                return;
            }

            // 🔥 add đúng data
            $result = $this->teacherModel->add([
                'first_name' => $this->data['subcontent']['first_name'],
                'last_name' => $this->data['subcontent']['last_name']
            ]);

            if($result){
                header("Location: /study-php-mvc/teachers");
                exit;
            }else{
                $this->data['subcontent']['error'] = "Thêm thất bại";
                $this->data['content'] = 'teachers/add_teacher';

                $this->render('layouts/main', $this->data);
            }

        }else{
            // GET
            $this->data['content'] = 'teachers/add_teacher';
            $this->render('layouts/main', $this->data);
        }
    }
    public function deleteTeacher($id){
        if(empty($id)){
            echo 'Not found ID';
            return;
        }
        $result = $this->teacherModel->delete($id);
        if($result > 0){
            header("Location: /study-php-mvc/teachers");
            exit;
        }else{
            echo "Not deleted";
        }
    }
    public function editTeacher($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'first_name' => $_POST['first_name'] ?? null,
                'last_name' => $_POST['last_name'] ?? null,
            ];
            if(empty($data['first_name']) || empty($data['last_name'])){
                $data['teacher'] = [
                    'id' => $id,
                    'first_name' => $_POST['first_name'] ?? null,
                    'last_name' => $_POST['last_name'] ?? null,
                ];
                $data['error'] = 'Data is empty';
                $this->render('teachers/edit_teacher', $data);
            }else{
                $result = $this->teacherModel->edit($data, $id);
                if($result){
                    header("Location: /study-php-mvc/teachers");
                    exit;
                }else{
                    echo "Not edit";
                    $this->render('teachers/edit_teacher', $data);
                }

            }
        }
    }
}