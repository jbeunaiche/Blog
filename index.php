<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
       
        elseif ($_GET['action'] == 'addMember') 
        
        {
            if(isset($_GET['id']) > 0){
               
                if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
                    addMember($_POST['pseudo'], $_POST['mail'], $_POST['password']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else   {
                registration();
            } 
                
        }
        elseif ($_GET['action'] == 'loginMember') 
        
        {
            if(isset($_POST['register'])){
              
                if (!empty($_POST['pseudo']) &&  !empty($_POST['password'])) {
                 loginMember($_POST['pseudo'], $_POST['password']);
                 
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else   {
                login();
            } 
                
        }
        
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
