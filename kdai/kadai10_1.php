<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>kadai10_1 新規登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <!-- ▼▼ヘッダー▼▼--------------------------------- -->
  <header class="bg-info">
    <div class="text-light ms-5 pt-5 pb-3">
      <h1 class="h6">サーバーサイドスクリプト演習１</h1>
      <h2 class="pt-3">データベース登録</h2>
    </div><!--/.text-light ms-5 pt-5 pb-3-->
  </header>
  <!-- ▲▲ヘッダー▲▲--------------------------------- -->

  <!-- ▼▼メイン▼▼----------------------------------- -->
  <main>
    <div class="form-control">
      <form action="kadai10_2.php" method="POST" novalidate>
        <div class="p-5 row">
          <div class="col-md-5">

            <!-- 商品番号 -->
            <div class="col mb-3">
              <label class="form-label" for="product_no">商品番号</label>
              <label class="form-control form-control-lg border-info text-danger"><em>※商品番号は自動採番（入力不可）</em></label>
            </div>

            <!-- カテゴリ＆価格 -->
            <div class="row">
              <div class="col">
                <!-- カテゴリ -->
                <label class="form-label" for="category">カテゴリ</label>
                <select class="form-select form-select-lg mb-3" name="category">
                  <option value="1" selected>ピザ</option>
                  <option value="2">ドリンク</option>
                </select>
              </div><!-- .col -->
              <!-- 価格 -->
              <div class="col">
                <label class="form-label" for="price">価格</label>
                <input type="text" name="price" id="price" class="form-control form-control-lg border-info" placeholder="" required>
              </div><!-- .col -->
            </div><!-- .row -->

            <!-- 商品名 -->
            <div class="col">
              <label class="form-label" for="pname">商品名</label>
              <input type="text" name="pname" id="pname" class="form-control form-control-lg border-info" placeholder="" required>
            </div><!-- .col -->

          </div><!-- .col-md-5 -->

        </div><!-- .p-5 row -->

        <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="submit" class="btn btn-danger btn-lg">入力内容の確認</button>
          <a class="btn btn-secondary btn-lg" href="kadai08_1.php">一覧・検索画面へ</a>
        </div><!-- .p-5 d-grid gap-2 d-md-flex justify-content-md-end -->
      </form>

    </div><!--/.form-control-->
  </main>
  <!-- ▲▲メイン▲▲------------------------------------ -->

</body>

</html>