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

      name:<input type="text" name="edit_name"  value= "<?php if(isset($_POST["edit_name"])){
        echo $_POST["edit_name"];}?>"><br>

  <div>投稿内容</div>
      <textarea name="edit_comment" rows = "9" cols = "30"><?php if(isset($_POST["edit_comment"])){
        echo trim($_POST["edit_comment"]);}?></textarea><br>
  <input type="submit" name="edit_submit" value="更新"><input type="submit"  name = "edit_none"value="戻る">
  
</form>
</body>
</html>