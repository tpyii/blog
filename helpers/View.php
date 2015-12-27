<?php

class View {

  public $data = [];

  public function __set($key, $value) {
    $this->data[$key] = $value;
  }

  public function views($file) {
    foreach ($this->data as $key => $value) {
        $$key = $value;
    }
    include __DIR__ . '/../views/' . $file . '.php';
  }

}

?>