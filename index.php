<?php

  require_once __DIR__ . '/models/Articles.php';

  $articles = new Articles();
  $data = $articles->all();

  include __DIR__ . '/views/articles.php';

?>