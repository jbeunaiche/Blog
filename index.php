<?php
session_start();
require('controller/PostController.php');
require('controller/MemberController.php');
require('controller/CommentController.php');

$commentController = new CommentController();
$postController    = new PostController();
$memberController  = new MemberController();
try
{
    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'listPosts')
        {
            $postController->listPosts();
        }
        elseif ($_GET['action'] == 'post')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $postController->post();
            }
            else
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'signaledComments')
        {
            if (isset($_SESSION['pseudo']))
            {
                $commentController->signaledComments();
            }
            else
            {
                throw new Exception('Accès impossible veuillez vous connecter !');
            }
        }
        elseif ($_GET['action'] == 'addComment')
        {
            if (isset($_POST['postId']) > 0)
            {
                if (!empty($_POST['author']) && !empty($_POST['comment']))
                {
                    $commentController->addComment($_POST);
                }
                else
                {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else
            {
                throw new Exception('Erreur');
            }
        }
        elseif ($_GET['action'] == 'loginMember')
        {
            if (isset($_POST['login']))
            {
                if (!empty($_POST['pseudo']) && !empty($_POST['password']))
                {
                    $memberController->loginMember($_POST['pseudo'], $_POST['password']);
                }
                else
                {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else
            {
                $memberController->login();
            }
        }
        elseif ($_GET['action'] == 'addPost')
        {
            if (isset($_SESSION['pseudo']))
            {
                if (isset($_GET['id']) > 0)
                {
                    if (!empty($_POST['title']) && !empty($_POST['resume']) && !empty($_POST['content']))
                    {
                        $postController->addPost($_POST['title'], $_POST['resume'], $_POST['content']);
                    }
                    else
                    {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
                else
                {
                    $postController->added();
                }
            }
            else
            {
                throw new Exception('Accès interdit');
            }
        }
        elseif ($_GET['action'] == 'admin')
        {
            if (isset($_SESSION['pseudo']))
            {
                $postController->admin();
            }
            else
            {
                throw new Exception('Accès interdit');
            }
        }
        elseif ($_GET['action'] == 'deletePost')
        {
            if (isset($_SESSION['pseudo']))
            {
                $postController->deletePost();
            }
            else
            {
                throw new Exception('Suppression impossible veuillez vous connecter !');
            }
        }
        elseif ($_GET['action'] == 'deleteCom')
        {
            if (isset($_SESSION['pseudo']))
            {
                $commentController->deleteComment();
            }
            else
            {
                throw new Exception('Suppression impossible veuillez vous connecter !');
            }
        }
        elseif ($_GET['action'] == 'logout')
        {
            $memberController->logout();
        }
        elseif ($_GET['action'] == 'edit')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $postController->editView($_GET['id']);
            }
            else
            {
                throw new Exception('Erreur');
            }
        }
        elseif ($_GET['action'] == 'editPost')
        {
            if (isset($_POST['id']) && $_POST['id'] > 0)
            {
                if (!empty($_POST['title']) && !empty($_POST['resume']) && !empty($_POST['content']))
                {
                    $postController->editPost($_POST['id'], $_POST['resume'], $_POST['title'], $_POST['content']);
                }
                else
                {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }
            else
            {
                throw new Exception('Erreur');
            }
        }
        elseif ($_GET['action'] == 'editComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $commentController->editComment();
            }
            else
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'signalCom')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $commentController->signalCom($_GET['id']);
            }
            else
            {
                throw new Exception('Erreur');
            }
        }
    }
    else
    {
        $postController->listPosts();
    }
}
catch (Exception $e)
{
    echo 'Attention : ' . $e->getMessage();
}
unset($_SESSION['flash']);