<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author lexis
 */
include 'app/Views/LoginView.php';

//include 'app/Controllers/StudentController.php';

class LoginController {
    
    private $student_controller;
    private $login_view;
    private $student;
    private $user;
    //initialize your variables in the constructor
    function __construct() {
        
        $this->student_controller = new StudentController();
        $this->login_view = new LoginView();
        $this->student = new Student();
        $this->user = new Users();
    }

    public function checkIfUserExistJson($username, $password) {
        //open and specify r for read option
        $file = fopen('credentials.json', 'r');

        if ($file) {
            // reading the file her we can call readdatafrom student function
            $data = fread($file, filesize('credentials.json'));
            //close the file
            fclose($file);

            // here we are decoding the data from the json so that we get a array form
            $credentials = json_decode($data, true);

            foreach ($credentials as $cre) {
                if (($username === $cre['username']) && ($password === $cre['password'])) {
                    return 1;
                } else {
                    return 0;
                }
            }
        }
    }

    public function checkIfUserExistDb($username, $password) {
        $users = $this->user->getAllUsersData();
        foreach ($users as $user) {
            if (($user['email'] == $username ) && ($user['pass_word'] === $password)) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
     * get the username and password from the user
     * check the if their crendentials are in available via the checkIfUserExistJson method
     * if they exist create a session for them. call the getAdminContent method
     * else if the user has already login and is returning back get the content
     * else if their credentials are not found redirect to index
     */
    public function openAdminPageJson() {
        $username = trim($_POST['username']);
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $result = $this->checkIfUserExistJson($username, $password);
        if ($result === 1) {
            //when user has being authenticated create the session
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $this->getAdminContent();
        } elseif ((isset($_SESSION['username']))) {
            $this->getAdminContent();
        } else {
            header('Location: index.php');
        }
    }

    public function openAdminPageDb() {

        $username = isset($_POST['username']) ? $_POST['username'] : '';

        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $result = $this->checkIfUserExistDb($username, $password);
        if ($result === 1) {
            //when user has being authenticated create the session
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            $student_parent = $this->student->getStudentLimit5Data();
            $users = $this->user->getAllUsersData();

            $this->login_view->loadAdminPage($student_parent, $users);
        } elseif ((isset($_SESSION['username']))) {
            $student_parent = $this->student->getStudentLimit5Data();
            $users = $this->user->getAllUsersData();

            $this->login_view->loadAdminPage($student_parent, $users);
        } else {
            header('Location: index.php');
        }
    }

    /**
     * open the students.json file and read from it.
     * open the credentials.json file and read from it.
     * now the data it retruns send it to the login_view method loadAdminPage
     */
    private function getAdminContent() {
        $jsonFile = "stduents.json";
        $students = $this->student_controller->readStudentDataFromFile($jsonFile);

        $jsonFileCredentials = "credentials.json";
        $users = $this->student_controller->readStudentDataFromFile($jsonFileCredentials);
        $this->login_view->loadAdminPage($students, $users);
    }

    public function adminLogin() {
        
    }

    public function openLoginPage() {
        $this->login_view->loadLoginPage();
    }

}
