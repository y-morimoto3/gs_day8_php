<?php
session_start();

//１．関数群の読み込み
if ($_SESSION['chk_ssid'] == session_id()) {
    // ok
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
} else {
    // id持ってない or idがおかしい
    exit("LOGIN ERROR");




require_once('funcs.php');
$pdo = db_conn();
$id = $_GET['id'];

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id =' . $id . ';');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($status);
} else {
    $row = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <title>LoM 会員登録</title>

    <link rel="icon" href="">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/reset.css">

</head>
<body>

<div id="wapper">

<p id="title">登録情報変更</p>

<form method="POST" action="update.php">
    <div class="flex">
        <p>名前 :</p><input type="text" name="name" value="<?= h($row['name']) ?>" class="input">
    </div >
    <div class="flex">
        <p>ユーザーID :</p><input type="text" name="lid" value="<?= h($row['lid']) ?>" class="input">
    </div>
    
    <div class="flex">
        <p>パスワード :</p><input type="text" name="lpw" value="<?= h($row['lpw']) ?>" class="input">
    </div>
    <!-- <div class="flex">
        <p>権限 :</p><input type="text" name="kanri_flg" value="<= h($row['kanri_flg']) ?>" class="input">
    </div> -->

    <div class="flex">
        <p>権限 :</p>
        <select name="kanri_flg" class="input" value="<?= h($row['kanri_flg']) ?>" placeholder="一般社員/管理者">
            <option value="0">一般社員</option>
            <option value="1">管理者</option>
        </select>
    </div>


    <!-- <div class="flex">
        <p>現職/退職 :</p><input type="text" name="life_flg" value="<?= h($row['life_flg']) ?>" class=text>
    </div> -->

    <div class="flex">
        <p>現職/退職 :</p>
        <select name="life_flg" class="input" value="<?= h($row['life_flg']) ?>" placeholder="">
            <option value="0">退職</option>
            <option value="1">現職</option>
        </select>
    </div>



    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    
    <input type="submit" value="更新" class="button">

</form>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>