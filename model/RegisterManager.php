<?php
require_once("model/Manager.php");

class RegisterManager extends Manager

{ 
    public function newMember($pseudo, $mail, $password) 
    { 
     $db = $this->dbConnect();
     $members = $db->prepare("INSERT INTO members(pseudo, mail, password, creationTime) VALUES(?, ?, ?, NOW())");
     $affectedLines = $members->execute(array($pseudo, $mail, $password)); 
     return $affectedLines; 
    } 
}