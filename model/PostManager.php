<?php
require_once("model/Manager.php");

/**
* This class is for managing post
* @author Julien 
* @version 0.1.1
*/
class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }
/**
* This method if for geting post
* @param postId
* @return post
*/
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
/**
* This method if for edit post
* 
* @return post
*/    
    
    public function editPost($id, $title, $content) 
    {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE post SET title = ?, content = ? WHERE id = ?');
    $post = $req->execute(array($title, $content));
    return $post; 
    }
}