<?php

require_once __DIR__ . "/def.php";
require_once __DIR__ . "/utils.php";

session_start();

if (isset($_SESSION["old"])) {
  $old = $_SESSION["old"];
  unset($_SESSION["old"]);
}

if (!isset($old["comment"])) {
  $old["comment"] = "";
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- TODO:Bootstrap読み込み -->
  <!-- link -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <title>php1 - kadai06_3</title>
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

  <!-- ▼▼メイン▼▼----------------------------------- -->
  <main>
    <div class="form-control">

      <!-- TODO:フォーム送信、セッションデータ表示 -->
      <form action="kadai06_4.php" method="POST" novalidate>
        <div class="p-5 row">
          <div class="col mh-100">
            <label class="form-label" for="comment">コメント</label>
            <textarea name="comment" id="comment" class="form-control form-control-lg border-info" rows="7"><?= $old["comment"] ?></textarea>
          </div>
        </div>

        <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="submit" class="btn btn-danger btn-lg">入力内容の確認</button>
        </div>
      </form>

    </div><!--/.form-control-->




  </main>

</body>

</html>