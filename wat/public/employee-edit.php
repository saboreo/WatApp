
<?php require_once('../private/initialize.php'); ?>

<?php
    $id = $_GET['id'] ?? '1'; // PHP > 7.0 // if not found, assign value 1
    // $subject = find_employee_by_id($id); //Extract data from array

    if(is_post_request()) {

        $subject = [];
        $subject['id'] = $id;
        $subject['firstName'] = $_POST['firstName'] ?? '';
        $subject['lastName'] = $_POST['lastName'] ?? '';
        $subject['email'] = $_POST['email'] ?? '';
        $subject['jobRole'] = $_POST['jobRole'] ?? '';

        $result = update_employee($subject);
        redirect_to(url_for('/employee.php'));

    } else {
        // redirect_to(url_for('/index.php'));
        $subject = find_employee_by_id($id); //Extract data from array
    }
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

            <form action="<?php echo url_for('/employee-edit.php?id=' .h(u($id))); ?>" method="post">
                <fieldset class="form-group">
                    <div class="row">

                    <label class="col-sm-4 col-form-label">Employee ID:</label>
                    <div class="col-sm-8">
                    <input type="text" readonly class="form-control" value="<?php echo h($subject['employeeId']); ?> " name="id">
                    <br>
                    </div>

                    <label class="col-sm-4 col-form-label">First Name</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo h($subject['firstName']); ?>" name="firstName">
                    <br>
                    </div>

                    <label class="col-sm-4 col-form-label">Last Name</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo h($subject['lastName']); ?>" name="lastName">
                    <br>
                    </div>

                    <label class="col-sm-4 col-form-label">Last Name</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo h($subject['email']); ?>" name="email">
                    <br>
                    </div>

                    <label class="col-sm-4 col-form-label">Role</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo h($subject['jobRole']); ?>" name="jobRole">
                    <br>
                    </div>

                    </div>
                </fieldset>
                <button type="update" class="col-sm-2 btn btn-success">Update</button>
            </form>

        </div>
    </div>


<!-- # wrapper end bellow-->
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>