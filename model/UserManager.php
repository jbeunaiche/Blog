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
     $members = $db->prepare("INSERT INTO member(pseudo, mail, password, creationTime) VALUES(?, ?, ?, NOW())");
     $options = ['cost' => 12,];
     $password = password_hash($password, PASSWORD_BCRYPT, $options);
     $affectedLines = $members->execute(array($pseudo, $mail, $password)); 
     return $affectedLines; 
    } 
    
    public function getMember($pseudo)
    {
        $db = $this->dbConnect();
        $member = $db->prepare("SELECT pseudo, password FROM member WHERE pseudo = ?");
        
        $member->execute(array($pseudo));
    
        return $member->fetch();
        
        
        }
}