<?php

  require_once __DIR__ . '/../autoload.php';

  $controller = $_GET['controller'] ? $_GET['controller'] : 'Articles';
  $action = $_GET['action'] ? $_GET['action'] : 'all';

  $controller = new $controller;
  $controller->$action(true);
  
?>