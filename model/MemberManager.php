<?php
require_once ('Member.php');

class MemberManager extends Manager

{

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