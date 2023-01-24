 <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/main.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    <title>ユーザー登録</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-default">ユーザー登録</nav>
    </header>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                    <a class="navbar-brand" href="index.php">ログイン</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <form name="form1" action="user_act.php" method="post">
        <P>name:<input type="text" name="user" /></P>
        <P>ID:<input type="text" name="lid" /></P>
        <P>PW:<input type="password" name="lpw" /></P>
        <P><input type="hidden" name="kanri_flg" value=""/></P>
        <P><input type="hidden" name="life_flg" value=""/></P>
        <input type="submit" value="ユーザー登録" />
    </form>


</body>

</html>
