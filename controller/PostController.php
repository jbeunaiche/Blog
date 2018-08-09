<?php
// Chargement des classes

require_once('model/PostManager.php');

require_once('model/CommentManager.php');

require_once('model/MemberManager.php');

require_once('tools/Recaptcha.php');

class PostController
{

    public function listPosts()
    {
        $postManager = new PostManager($_GET);
        $posts       = $postManager->getPosts();   
        require('view/frontend/home.php');

    }

    public function post()
    {
        $postManager    = new PostManager();
        $post           = $postManager->getPost($_GET['id']);
        $commentManager = new CommentManager();
        $comment        = $commentManager->getComments($_GET['id']);
        require('view/frontend/post-view.php');

    }

    /**
     * @throws Exception
     */
    public function addPost()
    {
        $post        = new Post($_POST);
        $postmanager = new PostManager();
        $postmanager->add($post); // Méthode add
        if ($postmanager === false)
        {
            throw new Exception('Impossible d\'ajouter l\'article!');
        }
        else
        {
            $_SESSION['flash'] = 'Article ajouté';
            header('Location: index.php?action=admin');
            exit();
        }
    }

    public function added()
    {
        require('view/frontend/post-view-add.php');

    }

    /**
     * @throws Exception
     */
    public function deletePost()
    {
        $post        = new Post($_GET);
        $postmanager = new PostManager();
        $postmanager->delete($post);
        if ($postmanager === false)
        {
            throw new Exception('Impossible de supprimer');
        }
        else
        {
            header('Location: index.php?action=admin');
        }
    }
    /**
     * @param $postId
     */
    public function editView($postId)
    {
        $postManager = new PostManager();
        $post        = $postManager->getPost($_GET['id']);
        require('view/frontend/edit-view.php');

    }

    /**
     * @throws Exception
     */
    public function editPost()
    {
        $post        = new Post($_POST);
        $postmanager = new PostManager();
        $postmanager->edit($post);
        if ($postmanager === false)
        {
            throw new Exception('Erreur');
        }
        else
        {
            header('Location: index.php?action=admin');
        }
    }

    public function admin()
    {
        $postManager = new PostManager(); // Création d'un objet
        $posts       = $postManager->getPosts();
        require('view/frontend/admin.php');

    }
}