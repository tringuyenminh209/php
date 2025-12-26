<?php
  /**
   * 汎用関数を定義する
   */

  /**
   * h
   * htmlspecialcharsの省略
   */
  function h( $str ) {
    return htmlspecialchars( $str, ENT_QUOTES, "UTF-8" );
  }

?>