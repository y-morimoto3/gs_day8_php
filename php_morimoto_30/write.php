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

<?php

// DB接続格納


$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];


require_once('funcs.php');
$pdo = db_conn();



// DB接続はfunc
//３．データ登録SQL作成
// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw, kanri_flg, life_flg)
                                         VALUES(NULL, :name, :lid, :lpw, :kanri_flg, :life_flg)");


//  2. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:" . $error[2]);
} 

// kanri_flgを文字で表示のため関数
function kanri($kanri_flg){
if($kanri_flg === "0"){
    echo "一般社員";
}else{
    echo "管理者";
}}; 


?>


<div id="wapper">

<p id="title">下記内容で登録いたしました。</p>

    <div class="flex">
        <p>名前 :</p><p class=input ><?= h($name); ?></p>
    </div >
    <div class="flex">
        <p>ユーザーID :</p><p class=input ><?= h($lid); ?></p>
    </div>
    <div class="flex">
        <p>ユーザー権限 :</p><p class=input ><?= kanri($kanri_flg); ?></p>
    </div>
    
    <div class="flex2">
        <div><input type="button" value="TOP" class="button" name="sarch" onclick="location.href='index.php'"></div>
        
    </div>

<!-- </form> -->
</div>
    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>