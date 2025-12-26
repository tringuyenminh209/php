<?php

//必要ファイルがあれば、読み込むこと


// リクエストがPOST形式でなければ、kadai08_1に戻って、処理終了


//POSTデータ取得


//入力データのtrim処理


//入力データのチェック


//エラーがなければ、DB更新処理を行う



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
            </p>
          </div><!-- .col -->

          <!-- 戻るボタン（入力画面に戻る） -->
          <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-start">
            <a class="btn btn-secondary btn-lg" href="">戻る</a>
          </div><!-- .p-5 d-grid gap-2 d-md-flex justify-content-md-end -->

        </div><!-- .col-md-5 -->

      </div><!-- .p-5 row -->
    </div><!--/.form-control-->
  </main>
  <!-- ▲▲メイン▲▲------------------------------------ -->

</body>

</html>