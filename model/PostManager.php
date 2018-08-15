<?php
require_once ('Post.php');

require_once ('Manager.php');

/**
 * Class PostManager
 */
class PostManager extends Manager

{

    /**
     * @param Post $post
     */
    public

	function add(Post $post)
	{
		$req = $this->_db->prepare('INSERT INTO post(title, resume, content, created) VALUES(:title, :resume, :content, NOW())');
		$req->bindValue(':title', $post->getTitle() , PDO::PARAM_STR);
		$req->bindValue(':resume', $post->getResume() , PDO::PARAM_STR);
		$req->bindValue(':content', $post->getContent() , PDO::PARAM_STR);
		$req->execute();
	}

    /**
     * @param Post $post
     */
    public

	function delete(Post $post)
	{
		$this->_db->exec('DELETE FROM post WHERE id = ' . $_GET['id']);
	}

    /**
     * @param Post $post
     */
    public

	function edit(Post $post)
	{
		$req = $this->_db->prepare('UPDATE post SET title = :title, resume = :resume, content = :content WHERE id = :id');
		$req->bindValue(':title', $post->getTitle() , PDO::PARAM_STR);
		$req->bindValue(':resume', $post->getResume() , PDO::PARAM_STR);
		$req->bindValue(':content', $post->getContent() , PDO::PARAM_STR);
		$req->bindValue(':id', $post->getId() , PDO::PARAM_INT);
		$req->execute();
	}


    /**
     * @param $id
     * @return mixed
     */
    public

	function getPost($id)
	{
		$req = $this->_db->prepare('SELECT id, title, resume, content, DATE_FORMAT(created, \'%d/%m/%Y à %Hh%imin%ss\') AS created FROM post WHERE id = :id');
		$req->bindValue(':id', (int)$id);
		$req->execute();
		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Post::class);
		$post = $req->fetch();
		return $post;
		
	}

    /**
     * @param int $debut
     * @param int $limite
     * @return mixed
     */
    public

	function getPosts($debut = - 1, $limite = - 1)
	{   //DATE_FORMAT(created, \'%d/%m/%Y à %Hh%imin%ss\') AS created
		$listPosts = array();
		$i = 0;
		$req = ('SELECT a.id, a.title, a.resume, a.content, DATE_FORMAT(a.created, \'%d/%m/%Y à %Hh%imin%ss\') AS created, COUNT(b.postid) AS nb  FROM post a LEFT JOIN comment b ON b.postid = a.id   GROUP BY
    a.id ORDER BY a.created DESC ');
		if ($debut != - 1 || $limite != - 1)
		{
			$req.= ' LIMIT ' . (int)$limite . ' OFFSET ' . (int)$debut;
		}
		
		$req = $this->getDb()->query($req);
		$req->setFetchMode(PDO::FETCH_ASSOC);
		while ($post = $req->fetch())
		
		{
			
			//$nbcom = new Comment(['id' => $post['id']]);
			$art = new Post(['id' => $post['id'], 'title' => $post['title'], 'resume' => $post['resume'] , 'created' => $post['created'], 'nb' => $post['nb'] ]);
			
			$listPosts[$i++] = $art;
			//var_dump ($post['nb']);
		}
		
		
		
		$req->closeCursor();
		return $listPosts;
	}


}


