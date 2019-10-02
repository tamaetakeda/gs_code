<?php
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
$id=$_GET["id"]; //?id=**を受け取る
// echo $id;
include("HW_funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

// $stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
// $stmt->bindValue(":id",$id,PDO::PARAM_INT);
// $status = $stmt->execute();

//３．データ表示
if($status==false) {
  sql_error();
}else{
    $row = $stmt->fetch(); //1レコードとる
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>本棚更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="HW_select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="HW_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>[編集]</legend>
     <label>本の名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>本のURL：<input type="text" name="url" value="<?=$row["url"]?>"></label><br>
     <label>コメント：<textArea name="comment" rows="4" cols="40"><?=$row["comment"]?></textArea></label><br>
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?=$id?>"> 
    </fieldset>

    <!-- <label>本の名前：<input type="text" name="name"></label><br>
     <label>本のURL：<input type="text" name="URL"></label><br>
     <label>コメント：<textArea name="comment" rows="4" cols="40"></textArea></label><br><br>
     <input type="submit" value="送信"> -->

  </div>
</form>
<!-- Main[End] -->


</body>
</html>
