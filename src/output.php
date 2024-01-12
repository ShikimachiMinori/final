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
		<title>練習6-6-output</title>
	</head>
	<body>
    <button onclick="location.href='itiran.php'">トップへ戻る</button>
<?php
    $pdo=new PDO($connect, USER, PASS);
    // SQL発行準備 prepareメソッド　作成２
    $sql=$pdo->prepare('update nikki set content=?,mood=? where date=?');

    if($sql->execute([htmlspecialchars($_POST['date']),$_POST['mood'],$_POST['content']])){
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
        <button onclick="location.href='ren6-6-input.php'">更新画面へ戻る</button>
    </body>
</html>

