<?php
require_once ('model/CommentManager.php');

require_once ('tools/Recaptcha.php');

class CommentController
{
  

public function addComment($varComment)
{
 $comment = new Comment($varComment);
 $commentmanager = new CommentManager();
 $commentmanager->addComment($comment);
 if ($commentmanager === false)
 {
  throw new Exception('Impossible d\'ajouter l\'article!');
 }
 else
 {
  $_SESSION['flash'] = 'Commentaire ajouté';
  header("Location:" . $_SERVER['HTTP_REFERER'] . "");
  exit();
 }
}
public function signalCom($postId)
{
 $comment = new Comment($_GET);
 $commentmanager = new CommentManager();
 $commentmanager->signal($comment);
 if ($affectedLines === false)
 {
  throw new Exception('Erreur');
 }
 else
 {
  $_SESSION['flash'] = 'Commentaire signalé !';
  header("Location:" . $_SERVER['HTTP_REFERER'] . "");
  exit();
 }
}
public function deleteComment()
{
 $comment = new Comment($_GET);
 $commentmanager = new CommentManager();
 $commentmanager->delete($comment);
 if ($commentmanager === false)
 {
  throw new Exception('Impossible de supprimer');
 }
 else
 {
  header("Location:" . $_SERVER['HTTP_REFERER'] . "");
 }
}
public function editComment()
{
 $postManager = new PostManager();
 $post = $postManager->getPost($_GET['id']);
 $commentManager = new CommentManager();
 $comment = $commentManager->getComments($_GET['id']);
 require ('view/frontend/commentView.php');

}
public function signaledComments()
{
 $commentmanager = new CommentManager();
 $signaled = $commentmanager->getSignaled();
 require ('view/frontend/signalView.php');
    
}

   }
