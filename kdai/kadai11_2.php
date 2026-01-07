<?php

require_once __DIR__ . "/def.php";

// リクエストがPOST形式でなければ、kadai08_1に戻って、処理終了
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: kadai08_1.php");
  exit;
}

$postData = []; //POSTデータ格納用の配列
$errMsg = "";   //エラーメッセージ格納用の配列

//POSTデータ取得
$postData["product_no"] = filter_input(INPUT_POST, "product_no");
$postData["category"] = filter_input(INPUT_POST, "category", FILTER_VALIDATE_INT);
$postData["price"] = filter_input(INPUT_POST, "price", FILTER_VALIDATE_INT);
$postData["pname"] = filter_input(INPUT_POST, "pname");
$postData["category"] = ($postData["category"] == 1) ? 'ピザ' : 'ドリンク';

//入力データのtrim処理
foreach ($postData as $p) {
  $p = trim($p);
}

var_dump($postData);
//入力データのチェック
if (!$postData["pname"]) {
  $errMsg .= "商品名を入力してください。<br>";
}

if (!$postData["price"]) {
  $errMsg .= "価格を半角数字で入力してください。<br>";
}

//エラーメッセージが空の時、更新処理を行う（DBエラーの場合は、Exception内容を変数$errMsgに追加）
if ($errMsg == "") {

  $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

  try {
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

    // トランザクション開始
    $db->beginTransaction();

    $sql = "UPDATE " . TBL_PRODUCT . " SET PNAME = :pname, CATEGORY = :category, PRICE = :price WHERE PRODUCT_NO = :product_no";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':product_no', $postData["product_no"], PDO::PARAM_INT);
    $stmt->bindParam(':pname', $postData["pname"], PDO::PARAM_STR);
    $stmt->bindParam(':price', $postData["price"], PDO::PARAM_INT);
    $stmt->bindParam(':category', $postData["category"], PDO::PARAM_STR);

    $stmt->execute();

    $db->commit();

    header("Location: kadai08_1.php");
  } catch (PDOException $poe) {
    $db->rollBack();
    $errMsg = "DBエラー：" . $poe->getMessage();
  } finally {
    //DB切断
    $stmt = null;
    $db = null;
  }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>kadai11_2 更新結果</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <!-- ▼▼ヘッダー▼▼--------------------------------- -->
  <header class="bg-info">
    <div class="text-light ms-5 pt-5 pb-3">
      <h1 class="h6">サーバーサイドスクリプト演習１</h1>
      <h2 class="pt-3">データベース更新結果</h2>
    </div><!--/.text-light ms-5 pt-5 pb-3-->
  </header>
  <!-- ▲▲ヘッダー▲▲--------------------------------- -->

  <!-- ▼▼メイン▼▼----------------------------------- -->
  <main>
    <div class="form-control">

      <div class="p-5 row">
        <div class="col-md-5">
          <!-- エラーメッセージ -->
          <div class="col">
            <p class="text-danger">
              <?= $errMsg ?>
            </p>
          </div><!-- .col -->

          <!-- 戻るボタン（入力画面に戻る） -->
          <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-start">
            <a class="btn btn-secondary btn-lg" href="kadai11_1.php?product_no=<?= $postData["product_no"] ?>">戻る</a>
          </div><!-- .p-5 d-grid gap-2 d-md-flex justify-content-md-end -->

        </div><!-- .col-md-5 -->

      </div><!-- .p-5 row -->
    </div><!--/.form-control-->
  </main>
  <!-- ▲▲メイン▲▲------------------------------------ -->

</body>

</html>