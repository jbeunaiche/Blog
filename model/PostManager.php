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
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(created, \'%d/%m/%Y à %Hh%imin%ss\') AS created_fr FROM post ORDER BY created DESC LIMIT 0, 5');

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
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(created, \'%d/%m/%Y à %Hh%imin%ss\') AS created FROM post WHERE id = ?');
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
    $post = $req->execute(array($title, $content, $id));
    return $post; 
    }
/**
* This method if for add new post
* 
* @return post
*/ 
public function addPost($title, $content)
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO post(title, content, created) VALUES(?, ?, NOW())');
        $affectedLines = $newPost->execute(array($title, $content));
        return $affectedLines;
    } 
/**
* This method if for delete post
* 
* @return post
*/     
    public function deletePost()
    {
        $db = $this->dbConnect();
        $delPost = $db->prepare("DELETE FROM post WHERE id= '" . $_GET['id'] . "'");
        $delPost->execute(array());        
    }
}
