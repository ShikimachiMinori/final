<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1518092-final';
    const USER = 'LAA1518092';
    const PASS = 'pass1123';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>output</title>
	</head>
	<body>
    <button onclick="location.href='itiran.php'">トップへ戻る</button>nb
<?php
    $pdo=new PDO($connect, USER, PASS);
    // SQL発行準備 prepareメソッド　作成２
    $sql=$pdo->prepare('update nikki set mood=?,content=? where id=?');
    if(empty($_POST['date'])){
        echo '日付を入力してください。';
    }else if(empty($_POST['mood'])){
        echo '気分を入力してください。';
    }else if(empty($_POST['content'])){
        echo '本文を入力してください。';
    }else if($sql->execute([htmlspecialchars($_POST['name']),$_POST['price'],$_POST['id']])){
        echo '更新に成功しました。';
    }else{
        echo '更新に失敗しました。';
    }    
?>
        <hr>
        <table>
  
<?php
foreach ($pdo->query('select * from nikki') as $row) {
    echo '<tr>';
    echo '<td>', $row['date'], '</td>';
    echo '<td>', $row['mood'], '</td>';
    echo '<td>', $row['content'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
        </table>
    </body>
</html>

