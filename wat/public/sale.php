
<?php require_once('../private/initialize.php'); ?>

<?php $subject_set = find_all_sale(); ?>

<?php $page_title = 'Sales'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo url_for('index.php'); ?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Sales</li>
        </ol>
        <!-- Page Content -->
        <h1>Sales</h1>
        <hr>
      </div>

      <div class="container">
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Sale ID</th>
                    <th>Category ID</th>
                    <th>Start</th>
                    <th>End</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
            <tbody>
            <?php while($page = mysqli_fetch_assoc($subject_set)) { ?>
              <tr>
                <td><?php echo h($page['saleId']); ?></td>
                <td><?php echo h($page['categoryId']); ?></td>
                <td><?php echo h($page['startDate']); ?></td>
                <td><?php echo h($page['endDate']); ?></td>
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