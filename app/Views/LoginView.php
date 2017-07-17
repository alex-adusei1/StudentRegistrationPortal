<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginView
 *
 * @author lexis
 */
include __DIR__ . '/View.php';

class LoginView extends View {

    function __construct() {
        parent::__construct();
    }

    public function loadLoginPage() {
        include 'app/Templates/auth/login_page2.php';
    }

    public function loadAdminPage($student_parent, $users) {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
       
            include 'app/Templates/dashboard/admin_index_page.php';
        } else {
            echo $_SESSION['password'];
        }
    }

}
