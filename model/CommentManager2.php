<?php
class CommentManager
{
  private $_db; // Instance de PDO

    
  public function __construct($db)
  {
    $this->setDb($db);
  }
    
    
  public function add(Comment $comment) {
		$req = $this->_db->prepare('INSERT INTO comment (id, postid, author, comment, createdCom) VALUES(:id, :postid, :author, :comment, NOW())');
		$req->bindValue(':id', $comment->id(), PDO::PARAM_INT);
		$req->bindValue(':postid', $comment->postid(), PDO::PARAM_INT);
		$req->bindValue(':author', $comment->author(), PDO::PARAM_STR);
		$req->bindValue(':comment', $comment->comment(), PDO::PARAM_STR);
		$req->execute();
	}
    
  public function delete(Comment $comment)
  {
    $this->_db->exec('DELETE FROM comment WHERE id = '.$comment->id());
  }
    
    
  