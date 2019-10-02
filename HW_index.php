<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>本棚</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head Start -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="HW_select.php">本棚を見る</a></div>
    </div>
  </nav>
</header>
<!-- HeadEnd -->

<!-- Main Start -->
<form method="POST" action="HW_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>本を登録してください</legend>
     <label>本の名前：<input type="text" name="name"></label><br>
     <label>本のURL：<input type="text" name="url"></label><br>
     <label>コメント：<textArea name="comment" rows="4" cols="40"></textArea></label><br><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- MainEnd -->


</body>
</html>
