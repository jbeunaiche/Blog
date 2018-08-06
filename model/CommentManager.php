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
    /**
     * Get list signaled comments
     */

    public function getSignaled()
    {
        $req = $this->_db->prepare('SELECT * FROM comment WHERE status > 0');
        $req->execute();
        $signaledList = $req->fetchAll(PDO::FETCH_CLASS, "Comment");
        foreach ($signaledList as $status)
        {
            $status->setCreatedCom(new DateTime($status->getCreatedCom()));
        }
        $req->closeCursor();
        return $signaledList;

    }

}