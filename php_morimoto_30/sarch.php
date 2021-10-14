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

<?PHP
session_start();

// １．関数群の読み込み
if ($_SESSION["chk_ssid"] == session_id()) {
    // ok
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
} else {
   // id持ってない or idがおかしい
    exit("LOGIN ERROR <a href='login.php'>ログイン</a>");
}


// DB接続格納済
require_once('funcs.php');



//２．データ取得SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM gs_user_table ');
$status = $stmt->execute();


// 名前
echo ($_SESSION["name"]);


//３．データ表示
$view = ""; 
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($status);
} else {
    //Selectデータの数だけ自動でループしてくれる
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        
            // kanri_flgを文字で表示のため関数 →うまく表現できず。宿題
            //     $kanri_flg2 = h($result['kanri_flg']);
            //     function kanri($kanri_flg2){
            //     if($kanri_flg2 === 0){
            //         echo "一般社員";
            //     }else{
            //         echo "管理者";
            //     }}; 
            // kanri($kanri_flg2);


            // life_flgを文字で表示のため関数 →うまく表現できず。宿題
                // $life_flg2 = h($result['life_flg']);
                // function life($life_flg2){
                // if($life_flg2 === "0"){
                //     echo "退職";
                // }else{
                //     echo "現職";
                // }}; 
            // life($life_flg2);


        
        $view .= '<div class="sarch_flex">';
        $view .= '<span class="s">' ;
        $view .= h($result['name']);
        $view .= '</span>';
        $view .= '<span class="s2">' ;
        $view .= h($result['lid']);
        $view .= '</span>';



        $view .= '<span class="s3">' ;
        // $view .= kanri($kanri_flg2); 
                // $view .=function kanri($kanri_flg2){
                //         if($kanri_flg2 === "0"){
                //             echo "一般社員";
                //         }else{
                //             echo "管理者";
                //         }}; 
        $view .= h($result['kanri_flg']);
        $view .= '</span>';


        $view .= '<span class="s3">' ;
        // $view .= life($life_flg2); →うまく表現できず。宿題
                // $view .= function life($life_flg2){ →うまく表現できず。宿題
                //         if($life_flg2 === "0"){
                //             echo "退職";
                //         }else{
                //             echo "現職";
                //         }}; 
        $view .= h($result['life_flg']);
        $view .= '</span>';

        // 管理者のみ
        if ($_SESSION["kanri_flg"]) {
        $view .= '<a href="detail.php?id=' .$result['id'].  '">';
        $view .= '<button class="b3">更新</button>';
        $view .= '</a>';
        $view .= '<a href="delete.php?id=' .$result['id'].   '">';
        $view .= '<button class="b4">削除</button>';
        $view .= '</a>';
        }
        
        $view .= '</div>';

    }
}

?>
        <div class="head">
            <a href="index.php">
                <button class="b5">TOP</button>
            </a>
        </div>
        <div class="head">
            <a href="logout.php">
                <button class="b8">logout</button>
            </a>
        </div>
    

        <div class="sarch_flex">
            <span class="s">名前</span>
            <span class="s2">ユーザーID</span>
            <span class="s3">権限</span>
            <span class="s3">現退職</span>
        </div>

        <div class="sarch">
            <?php echo $view ?>
        </div>

       

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>