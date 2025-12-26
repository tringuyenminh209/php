<?php

// TODO：kadai03_resource.phpファイル読み込み

require_once __DIR__ . "/kadai03_resource.php";

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php1 - kadai04_1</title>
    <!-- TODO:bootstrapCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- ▼▼コンテンツ全体▼▼---------------------------------- -->
    <div class="w-100">

        <!-- ▼▼ヘッダー▼▼--------------------------------- -->
        <header class="bg-info">
            <div class="text-light ms-5 pt-5 pb-3">
                <h1 class="h6">サーバーサイドスクリプト演習１</h1>
                <h2 class="pt-3">ファイルアップロード</h2>
            </div><!--/.container-->
        </header>
        <!-- ▲▲ヘッダー▲▲--------------------------------- -->

        <!-- ▼▼メイン▼▼----------------------------------- -->
        <main>
            <div class="form-control">

                <!-- TODO:設定必要（３回目の課題の応用） -->
                <form action="/kdai/kadai04_2.php" method="POST" novalidate>
                    <div class="p-5 row">
                        <div class="col-md-5">
                            <div class="row">

                                <!-- 学科表示 -->
                                <div class="col">
                                    <label class="form-label" for="department">学科</label>
                                    <select name="department" id="department" class="form-select form-select-lg mb-3 border-info">
                                        <!-- TODO: -->
                                        <?php foreach($departments as $department) : ?>
                                            <option value="<?= $department["d_id"] ?>"><?= $department["d_name"] ?> (<?= $department["d_years"] ?>年制)</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <!-- コース表示 -->
                                <div class="col">
                                    <label class="form-label" for="course">コース</label>
                                    <select name="course" id="course" class="form-select form-select-lg mb-3 border-info">
                                        <!-- TODO: -->
                                        <?php foreach($courses as $course): ?>
                                            <option value="<?= $course["c_id"] ?>"><?= $course["c_name"] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="name">名前<em class="text-danger">※必須</em></label>
                                <input type="text" name="name" id="name" class="form-control form-control-lg border-info" placeholder="ECC 太郎" required>
                            </div>

                            <div class="col">
                                <label class="form-label" for="kana">フリガナ<em class="text-danger">※必須</em></label>
                                <input type="text" name="kana" id="kana" class="form-control form-control-lg border-info" placeholder="イーシーシー タロウ" required>
                            </div>
                        </div>


                        <div class="col mh-100">
                            <label class="form-label" for="note">備考</label>
                            <textarea name="note" id="note" class="form-control form-control-lg border-info" rows="7"></textarea>
                        </div>

                    </div>

                    <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-danger btn-lg">入力内容の確認</button>
                    </div>
                </form>

            </div><!--/.container-->
        </main>
        <!-- ▲▲メイン▲▲------------------------------------ -->

    </div>
    <!-- ▲▲コンテンツ全体▲▲---------------------------------- -->
</body>

</html>