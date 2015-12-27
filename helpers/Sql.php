<?php

  class Sql {

    protected static $table;

    public function all() {
      $db = new DB;
      $query = "SELECT * FROM " . static::$table;
      return $db->query($query, null, get_called_class());
    }

    public function one($id) {
      $db = new DB;
      $query = "SELECT * FROM " . static::$table . " WHERE id = :id";
      return $db->query($query, ['id' => $id], get_called_class())[0];
    }

    public function add($data) {
      $keys = array_keys($data);
      foreach ($keys as $key => $value) {
        $values[$key] = ':' . $value;
      }

      $db = new DB;
      $query = "INSERT INTO " . static::$table . " (" . implode(', ', $keys) . ") VALUES(" . implode(', ', $values) . ")";
      return $db->query($query, $data, null, true);
    }

    public function edit($data) {
      $keys = array_keys($data);
      foreach ($keys as $key => $value) {
        $values[$key] = ':' . $value;
      }

      foreach ($keys as $key => $value) {
        if($value == 'id')
          $id[$key] = $value . ' = ' . $values[$key];
        else
          $set[$key] = $value . ' = ' . $values[$key];
      }

      $db = new DB;
      $query = "UPDATE " . static::$table . " SET " . implode(', ', $set) . " WHERE " . implode(', ', $id);
      return $db->query($query, $data, null, true);
    }

    public function delete($id) {
      $db = new DB;
      $query = "DELETE FROM " . static::$table . " WHERE id = :id";
      return $db->query($query, ['id' => $id], null, true);
    }

  }

?>