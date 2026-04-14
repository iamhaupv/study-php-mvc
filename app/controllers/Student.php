<?php

class Student extends Controller
{
    private $studentModel;
    public function __construct()
    {
        $this->studentModel = $this->model("StudentModel");
    }
    public function index(){
        $students = $this->studentModel->getAll();
        $data['students_a'] = $students;
        $this->render('students/manage_student', $data);
    }
    public function search_by_id($id){
        $student = $this->studentModel->getById($id);
        $data['student_by_id'] = $student;
        $this->render('students/search', $data);
    }
}