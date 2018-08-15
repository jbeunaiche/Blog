<?php
require_once ('controller/PostController.php');
require_once ('controller/CommentController.php');

 class errorController{
       
    public function error()
    {
        
      
            header ('Location: view/frontend/page404.php');
        }
    }

