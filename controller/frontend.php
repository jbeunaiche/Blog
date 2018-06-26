<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/RegisterManager.php');
require_once('model/LoginManager.php');
require_once('model/AddManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/home.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function registration()
{
    require('view/frontend/inscriptionView.php');
    
}

function addMember($pseudo, $mail, $password)
{
    $memberManager = new RegisterManager();

    $affectedLines = $memberManager->newMember($pseudo, $mail, $password);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le membre !');
    }
    else {
        header('Location: index.php');
    }
}
function loginMember($pseudo, $password)
{
    $logManager = new LoginManager();    
    $user = $logManager->getMember($pseudo, $password);
    
    header ('Location: index.php');
    
}
function login()
{
    require('view/frontend/connectionView.php');
}
function addPost($title, $content)
{
    $newPost = new AddManager();
    $affectedLines = $newPost->addPost($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article!');
    }
    else {
        header('Location: index.php');
    }
}
function added()
{
    require('view/frontend/postViewAdd.php');
    
}
