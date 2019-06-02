<!-- 更新処理 -->


<?php
$name = $_POST["name"];
$url = $_POST["url"];
$comment = $_POST["comment"];
$id= $_POST["id"];

include "bm_funcs.php";
$pdo = db_con();

$sql = "UPDATE gs_bm_table SET name=:name,url=:url,comment=:comment WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();


//select.phpは仮なので、ファイル作成後に要変更
if ($status == false) {
    sqlError($stmt);
} else {
    redirect("bm_select.php");
}

?>