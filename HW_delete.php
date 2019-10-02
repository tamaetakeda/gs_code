<?php
//1. POSTデータ取得
$id = $_GET["id"]; //updateにはid必要

//2. DB接続します
include("HW_funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成 アップデートの構文 UPdate 何を どのIDに
$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error();
}else{
  redirect("HW_select.php");
}

?>