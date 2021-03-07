<!DOCTYPE html>
<html>
<head>
  <meta charset="utr-8">
  <title>PHP課題②</title>
</head>
<body>
  <div class="main">
    <h1>FizzBuzz問題</h1>
    <form method="post" action="data.php">
    <P>FizzNum: <input type="text" name="fizz" size="23" placeholder="整数値を入力してください" value="<?php if( !empty($_POST["fizz"])){echo $_POST["fizz"];} ?>" ></P>
        <P>BuzzNum:<input type="text" name="buzz" size="23"  placeholder="整数値を入力してください" value="<?php  if( !empty($_POST["buzz"])){echo $_POST["buzz"];} ?>" ></P>
        <input type="submit"  name="submit" value="実行">
        <p>【出力】</p>
    </form>
  </div>
<?php
if($_POST["submit"]){
  $fizz = ($_POST["fizz"]);
  $buzz = ($_POST["buzz"]);
  $match = "/^[0-9]+$/";
  if(preg_match($match,$fizz) === 1 && preg_match($match,$buzz) === 1){
    for($i=1; $i < 100; $i++) {
      if($i % $fizz === 0 && $i % $buzz === 0) {
        echo '<br>' . $i . 'FizzBuzz';
      } elseif($i % $fizz === 0) {
        echo '<br>' . $i . 'Fizz';
      } elseif($i % $buzz === 0) {
        echo '<br>' . $i . 'Buzz';
      } 
    }
  }else{
    echo "整数値を入力してください";
  } 
}
?> 
</body>
</html>