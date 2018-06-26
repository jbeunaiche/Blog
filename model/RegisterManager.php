<?php
require_once("model/Manager.php");

/**
* This class is for Register
* @author Julien 
* @version 0.1.1
*/
class RegisterManager extends Manager

{ 
    public function newMember($pseudo, $mail, $password) 
    { 
     $db = $this->dbConnect();
     $members = $db->prepare("INSERT INTO members(pseudo, mail, password, creationTime) VALUES(?, ?, ?, NOW())");
     $password = md5($password);
     $affectedLines = $members->execute(array($pseudo, $mail, $password)); 
     return $affectedLines; 
    } 
}