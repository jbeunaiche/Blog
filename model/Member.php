<?php
class User

{
 private $id;
 private $pseudo;
 private $mail;
 private $password;
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
 public function id()

 {
  return $this->id;
 }
 public function pseudo()

 {
  return $this->pseudo;
 }
 public function mail()

 {
  return $this->mail;
 }
 public function password()

 {
  return $this->password;
 }
 // Setters
 public function setId($id)

 {
  if ($id > 0)
  {
   $this->id = $id;
  }
 }
 public function setPseudo($pseudo)

 {
  if (is_string($pseudo))
  {
   $this->pseudo = $pseudo;
  }
 }
 public function setMail($mail)

 {
  if (is_string($mail))
  {
   $this->mail = $mail;
  }
 }
 public function setPassword($password)

 {
  $this->password = $password;
 }
}