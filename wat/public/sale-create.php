<?php
require_once('../../private/initialize.php');
// Handle form values sent by new.php

if (is_post_request()) {
// $saleId = $_POST['saleId'] ?? '';
$discount = $_POST['discount'] ?? '';
$categoryId = $_POST['categoryId'] ?? '';
$startDate = $_POST['startDate'] ?? '';
$endDate = $_POST['endDate'] ?? '';

$sql = "INSERT INTO sale ";
$sql .= "(discount, categoryId, startDate, endDate)";
$sql .= "VALUES (";
$sql .= "'" . $discount . "',";
$sql .= "'" . $categoryId . "',";
$sql .= "'" . $startDate . "',";
$sql .= "'" . $endDate . "'";
$sql .= ")";
$result = mysqli_query($db, $sql);
//for insert statements $result is true/false

if($result) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/sale-edit.php?id=' . $new_id));
} else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
}

} else {
    redirect_to(url_for('/sale-new.php'));
}

?>