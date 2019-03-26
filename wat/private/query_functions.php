<?php

    function find_all_suppliers() {
        global $db;
        
        $sql = "SELECT * FROM supplier ";
        $sql .= "ORDER BY supplierName ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_category() {
        global $db;
        $sql = "SELECT * FROM category ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_item() {
        global $db;
        $sql = "SELECT * FROM item ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_itemSupplier() {
        global $db;
        $sql = "SELECT itemsupplier.itemId, itemsupplier.currentPrice, itemsupplier.postalCode, supplier.supplierName, supplier.deliveryDays ";
        $sql .= "FROM itemSupplier ";
        $sql .= "INNER JOIN supplier ON itemsupplier.postalCode = supplier.postalCode ";
        $sql .= "ORDER BY itemsupplier.itemId;";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_location() {
        global $db;
        $sql = "SELECT * FROM location ";
        $sql .= "ORDER BY locationId ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_employee() {
        global $db;
        $sql = "SELECT employeeId, firstName, lastName, email, jobRole ";
        $sql .= "FROM employee ";
        $sql .= "ORDER BY employeeId;";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_sale() {
        global $db;
        $sql = "SELECT * FROM sale";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_employee_by_id($id) {
        global $db;

        $sql = "SELECT * FROM employee ";
        $sql .= "WHERE employeeId='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $subject = mysqli_fetch_assoc($result); //Extract data from array
        mysqli_free_result($result);
        return $subject; // returns an assoc. full array
    }

    function find_supplier_by_id($id) {
        global $db;
        
        $sql = "SELECT * FROM supplier ";
        $sql .= "WHERE postalCode='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $subject = mysqli_fetch_assoc($result); //Extract data from array
        mysqli_free_result($result);
        return $subject; // returns an assoc. full array
    }

    ?>