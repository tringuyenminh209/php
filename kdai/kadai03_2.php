<?php

//TODO:課題３－１からのGETデータを、スーパーグローバル変数で取得し、
//     それぞれ変数に格納
$department = $_GET["department"];
$course = $_GET["course"];
$name = $_GET["name"];
$kana = $_GET["kana"];
$note = $_GET["note"];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php1 - kadai03_2</title>
    <!-- TODO:bootstrapCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- 備考の幅調整：個別設定 -->
    <style>
        p.note-height {
            height: 85%;
        }
    </style>

</head>

<body>
    <!-- ▼▼コンテンツ全体▼▼---------------------------------- -->
    <div class="w-100">

        <!-- ▼▼ヘッダー▼▼--------------------------------- -->
        <header class="bg-dark">
            <div class="text-light ms-5 pt-5 pb-3">
                <h1 class="h6">サーバーサイドスクリプト演習１</h1>
                <h2 class="pt-3">form送信（GET）の結果画面</h2>
            </div><!--/.container-->
        </header>
        <!-- ▲▲ヘッダー▲▲--------------------------------- -->

        <!-- ▼▼メイン▼▼----------------------------------- -->
        <!-- TODO：受け取った値を表示（php部分で変数に格納した値を表示） -->
        <main>
            <div class="form-control">

                <div class="p-5 row">
                    <div class="col-md-5">
                        <div class="row">

                            <!-- 学科表示 -->
                            <div class="col">
                                <label class="form-label" for="department">学科</label>
                                <p class="form-control form-control-lg border-info"><?= $department ?></p>
                            </div>

                            <!-- コース表示 -->
                            <div class="col">
                                <label class="form-label" for="course">コース</label>
                                <p class="form-control form-control-lg border-info"><?= $course ?></p>
                            </div>
                        </div>

                        <div class="col">
                            <label class="form-label" for="name">名前</label>
                            <p class="form-control form-control-lg border-info"><?= $name ?></p>
                        </div>

                        <div class="col">
                            <label class="form-label" for="kana">フリガナ</label>
                            <p class="form-control form-control-lg border-info"><?= $kana ?></p>
                        </div>
                    </div>


                    <div class="col mh-100">
                        <label class="form-label" for="note">備考</label>
                        <p class="form-control form-control-lg border-info note-height"><?= $note ?></p>
                    </div>
                </div>

                <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">
                    <!-- TODO：入力画面へ戻るように -->
                    <a class="btn btn-secondary btn-lg me-md-5" href="kadai03_1.php">戻る</a>
                    <!-- ここは今回の課題では指定なしなので、そのままでOK -->
                    <a class="btn btn-danger btn-lg" href="#">送信</a>
                </div>


            </div><!--/.container-->
        </main>
        <!-- ▲▲メイン▲▲------------------------------------ -->

    </div>
    <!-- ▲▲コンテンツ全体▲▲---------------------------------- -->
</body>

</html>