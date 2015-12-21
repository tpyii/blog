<?php

  function articles_all($mysqli) {
    $query = "SELECT id, title, content, date FROM articles ORDER BY id DESC";
    return query($mysqli, $query);
  }

  function articles_new($mysqli, $data) {
    $title = $mysqli->real_escape_string(trim($data['title']));
    $content = $mysqli->real_escape_string(trim($data['content']));
    $date = $mysqli->real_escape_string(trim($data['date']));
    
    if ($title == '' || $content == '' || $date == '') {
      return false;
    }
    
    $query = "INSERT INTO articles (title, content, date) VALUES('".$title."','".$content."','".$date."')";
    return query($mysqli, $query, 'change');
  }

  function articles_get($mysqli, $id) {
    $query = "SELECT id, title, content, date FROM articles WHERE id = ".$id;
    return query($mysqli, $query);
  }

  function articles_edit($mysqli, $data) {
    $id = $mysqli->real_escape_string(trim($data['id']));
    $title = $mysqli->real_escape_string(trim($data['title']));
    $content = $mysqli->real_escape_string(trim($data['content']));
    $date = $mysqli->real_escape_string(trim($data['date']));
    
    if ($title == '' || $content == '' || $date == '') {
      return false;
    }
    
    $query = "UPDATE articles SET title = '".$title."', content = '".$content."', date = '".$date."' WHERE id = ".$id;
    return query($mysqli, $query, 'change');
  }

  function articles_delete($mysqli, $id) {
    $query = "DELETE FROM articles WHERE id = ".$id;
    return query($mysqli, $query, 'change');
  }

  function query($mysqli, $query, $action = null) {
    if (!$result = $mysqli->query($query)) {
      echo 'Не удалось получить данные '.$mysqli->error;
      exit();
    }
    
    if ($action == 'change') {
      return $result->affected_rows;
    }
    
    $rows = $result->num_rows;
    
    if ($rows == 1) {
      $res = $result->fetch_assoc();
    } else {
      while ($row = $result->fetch_assoc()) {
        $res[] = $row;
      }
    }
    
    return $res;
  }

function articles_intro($str, $len = 500) {
  return mb_substr($str, 0, $len);
}

?>