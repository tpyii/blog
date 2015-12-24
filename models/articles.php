<?php

  require_once __DIR__ . '/../library/DB.php';

  class Articles extends DB {

    public function __construct() {
      parent::__construct();
    }

    public function all() {
      $query = "SELECT id, title, content, date FROM articles ORDER BY id DESC";
      return $this->query($query, get_class($this));
    }

    public function add($data) {
      $title = $this->escape($data['title']);
      $content = $this->escape($data['content']);
      $date = $this->escape($data['date']);
      
      if ($title == '' || $content == '' || $date == '') {
        return false;
      }
      
      $query = "INSERT INTO articles (title, content, date) VALUES('".$title."','".$content."','".$date."')";
      return $this->query($query, get_class($this), true);
    }

    public function get($id) {
      $query = "SELECT id, title, content, date FROM articles WHERE id = ".$id;
      return $this->query($query, get_class($this));
    }

    public function edit($data) {
      $id = $this->escape($data['id']);
      $title = $this->escape($data['title']);
      $content = $this->escape($data['content']);
      $date = $this->escape($data['date']);
      
      if ($title == '' || $content == '' || $date == '') {
        return false;
      }
      
      $query = "UPDATE articles SET title = '".$title."', content = '".$content."', date = '".$date."' WHERE id = ".$id;
      return $this->query($query, get_class($this), true);
    }

    public function delete($id) {
      $query = "DELETE FROM articles WHERE id = ".$id;
      return $this->query($query, get_class($this), true);
    }

    public function intro($str, $len = 500) {
      return mb_substr($str, 0, $len);
    }

  }

?>