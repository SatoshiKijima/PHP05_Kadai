<?php
session_start();
require_once('funcs.php');
loginCheck();

//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//2. $id = $_POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
$id = $_POST['id'];
$name =$_POST['name'];
$url =$_POST['url'];
$content =$_POST['content'];
$type =$_POST['type'];
$img ='';

if (isset($_FILES['img']['name'])) {
  move_uploaded_file($_FILES['img']['tmp_name'], '../images/' . $img);
}


if (isset($err) && count($err) > 0) {
  redirect('post.php?error=1');
}

$pdo = db_conn();

//３．データ登録SQL作成
if ($_SESSION['post']['name'] !== "")  {
  $stmt = $pdo->prepare(
                       'UPDATE
                        gs_bm_table2  
                        SET 
                        name = :name,
                        url = :url, 
                        content = :content, 
                        type = :type, 
                        img = :img, 
                        update_time = sysdate()
                        WHERE id = :id;');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':type', $type, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

} else {
  $stmt = $pdo->prepare(
                        'UPDATE
                        gs_bm_table2
                        SET 
                        name = :name,
                        url = :url, 
                        content = :content, 
                        type = :type, 
                        update_time = sysdate()
                        WHERE id = :id;');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':type', $type, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
}
$status = $stmt->execute(); //実行

if ($status == false) {
    sql_error($stmt);
  } else {
    redirect('select.php');
  }
