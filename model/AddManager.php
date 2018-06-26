<?php
require_once("model/Manager.php");
/**
* This class is for add new Post
* @author Julien 
* @version 0.1.1
*/
class AddManager extends Manager
{
    
    public function addPost($title, $content)
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $affectedLines = $newPost->execute(array($title, $content));
        return $affectedLines;
    }      
}