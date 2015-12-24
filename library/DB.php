<?php

class DB {

  const MYSQL_SERVER = 'localhost';
  const MYSQL_USER = 'root';
  const MYSQL_PASSWORD = '';
  const MYSQL_DB = 'blog';

  protected $mysqli;

  public function __construct() {
    $this->mysqli = new mysqli(self::MYSQL_SERVER, self::MYSQL_USER, self::MYSQL_PASSWORD, self::MYSQL_DB);
    
    if($this->mysqli->connect_errno) {
      die('Ошибка соединения с базой данных '.$this->mysqli->connect_error);
    }
    
    if(!$this->mysqli->set_charset('utf8')) {
      echo 'Ошибка при загрузке набора символов utf8 '.$this->mysqli->connect_error;
    }

  }

  public function escape($str) {
    return $this->mysqli->real_escape_string(trim($str));
  }

  public function query($query, $class = 'stdClass', $action = false) {
    if (!$result = $this->mysqli->query($query)) {
      die('Не удалось получить данные '.$this->mysqli->error);
    }
    
    if ($action) {
      return $result->affected_rows;
    }
    
    $rows = $result->num_rows;
    
    if ($rows == 1) {
      $res = $result->fetch_object($class);
    } else {
      while ($row = $result->fetch_object($class)) {
        $res[] = $row;
      }
    }
    
    return $res;
  }

}

?>