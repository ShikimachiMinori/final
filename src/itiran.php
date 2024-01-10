<?php
    const SERVER = 'mysql215.phy.lolipop.lan';
    const DBNAME = 'LAA1518092-final';
    const USER = 'LAA1518092';
    const PASS = 'pass1123';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>日記一覧</title>
	</head>
	<body>
    <table>
    <tr><th>日付</th><th>気分</th><th>本文</th></tr>
    <?php
    $pdo=new PDO($connect, USER, PASS);
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

