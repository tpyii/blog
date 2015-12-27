<?php

  class CArticles {

    public function all($admin = false) {
      $class = new MArticles;
      $data = $class->all();
      $view = new View;
      $view->data = $data;
      if($admin) {
        $view->views('articles_admin');
      } else {
        $view->views('articles');
      }
    }

    public function one() {
      $id = (int)$_GET['id'];
      if($id > 0) {
        $class = new MArticles;
        $data = $class->one($id);
        $view = new View;
        $view->data = $data;
        $view->views('article');
      }
    }

    public function add() {
      if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
          if($value == '')
            header('location: index.php');
        }
        $class = new MArticles;
        $class->add($_POST);
        header('location: index.php');
      }
      $view = new View;
      $view->title = null;
      $view->date = null;
      $view->content = null;
      $view->views('article_admin');
    }

    public function edit() {
      if (!isset($_GET['id'])) {
        header('Location: index.php');
      }
      $class = new MArticles;
      if (!empty($_POST) && (int)$_GET['id'] > 0) {
        $_POST['id'] = $_GET['id'];
        foreach ($_POST as $key => $value) {
          if($value == '')
            header('location: index.php');
        }
        $class->edit($_POST);
        header('location: index.php');
      }
      $view = new View;
      $view->data = $class->one($_GET['id']);
      $view->views('article_admin');
    }

    public function delete() {
      if (isset($_GET['id'])) {
        if ((int)$_GET['id'] > 0) {
          $class = new MArticles;
          $class->delete($_GET['id']);
        }
      }
      header('location: index.php');
    }

  }

?>