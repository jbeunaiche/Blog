<?php
class Manager

{
 protected $_db; // Instance de PDO
 public function __construct()

 {
  $this->dbConnect();
 }
 protected function dbConnect()
 {
  $this->_db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
  
 }
 public function getDb()

 {
  return $this->_db;
 }
 public function setDb($db)

 {
  $this->_db = $db;
 }
}