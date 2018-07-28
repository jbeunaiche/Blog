<?php
require_once ('Comment.php');

class CommentManager extends Manager
{
  
 
    
public function getComments($postid) {
		$req = $this->_db->prepare('SELECT id, postid, author, comment, createdCom FROM comment WHERE postid = :postid ');
		$req->bindValue(':postid', (int) $postid);
		$req->execute();
		$listsComments = $req->fetchAll(PDO::FETCH_CLASS, "Comment");
		// On boucle pour obtenir les commentaires enfants et leur assigner une date de publication formatable (DateTime Object).
		foreach($listsComments as $comment) {
			
			$comment->setCreatedCom(new DateTime($comment->getCreatedCom()));
		}
		$req->closeCursor();
		return $listsComments;
	}
    
    
    
    
    
    
    
  public function add(Comment $comment) {
		$req = $this->_db->prepare('INSERT INTO comment (id, postid, author, comment, createdCom) VALUES(:id, :postid, :author, :comment, NOW())');
		$req->bindValue(':id', $comment->id(), PDO::PARAM_INT);
		$req->bindValue(':postid', $comment->getPostid(), PDO::PARAM_INT);
		$req->bindValue(':author', $comment->getAuthor(), PDO::PARAM_STR);
		$req->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
		$req->execute();
	}
    
  public function delete(Comment $comment)
  {
    $this->_db->exec('DELETE FROM comment WHERE id = '.$comment->getId());
  }
    
    
    
    public function signal($comment) {
		$req = $this->_db->prepare('UPDATE comment SET status = 1  WHERE id = :id ');
		$req->bindValue(':id', (int) $comment->getId());
		$req->execute();
	}
}