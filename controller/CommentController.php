<?php
require_once ('model/CommentManager.php');

require_once ('tools/Recaptcha.php');

function addComment()
{
 $comment = new Comment($_POST);
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
function signalCom($postId)
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
function deleteComment()
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
function editComment()
{
 $postManager = new PostManager();
 $post = $postManager->getPost($_GET['id']);
 $commentManager = new CommentManager();
 $comment = $commentManager->getComments($_GET['id']);
 require ('view/frontend/commentView.php');

}
function signaledComments()
{
 $commentmanager = new CommentManager();
 $signaled = $commentmanager->getSignaled();
 require ('view/frontend/signalView.php');
    
}

 
