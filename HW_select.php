<?php
include("HW_funcs.php");
$pdo=db_conn();
//1.  DB接続します...Insertの接続からそのままコピーする、その後ファンクション化している、funcs.phpにいれてある

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table"); //prepareの中にSQLからとってくる
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  sql_error();
  // function sql_error(){
  // //execute（SQL実行時にエラーがある場合）
  // $error = $stmt->errorInfo();
  // exit("SQLError:".$error[2]);
  // }
}else{
  //Selectデータの数だけ自動でループしてくれる //ここはこういうもん// 1レコードづつでてくる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php

  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<p>';
    $view .= '<a href="HW_detail.php?id='.$r["id"].'">';  //html
    $view .= $r["id"]."|".$r["name"]."|".$r["url"]."|".$r["comment"];
    $view .= '</a>';
    $view .=" ";
    $view .= '<a class="btn-danger" href="HW_delete.php?id='.$r["id"].'">';  //html
    $view .= '[削除]';
    $view .= '</a>';
    $view .= '</p>';
  }

  // while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
  //   $view .= $r["id"]."|".$r["name"]."|".$r["URL"].$r["comment"].$r["indate"]."<br>"; //.=は前のに足していくといくこと
  // }
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>本棚編集</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="HW_index.php">データ編集</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?php echo $view?></div>
    <!-- ?= $view?という書き方もある -->

</div>
<!-- Main[End] -->

</body>
</html>
