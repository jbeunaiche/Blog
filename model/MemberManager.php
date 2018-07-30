<?php
require_once ('Member.php');

class MemberManager extends Manager

{
 public function add(Member $member)

 {
  $req = $this->_db->prepare('INSERT INTO member(pseudo, mail, password) VALUES(:pseudo, :mail, :password');
  $req->bindValue(':pseudo', $member->getPseudo() , PDO::PARAM_STR);
  $req->bindValue(':mail', $member->getMail() , PDO::PARAM_STR);
  $req->bindValue(':password', $member->getPassword() , PDO::PARAM_STR);
  $req->execute();
 }
 public function getMember($pseudo)

 {
  $req = $this->_db->prepare('SELECT * FROM member WHERE pseudo = :pseudo');
  $req->bindValue(':pseudo', $pseudo);
  $req->execute();
  $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Member');
  $member = $req->fetch();
  return $member;
 }
}