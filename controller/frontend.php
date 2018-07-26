<?php

// Chargement des classes

require_once ('model/PostManager.php');

require_once ('model/CommentManager.php');

require_once ('model/MemberManager.php');

require_once ('tools/Recaptcha.php');

function deletePost()
	{
    
	$post = new Post($_GET);
    
    $postmanager = new PostManager();
    $postmanager-> delete($post);
	if ($postmanager === false)
		{
		throw new Exception('Impossible de supprimer');
		}
	  else
		{
		header('Location: /project_4/index.php?action=admin');
		}
	}



function addPost()
	{
	$post = new Post($_POST);
	$postmanager = new PostManager();
    $postmanager-> add($post);
    
	if ($postmanager === false)
		{
		throw new Exception('Impossible d\'ajouter l\'article!');
		}
	  else
		{
        $_SESSION['flash'] = 'Article ajouté';
		header('Location: /project_4/index.php?action=admin');
        exit();
		}
	}

function listPosts()
{
	$postManager = new PostManager(); 
	$posts = $postManager->getPosts(); 
	require ('view/frontend/home.php');

}

function post()
{
    $post = new Post($_GET);
	$postManager = new PostManager();
	$postManager->getPost($post);
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



function added()
	{
	require ('view/frontend/postViewAdd.php');

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
