<?php

  require_once __DIR__ . '/models/Articles.php';

  if (!isset($_GET['id'])) {
    header('Location: index.php');
  }

  $id = $_GET['id'];

  $articles = new Articles();
  $article = $articles->get($id);

  include __DIR__ . '/views/article.php';

?>