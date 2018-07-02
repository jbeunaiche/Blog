<?php
require_once("model/Manager.php");

class LoginManager extends Manager

{
    
public function getMember($pseudo)
    {
        $db = $this->dbConnect();
        $member = $db->prepare("SELECT pseudo, password FROM member WHERE pseudo = ?");
        
        $member->execute(array($pseudo));
    
        return $member->fetch();
        
        
        }
}