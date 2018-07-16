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

function addPost($title, $content)
	{
	$newPost = new PostManager();
	$affectedLines = $newPost->addPost($title, $content);
    $_SESSION['flash'] = 'Article ajouté';
    
	if ($affectedLines === false)
		{
		throw new Exception('Impossible d\'ajouter l\'article!');
		}
	  else
		{
		header('Location: /project_4/index.php?action=admin');
        
		}
	}

function added()
	{
	require ('view/frontend/postViewAdd.php');

	}

function deletePost()
	{
	$delPost = new PostManager();
	$affectedLines = $delPost->deletePost();
	if ($affectedLines === false)
		{
		throw new Exception('Impossible de supprimer');
		}
	  else
		{
		header('Location: /project_4/index.php?action=admin');
		}
	}



function editView($postId) 
{
    $editManager = new PostManager();
    $data = $editManager->getPost($postId);
    
    require('view/frontend/editView.php');
}

function editPost($id, $title, $content) 
{
    $editManager = new PostManager();
    $affectedLines = $editManager->editPost($id, $title, $content);
    if ($affectedLines === false)
		{
		throw new Exception('Erreur');
		}
	  else
		{
		header('Location: /project_4/index.php?action=admin');
		}
}

function deleteComments()
	{
	$delCom = new CommentManager();
	$affectedLines = $delCom->deleteComment();
	if ($affectedLines === false)
		{
		throw new Exception('Impossible de supprimer');
		}
	  else
		{
		header("Location:".$_SERVER['HTTP_REFERER']."");
		}
	}

