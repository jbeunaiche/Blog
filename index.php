<?php
session_start();

require('controller/frontend.php');
require('controller/ccc.php');


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
                
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addMember') {
            if (isset($_GET['id']) > 0) {
                
                if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
                    addMember($_POST['pseudo'], $_POST['mail'], $_POST['password']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                registration();
            }
            
        } elseif ($_GET['action'] == 'loginMember') {
            if (isset($_POST['login'])) {
                
                if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                    loginMember($_POST['pseudo'], $_POST['password']);
                   
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                login();
            }
            
        } elseif ($_GET['action'] == 'addPost') {
            if (isset($_SESSION['pseudo'])) {
                if (isset($_GET['id']) > 0) {
                    
                    if (!empty($_POST['title']) && !empty($_POST['content'])) {
                        addPost($_POST['title'], $_POST['content']);
                    }
                    
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    added();
                }
            } else {
                throw new Exception('Accès interdit');
            }
            
        }
        elseif ($_GET['action'] == 'admin') {
            if (isset($_SESSION['pseudo'])) {
                admin();
            } else {
                throw new Exception('Accès interdit');
            }
            
        }
        
        elseif ($_GET['action'] == 'deletePost'){
            if (isset($_SESSION['pseudo'])) {
            deletePost();
        } else{
       throw new Exception('Suppression impossible veuillez vous connecter !');
                    }
        }elseif ($_GET['action'] == 'deleteCom'){
            if (isset($_SESSION['pseudo'])) {
            deleteComments();
        } else{
       throw new Exception('Suppression impossible veuillez vous connecter !');
                    }
        }
        elseif ($_GET['action'] == 'logout'){
            logout();
        }
        
        elseif ($_GET['action'] == 'edit') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            editView($_GET['id']); 
        } else {
            throw new Exception('Erreur');
        }
    }
        
        elseif ($_GET['action'] == 'editPost') {
        if (isset($_POST['id']) && $_POST['id'] > 0) {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                editPost($_POST['id'], $_POST['title'], $_POST['content']);   
               }
            else {
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }
        else {
            throw new Exception('Erreur');
        }
}
        elseif ($_GET['action'] == 'editComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                editComment();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'signalCom') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            signalCom($_GET['id']); 
        } else {
            throw new Exception('Erreur');
        }
    }
    } else {
        listPosts();
    }
}
catch (Exception $e) {
    echo 'Attention : ' . $e->getMessage();
}

unset ($_SESSION['flash']);