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
		<title>日記更新</title>
	</head>
	<body>
    <table>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from nikki where date=?');
	$sql->execute([$_GET['date']]);

	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="output.php" method="post">';
        echo '<td> ';
		echo '<input type="text" name="date" value="', $row['date'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="mood" value="', $row['mood'], '">';
		echo '</td> ';
		echo '<td>';
		echo ' <input type="text" name="content" value="', $row['content'], '">';
		echo '</td> ';
		echo '<td><input type="submit" value="更新"></td>';
		echo '</form>';
        echo '</tr>';
		echo "\n";
	}
?>
</table>
<button onclick="location.href='itiran.php'">トップへ戻る</button>
    </body>
</html>

