<?php

require_once ('model/CommentManager.php');
require_once ('tools/Recaptcha.php');



function listsComments()
{
	$commentManager = new CommentManager($_GET); 
	$comments = $commentManager->getComments(); 
	require ('view/frontend/home.php');

}





function signalCom($postId)
{
	$signalCom = new CommentManager();
	$affectedLines = $signalCom->signalComment($postId);
	
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

function editComment()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	require ('view/frontend/commentView.php');

}

function addComment($postId, $author, $comment)
{
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComment($postId, $author, $comment);
	if ($affectedLines === false)
	{
		throw new Exception('Impossible d\'ajouter le commentaire !');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $postId);
	}
}