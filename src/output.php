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
<button onclick="location.href='itiran.php'">トップへ戻る</button>
<?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('insert into nikki(date,mood,content)values (?,?,?)');
    if(!preg_match('/^\d+$/',$_POST['date'])){
        echo '日付を整数で入力してください。';
    }else if(empty($_POST['mood'])){
        echo '気分を入力してください。';
    }else if(empty($_POST['content'])){
        echo '本文を入力してください。';
    }else if($sql->execute([ $_POST['date'],$_POST['mood'],$_POST['content'] ]) ){
        echo '<font color="red">追加に成功しました。</font>';
    }else {
        echo '<font color="red">追加に失敗しました。</font>';
    }
    ?>
    <br><hr><br>
    <table>
     <?php
     foreach ($pdo->query('select * from nikki')as $row){
        echo '<tr>';
        echo '<td>',$row['date'],'</td>';
        echo '<td>',$row['mood'],'</td>';
        echo '<td>',$row['content'],'</td>';
        echo "\n";
     }
   
    ?>
    </table>
</body>
</html>