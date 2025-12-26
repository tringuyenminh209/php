<?php

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>php1 - kadai05_1</title>
  <!-- TODO:bootstrapCSS読み込み -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <div class="w-100">

    <!-- ▼▼ヘッダー▼▼--------------------------------- -->
    <header class="bg-info">
      <div class="text-light ms-3 pt-4 pb-3">
        <h1 class="h6">サーバーサイドスクリプト演習１</h1>
        <h2 class="pt-3">画像のアップロード</h2>
      </div><!--/.container-->
    </header>
    <!-- ▲▲ヘッダー▲▲--------------------------------- -->

    <!-- ▼▼メイン▼▼----------------------------------- -->
    <main>

      <div class="form-control">

        <h3 class="border-bottom border-3 border-info mb-4 mt-2 pb-2">画像のアップロード</h3>

        <!-- TODO:フォーム設定 -->
        <form action="./kadai05_2.php" method="POST" enctype="multipart/form-data">

          <div id="frame" class="p-5 border-info rounded" style="border:1px dashed;">
            <!-- ファイル大きさ制限数の保持（hidden） -->
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

            <div class="text-center">
              <!-- サムネイル表示 -->
              <div id="pic" class=""><img></div>
            </div>

            <!-- ファイル入力箇所 -->
            <div id="file" class="input-group">

              <input type="file" id="inputFile" class="form-control form-control-lg" name="upfile">

            </div>

            <label for="formFileLg" class="form-label">PNG,JPG,GIF 2MB以内</label>
          </div>

          <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-danger btn-lg">アップロード</button>
          </div>

        </form>
      </div>
    </main>

  </div><!--/.w100-->
  <!-- ファイル動作用のjsファイル読み込み -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/kadai05.js"></script>
</body>

</html>