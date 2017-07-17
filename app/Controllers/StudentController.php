<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StudentController
 *
 * @author lexis
 */
include "app/Views/StudentView.php";

class StudentController extends Controller {

    private $student_view;
    private $student;

    function __construct() {
        $this->student_view = new StudentView();
        $this->student = new Student();
    }

    /**
     * @desc => display all students
     * @steps [
     *      call @func readStudentData()
     *      ]
     */
    public function index() {
        $jsonFile = "stduents.json";
        $students = $this->readStudentDataFromFile($jsonFile);
        $this->student_view::openViewStudentPage($students);
    }

    /**
     * @desc => display all students
     * @steps [
     *      pull data from the page if there is a request into @var page
     *      get all the student_parent data and store it into a variable called $student_parent
     *      create a @var $perpage -> indicates how many items you want to see on the page. 
     *      create @var $start_from and multiply the @var $page - 1 * @var $per_page -> this gives us the start point
     *      check some conditions.. based on the limit offsets to be used in the database query .. 
     *      query the database with the @var $start_from and @var $end_at for the offsets and store the data in @var pagination_student_parent
     *      send @var pagination_student_parent to the view page
     *      ]
     */
    public function indexDb() {

        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        } else {
            $page = 1;
        }

        $student_parent = $this->student->getAllStudentParent();
        $per_page = 10;
        $page_count = count($student_parent);
        $total_pages = ceil($page_count / $per_page);

        $start_from = ($page - 1) * $per_page;

        if ($start_from == 1) {
            $end_at = $start_from + 10;
        } else if ($start_from == 10) {
            $end_at = $start_from;
        } else {
            $end_at = 10;
        }

//       echo "<br><br><br><br><br><br><br><br> page: $page   <br>";
//            echo "Start From : $start_from <br> End At : $end_at";
//        
        $pagination_student_parent = $this->student->getStudentLimitPaginationData($start_from, $end_at);

//        print_r($pagination_student_parent);

        $this->student_view->openViewStudentPage($pagination_student_parent, $total_pages, $start_from);
    }

    /**
     *
     * @desc => calls @func OpenCreateStudentPage of @class StudentView
     * @static
     */
    public function create() {
        $this->student_view:: openCreateStudentPage();
    }

    /**
     * @desc => save the student information
     * @steps [
     *      read the file
     *      generate an student id
     *      get the data to be saved using @func saveStudentData()
     *      open the file with append option
     *      if the file opens write to the file
     *      close the file
     *      redirect to view all student
     *      ]
     */
    public function saveToFile() {
        $jsonFile = "stduents.json";
        $read_student_data = $this->readStudentDataFromFile($jsonFile);
        print_r($read_student_data);
        $student_id = count($read_student_data) + 1;
        $save_students_data = $this->saveStudentDataToFile($student_id);
        return print_r($save_students_data);
        $file = fopen('stduents.json', 'a');
        if ($file) {
            fwrite($file, json_encode($save_students_data));
            fclose($file);
        }
        header('Location: index.php?action=viewStudent');
    }

    /**
     * call the model and save it to the database
     */
    public function saveToDB() {
        $this->student->insert();
    }

    public function StudentDetailFromFile() {
        $jsonFile = "stduents.json";
        $students = $this->readStudentDataFromFile($jsonFile);
        foreach ($students as $stud) {
            if ($stud['student']['id'] === $_REQUEST['userid']) {
                $student_data = $stud;
                $this->student_view->openStudentDetailPage($student_data);
            }
        }
    }

    public function StudentDetailFromDb() {
        $id = $_REQUEST['userid'];
        $student_data = $this->student->getAllStudentParentDetail($id);
        $this->student_view->openStudentDetailPage($student_data);
    }

    public function edit() {
        $id = $_REQUEST['userid'];
        $student_data = $this->student->getAllStudentDetail($id);
        $parent_data = $this->student->getStudentParent($id);
        $this->student_view->openUpdateStudentPage($student_data, $parent_data);
    }

    public function upate() {
        $id = $_REQUEST['userid'];
        $this->student->update($id);
    }

    public function deleteStudentDataFromFile() {
        $jsonFile = "stduents.json";
        $user_id = $_REQUEST['userid'];

        $student_data = $this->readStudentDataFromFile($jsonFile);

        foreach ($student_data as $key => $stud) {
            echo "searching " . $stud['student']['id'] . " with " . $user_id . "<br><br>";
            if ($stud['student']['id'] === $user_id) {
                echo "we found him with id " . $stud['student']['id'] . "<br><br>";
                unset($key);
                return print_r($student_data);
            } else {
                echo "result : not found <br>";
            }
        }
        return print_r($student_data);
    }

    public function deleteStudentDataFromDb() {

        $user_id = $_REQUEST['userid'];
        $this->student->delete($user_id);
        header("Location:index.php?action=viewStudent");
    }

    /**
     * @desc => Open->read json file and return student array
     * @param string $jsonFile the file to open
     * @steps [
     *      create a student variable and initialize it to null
     *      open and read the file with option r and close the file
     *      json_decode the file to get the array of the file
     *      if we dont get anything set student as an array to prevent error from showing up with we echo in view
     *      return the read data
     *      ]
     * @static
     * @return array contains array data from read file
     */
    public function readStudentDataFromFile($jsonFile) {
        $students = null;
        $file = fopen($jsonFile, 'r');

        if ($file) {
            $data = fread($file, filesize($jsonFile));
            fclose($file);

            $students = json_decode($data, true);
            // append the data to student array
        }
        if (!$students) {
            $students = array();
        }
        return $students;
    }

    /**
     * @desc => get student information
     * @param int $student_id
     * @steps [
     *      create associative array students
     *      get data from user input using Global variable $_POST[]
     *      return the read data
     *      ]
     * @static
     * @return array contains array data created
     */
    private function saveStudentDataToFile($student_id) {
//        this is what the student is used for
//        get the total users to generate the user key.. in generate id we pass in the file we are reading from
//        $student_id = StudentController::generateId($read_student_data);
        //generate new id


        $students = array(
            'student' => array(
                'id' => $student_id,
                'first_name' => trim(strip_tags($_POST['first_name'])),
                'last_name' => trim(strip_tags(ucwords($_POST['last_name']))),
                'email' => trim(strip_tags(strtolower($_POST['email']))),
                'gender' => ucwords($_POST['gender']),
                'phone' => trim(strip_tags($_POST['phone'])),
                'dob' => $_POST['dob'],
                'place_of_birth' => trim(strip_tags(ucwords($_POST['place_of_birth']))),
                'marital_status' => ucwords($_POST['marital_status']),
                'nationality' => ucwords($_POST['nationality']),
                'postal' => trim(strip_tags(ucwords($_POST['postal']))),
                'last_school' => trim(strip_tags(ucwords($_POST['last_school']))),
                'course' => ucwords($_POST['course']),
                'phone' => strip_tags($_POST['phone']),
                'dob' => $_POST['dob'],
                'place_of_birth' => trim(strip_tags(ucwords($_POST['place_of_birth']))),
                'marital_status' => ucwords($_POST['marital_status'])
            ),
            'parent' => array(
                'first_name' => trim(strip_tags(ucwords($_POST['p_first_name']))),
                'last_name' => trim(strip_tags(ucwords($_POST['p_last_name']))),
                'email' => trim(strip_tags(strtolower($_POST['p_email']))),
                'phone_number' => trim(strip_tags($_POST['p_phone_number'])),
                'guardian_address' => trim(strip_tags(ucwords($_POST['p_guardian_address']))),
            )
        );

        return $students;
    }

    public function checkEmail() {
        $email = $_REQUEST['data'];
        $result = $this->student->checkIfEmailExist($email);
        if ($result === 1) {
            echo "<span class=\"label label-danger\"><i class=\"fa fa-thumbs-down\"></i> Email Already Exist</span>";
            return 1;
        }
        if ($result === 0) {
            echo "<span class=\"label label-success\"><i class=\"fa fa-thumbs-up\"></i> Success</span>";
            return 0;
        }
    }

    public function search() {
        $search = $_REQUEST['search'];
        echo "we are searchhing";
        $student_data = $this->student->searchStudent($search);
        $this->student_view->openSearchStudentPage($student_data);
    }

}
