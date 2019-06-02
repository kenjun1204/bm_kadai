<!-- 登録処理 -->

<?php

$name = $_POST["name"];
$url = $_POST["url"];
$comment = $_POST["comment"];

include "bm_funcs.php";
$pdo = db_con();

$sql = "INSERT INTO gs_bm_table(name,url,comment,indate)VALUES(:name,:url,:comment,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

$status = $stmt->execute();

if ($status == false) {
    sqlError($stmt);
} else {
    redirect("bm_index.php");
}
?>