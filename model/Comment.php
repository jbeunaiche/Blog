<?php
class Post
{
  private $_id;
  private $_post_id;
  private $_author;
  private $_comment;
  private $_comment_date;
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
    
    
    
    