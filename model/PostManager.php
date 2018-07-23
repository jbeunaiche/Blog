<?php
require_once ('Post.php');
require_once('Manager.php');

class PostManager extends Manager
{
  
  
  public function add(Post $post)
  {
    $req = $this->_db->prepare('INSERT INTO post(title, content, created) VALUES(:title, :content, NOW())');
    $req->bindValue(':title', $post->title(), PDO::PARAM_STR);
    $req->bindValue(':content', $post->content(), PDO::PARAM_STR);
    $req->execute();
  } 
    
   public function delete(Post $post)
  {
    $this->_db->exec('DELETE FROM post WHERE id = '.$post->id());
  }
    
  public function edit(Post $post)
  {
    $req = $this->_db->prepare('UPDATE post SET title = :title, content = :content WHERE id = :id');
    $req->bindValue(':title', $post->title(), PDO::PARAM_STR);
    $req->bindValue(':content', $post->content(), PDO::PARAM_STR);
    $req->bindValue(':id', $post->id(), PDO::PARAM_INT);
    $req->execute();
  }
    
  public function getPost($id)
	{
		$req = $this->_db->prepare('SELECT * FROM post WHERE id = :id');
		$req->bindValue(':id', (int) $id);
		$req->execute();
		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');
		$post = $request->fetch();
		$post->setCreated(new DateTime($post->getCreated()));
		return $post;
	}
  
  public function getPosts($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, title, content, created FROM post ORDER BY created DESC LIMIT 0, 5';
    
    // On vérifie l'intégrité des paramètres fournis.
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $req = $this->getDb()->query($sql);
    $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');
    
    $listPosts = $req->fetchAll();

    
    
    
    $req->closeCursor();
    
    return $listPosts;
  }
}