<?php
function result(){
  if($_POST["submit"]){
    $hand = $_POST["hands"];
    echo "自分" . $hand . '<br>';
    $hands = ["グー", "チョキ" , "パー"];
    $key = array_rand($hands);
    $pcHand = $hands[$key];
    echo "相手：" . $pcHand . '<br>';
    switch($hand){
      case($hand === $pcHand):
        $result = "あいこ";
        break;
      case "グー":
        $result = ($pcHand ===  "チョキ") ? "あなたの勝利です！" : "あなたの敗北です。。。" ; 
        break;
      case "チョキ":
         $result = ($pcHand === "パー") ? "あなたの勝利です！" : "あなたの敗北です。。。";
         break;
       case "パー":
         $result = ($pcHand === "グー") ? "あなたの勝利です！" : "あなたの敗北です。。。";
         break;
      } 
      echo $result; 
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP課題１−４</title>
</head>
<body>
<form method="post">
<select name="hands">
  <option value="グー">グー</option>
  <option value="チョキ">チョキ</option>
  <option value="パー">パー</option>
</select>
<div><input type="submit" name="submit" value="じゃんけん！"></div>
</form>
<p><?php result();?></p>
</body>
</html>