<?php
include "bm_funcs.php";
$pdo = db_con();

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="bm_detail.php?id='.$result["id"].'">';
        $view .= $result["name"] . "," . $result["url"];
        $view .= '</a>';
        $view .= '　';
        $view .= '<a href="bm_delete.php?id='.$result["id"].'">';
        $view .= "[削除]";
        $view .= '</a>';
        $view .= '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマーク表示</title>
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
      <a class="navbar-brand" href="bm_index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
