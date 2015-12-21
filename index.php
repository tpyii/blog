<?php

  require_once __DIR__ . '/database.php';
  require_once __DIR__ . '/models/articles.php';

  $mysqli = db_connect();
  $articles = articles_all($mysqli);

  include __DIR__ . '/views/articles.php';

?>