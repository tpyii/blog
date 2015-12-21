<?php

  require_once 'database.php';
  require_once 'models/articles.php';

  if (!isset($_GET['id'])) {
    echo 'Не удалось получить идентификатор';
    exit();
  }

  $id = $_GET['id'];

  $mysqli = db_connect();
  $article = articles_get($mysqli, $id);

  include 'views/article.php';

?>