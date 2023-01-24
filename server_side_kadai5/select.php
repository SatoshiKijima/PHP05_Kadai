<?php

session_start();
require_once('funcs.php');
loginCheck();

//クロスサイトスクリプティングを防ぐ 
//hが下が効いた状態で動く
//select.php 描写するときにhtmlspecialcharsで<script>タグで悪さされたものが文字列として入力される

//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table2;"); //あるデータベースから抜き出すからそのままでOK
$status = $stmt->execute(); //実行するPHPのClassを理解しないと-＞は理解できない


//３．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    $contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <div class="container jumbotron"><?= $view ?></div> 
   
</div>
<div class="album py-5 bg-light">
 <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach ($contents as $content): ?>
        <div class="card shadow-sm">
        <?php if($content ['img']):?> 
                                <!-- 画像が登録されている場合は↓ -->
                                <img src="./images/<?= $content['img']?>" alt="" class="bd-placeholder-img card-img-top" >
                            <?php else : ?>
                                <img src="./images/default_image/no_image_logo.png" alt="" class="bd-placeholder-img card-img-top" >
                                <!-- 画像が登録されていない場合は↓ -->
                            <?php endif ?>
            <div class="card-body">
              <h3><?= $content['name'] ?></h3>
              <p class="card-text"><?= nl2br($content['content']) ?></p>
              <p class="card-text"><?= $content['type'] ?></p>
            </div>
             <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">登録日:<?= $content['time'] ?></small>
             </div>
             <?php if (!is_null($content['time'])): ?>
             <div class="d-flex justify-content-between align-items-center">
             <small class="text-muted">更新日:<?= $content['update_time'] ?></small>
              </div>
              <?php endif ?>
              <a href="detail.php?id=<?=$content['id']?>" class="btn btn-outline-info stretched-link">編集する</a>
        </div>
        <?php endforeach ?>
  </div>
  </div>


<!-- Main[End] -->

</body>
</html>