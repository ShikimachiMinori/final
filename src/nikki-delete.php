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
		<title>削除</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from nikki where date=?');
    if ($sql->execute([$_POST['date']])) {
        echo '削除に成功しました。';
    }else {
        echo '削除に失敗しました。';
    }
?>
    <br><hr><br>
	<table>
<?php
    foreach ($pdo->query('select * from nikki') as $row) {
        echo '<tr>';
        echo '<td>',$row['date'], '</td>';
        echo '<td>',$row['mood'], '</td>';
        echo '<td>',$row['content'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>

        <button onclick="location.href='itiran.php'">トップへ戻る</button>
    </body>
</html>

