<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>input</title>
    </head>
    <body>
        <p>日記を追加します</p>
        <form action="output.php" method="post">
            日付<input type="text" name="date" ><br>
           　気分<input type="text" name="mood"><br>
            本文<input type="text" name="content"><br>
            <button type="submit">追加</button>
        </form>
    </body>
</html>