
<?php require_once('../private/initialize.php'); ?>

<?php
    $id = $_GET['id'] ?? '1'; // PHP > 7.0 // if not found, assign value 1
    $subject = find_employee_by_id($id); //Extract data from array
?>

<?php $page_title = 'Employee'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content-wrapper">
        <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="<?php echo url_for('index.php'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
            <a href="<?php echo url_for('employee.php'); ?>">Employees</a>
            </li>
            <li class="breadcrumb-item active">Employee</li>
        </ol>
        <!-- Page Content -->
        <h1>Employee</h1>
        <hr>
        </div>
        <div class="container">
            <dl>
                <dt>Employee ID:</dt>
                <dd><?php echo h($subject['employeeId']); ?></dd>
            </dl>
            <dl>
                <dt>First Name</dt>
                <dd><?php echo h($subject['firstName']); ?></dd>
            </dl>
            <dl>
                <dt>Last Name</dt>
                <dd><?php echo h($subject['lastName']); ?></dd>
            </dl>
            <dl>
                <dt>Role</dt>
                <dd><?php echo h($subject['jobRole']); ?></dd>
            </dl>
        </div>
    </div>
<!-- # wrapper end bellow-->
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>