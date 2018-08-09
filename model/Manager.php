<?php

/**
 * Class Manager
 */
class Manager

{
    /**
     * @var
     */
    protected $_db; // Instance de PDO

    /**
     * Manager constructor.
     */
    public function __construct()

 {
  $this->dbConnect();
 }


    protected function dbConnect()
 {
  $this->_db = new PDO('mysql:host=jbeunaicmcblogp4.mysql.db;dbname=jbeunaicmcblogp4;charset=utf8', 'jbeunaicmcblogp4', '');
 }

    /**
     * @return mixed
     */
    public function getDb()

 {
  return $this->_db;
 }

    /**
     * @param $db
     */
    public function setDb($db)

 {
  $this->_db = $db;
 }
}
