<?php
// PHPテストファイル - localhost:2009で動作確認用

echo "<h1>PHP Docker Test - Port 2009</h1>";
echo "<p>現在時刻: " . date('Y-m-d H:i:s') . "</p>";
echo "<p>PHPバージョン: " . phpversion() . "</p>";

// PHP情報表示
echo "<h2>PHP設定情報</h2>";
echo "<ul>";
echo "<li>メモリ制限: " . ini_get('memory_limit') . "</li>";
echo "<li>実行時間制限: " . ini_get('max_execution_time') . "秒</li>";
echo "<li>アップロード最大サイズ: " . ini_get('upload_max_filesize') . "</li>";
echo "<li>タイムゾーン: " . date_default_timezone_get() . "</li>";
echo "</ul>";

// データベース接続テスト（オプション）
echo "<h2>データベース接続テスト</h2>";
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'password');
    echo "<p style='color: green;'>✓ データベース接続成功</p>";
} catch (PDOException $e) {
    echo "<p style='color: orange;'>⚠ データベース接続なし（正常）</p>";
}

echo "<hr>";
echo "<p><strong>Docker PHP環境が正常に動作しています！</strong></p>";
?>
