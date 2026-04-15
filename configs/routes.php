<?php
$routes['default_controller'] = "home";
// product routes
$routes['product/default/(\d+)'] = "product/product_list/$1";
// student routes
$routes['student/search/(\d+)'] = 'student/search_by_id/$1';
// teacher routes
$routes['teachers'] = 'teacher/getAllTeachers';
$routes['teacher/(\d+)'] = 'teacher/getStudentById/$1';
$routes['teacher/add'] = 'teacher/addTeacher';
$routes['teacher/edit/(\d+)'] = 'teacher/editTeacher/$1';
$routes['teacher/delete/(\d+)'] = 'teacher/deleteTeacher/$1';
// user routes
$routes['users'] = "user/getAllUsers";
$routes['user/add'] = "user/addUser";
$routes['user/delete/(\d+)'] = "user/deleteUser/$1";
$routes['user/edit/(\d+)'] = "user/editUser/$1";
$routes['user/(\d+)'] = "user/getUserById/$1";