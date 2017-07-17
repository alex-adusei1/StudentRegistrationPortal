<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author lexis
 */
class Student extends Model {

    function __construct() {
        parent::__construct();
    }

    public function getAllStudentData() {
        try {
            $student_sql = "SELECT * FROM students";
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            die("failed to load data " . $ex->getMessage());
        }
    }

    public function getStudentLimit5Data() {
        try {
            $student_sql = "SELECT students.id ,students.first_name sfn , students.last_name sln, students.email se,  parents.first_name pfn, parents.last_name pln, parents.phone_number ppn, parents.address pa FROM students left join parents on students.id = parents.student_id ORDER BY students.first_name ASC limit 10";
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);


            return $sql->fetchAll();
        } catch (PDOException $ex) {
            die("failed to load data" . $ex->getMessage());
        }
    }

    /**
     * 
     * @param type $start
     * @param type $end
     * @return type
     * we called we need to give a start and end point
     */
    public function getStudentLimitPaginationData($start, $end) {
        try {
            $student_sql = "SELECT students.id ,students.first_name sfn , students.last_name sln, students.email se,  parents.first_name pfn, parents.last_name pln, parents.phone_number ppn, parents.address pa FROM students left join parents on students.id = parents.student_id ORDER BY students.first_name ASC limit $start, $end";
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);


            return $sql->fetchAll();
        } catch (PDOException $ex) {
            die("failed to load data" . $ex->getMessage());
        }
    }

    public function getAllStudentDetail($id) {
        try {
            $student_sql = "SELECT * FROM students where id = $id";
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            die("failed to load data " . $ex->getMessage());
        }
    }

    public function getAllStudentParent() {
        try {
            $student_sql = "SELECT students.id ,students.first_name sfn , students.last_name sln, students.email se,  parents.first_name pfn, parents.last_name pln, parents.phone_number ppn, parents.address pa FROM students left join parents on students.id = parents.student_id";
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            die("failed to load data " . $ex->getMessage());
        }
    }
    
    public function checkIfEmailExist($email) {
        try {
            $student_sql = "SELECT students.email  FROM students where students.email = '$email'";
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            $result_data = $sql->fetchAll();
            
            if(count($result_data) >0){
                return 1;
            }else{
                return 0;
            }
        } catch (PDOException $ex) {
            die("failed to load data " . $ex->getMessage());
        }
    }
    
    
    public function searchStudent($search){
        try {
            $student_sql = "SELECT students.id ,students.first_name sfn , students.last_name sln, students.email se,  parents.first_name pfn, parents.last_name pln, parents.phone_number ppn, parents.address pa FROM students left join parents on students.id = parents.student_id WHERE students.first_name like '%$search'";
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            die("failed to load data " . $ex->getMessage());
        }
    }
    

}
