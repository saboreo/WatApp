
<?php require_once('../private/initialize.php'); ?>

<?php
    $id = $_GET['id'] ?? '1';

    $page = find_supplier_by_id($id); //Extract data from array
?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content-wrapper">
        <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="<?php echo url_for('index.php'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
            <a href="<?php echo url_for('supplier.php'); ?>">Suppliers</a>
            </li>
            <li class="breadcrumb-item active">Supplier</li>
        </ol>
        <!-- Page Content -->
        <h1>Supplier</h1>
        <hr>
        </div>
        <div class="container">
            <dl>
                <dt>Post Code</dt>
                <dd><?php echo h($page['postalCode']); ?></dd>
            </dl>
            <dl>
                <dt>Name:</dt>
                <dd><?php echo h($page['supplierName']); ?></dd>
            </dl>

            <dl>
                <dt>Address</dt>
                <dd><?php echo h($page['location']); ?></dd>
            </dl>
            <dl>
                <dt>Country</dt>
                <dd><?php echo h($page['country']); ?></dd>
            </dl>
            <dl>
                <dt>Delivery Days</dt>
                <dd><?php echo h($page['deliveryDays']); ?></dd>
            </dl>
        </div>
    </div>
<!-- # wrapper end bellow-->
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>