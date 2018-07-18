<?php
class Post
{
  private $_id;
  private $_title;
  private $_content;
  private $_creation_date;
  
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
    
  public function creation_date() 
  {
      return $this->_creation_date;
  }
 
    
  // Setters 
    
  public function setId($id) 
  {
      
  }  
    
  public function setTitle($title) 
  {
      
  } 

  public function setContent($content) 
  {
      
  } 
    
  public function setCreationDate($creation_date) 
  {
      
  } 
}