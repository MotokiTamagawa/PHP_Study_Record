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
  //エラーメッセージ表示
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM php33 WHERE id IN(".$_POST["edit_id"].")";

  $edit_contents = $pdo->query($sql);

}catch (PDOException $e){
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
<h2>編集ページ</h2>
<form method="post" action="edit_done.php">

      <input type="hidden" name="edit_id" value = "<?php  if(isset($_POST["edit_id"])){
        echo $_POST["edit_id"];}?>">

      name:<input type="text" name="edit_name"  value= "<?php foreach($edit_contents as $edit):?><?php echo $edit["name"]; ?>"><br>

  <div>投稿内容</div>
      <textarea name="edit_comment" rows = "9" cols = "30"><?php  echo $edit["comment"];?><?php endforeach; ?></textarea><br>
  <input type="submit" name="edit_submit" value="更新"><input type="submit"  name = "edit_none"value="戻る">
  
</form>
</body>
</html>