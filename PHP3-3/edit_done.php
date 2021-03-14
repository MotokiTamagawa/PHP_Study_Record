<?php
//ブラウザでエラー表示が可能にする
ini_set('display_errors', 1);
error_reporting(E_ALL);

try{
  if($_POST["edit_submit"]){
    $dsn = 'mysql:dbname=php_practice3-3;localhost;charset=utf8';
    $user = 'tmgw';
    $pass = 'Tamamoto.0913';
    //MySQLのDBに接続
    $pdo = new PDO($dsn, $user, $pass);
    //エラーメッセージ表示
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $edit_name = $_POST["edit_name"];
    $edit_comment = $_POST["edit_comment"];
    $edit_id = $_POST["edit_id"];
  
    $stmt = $pdo->prepare('UPDATE php33 SET name = :name, comment = :comment WHERE id = :id');
  
    $stmt->execute(array(':name' => $edit_name, ':comment' => $edit_comment, ':id' => $edit_id));

  }elseif($_POST["edit_none"]){
    header("location: index.php");
  }
}catch (PDOException $e) {
    exit("データーベースに接続出来ませんでした" . $e->getMessage());
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">

  <title>PHP課題3-3</title>
</head>
<body>

<h2>編集が完了しました</h2>
<form method="post" action="index.php">
  <input type="submit" value="投稿一覧へ戻る">
</form>
  
</body>
</html>