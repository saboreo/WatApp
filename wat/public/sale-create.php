<?php
require_once('../private/initialize.php');
// Handle form values sent by new.php

if (is_post_request()) {
    // $saleId = $_POST['saleId'] ?? '';
    $discount = $_POST['discount'] ?? '';
    $categoryId = $_POST['categoryId'] ?? '';
    $startDate = $_POST['startDate'] ?? '';
    $endDate = $_POST['endDate'] ?? '';

    $result = create_sale($discount, $categoryId, $startDate, $endDate);
    // $new_id = mysqli_insert_id($db); // this is to fetch newly created ID
    redirect_to(url_for('/sale.php'));
    // redirect_to(url_for('/sale-edit.php?id=' . $new_id)); // Assign newly created ID as a page ID

} else {
    redirect_to(url_for('/sale-new.php'));
}

?>