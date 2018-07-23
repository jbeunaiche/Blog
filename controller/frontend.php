<?php

// Chargement des classes

require_once ('model/PostManager.php');

require_once ('model/CommentManager.php');

require_once ('model/MemberManager.php');

require_once ('tools/Recaptcha.php');


function listPosts()
{
	$postManager = new PostManager(); // Création d'un objet
	$posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
	require ('view/frontend/home.php');

}

function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	require ('view/frontend/postView.php');

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

function registration()
{
	require ('view/frontend/inscriptionView.php');

}

function addMember($pseudo, $mail, $password)
{
	$memberManager = new MemberManager();
	$affectedLines = $memberManager->newMember($pseudo, $mail, $password);
	if ($affectedLines === false)
	{
		throw new Exception('Impossible d\'ajouter le membre !');
	}
	else
	{
		header('Location: index.php');
	}
}

function loginMember($pseudo, $password)
{
    
	
	if (isset($_POST['login']))
	{
		if (isset($_POST['g-recaptcha-response']))
		{
			$recaptcha = new Recaptcha();
			$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
			
		}
		else
		{
			var_dump($_POST);
            exit();
		}
	}

	
		$logManager = new MemberManager();
		$user = $logManager->getMember($pseudo);
		if (password_verify($password, $user['password']))
		{
			$_SESSION['pseudo'] = $user[0];
			header('Location: /project_4/index.php?action=admin');
		}
		else
		{
			echo 'Le mot de passe est invalide.';
		}
	
}

function login()
{
	require ('view/frontend/connectionView.php');

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
