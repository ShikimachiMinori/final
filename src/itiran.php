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
		<title>日記一覧</title>
	</head>
	<body>
        <h1>日記</h1>
    <table>
    <?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from nikki') as $row) {
        echo '<tr>';
        echo '<td>', $row['date'], '　</td>';
        echo '<td>', $row['mood'], '　</td>';
        echo '<td>', $row['content'], '　</td>';
        echo '<td>';
        echo '<form action="nikki-edit.php" method="post">';
        echo '<input type="hidden" name="id" value="', $row['id'], '">';
        echo '<button type="submit">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="nikki-delete.php" method="post">';
        echo '<input type="hidden" name="id" value="', $row['id'], '">';
        echo '<button type="submit">削除</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        echo "\n";

    }
?>
    </table>
    <button onclick="location.href='ren6-5-input.php'">商品を登録する</button>
    </body>
</html>

