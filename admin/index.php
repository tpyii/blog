<?php

  require_once __DIR__ . '/../models/Articles.php';

  $articles = new Articles();

  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = null;
  }

  if ($action == 'add') {

    if (!empty($_POST)) {
      $articles->add($_POST);
      header('location: index.php');
    }

    $article = new stdClass();
    $article->title = null;
    $article->date = null;
    $article->content = null;

    include __DIR__ . '/../views/article_admin.php';

  } else if ($action == 'edit') {

    if (!isset($_GET['id'])) {
      header('Location: index.php');
    }

    $id = (int)$_GET['id'];

    if (!empty($_POST) && $id > 0) {
      $_POST['id'] = $id;
      $articles->edit($_POST);
      header('location: index.php');
    }

    $article = $articles->get($id);

    include __DIR__ . '/../views/article_admin.php';

  } else if ($action == 'delete') {

    if (isset($_GET['id'])) {
      if ((int)$_GET['id'] > 0) {
        $articles->delete($_GET['id']);
      }
    }

    header('location: index.php');

  } else {

    $data = $articles->all();
    include __DIR__ . '/../views/articles_admin.php';

  }
  
?>