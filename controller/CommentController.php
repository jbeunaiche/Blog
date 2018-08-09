<?php
require_once('model/CommentManager.php');
require_once('tools/Recaptcha.php');

/**
 * Class CommentController
 */
class CommentController
{
    /**
     * @param $varComment
     * @throws Exception
     */
    public function addComment($varComment)
    {
        $comment        = new Comment($varComment);
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
    public function change($postId)
    {
        $comment        = new Comment($_GET);
        $commentmanager = new CommentManager();
        $commentmanager->change($comment);
        if ($commentmanager === false)
        {
            throw new Exception('Erreur');
        }
        else
        {
            
            header("Location:" . $_SERVER['HTTP_REFERER'] . "");
            
        }
    }
    /**
     * @param $postId
     * @throws Exception
     */
    public function signalCom($postId)
    {
        $comment        = new Comment($_GET);
        $commentmanager = new CommentManager();
        $commentmanager->signal($comment);
        if ($commentmanager === false)
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

    /**
     * @throws Exception
     */
    public function deleteComment()
    {
        $comment        = new Comment($_GET);
        $commentmanager = new CommentManager();
        $commentmanager->delete($comment);
        if ($commentmanager === false)
        {
            throw new Exception('Impossible de supprimer');
        }
        else
        {
            $_SESSION['flash'] = 'Commentaire effacé !';
            header("Location:" . $_SERVER['HTTP_REFERER'] . "");
            exit();
        }
    }

    public function editComment()
    {
        $postManager    = new PostManager();
        $post           = $postManager->getPost($_GET['id']);
        $commentManager = new CommentManager();
        $comment        = $commentManager->getComments($_GET['id']);
        require('view/frontend/comment-view.php');
        
    }

    public function signaledComments()
    {
        
        $commentmanager = new CommentManager();
        $signaled       = $commentmanager->getSignaled();
        require('view/frontend/signal-view.php');
        
    }
    
     

}
