<?php

  abstract class Text {

    public static function substr($str) {
      $max = 500;
      $len = mb_strlen($str);
      $str = mb_substr($str, 0, $max);

      return $len > $max ? $str . '...' : $str;
    }

  }

?>