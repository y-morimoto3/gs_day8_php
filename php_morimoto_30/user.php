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

<p id="title">ユーザー登録</p>

<form method="POST" action="write.php">
    <div class="flex">
        <p>名前 :</p><input type="text" name="name" class="input" >
    </div >
    <div class="flex">
        <p>ログインID :</p><input type="email" name="lid" class="input" placeholder="メールアドレス">
    </div>
    
    <div class="flex">
        <p>パスワード :</p><input type="password" name="lpw" class="input" placeholder="英小文字と数字8~10文字" pattern="[0-9a-z]{8,10}" title="パスワードを確認してください。">
    </div>

    <div class="flex">
        <p>権限 :</p>
        <select name="kanri_flg" class="input" placeholder="一般社員/管理者">
            <option value="0">一般社員</option>
            <option value="1">管理者</option>
        </select>
    </div>


    <!-- <input type="hidden" name="kanri_flg" value=0> -->
    <input type="hidden" name="life_flg" value=1>
    
    <input type="submit" value="登録" class="button">


</form>
</div>




    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>