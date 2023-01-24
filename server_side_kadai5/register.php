<?php
session_start();
require_once('funcs.php');
loginCheck();

$name = $_POST['name'];
$content  = $_POST['content'];
$url  = $_POST['url'];
$type  = $_POST['type'];
$img = '';



if ($_SESSION['post']['image_data'] !== "")  {
    $img = date('YmdHis') . '_' . $_SESSION['post']['file_name'];
    file_put_contents("./images/$img", $_SESSION['post']['image_data']);
}

// 簡単なバリデーション処理追加。
if(trim($name) =='' || trim($content) == ''){
    redirect('index.php?error'); //getでerrorを送ることができる
}
//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO gs_bm_table2(id,name,url,content,type,img,time) 
VALUES(NULL,:name,:url,:content,:type,:img,sysdate())');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':type', $type, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    $_SESSION['post'] = [] ;
    redirect('select.php');
}
