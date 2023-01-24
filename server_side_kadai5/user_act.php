<?php
session_start();
require_once('funcs.php');
$pdo = db_conn();

$user = $_POST['user'];
$lid  = $_POST['lid'];
$lpw  = $_POST['lpw'];
$kanri_flg  = 0;
$life_flg = 0;

if(trim($user) =='' || trim($lpw) == ''){
    redirect('index.php?error'); //getでerrorを送ることができる
}




$stmt = $pdo->prepare('INSERT INTO gs_user_table(id,user,lid,lpw,kanri_flg,life_flg) VALUES(NULL,:user,:lid,:lpw,:kanri_flg,:life_flg)');
$stmt->bindValue(':user', $user, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', 0, PDO::PARAM_STR);
$stmt->bindValue(':life_flg', 0, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

if (!$status) {
    sql_error($stmt);
} else {
    $_SESSION['post'] = [] ;
    redirect('select.php');
}

if(isset($_GET[('error')])):?>  
<p class='text-danger'>記入内容を入力してください。</P>
<?php endif ?>

