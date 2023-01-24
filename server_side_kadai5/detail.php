<?php
/**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */
session_start();
require_once('funcs.php');
loginCheck();

 $id = $_GET['id'];


//select.php 描写するときにhtmlspecialcharsで<script>タグで悪さされたものが文字列として入力される

//1.  DB接続します

$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table2 WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //INT = 数字
$status = $stmt->execute();


if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $row = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍ログ表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<!-- Main[Start] -->

<div>
    <div class="container jumbotron"></div> 
    <fieldset>
    <form method="POST" action="update.php" class="mb-3">
                <legend>書籍記録</legend>
                <label>書籍名：<input type="text" name="name" value="<?= $row['name']?>"></label><br>
                <label>書籍URL:<input type="text" name="url" value="<?= $row['url']?>"></label><br>
                <label>書籍コメント:<textarea name="content" rows="4" cols="40"><?= $row['content']?></textarea></label><br>
                <input type="hidden" name="id" value="<?= $row['id']?>">
                <select name="type" class="type">
                  <option><?= $row['type']?></option>
                  <option>マンガ</option>
                  <option>ビジネス書</option>
                  <option>趣味・文芸書</option>
                  <option>雑誌</option>
                  <option>小説</option>
                  <option>その他</option>
                </select>
                <label for="title" class="form-label">画像</label><input type="file" name="img">                
               </div>
                <input type="hidden" name="id" id="id" aria-describedby="id" value="<?= $row["id"] ?>">
                <input type="submit" value="修正">
                </form>
                <form method="POST" action="delete.php?id=<?= $row['id'] ?>" class="mb-3">
                <button type="submit" class="btn btn-danger">削除</button>
                </form>
                
            </fieldset>
</div>
<!-- Main[End] -->
</body>
</html>
