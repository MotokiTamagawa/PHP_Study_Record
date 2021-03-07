<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP課題①-2</title>
</head>
<body>

  <form method ="post">
  <input type="text" name="name"><input type="submit" name="submit" value="検索">
  </form>

<?php
$fruits = array('apple', 'orange', 'strawberry');
$name = $_POST["name"];
if($_POST["submit"]){
  if(in_array($name, $fruits)){
    echo "{$name}は、配列に含まれています。";
  }else{
    echo "{$name}は、配列に含まれていません。";
  }
}
?>
</body>
</html>