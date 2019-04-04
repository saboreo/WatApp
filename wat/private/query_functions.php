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

    function find_category_ids() {
        global $db;
        $sql = "SELECT categoryId FROM category ";
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

    function find_all_sale() {
        global $db;
        $sql = "SELECT * FROM sale";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_sale_by_id($id) {
        global $db;

        $sql = "SELECT * FROM sale ";
        $sql .= "WHERE saleId='" . $id . "'";
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

    function find_unauthorised_orders() {
        global $db;
        $sql = "SELECT poID, employeeId, supplierPostalCode, created, orderStatus ";
        $sql .= "FROM purchaseOrder ";
        $sql .= "WHERE orderStatus = 'Unauthorised';";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_authorised_orders() {
        global $db;
        $sql = "SELECT poID, employeeId, supplierPostalCode, created, orderStatus ";
        $sql .= "FROM purchaseOrder ";
        $sql .= "WHERE orderStatus = 'Authorised';";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_poDetails_by_id($id) {
        global $db;
        $sql = "SELECT poDetails.poID, poDetails.itemId, poDetails.quantity, purchaseOrder.created, ";
        $sql .= "purchaseOrder.employeeId, purchaseOrder.supplierPostalCode, supplier.deliveryDays, ";
        $sql .= "concat(employee.firstName,' ', employee.lastName) AS 'employeeName', ";
        $sql .= "itemSupplier.currentPrice, ";
        $sql .= "round(itemSupplier.currentPrice*poDetails.quantity, 2) AS 'total' ";
        $sql .= "FROM poDetails ";
        $sql .= "INNER JOIN purchaseOrder ON  poDetails.poID=purchaseOrder.poID ";
        $sql .= "INNER JOIN supplier ON purchaseOrder.supplierPostalCode=supplier.postalCode ";
        $sql .= "INNER JOIN employee ON purchaseOrder.employeeId = employee.employeeId ";
        $sql .= "INNER JOIN itemSupplier ON poDetails.itemId=itemSupplier.itemId AND purchaseOrder.supplierPostalCode = itemsupplier.postalCode ";
        $sql .= "WHERE purchaseOrder.poID='" . $id . "' ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result; // returns an assoc. full array
    }

    // function find_poDetails_by_id($id) {
    //     global $db;
    //     $sql = "SELECT poDetails.poID, poDetails.itemId, poDetails.quantity, purchaseOrder.created, ";
    //     $sql .= "purchaseOrder.employeeId, purchaseOrder.supplierPostalCode ";
    //     $sql .= "FROM poDetails ";
    //     $sql .= "JOIN purchaseOrder ON  poDetails.poID=purchaseOrder.poID ";
    //     $sql .= "WHERE purchaseOrder.poID='" . $id . "' ";
    //     $result = mysqli_query($db, $sql);
    //     confirm_result_set($result);
    //     return $result; // returns an assoc. full array
    // }

    function create_sale($discount, $categoryId, $startDate, $endDate) {
        global $db;
        $sql = "INSERT INTO sale ";
        $sql .= "(discount, categoryId, startDate, endDate) ";
        $sql .= "VALUES (";
        $sql .= "'" . $discount . "',";
        $sql .= "'" . $categoryId . "',";
        $sql .= "'" . $startDate . "',";
        $sql .= "'" . $endDate . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        //for insert statements $result is true/false
        if($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }
    ?>