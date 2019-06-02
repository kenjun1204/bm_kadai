<!-- 削除処理 -->

<?php

$id = $_GET["id"];

include "bm_funcs.php";
$pdo = db_con();

$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    redirect("bm_select.php");
}
?>