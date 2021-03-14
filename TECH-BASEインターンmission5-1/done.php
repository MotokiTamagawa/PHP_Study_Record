 <?php
//ブラウザでエラー表示が可能にする
ini_set('display_errors', 1);
error_reporting(E_ALL);
 
try{
    $dsn = 'mysql:dbname=mission5-1;localhost;charset=utf8';
    $user = 'tmgw';
    $pass = 'Tamamoto.0913';

    //MySQLのDBに接続
    $pdo = new PDO($dsn, $user, $pass);
    //PDOのエラーレポート表示
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //index.phpの値を取得
    //予めMYSQL内にテーブルとカラムを作成する必要がある
    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $pass = $_POST["pass"];
    if(!empty($name) && !empty($comment) && !empty($pass)){
        //INSERT文を変数に格納
        //予めMySQL内にテーブルとカラムの作成必要あり
        $sql = "INSERT INTO mission51(name,comment,pass) VALUES(:name,:comment,:pass)";
        //挿入する値は空のまま、SQL実行の準備をする
        $stmt = $pdo->prepare($sql);
        //挿入する値を配列に格納
        $params = array(':name' => $name, ':comment' => $comment, ':pass' => $pass);
        //挿入する値が入った変数をexecuteにセットしてSQLを実行
        $stmt->execute($params);
        echo "投稿が完了しました";
    }else{
        echo "全て入力してしてください";
    }
}catch(PDOException $e){
    exit("データーベースに接続出来ませんでした" . $e->getMessage());
}
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mision5-1</title>
</head>
    <body>
        <form action="index.php" method="POST">
            <input type="submit" value="投稿一覧へ戻る" >
        </form>
    </body>
</html>