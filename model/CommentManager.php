<?php
require_once('Comment.php');

/**
 * Class CommentManager
 */
class CommentManager extends Manager
{
    /**
     * Get comments from specific post
     * @param $postid
     */
    public function getComments($postid)
    {
        $req = $this->_db->prepare('SELECT id, postid, author, comment, DATE_FORMAT(createdCom, \'%d/%m/%Y à %Hh%imin%ss\') AS createdCom  FROM comment WHERE postid = :postid ORDER BY createdCom DESC');
        $req->bindValue(':postid', (int) $postid);
        $req->execute();
        $listsComments = $req->fetchAll(PDO::FETCH_CLASS, "Comment");
        $req->closeCursor();
        return $listsComments;
    }

    /**
     * @param Comment $comment
     */
    public function addComment(Comment $comment)
    {
        $req = $this->_db->prepare('INSERT INTO comment (postid, author, comment, createdCom) VALUES(:postid, :author, :comment, NOW())');
        $req->bindValue(':author', $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
        $req->bindValue(':postid', $comment->getPostId(), PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * @param Comment $comment
     */
    public function delete(Comment $comment)
    {
        $this->_db->exec('DELETE FROM comment WHERE id = ' . $_GET['id']);
    }

    /**
     * @param $comment
     */
    public function signal($comment)
    {
        $req = $this->_db->prepare('UPDATE comment SET status = 1  WHERE id = :id ');
        $req->bindValue(':id', (int) $comment->getId());
        $req->execute();
    }
    public function change($comment)
    {
        $req = $this->_db->prepare('UPDATE comment SET status = 0  WHERE id = :id ');
        $req->bindValue(':id', (int) $comment->getId());
        $req->execute();
    }
    /**
     * Get list signaled comments
     */

    public function getSignaled()
    {
        $signaledList = array();
        $req = $this->_db->query('SELECT comment.*, post.title FROM comment LEFT JOIN post ON comment.postid = post.id WHERE status > 0');
        $i = 0; 
        $req->setFetchMode(PDO::FETCH_ASSOC);
        while ($comment = $req->fetch());
        {
            $post = new Post(['title' => $comment['title']]);
            $com = new Comment(['author' => $comment['author'], 'comment' => $comment['comment'] , 'createdCom' => $comment['createdCom'] , 'status' =>$comment['status'], 'post' => $post ]);
            $signaledList[$i++]= $com;
                var_dump ($comment);
        }
        $req->closeCursor();
        return $signaledList;

    }
  /** 
    public function countComments($postid)
    {
		$req = $this->_db->prepare('SELECT COUNT(*) FROM comment WHERE postid = :postid');
		$req->bindValue(':postid', $postid);
		$req->execute();
		return $req->fetchColumn();
	}
 */
    
}