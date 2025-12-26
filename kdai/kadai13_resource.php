<?php

require_once __DIR__ . "/def.php";

try {

    // プリフライト要求に対する処理
    if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
        //---------------TODO１：---------------
        //TODO１:正しいレスポンスを返し、処理を終了
        //--------------------------------------
    }
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new JsonException("検索ワードがありません。");
    }

    //---------------TODO２：---------------
    // TODO２：POSTによる値の取得にはfile_get_contentsを使う
    // 変数JSONに格納すること
    //--------------------------------------

    //---------------TODO３：---------------
    //TODO３：json_decodeでのエラー発生時に、JSONExceptionとする
    // 変数$contentsに格納すること
    //--------------------------------------

    //---------------TODO４：---------------
    //TODO４：POSTでのkeywordデータが存在しなければ、throw new JsonExceptionを発生させる。（エラーメッセージは「検索ワードがありません。」）
    //--------------------------------------

    // POSTデータを検索用文字列へ変換処理
    $keyword = htmlspecialchars($contents["keyword"]);
    $keyword_esc = str_replace('%', '\%', $keyword);  //LIKE句の%をエスケープする エスケープ前のデータを検索inputに表示する
    $keyword_esc = str_replace('_', '\_', $keyword_esc);  //LIKE句の_をエスケープする
    $keyword_like = "%" . $keyword_esc . "%";

    // DB接続設定
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

    $db = new PDO($dsn, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL文（OK）
    $sql = "SELECT * FROM " . TBL_PRODUCT . " WHERE PNAME LIKE :keyword";

    // TODO:SQL文（エラー）500エラー確認用
    // $sql = "SELECT * FROM oldproducts WHERE PNAME LIKE :keyword";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':keyword', $keyword_like);
    $stmt->execute();

    $resultData = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $resultData[] = $row;
    }

    //---------------TODO５：---------------
    //TODO５：正しく終了したときに 
    // ５－１．ステータスコードの設定
    // ５－２．変数$resultに返却データを格納すること
    //--------------------------------------

} catch (JsonException $e) {
    //---------------TODO６：---------------
    //TODO６：リクエストデータに不備があったとき 
    // ６－１．ステータスコードの設定
    // ６－２．変数$resultに返却データを格納すること
    //--------------------------------------
} catch (Exception $e) {
    //---------------TODO７：---------------
    //TODO６：リクエストデータに不備があったとき 
    // ７－１．ステータスコードの設定
    // ７－２．変数$resultに返却データを格納すること
    //--------------------------------------
}

//---------------TODO８：---------------
//TODO８： 
// ８－１．オリジンの設定
// ８－２．コンテントタイプの設定
// ８－３．レスポンスデータの出力
//--------------------------------------
