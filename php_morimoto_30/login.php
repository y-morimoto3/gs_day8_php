<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <title></title>

    <link rel="icon" href="">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/reset.css">

</head>
<body>
<div id="wapper">

<p id="title">ログイン</p>

<form name="form1 "method="POST" action="login_act.php">
    <div class="flex">
        <p>ログインID :</p><input type="email" name="lid" class="input" placeholder="メールアドレス">
    </div>
    
    <div class="flex">
        <p>パスワード :</p><input type="password" name="lpw" class="input" placeholder="英小文字と数字8~10文字" pattern="[0-9a-z]{8,10}" title="パスワードを確認してください。">
    </div>

    <input type="submit" value="ログイン" class="button">

    </form>
</div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>