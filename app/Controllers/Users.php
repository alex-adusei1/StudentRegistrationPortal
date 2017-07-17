<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author lexis
 */
class Users extends Model{
    function __construct() {
        parent::__construct();
    }
    
    
        public function getAllUsersData(){
        try{
            $student_sql = "SELECT * FROM users";
            $sql = $this->conn->prepare($student_sql);
            $sql->execute();

            $result= $sql->setFetchMode(PDO::FETCH_ASSOC);
            return $sql->fetchAll();

        } catch (PDOException $ex) {
            die("failed to load data " . $ex->getMessage());
        }

    }
}
