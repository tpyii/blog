<?php

class DB {

  protected $dbh;

  public function __construct() {
    $this->dbh = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
  }

  public function query($query, $data = [], $class = 'stdClass', $action = false) {
    $sth = $this->dbh->prepare($query);
    $sth->execute($data);
    if($action)
      $sth->fetchAll();
    else
      return $sth->fetchAll(PDO::FETCH_CLASS, $class);
  }

}

?>