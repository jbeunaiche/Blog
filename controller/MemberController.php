<?php
require_once ('model/MemberManager.php');

require_once ('tools/Recaptcha.php');
class MemberController
{
public function logout()
{
 unset($_SESSION['pseudo']);
 $_SESSION['flash'] = 'Vous avez été déconnecté';
 header('Location: /project_4/index.php');
 exit();
}
public function registration()
{
 require ('view/frontend/inscriptionView.php');

}
public function addMember($pseudo, $mail, $password)
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
public function loginMember($pseudo, $password)
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
}