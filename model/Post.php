	

<?php
class Post

{
 private $id;
 private $title;
 private $resume;
 private $content;
 private $created;
 private $memberid;
  
 public function __construct($value = [])

 {
  if (!empty($value))
  {
   $this->hydrate($value);
  }
 }
 public function hydrate(array $data)

 {
  foreach($data as $key => $value)
  {
   // On récupère le nom du setter correspondant à l'attribut.
   $method = 'set' . ucfirst($key);
   // Si le setter correspondant existe.
   if (method_exists($this, $method))
   {
    // On appelle le setter.
    $this->$method($value);
   }
  }
 }
 // Getters
 public function getId()

 {
  return $this->id;
 }
 public function getTitle()

 {
     return $this->title;
 }
 public function getResume()

 {
  return $this->resume;
 }
 public function getContent()

 {
  return $this->content;
 }
 public function getCreated()

 {
  return $this->created;
 }
 // Setters
 public function setId($id)

 {
  if ($id > 0)
  {
   $this->id = $id;
  }
 }
 public function setTitle($title)

 {
  if (is_string($title))
  {
   $this->title = $title;
  }
 }
     public function setResume($resume)

 {
  if (is_string($resume))
  {
   $this->resume = $resume;
  }
 }
 public function setContent($content)

 {
  if (is_string($content))
  {
   $this->content = $content;
  }
 }
 public function setCreated($created)

 {
  $this->created = $created;
 }
}
