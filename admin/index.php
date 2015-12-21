<?php

  require_once '../database.php';
  require_once '../models/articles.php';

  $mysqli = db_connect();

  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = null;
  }

  if ($action == 'add') {
    if (!empty($_POST)) {
      articles_new($mysqli, $_POST);
      header('location: index.php');
    }
    $article['title'] = null;
    $article['date'] = null;
    $article['content'] = null;
    include '../views/article_admin.php';
  } else if ($action == 'edit') {
    if (!isset($_GET['id'])) {
      header('Location: index.php');
    }
    $id = (int)$_GET['id'];
    if (!empty($_POST) && $id > 0) {
      $_POST['id'] = $id;
      articles_edit($mysqli, $_POST);
      header('location: index.php');
    }
    $article = articles_get($mysqli, $id);
    include '../views/article_admin.php';
  } else if ($action == 'delete') {
    if (isset($_GET['id'])) {
      if ((int)$_GET['id'] > 0) {
        articles_delete($mysqli, $_GET['id']);
        header('location: index.php');
      }
    }
    header('location: index.php');
  } else {
    $articles = articles_all($mysqli);
    include '../views/articles_admin.php';
  }
  
?>