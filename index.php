<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/app.js"></script>
</head>
<body>
    <div class="screen">
        <div class="main">
            <div class="centerbox">
                <h1>TODO LIST</h1>
                <form class="todoform" action="insert.php" method="post">
                    <li>タイトル</li>
                    <input type="text" name="name" id="entry" placeholder="ここにタイトルを入力してください">
                    <li>内容</li>
                    <textarea name="text" id="detail" placeholder="ここに詳細を入力してください"></textarea>
                    <div class="button">
                        <input type="submit" value="送信" id="submit">
                    </div>
                </form>
                <h2><a href="select.php" class="link">> DB Log.</a></h2>
            </div>
        </div>
    </div>
</body>
</html>

