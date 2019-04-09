
<?php require_once('../private/initialize.php'); ?>

<?php 
$id = $_GET['id'] ?? '1'; // PHP > 7.0 // if not found, assign value 1
$subject_set = find_poDetails_by_id($id);
$subject = mysqli_fetch_assoc($subject_set); //Extract data from array

if(is_post_request()) {

  $order_status = [];
  $order_status['id'] = $id;
  $order_status['status'] = $_POST['status'] ?? '';

  $result = update_order_status($order_status);
  redirect_to(url_for('/index.php'));

} else {
  // redirect_to(url_for('/index.php'));
  // $subject_set = find_poDetails_by_id($id); //Extract data from array
}
?>

<?php $page_title = 'Order Details'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo url_for('index.php'); ?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?php echo url_for('orders-unauthorised.php'); ?>">Unauthorised Orders</a>
          </li>
          <li class="breadcrumb-item active">Order Details</li>
        </ol>
        <!-- Page Content -->
        <h1>Order Details:  <?php echo $id?></h1>
        <hr>
      </div>
      <div class="container">

        <form <?php echo url_for('/order-status-edit.php?id=' .h(u($id))); ?> method="post">
          <fieldset class="form-group">
              <div class="row">
                <label class="col-sm-4 col-form-label">Order ID:</label>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control" value="<?php echo $id; ?>">
                <br>
                </div>

                <label class="col-sm-4 col-form-label">Created:</label>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control" value="<?php echo h($subject['created']); ?>">
                <br>
                </div>

                <label class="col-sm-4 col-form-label">Supplier:</label>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control" value="<?php echo h($subject['supplierPostalCode']); ?>">
                <br>
                </div>

                <label class="col-sm-4 col-form-label">Delivery Days:</label>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control" value="<?php echo h($subject['deliveryDays']); ?>">
                <br>
                </div>

                <label class="col-sm-4 col-form-label">Employee:</label>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control" value="<?php echo h($subject['employeeName']); ?>">
                <br>
                </div>

                <?php 
                  $subject_set = find_poDetails_by_id($id);
                  $maybe=0;
                  while($page = mysqli_fetch_assoc($subject_set)) {
                    $maybe += $page['total'];
                  }
                ?>

                <label class="col-sm-4 col-form-label">Grand Total:</label>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control" value="£<?php echo $maybe; ?>">
                <br>
                </div>

                <label class="col-sm-4 col-form-label">Status:</label>
                <div class="form-group col-sm-8">
                <select class="form-control" id="exampleFormControlSelect1" name="status">
                  <option>Unauthorised</option>
                  <option>Authorised</option>
                  <option>Delivered</option>
                  <option>Cancelled</option>
                </select>
                </div>
              </div>
          </fieldset>

          <?php $subject_set = find_poDetails_by_id($id); ?>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Item ID</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php while($page = mysqli_fetch_assoc($subject_set)) { ?>
              <tr>
                <td><?php echo h($page['itemId']); ?></td>
                <td><?php echo h($page['quantity']); ?></td>
                <td>£<?php echo h($page['currentPrice']); ?></td>
                <td>£<?php echo h($page['total']); ?></td>
                <td><a class="action" href="#">Edit</a></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
          
          <button type="update" class="col-sm-2 btn btn-success">Update</button>
        </form>
          <?php
            mysqli_free_result($subject_set); // free up the data set
          ?>
          <!-- <button type="update" class="col-sm-2 btn btn-success">Update</button> -->
      </div>
    </div>
<!-- # wrapper end bellow-->
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>