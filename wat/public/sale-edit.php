
<?php require_once('../private/initialize.php'); ?>

<?php
    $id = $_GET['id'] ?? '1';

    $subject = find_sale_by_id($id); //Extract data from array
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
            <a href="<?php echo url_for('sale.php'); ?>">Sales</a>
            </li>
            <li class="breadcrumb-item active">Sale:</li>
        </ol>
        <!-- Page Content -->
        <h1>Sale</h1>
        <hr>
        </div>
        <div class="container">

            <form>
                <fieldset class="form-group">
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Sale ID:</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo h($subject['saleId']); ?>">
                        <br>
                        </div>

                        <label class="col-sm-4 col-form-label">Discount %:</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo h($subject['discount']); ?>">
                        <br>
                        </div>

                        <label class="col-sm-4 col-form-label">Category ID:</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo h($subject['categoryId']); ?>">
                        <br>
                        </div>

                        <label class="col-sm-4 col-form-label">Start Date:</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo h($subject['startDate']); ?>">
                        <br>
                        </div>

                        <label class="col-sm-4 col-form-label">End Date:</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo h($subject['endDate']); ?>">
                        <br>
                        </div>
                    </div>
                </fieldset>
                <button type="button" class="col-sm-2 btn btn-success">Update</button>
            </form>

        </div>
    </div>
<!-- # wrapper end bellow-->
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>