<?php

require_once('funcs.php');

$pdo = db_conn();

$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];
$id = $_POST['id'];

// 更新SQL テーブル名・セット・条件
$stmt = $pdo->prepare("UPDATE
                        gs_user_table 
                    SET 
                        name = :name,
                        lid = :lid,
                        lpw = :lpw,
                        kanri_flg = :kanri_flg,
                        life_flg = :life_flg
                    WHERE 
                        id = :id;");


// バインド変数
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

//  3. 実行
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    redirect('sarch.php');
}