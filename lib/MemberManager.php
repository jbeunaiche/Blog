<?php
class UserMembmer
{
  private $_db; // Instance de PDO

    
  public function __construct($db)
  {
    $this->setDb($db);
  }
    
    
    
  public function add(Member $member)
  {
    $req = $this->_db->prepare('INSERT INTO member(pseudo, mail, password) VALUES(:pseudo, :mail, :password');
    $req->bindValue(':pseudo', $member->pseudo(), PDO::PARAM_STR);
    $req->bindValue(':mail', $member->mail(), PDO::PARAM_STR);
    $req->bindValue(':password', $member->password(), PDO::PARAM_STR);
    $req->execute();
  }
    
   public function getMember($id)
	{
		$req = $this->_db->prepare('SELECT * FROM member WHERE id = :id');
		$req->bindValue(':id', (int) $id);
		$req->execute();
		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Member');
		$member = $request->fetch();
		return $member;
	}