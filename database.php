<?php

  define('MYSQL_SERVER', 'localhost');
  define('MYSQL_USER', 'root');
  define('MYSQL_PASSWORD', '');
  define('MYSQL_DB', 'blog');

  function db_connect() {
    $mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
    
    if($mysqli->connect_errno) {
      echo 'Ошибка соединения с базой данных '.$mysqli->connect_error;
      exit();
    }
    
    if(!$mysqli->set_charset('utf8')) {
      echo 'Ошибка при загрузке набора символов utf8 '.$mysqli->connect_error;
    }
    
    return $mysqli;
  }

?>