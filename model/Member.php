<?php
class User
{
  private $_id;
  private $_pseudo;
  private $_mail;
  private $_password;
  
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
        
  public function pseudo()
{
      return $this->_pseudo;
  }
        
  public function mail()
  {
      return $this->_mail;
  }
    
  public function password() 
  {
      return $this->_password;
  }
    
    
  // Setters 
    
  public function setId($id)
      
    
  {       
    if ($id > 0)
    {
      
      $this->_id = $id;
    }
  }  
    
  public function setPseudo($pseudo) 
  {
      if (is_string($pseudo))
    {
      $this->_pseudo = $pseudo;
    }
  } 
  public function setMail($mail) 
  {
      if (is_string($mail))
    {
      $this->_mail = $mail;
    }
  } 
    
  public function setPassword($password) 
  {
      $this->_password = $password;
  }
    
  
}