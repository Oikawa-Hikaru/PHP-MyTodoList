<?php
// select.phpより対象のidをGETしてきます
$id = $_GET["id"];

// DELETE文を代入する
$sql = "DELETE FROM todo WHERE id = :id";

// DBに接続する
try {
$pdo = new PDO('mysql:dbname=kadai06_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

// 削除するIDを特定するための箇所
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

// 上記の処理が正常に行われているかどうかを判定する
if($status==false) {
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    header("Location: select.php");
    exit;
}

?>