<?php
class Post
{
  private $_id;
  private $_title;
  private $_content;
  private $_created;
  
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

  // Getters  
    
  public function id() 
  {
      return $this->_id;
  }
        
  public function title()
{
      return $this->_title;
  }
        
  public function content()
  {
      return $this->_content;
  }
    
  public function created() 
  {
      return $this->_created;
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
    
  public function setTitle($title) 
  {
      if (is_string($title))
    {
      $this->_title = $title;
    }
  } 

  public function setContent($content) 
  {
      if (is_string($content))
    {
      $this->_content = $content;
    }
  } 
    
  public function setCreated(DateTime, $created) 
  {
      $this->_created = $created;
  } 
}

