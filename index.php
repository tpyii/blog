<?php

  require_once __DIR__ . '/autoload.php';

  $controller = isset($_GET['controller']) ? $_GET['controller'] : 'CArticles';
  $action = isset($_GET['action']) ? $_GET['action'] : 'all';

  $controller = new $controller;
  $controller->$action();

?>