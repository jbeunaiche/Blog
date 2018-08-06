<?php
require_once ('Post.php');

require_once ('Manager.php');

/**
 * Class PostManager manage class Post
 */
class PostManager extends Manager

{
	/**
	 * Add Post in database
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
	 * Delete post
	 */
	public

	function delete(Post $post)
	{
		$this->_db->exec('DELETE FROM post WHERE id = ' . $_GET['id']);
	}

	/**
	 * Update Post
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
	 * Get single post
	 * @param $id
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
	 * Get lists posts
	 * @param first post
	 */
	public

	function getPosts($debut = - 1, $limite = - 1)
	{
		$req = 'SELECT id, title, resume, content, DATE_FORMAT(created, \'%d/%m/%Y à %Hh%imin%ss\') AS created FROM post ORDER BY created DESC ';
		if ($debut != - 1 || $limite != - 1)
		{
			$req.= ' LIMIT ' . (int)$limite . ' OFFSET ' . (int)$debut;
		}

		$req = $this->getDb()->query($req);
		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');
		$listPosts = $req->fetchAll();
		$req->closeCursor();
		return $listPosts;
	}
}
