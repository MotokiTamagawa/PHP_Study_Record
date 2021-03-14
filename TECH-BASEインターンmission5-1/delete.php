<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>mission5-1</title>
</head>
<body>
  <h2>削除フォーム</h2>
  <form method="post" action="index.php">
    <input type="submit" value="投稿一覧へ戻る">
  </form>
<?php
//ブラウザでエラー表示が可能にする
ini_set('display_errors', 1);
error_reporting(E_ALL);
try{
  $delete_pass = $_POST["delete_pass"];
  $del_pass = $_POST["del_pass"];
  if($delete_pass === $del_pass){
    $dsn = 'mysql:dbname=mission5-1;localhost;charset=utf8';
    $user = 'tmgw';
    $pass = 'Tamamoto.0913';
    //MySQLのDBに接続
    $pdo = new PDO($dsn, $user, $pass);
    //PDOのエラーレポート表示
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $delete_id = $_POST["delete_id"];
    
        $stmt = $pdo->prepare('DELETE FROM mission51 WHERE id = :id');
  
        $stmt->execute(array(':id' => $delete_id));
        echo "削除しました";
  }else{
      echo "パスワードが違います";
  }

}catch(PDOException $e){
  exit("データーベースに接続出来ませんでした" . $e->getMessage());
}
 ?>
</body>
</html>
