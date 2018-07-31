<?php
class Comment

{
 private $id;
 private $postId;
 private $author;
 private $comment;
 private $createdCom;
 private $status;
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
 public function getId()

 {
  return $this->id;
 }
 public function getPostId()

 {
  return $this->postId;
 }
 public function getAuthor()

 {
  return $this->author;
 }
 public function getComment()

 {
  return $this->comment;

 }
 public function getCreatedCom()

 {
  return $this->createdCom;
 }
 public function getStatus()

 {
  return $this->status;
 }
 // Setters
 public function setId($id)

 {
  if ($id > 0)
  {
   $this->id = $id;
  }
 }
 public function setPostid($id)

 {
  if ($id > 0)
  {
   $this->postId = $id;
  }
 }
 public function setAuthor($author)

 {
  if (is_string($author))
  {
   $this->author = $author;
  }
 }
 public function setComment($comment)

 {
  if (is_string($comment))
  {
   $this->comment = $comment;

  }
 }
 public function setCreatedCom($CreatedCom)

 {
  $this->CreatedCom = $CreatedCom;
 }
}