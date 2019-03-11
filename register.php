<?php
session_start();
if( isset($_SESSION['user']) != "") {
  // ログイン済みの場合はリダイレクト
  header("Location: home.php");
  exit ;
}
// DBとの接続
include_once 'dbconnect.php';

// signupがPOSTされたときに下記を実行
if(isset($_POST['signup'])) {

  $username = $mysqli->real_escape_string($_POST['username']);
  $email = $mysqli->real_escape_string($_POST['email']);
  $password = $mysqli->real_escape_string($_POST['password']);
  $password = password_hash($password, PASSWORD_DEFAULT);

  // POSTされた情報をDBに格納する
  $query = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";

  if($mysqli->query($query)) {
    header("Location: home.php");
    exit ;
     } else {
    //  <div class="alert alert-danger" role="alert">エラーが発生しました。</div>
    echo 'errrrrrrrrrrrrrrrror!';

  }
}


?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHPの会員登録機能</title>
<link rel="stylesheet" href="style.css">

<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="col-xs-6 col-xs-offset-3">

<form method="post">
  <h1>会員登録フォーム</h1>
  <div class="form-group">
    <input type="text" class="form-control" name="username" placeholder="ユーザー名" required />
  </div>
  <div class="form-group">
    <input type="email"  class="form-control" name="email" placeholder="メールアドレス" required />
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="パスワード" required />
  </div>
  <button type="submit" class="btn btn-default" name="signup">会員登録する</button>
  <a href="index.php">ログインはこちら</a>
</form>

</div>
</body>
</html>
