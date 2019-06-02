<!-- 更新画面 -->

<?php

$id = $_GET["id"];
include "bm_funcs.php";
$pdo = db_con();

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table where id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

$view = "";
if ($status == false) {
    sqlError($stmt);
}
$row = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマークアプリ</legend>
     <label>書籍名：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>書籍URL：<input type="text" name="url" value="<?=$row["url"]?>"></label><br>
     <label><textArea name="comment" rows="4" cols="40"><?=$row["comment"]?></textArea></label><br>
     <!-- <label>登録日時：<input type="text" name="datetime"></label><br> -->
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?=$row["id"]?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
