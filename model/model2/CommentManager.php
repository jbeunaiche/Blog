<?php
require_once ("model/Manager.php");

/**
 * This class is for add comments to posts
 * @author Julien
 * @version 0.1.1
 */
class CommentManager extends Manager

	{
	public

	function getComments($postId)
		{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(createdCom, \'%d/%m/%Y à %Hh%imin%ss\') AS createdCom FROM comment WHERE post_id = ? ORDER BY createdCom DESC');
		$comments->execute(array(
			$postId
		));
		return $comments;
		}

	public

	function postComment($postId, $author, $comment)
		{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comment(post_id, author, comment, createdCom) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array(
			$postId,
			$author,
			$comment
		));
		return $affectedLines;
		}
    
    public function deleteComment()
    {
        $db = $this->dbConnect();
        $delCom = $db->prepare("DELETE FROM comment WHERE id= '" . $_GET['id'] . "'");
        $delCom->execute(array());        
    } 
    
	

    public function signalComment($postId) {
    $db = $this->dbConnect();
    $comment = $db->prepare("UPDATE comment SET status='1' WHERE id=".$_GET['id']);
    $affectedLines = $comment->execute(array($postId));
    return $affectedLines;
}
}