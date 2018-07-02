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
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array(
			$postId
		));
		return $comments;
		}

	public

	function postComment($postId, $author, $comment)
		{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comment(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array(
			$postId,
			$author,
			$comment
		));
		return $affectedLines;
		}
	}

