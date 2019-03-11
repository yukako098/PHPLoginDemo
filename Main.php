<?php
session_start();
// var_dump($_SESSION["username"]);
// ログイン状態チェック
if (!isset($_SESSION["username"])) {
    header("Location: Logout2.php");
    exit;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>メイン</title>
    </head>
    <body>
        <h1>メイン画面</h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <p>ようこそ<u><?php echo htmlspecialchars($_SESSION["username"], ENT_QUOTES); ?></u>さん</p>  <!-- ユーザー名をechoで表示 -->
        <ul>
            <li><a href="Logout2.php">ログアウト</a></li>
        </ul>
    </body>
</html>
