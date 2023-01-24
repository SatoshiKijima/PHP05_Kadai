<?php
session_start();
require_once('funcs.php');
/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$name =$_POST['name'];
$url =$_POST['url'];
$content =$_POST['content'];
$type =$_POST['type'];
$img =$_POST['img'];

//2. DB接続します　おまじない　
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=kadai_php4;charset=utf8;host=localhost','root',''); //root,hostなど環境によって異なる

} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}
// tryで接続してみて、エラーをcatchしたらexitで処理して

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO 
                        gs_bm_table2(id,name,url,content,type,time,img) 
                        VALUES(NULL,:name,:url,:content,:type,:sysdate()),img " ); //ここにSQL文を書く 「：」を値の場所に入れて一旦変数化する危険だから

//  2. バインド変数を用意・・bindValueでルール付けしたものを（PDO何たらを通して）:nameに入れましょうとして安全性を担保する
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
//SQLインジェクション
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':type', $type, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);



//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if(trim($name) =='' || trim($content) == ''){
  redirect('index.php?error'); //getでerrorを送ることができる
}
?>
