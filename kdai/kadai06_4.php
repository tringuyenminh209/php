<?php

require_once __DIR__ . "/def.php";
require_once __DIR__ . "/utils.php";

$referer = "kadai06_3.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: {$referer}");
  exit;
}

session_start();

$postData = [];
$viewData = [];
$postData["comment"] = filter_input(INPUT_POST, "comment");

$_SESSION["old"] = $postData;

//TODO:debug
// echo "<pre>";
// print_r($_SESSION["old"]); // 中身が連想配列であることを確認
// echo "</pre>";

$viewData["id"] = session_id();
$viewData["comment"] = trim($postData["comment"]);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- TODO:Bootstrap読み込み -->
  <!-- link -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <title>php1 - kadai06_4</title>
</head>

<body>
  <!-- ▼▼ヘッダー▼▼--------------------------------- -->
  <header class="bg-info">
    <div class="text-light ms-5 pt-5 pb-3">
      <h1 class="h6">サーバーサイドスクリプト演習１</h1>
      <h2 class="pt-3">セッション</h2>
    </div><!--/.text-light ms-5 pt-5 pb-3-->
  </header>
  <!-- ▲▲ヘッダー▲▲--------------------------------- -->

  <main>
    <div class="">
      <div class="px-5 pt-5 row">
        <label class="form-label">ID</label>
        <p class="form-control form-control-lg border-info note-height"><?= nl2br(h($viewData["id"])) ?></p>
      </div>
      <div class="px-5 row">
        <label class="form-label">コメント</label>
        <p class="form-control form-control-lg border-info note-height"><?= nl2br(h($viewData["comment"])) ?></p>
      </div>
      <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-secondary btn-lg" href="kadai06_3.php">戻る</a>
      </div>
    </div>
  </main>

  <script src=""></script>
</body>

</html>