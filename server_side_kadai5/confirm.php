<?php
// confirm.phpの中身は、ほとんどpost.phpに似ています。

session_start();
require_once('funcs.php');
loginCheck();

// post受け取る
$name = $_POST['name'];
$url = $_POST['url'];
$type = $_POST['type'];
$content = $_POST['content'];

$_SESSION['POST']['name'] =$_POST['name'];
$_SESSION['POST']['content'] =$_POST['content'];
$_SESSION['POST']['url'] =$_POST['url'];
$_SESSION['POST']['type'] =$_POST['type'];

var_dump($_FILES);

//セッションの中に$_POST['title']を入れる
//セッションの中に$_POST['content']を入れる
if ($_FILES['img']['name'] !== "") {
    $file_name = $_SESSION['post']['file_name'] = $_FILES['img']['name'];
    $image_data = $_SESSION['post']['image_data'] = file_get_contents($_FILES['img']['tmp_name']);
    $image_type = $_SESSION['post']['image_type'] = exif_imagetype($_FILES['img']['tmp_name']);
} else {
    $file_name = $_SESSION['post']['file_name'] = '';
    $image_data = $_SESSION['post']['image_data'] = '';
    $image_type = $_SESSION['post']['image_type'] = '';
}


// 簡単なバリデーション処理。
if(trim($name) =='' || trim($content) == ''){
    redirect('index.php?error'); //getでerrorを送ることができる
}
// imgある場合

?>

<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>記事管理</title>
</head>

<body>
    <header>
    <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">登録書籍データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header>

    <!-- errorを受け取ったら、エラー文出力。 -->

    <form method="POST" action="register.php" enctype="multipart/form-data" class="mb-3">
        <div class="mb-3">
            <label for="name" class="form-label">書籍名</label>
            <input type="hidden"name="name" value="<?= $name ?>">
            <p><?= $name ?></p>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="hidden"name="url" value="<?= $url ?>">
            <p><?= $url ?></p>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">書籍コメント</label>
            <input type="hidden"name="content" value="<?= $content ?>">
            <div><?= $content ?></div>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">書籍種類</label>
            <input type="hidden"name="type" value="<?= $type ?>">
            <div><?= $type ?></div>
        </div>
        <?php if ($image_data) :?>
            <!-- 写真を表示してください。 -->   
            <div class="mb-3">
                <img src="image.php">
            </div>
        <?php endif; ?>




        <button type="submit" class="btn btn-primary">投稿</button>
    </form>

    <a href="index.php?re-register=true">前の画面に戻る</a> 
    <!-- 戻るを押したら情報を残したい -->
</body>
</html>
