<?php
require_once ('model/MemberManager.php');

require_once ('tools/Recaptcha.php');

/**
 * Class MemberController
 */
class MemberController
{
    public function logout ()
    {
        unset($_SESSION['pseudo']);
        $_SESSION['flash'] = 'Vous avez été déconnecté';
        header ('Location: index.php');
        exit();
    }

    /**
     * @param $pseudo
     * @param $password
     * @throws Exception
     */
    public function loginMember ($pseudo, $password)
    {
        if (isset($_POST['login'])) {
            if (isset($_POST['g-recaptcha-response'])) {
                $recaptcha = new Recaptcha();
                $resp = $recaptcha->verify ($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            } else {
                var_dump ($_POST);
                exit();
            }
        }
        $logManager = new MemberManager();
        $user = $logManager->getMember ($pseudo);
        if (password_verify ($password, $user['password'])) {
            $_SESSION['pseudo'] = $user[0];
            header ('Location: index.php?action=admin');
        } else {
            echo 'Le mot de passe est invalide.';
        }
    }

    public function login ()
    {
        require ('view/frontend/connection-view.php');

    }
}