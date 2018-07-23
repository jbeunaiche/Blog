<?php
class Post
{
  private $_id;
  private $_postid;
  private $_author;
  private $_comment;
  private $_createdCom;
  private $_status;
  
  public function __construct($value = [])
	{
		if(!empty($value))
		{
			$this->hydrate($value);
		}
	}
    
  public function hydrate(array $data)
{
  foreach ($data as $key => $value)
  {
    // On récupère le nom du setter correspondant à l'attribut.
    $method = 'set'.ucfirst($key);
        
    // Si le setter correspondant existe.
    if (method_exists($this, $method))
    {
      // On appelle le setter.
      $this->$method($value);
    }
  }
}
    public function id() 
  {
      return $this->_id;
  }
        
  public function postid()
{
      return $this->_postid;
  }
        
  public function author()
  {
      return $this->_author;
  }
    
  public function comment() 
  {
      return $this->_comment;
  }
    public function createdCom() 
  {
      return $this->_createdCom;
  }
    public function status() 
  {
      return $this->_status;
  }
 
    
  // Setters 
    
  public function setId($id)
      
    $id = (int)$id;
  {       
    if ($id > 0)
    {
      
      $this->_id = $id;
    }
  }
    public function setPostid($id)
      
    $id = (int)$id;
  {       
    if ($id > 0)
    {
      
      $this->_postid = $postid;
    }
  }  
    
  public function setAuthor($author) 
  {
      if (is_string($author))
    {
      $this->_author = $author;
    }
  } 

  public function setComment($comment) 
  {
      if (is_string($comment))
    {
      $this->_comment = $comment;
    }
  } 
    
  public function setCreatedCom(DateTime, $CreatedCom) 
  {
      $this->_CreatedCom = $CreatedCom;
  }
   
		}

    
    
    
    