
<?php require_once('../private/initialize.php'); ?>

<?php $subject_set = find_all_itemSupplier(); ?>

<?php $page_title = 'Price List'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo url_for('index.php'); ?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Supplier Price List</li>
        </ol>
        <!-- Page Content -->
        <h1>Supplier Price List</h1>
        <hr>
      </div>


      <div class="container">
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Item ID</th>
                    <th>Price</th>
                    <th>Supplier</th>
                    <th>Post Code</th>
                    <th>Delivery Days</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
            <tbody>
            <?php while($page = mysqli_fetch_assoc($subject_set)) { ?>
              <tr>
                <td><?php echo h($page['itemId']); ?></td>
                <td><?php echo h($page['currentPrice']); ?></td>
                <td><?php echo h($page['supplierName']); ?></td>
                <td><?php echo h($page['postalCode']); ?></td>
                <td><?php echo h($page['deliveryDays']); ?></td>
                <td><a class="action" href="<?php echo url_for('/pages/show.php?id=' . h(u($page['id']))); ?>">View</a></td>
                <td><a class="action" href="<?php echo url_for('/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
                <td><a class="action" href="">Delete</a></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
          <?php
            mysqli_free_result($subject_set); // free up the data set
          ?>
      </div>


  </div>
<!-- # wrapper end bellow-->
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>