<?php
//1.  DB接続します xxxにDB名を入れます
try {
$pdo = new PDO('mysql:dbname=kadai06_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
$stmt = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
} else {
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<div class="entries">';
    $view .= '  <div class="entry">';
    $view .= '    <div class="entname">';
    $view .= '      <p>';
    $view .= $result["id"].": ".$result["name"];
    $view .= '      </p>';
    $view .= '    </div>';
    $view .= '    <div class="entbtn link">';
    $view .= '      <form action="delete.php" method="get">';
    $view .= '        <a href="delete.php?id='.$result["id"].'">';
    $view .= '          <img src="./img/icon_peke.png" class="peke">';
    $view .= '        </a>';
    $view .= '      </form>';
    $view .= '    </div>';
    $view .= '  </div>';
    $view .= '  <p class="maintext">';
    $view .= $result["text"];
    $view .= '  </p>';
    $view .= '  <div class="remarks">';
    $view .= '    <div class="reaction">';
    $view .= '      <form class="goodjob" action="goodjob.php" method="post">';
    $view .= '        <input type="image" src="./img/icon_good.png" class="good"> いいね！'; 
    $view .= '      </form>';
    $view .= '    </div>';
    $view .= '    <div class="timestamp">';
    $view .= '        <p>';
    $view .= $result["time"];
    $view .= '        </p>';
    $view .= '    </div>';
    $view .= '  </div>';
    $view .= '</div>';
  }
}
?>

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
    <script>
    // 関数1：エントリー削除の際に警告文を表示する
    function confirm_delete() {
        var erase = window.confirm("エントリーを削除しますか？");
        return erase;
    }
    </script>
</head>
<body>
    <div class="screen">
        <div class="main">
            <div class="centerbox">
                <h1>SELECT DB</h1>
                <h2><a href="index.php" class="link">> Back to TODO Form.</a></h2>
                <div class="result">
                    <?=$view?>
                </div>
                <h2><a href="index.php" class="link">> Back to TODO Form.</a></h2>
            </div>
        </div>
    </div>
</body>
</html>