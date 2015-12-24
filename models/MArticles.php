<?php

  class MArticles {

    public static function all() {
      $db = new DB;
      $query = "SELECT id, title, content, date FROM articles ORDER BY id DESC";
      return $db->query($query, 'Articles');
    }

    public static function add($data) {
      $db = new DB;
      $title = $db->escape($data['title']);
      $content = $db->escape($data['content']);
      $date = $db->escape($data['date']);
      
      if ($title == '' || $content == '' || $date == '') {
        return false;
      }
      
      $query = "INSERT INTO articles (title, content, date) VALUES('".$title."','".$content."','".$date."')";
      return $db->query($query, 'Articles', true);
    }

    public static function get($id) {
      $db = new DB;
      $query = "SELECT id, title, content, date FROM articles WHERE id = ".$id;
      return $db->query($query, 'Articles');
    }

    public static function edit($data) {
      $db = new DB;
      $id = $db->escape($data['id']);
      $title = $db->escape($data['title']);
      $content = $db->escape($data['content']);
      $date = $db->escape($data['date']);
      
      if ($title == '' || $content == '' || $date == '') {
        return false;
      }
      
      $query = "UPDATE articles SET title = '".$title."', content = '".$content."', date = '".$date."' WHERE id = ".$id;
      return $db->query($query, 'Articles', true);
    }

    public static function delete($id) {
      $db = new DB;
      $query = "DELETE FROM articles WHERE id = ".$id;
      return $db->query($query, 'Articles', true);
    }

  }

?>