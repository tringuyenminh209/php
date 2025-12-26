<?php

require_once __DIR__ . "/def.php";
require_once __DIR__ . "/utils.php";
require_once __DIR__ . "/kadai06_resource.php";

$productId = filter_input(INPUT_GET, "product_id",FILTER_VALIDATE_INT);
$referer = "kadai06_1.php";

$product = [];
foreach ($products as $v) {
  if ($v["id"] === $productId) {
    $product = $v;
    break;
  }
}

if (empty($product)) {
  header("Location: {$referer}");
  exit;
}

$browsed = [];
if (isset($_COOKIE["php1_kadai06"])) {
  // echo "<pre>";
  // print_r($_COOKIE["php1_kadai06"]);
  // echo "</pre>";
  $browsed = explode(",", $_COOKIE["php1_kadai06"]);
  // $json = json_decode( $_COOKIE[ "php1_kadai06" ] );   // cookieの容量が4KBの為localStrageのような使用方法は止めます（localStrageは5MB）
}


$registerFlg = true;
foreach ($browsed as $v) {
  if ((int)$v === $productId) {
    $registerFlg = false;
    break;
  }
}
if ($registerFlg) {
  $browsed[] = $productId;
}


setcookie("php1_kadai06", implode(",", $browsed), time() + (60 * 1));
// setcookie( "php1_kadai02", json_encode( $json ), time() + (60*1) );
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- TODO:Bootstrap読み込み -->
  <!-- link -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <title>php1 - kadai06_2</title>
</head>

<body>
  <!-- ▼▼ヘッダー▼▼--------------------------------- -->
  <header class="bg-info">
    <div class="text-light ms-5 pt-5 pb-3">
      <h1 class="h6">サーバーサイドスクリプト演習１</h1>
      <h2 class="pt-3">クッキー</h2>
    </div><!--/.text-light ms-5 pt-5 pb-3-->
  </header>
  <!-- ▲▲ヘッダー▲▲--------------------------------- -->

  <!-- ▼▼メイン▼▼----------------------------------- -->
  <main>
    <div class="container-field">
      <h2 class="p-5 d-grid gap-2 d-md-flex border-bottom" style="border-color:deeppink;">取り扱い商品の詳細</h2>
      <div class="p-5 row">
        <div class="col-md-7">
          <!-- 画像 -->
          <figure class="img-fluid"><img class="" style="width:100%;" src="<?= asset("images/{$product["thumbnail"]["small"]}") ?>"></figure>
        </div>

        <div class="col-md-3">
          <div class="row">
            <h3 class=""><?= $product["name"] ?></h3>
            <p class=""><?= $product["description"] ?></p>
            <p class="" style="color:deeppink;">¥<?= $product["price"] ?></p>
            <a class="mt-5 btn btn-secondary" href="<?= $referer ?>">一覧に戻る</a>
          </div>

        </div>
      </div>

    </div>
  </main>
  <!-- ▲▲メイン▲▲----------------------------------- -->
</body>

</html>