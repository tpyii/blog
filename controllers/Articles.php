<?php

  class Articles {

    public function all($admin = false) {
      $data = MArticles::all();
      if($admin) {
        include __DIR__ . '/../views/articles_admin.php';
      } else {
        include __DIR__ . '/../views/articles.php';
      }
    }

    public function one() {
      $id = (int)$_GET['id'];
      if($id > 0) {
        $article = MArticles::get($id);
        include __DIR__ . '/../views/article.php';
      }
    }

    public function add() {
      if (!empty($_POST)) {
        MArticles::add($_POST);
        header('location: index.php');
      } else {
        $article = new stdClass();
        $article->title = null;
        $article->date = null;
        $article->content = null;

        include __DIR__ . '/../views/article_admin.php';
      }
    }

    public function edit() {
      if (!isset($_GET['id'])) {
        header('Location: index.php');
      }

      $id = (int)$_GET['id'];

      if (!empty($_POST) && $id > 0) {
        $_POST['id'] = $id;
        MArticles::edit($_POST);
        header('location: index.php');
      }

      $article = MArticles::get($id);
      include __DIR__ . '/../views/article_admin.php';
    }

    public function delete() {
      if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        if ($id > 0) {
          MArticles::delete($id);
        }
      }

      header('location: index.php');
    }

  }

?>