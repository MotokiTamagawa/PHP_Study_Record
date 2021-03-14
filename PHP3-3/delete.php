<?php
//ブラウザでエラー表示が可能にする
ini_set('display_errors', 1);
error_reporting(E_ALL);
 
try{
    $dsn = 'mysql:dbname=php_practice3-3;localhost;charset=utf8';
    $user = 'tmgw';
    $pass = 'Tamamoto.0913';
      //MySQLのDBに接続
      $pdo = new PDO($dsn, $user, $pass);
      //PDOのエラーレポート表示
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $delete = $_POST["delete"];

      $stmt = $pdo->prepare('DELETE FROM php33 WHERE id = :id');

      $stmt->execute(array(':id' => $delete));

}catch(PDOException $e){
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
  <h2>投稿の削除が完了しました。</h2>
  <form method="post" action="index.php">
    <input type="submit" value="投稿一覧へ戻る">
  </form>
</body>
</html>
