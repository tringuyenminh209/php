<?php

require_once __DIR__ . "/def.php";

if($_SERVER["REQUEST_METHOD"] !== "POST"){
  header("Location: kadai10_1.php");
  exit;
}

$category = filter_input(INPUT_POST, "category", FILTER_VALIDATE_INT);
$price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_INT);
$pname = filter_input(INPUT_POST, "pname");

$result = [ 
  "status"  => true, //エラーがあった場合true 
  "message" => null, //表示するメッセージ 
  "result"  => false, //更新結果（成功した場合true） 
];

$pname = str_replace(array(" ", "　"), "", $pname);

if(!$pname){
  $result["status"] = false;
  $result["message"] = $result["message"] . "名前が入力されていません。<br>";
}

if(!$price){
  $result["status"] = false;
  $result["message"] = $result["message"] . "金額が正しく入力されていません。<br>";
}

if($result["status"]){
  $category = $category == 1 ? 'ピザ' : 'ドリンク';

  $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

  try{

    $db = new PDO($dsn, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

    $db->beginTransaction();
    
    $sql = "INSERT INTO " . TBL_PRODUCT . "(PNAME, CATEGORY, PRICE) VALUES(:pname, :category, :price)";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':pname', $pname, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_INT);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);

    $result["result"] = $stmt->execute();

    $db->commit();

    if($result["result"]){
      $result["message"] = "データの登録に成功しました。<br>";
    }
  }catch(PDOException $e){
    $db->rollBack();
    echo "DBエラー" . $e->getMessage();
  }finally{
    $stmt = null;
    $db = null;
  }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php1 - kadai10_2</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="w-100">

    <!-- ▼▼ヘッダー▼▼--------------------------------- -->
    <header class="bg-info">
      <div class="text-light ms-3 pt-4 pb-3">
        <h1 class="h6">サーバーサイドスクリプト演習１</h1>
        <h2 class="pt-3">データベース登録結果</h2>
      </div><!--/.container-->
    </header>
    <!-- ▲▲ヘッダー▲▲--------------------------------- -->

    <!-- ▼▼メイン▼▼----------------------------------- -->
    <main>

      <div class="form-control">

        <h3 class="border-bottom border-3 border-info mb-4 mt-2 pb-2">データベース登録結果</h3>

        <div id="frame" class="p-5 border-info rounded" style="border:1px dashed;">

          <!-- 処理結果表示 -->
          <div class="text-center">
            <!-- TODO:第1段階（$resultで件数のみ表示） -->
            <!-- <p class="text-danger"><?= $result ?>件のデータ登録に成功しました</p> -->
            <p class="text-danger"><?= $result["message"] ?></p>
          </div>
        </div>

        <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-secondary btn-lg" href="kadai10_1.php">戻る</a>
        </div>

      </div>
    </main>

  </div><!--/.w100-->

</body>

</html>