<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetailStudentView
 *
 * @author lexis
 */
//include __DIR__ . '/View.php';

class StudentView extends View {

    /**
     * load create student Page
     */
    public function openCreateStudentPage() {
        if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
            include "app/Templates/dashboard/create_stud_parent_page.php";
        }
    }

    public function openViewStudentPage($student_parent,$total_pages,$start_from) {
//         echo "<br><br><br>".$students;
        if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
            if (is_array($student_parent)) {
                include "app/Templates/dashboard/all_student_page.php";
            }
        }
    }

    public function openStudentDetailPage($student_data) {

        if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
            if (is_array($student_data)) {
                include "app/Templates/dashboard/student_detail_page.php";
            }
        }
    }

    public function openUpdateStudentPage($student_data, $parent_data) {
        if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
            include "app/Templates/dashboard/update_student_page.php";
        }
    }
    
    public function openSearchStudentPage($student_data){
        if((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
            include "app/Templates/dashboard/student_detail_page.php";
        }
    }
}
