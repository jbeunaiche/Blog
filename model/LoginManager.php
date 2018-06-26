<?php
require_once("model/Manager.php");

class LoginManager extends Manager

{
    
public function getMember($mail, $password)
    {
        $db = $this->dbConnect();
        $member = $db->prepare("SELECT pseudo FROM members WHERE mail = ? AND password= ?");
        $password = md5($password);
        $member->execute(array($mail, $password));
        return $member->fetch();
        $_SESSION['pseudo'] = $pseudo;
        session_start();
        }
}