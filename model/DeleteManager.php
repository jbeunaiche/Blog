<?php
require_once("model/Manager.php");
/**
* This class is for add delete Post
* @author Julien 
* @version 0.1.1
*/
class DeleteManager extends Manager
{
    
    public function deletePost()
    {
        $db = $this->dbConnect();
        $delPost = $db->prepare("DELETE FROM post WHERE id= '" . $_GET['id'] . "'");
        $delPost->execute(array());        
    }      
}