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

/**
 * asset  
 * assetフォルダ内のURLを生成
 * 2021.09.21
 */
function asset( $path ) {
  return ASSET_URL . "/{$path}"; 
}
