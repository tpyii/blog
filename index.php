<?php

  require_once 'database.php';
  require_once 'models/articles.php';

  $mysqli = db_connect();
  $articles = articles_all($mysqli);

  include 'views/articles.php';

?>