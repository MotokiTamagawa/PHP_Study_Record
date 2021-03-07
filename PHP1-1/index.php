<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP課題①-1</title>
</head>
<body>
  <div class = "main">
    <p>日本の首都は？</p>
    <form method = "post" action = "index.php">
      <input type = "text" size = "23" name = "name" >
      <input type = "submit" value = "OK">
    </form>
  </div>
  <?php
    if($_POST["name"] === "東京"){
      echo "正解";
    }else{
      echo "不正解";
    }
  ?>
</body>
</html>