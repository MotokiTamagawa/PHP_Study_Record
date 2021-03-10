<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="index.css">
  <title>mission3-5</title>
</head>
<body>
<h1>簡易掲示板</h1>
<h2>投稿一覧(<?php echo count(file("mission3-5.txt")); ?>)件</h2>


<?php
date_default_timezone_set('Asia/Tokyo');
if(!empty($_POST["comment"])){
  $name = $_POST["name"];
  $comment = $_POST["comment"];
  $date = date("Y-m-d H:i:s");
  $pwd = $_POST["pwd"];
  $filename = "mission3-5.txt";
  $lines = file($filename);

  //コメント番号処理
  if(file_exists($filename)) {
      $num = count(file($filename)) + 1;
}else {
    $num = 1;
}
  $Data = $num."<>".$name."<>".$comment."<>".$date. "<>".$pwd."<>".PHP_EOL;
  
  //編集する場合の処理
  if(!empty($_POST["edit_post"])){
    $file = fopen($filename , "w");
    foreach($lines as $line){
      $new1 = explode("<>", $line);
      //edit_postはedit_numをそのまま代入している値
      if($new1[0] == $_POST["edit_post"]){
        $new_number = $_POST["edit_post"];
        $newData = $new_number."<>".$name."<>".$comment."<>".$date."\t"."編集済み"."<>". $pwd."<>".PHP_EOL;
        $line = $newData;
      }
      fwrite($file , $line);
    }
    echo "編集しました<br><br><hr>";
    fclose($file);
  }//普通の書き込み時の処理
  else{
    $file = fopen($filename ,"a");
    fwrite($file , $Data);
    echo "書き込みました<br><br><hr>";
    fclose($file);
  }
}//消去機能の処理
elseif(!empty($_POST["del_num"])){
  $del_num = $_POST["del_num"];
  $filename = "mission3-5.txt";
  $lines = file($filename , FILE_IGNORE_NEW_LINES);
  $pwd_lines = file($filename , FILE_IGNORE_NEW_LINES);
  $del_pwd_key = 0;
  $file = fopen($filename , "w");

  foreach($pwd_lines as $pwd_line){
    $del_pwd = $_POST["del_pwd"];
    $judge = explode("<>", $pwd_line);

    if($judge[0] == $del_num && $judge[4] == $del_pwd){
      $del_pwd_key = 1;
      echo "パスワードが一致しました<br><br><hr>";
    }
  }

  //パスワードが一致したとき、全ての行を書き込む処理

  if($del_pwd_key == 1){
    foreach($lines as $line){
      $new1 = explode("<>" ,$line);
      if($new1[0] != $del_num){
        fwrite($file,$line.PHP_EOL);
      }
    }
    echo "削除しました<br><br><hr>";
  
  }else{
    foreach($lines as $line){
      fwrite($file ,$line . PHP_EOL);
    }
  echo "消去出来ませんでした（パスワード）が違います。<br><br><hr>";
  }
   fclose($file);
}

//編集機能
elseif(isset($_POST["edit_num"])){
  $edit_pwd = $_POST["edit_pwd"];
  $edit_num = $_POST["edit_num"];
  $filename = "mission3-5.txt";
  $lines = file($filename , FILE_IGNORE_NEW_LINES);
  foreach($lines as $line){
    $new1 = explode("<>", $line);

    if($new1[0] === $edit_num && $new1[4] == $edit_pwd){
      echo "編集内容を入力後、”投稿”ボタンを押してください。（パスワード）も更新出来ます<br><br><hr>";
      $edit_name = $new1[1];
      $edit_comment = $new1[2];

      $edit_key = $edit_num;
      break;
    }
    elseif($new1[0] == $edit_num && $new[4] != $edit_pwd){
      echo "パスワードが違います<br><br><hr>";
    }
  }
}
//表示プログラム
if(file_exists($filename)){
  $lines = file($filename , FILE_IGNORE_NEW_LINES);
  foreach($lines as $line){
    $new1 = explode("<>", $line);
    echo $new1[0]."\t".$new1[1]."\t".$new1[2]."\t".$new1[3]."<br>";
  }
}

//何もしていなくても表示

if(empty($_POST["comment"]) && empty($_POST["del_num"]) && empty($_POST["edit_num"])){
  $filename = "mission3-5.txt";
  if(file_exists($filename)) {
      $lines = file($filename, FILE_IGNORE_NEW_LINES);
      foreach($lines as $line) {
          $new1 = explode("<>", $line);
          echo $new1[0]."\t".$new1[1]."\t".$new1[2]."\t".$new1[3]."<br>";
      }
  }
}
?>
<!-- 編集番号を記録する処理 -->
<br>
<form method="post">
  <input type = "hidden" name = "edit_post" value = <?php if(isset($edit_key))
              {echo $edit_key;}?>>

  <!-- 投稿 -->
  <div class="new">新規投稿</div>
  <input type="text" name="name" placeholder="名前" value = <?php if(isset($edit_name)) {echo $edit_name;} ?>>

  <input type="text" name="comment" placeholder="内容" value = <?php if(isset($edit_comment)){echo $edit_comment;}?>>
  <input type="text" name="pwd" placeholder="パスワード">
  <input type="submit" name="submit" value="投稿">
</form>

<br>
<!-- 消去フォーム -->
<form method="post">
<div>消去フォーム</div>
  <input type="number" name="del_num" placeholder="削除したい投稿番号">
  <input type="text" name="del_pwd" placeholder="その投稿のパスワード">
  <input type="submit" name="submit_del" value="削除">
</form>

<br>
<!-- 編集フォーム -->
<form method="post">
<div>編集フォーム</div>
  <input type="number" name="edit_num" placeholder="編集したい投稿番号">
  <input type="text" name="edit_pwd" placeholder="その投稿のパスワード">
  <input type="submit" name="submit_edit" value="編集">
</form> 
</body>
</html>