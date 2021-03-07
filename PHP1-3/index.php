<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP課題①-３</title>
</head>
<body>
<?php
$question  = array(
"問題" => "日本の首都は？"
);
$answer = array(
  "回答１" => "大阪",
  "回答２" => " 北海道",
  "回答３" => "箱根",
  "回答４" => "東京"
);
?>
<h2>
<?php
foreach($question as $key => $value){
  echo $key,"　" , $value . '<br>' ;
}
?>
</h2>
<?php
foreach($answer as $key => $value){
  echo $value . '<br>';
}
?>
</body>
</html>