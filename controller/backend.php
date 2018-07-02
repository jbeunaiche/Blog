<?php

require_once ('model/PostManager.php');

function admin()
{
    $postManager = new PostManager(); // Création d'un objet
	$posts = $postManager->getPosts();
    
    require ('view/frontend/admin.php');
    
}


function logout()
{
    unset($_SESSION['pseudo']);
    $_SESSION['flash'] = 'Vous avez été déconnecté';
    header ('Location: /project_4/index.php');
    exit();
}