<?php

  require_once __DIR__ . '/database.php';
  require_once __DIR__ . '/models/articles.php';

  if (!isset($_GET['id'])) {
    echo 'Не удалось получить идентификатор';
    exit();
  }

  $id = $_GET['id'];

  $mysqli = db_connect();
  $article = articles_get($mysqli, $id);

  include __DIR__ . '/views/article.php';

?>