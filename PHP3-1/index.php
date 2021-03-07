<?php
$dsn = 'mysql:dbname=php_practice3-1;localhost;charset=utf8';
$user = 'tmgw';
$pass = 'Tamamoto.0913';
//MySQLのDBに接続
$pdo = new PDO($dsn, $user, $pass);
//テーブル全行取得（データ取得）
$result_list = $pdo->query('SELECT * FROM php31');
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>PHP課題3-1</title>
    </head>
    <body>
        <h1>掲示板</h1>
        <h2>新規投稿</h2>
            <form method="post" action="done.php">
                    name:<input type="text" name="name" ><br>
                <div>投稿内容</div>
                    <textarea name="comment" rows = "9" cols = "30"></textarea><br>
                <input type="submit" name="submit" value="投稿">
            </form>
        <h2>投稿内容一覧</h2>
            <?php foreach($result_list as $row):?>
           <section class="contents">
            <?php echo "No:{$row["id"]} <br>" ?>
            <?php echo "名前:{$row["name"]} <br>" ?>
            <?php echo "投稿内容:{$row["comment"]} <br>" ?>
           </section>
                <?php echo '<br>'?>
            <?php endforeach;?>    

        <style>
        .contents{
            border:solid 3px skyblue;
        }
        </style>
    </body>
</html>

 
