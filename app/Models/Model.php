<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author lexis
 */
include "app/System/DB.php";

class Model {

// everything that we need to do with databases;

    protected $conn;
    private $server = "localhost";
    private $user_name = "lexis";
    private $password = "lexis@123";
    private $db = "school_db";

    function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->server; dbname=$this->db", $this->user_name, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo "connection failed " . $ex->getMessage();
        }
    }

    public function insert() {
//        check if the content has insert
        try {

            $student_sql = "insert into students(first_name,last_name,email) VALUES(:first_name,:last_name,:email)";
            $stmt = $this->conn->prepare($student_sql);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);

            $first_name = trim(strip_tags($_POST['first_name']));
            $last_name = trim(strip_tags(ucwords($_POST['last_name'])));
            $email = trim(strip_tags(strtolower($_POST['email'])));
            $stmt->execute();

           $student_id = $this->getLastId();
           
            $parent_sql = "insert into parents(first_name,last_name,address,phone_number, student_id) VALUES(:first_name,:last_name,:address,:phone_number, :student_id)";
            $stmt = $this->conn->prepare($parent_sql);

            $stmt->bindParam(':first_name', $p_first_name);
            $stmt->bindParam(':last_name', $p_last_name);
            $stmt->bindParam(':address', $p_address);
            $stmt->bindParam(':phone_number', $p_phone_number);
            $stmt->bindParam(':student_id', $student_id);

            $p_first_name = trim(strip_tags($_POST['p_first_name']));
            $p_last_name = trim(strip_tags(ucwords($_POST['p_last_name'])));
            $p_address = trim(strip_tags(ucwords($_POST['p_guardian_address'])));
            $p_phone_number = trim(strip_tags($_POST['p_phone_number']));
            
            $stmt->execute();
            $this->conn = null;

            header("Location:index.php?action=viewStudent");
        } catch (PDOException $ex) {
            die("Error" . $ex->getMessage());
        }
    }

    public function delete($id) {
        try {
            $student_sql = "DELETE FROM students where id = $id";
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();
        } catch (PDOException $ex) {
            die("failed to delete data " . $ex->getMessage());
        }
    }

    public function update($id) {
        try {
            $first_name = trim(strip_tags($_POST['first_name']));
            $last_name = trim(strip_tags(ucwords($_POST['last_name'])));
            $email = trim(strip_tags(strtolower($_POST['email'])));

            $student_sql = "UPDATE `students` SET students.first_name = '$first_name', students.last_name= '$last_name', students.email = '$email' WHERE students.id = '$id' ";

            $stmt = $this->conn->prepare($student_sql);

            $stmt->execute();

            $p_first_name = trim(strip_tags($_POST['p_first_name']));
            $p_last_name = trim(strip_tags(ucwords($_POST['p_last_name'])));
            $p_address = trim(strip_tags(ucwords($_POST['p_guardian_address'])));
            $p_phone_number = trim(strip_tags($_POST['p_phone_number']));

            $parent_sql = "UPDATE `parents` SET parents.first_name= '$p_first_name', parents.last_name = '$p_last_name', parents.address= '$p_address', parents.phone_number = '$p_phone_number' where parents.student_id = '$id'";
            $stmt = $this->conn->prepare($parent_sql);

            $stmt->execute();
            $this->conn = null;

            header("Location:index.php?action=viewStudent");
        } catch (PDOException $ex) {
            die("Error" . $ex->getMessage());
        }
    }

    public function getAllParent() {

        try {
            $student_sql = "SELECT * FROM parents";
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            die("failed to load data " . $ex->getMessage());
        }
    }

    public function getStudentParent($id) {
        try {
            $student_sql = "SELECT * FROM parents where student_id = $id";
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            die("failed to load data " . $ex->getMessage());
        }
    }
    
    public function getAllStudentParentDetail($id) {
        try {
            $student_sql = "SELECT students.id ,students.first_name sfn , students.last_name sln, students.email se,  parents.first_name pfn, parents.last_name pln, parents.phone_number ppn, parents.address pa FROM students left join parents on students.id = parents.student_id where students.id = $id";
            
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            die("failed to load data " . $ex->getMessage());
        }
    }
    
    protected function getLastId(){
        //get the student ID
            $student_current_id = "SELECT students.id FROM `students` ORDER BY id DESC LIMIT 1";
            $sql = $this->conn->prepare($student_current_id);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            $student_id = $sql->fetchAll();
            echo "<br><br><br><br>";
            foreach ($student_id as $id){
                $my_id = $id['id'];
            }
            return $my_id;
    }

}
