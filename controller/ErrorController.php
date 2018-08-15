<?php
require_once ('controller/PostController.php');
require_once ('controller/CommentController.php');

 class errorController{
       
    public function error()
    {
        if(function_exists('listPosts') && function_exists('post') && function_exists('addPost') && function_exists('editView') && function_exists('deletePost') && function_exists('editPost') && function_exists('admin')){
            
            
        }
        else{
            header ('Location: view/frontend/page404.php');
        }
    }
}
