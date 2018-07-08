<?php
require_once("model/Manager.php");
/**
* This class is for add delete Post
* @author Julien 
* @version 0.1.1
*/
//class UpdateManager extends Manager
//{
      
   // public function updatePost($title, $content)
  //  {
   //    $db = $this->dbConnect();
    //   $upPost = $db->prepare("UPDATE post SET title='" . $data["title"] . "', content='" . $_POST["content"] . "'");
    //   $upPost->execute(array($title, $content));
        
  // }      
//}

class EditManager extends Manager
{
    
    public function editPost() 
    {
    $db = $this->dbConnect();
    $req = $db->prepare("UPDATE post SET WHERE id= '" . $_GET['id'] . "'");
    $post = $req->execute(array());
    return $post; 
    }
    
}
