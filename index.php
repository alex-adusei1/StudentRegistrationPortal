<?php

session_start();
/**
 * this is the index page and it is kind of route request to various controllers within our application
 */
include 'autoloader.php';
include 'app/Controllers/LoginController.php';

$login = new LoginController();

$student_controller = new StudentController();

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

if ($action === '') {
    $login->openLoginPage();
}

if ($action === 'login') {
    $login->openAdminPageDb();
}

if ($action === "createStudent") {
    $student_controller->create();
}

// if you declare it here you don't have to declare it twice
if ($action == "saveStudent") {
    $student_controller->saveToDB();
}

if ($action === "viewStudent") {
    $student_controller->indexDb();
}

if ($action === "deleteStudent") {
    $student_controller->deleteStudentDataFromDb();
}

//view details of a particular once
if ($action === "viewDetail") {
//    echo "View the student";
    $student_controller->StudentDetailFromDb();
}

if ($action === "editStudent") {
    $student_controller->edit();
}

if ($action === "updateStudent") {
    $student_controller->upate();
}

if ($action === "logout") {
    header("Location: index.php");
}
if ($action ==="search") {
    $student_controller->search();
}
//AJAX HANDLERS
if($action === "checkEmail"){
    $student_controller->checkEmail();
}
