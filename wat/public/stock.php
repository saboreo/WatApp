
<?php require_once('../private/initialize.php'); ?>

<?php $subject_set = find_all_item(); ?>

<?php $page_title = 'Stock'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo url_for('index.php'); ?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Stock</li>
        </ol>
        <!-- Page Content -->
        <h1>Stock</h1>
        <hr>
      </div>

      <div class="container">
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <!-- <th>Image</th> -->
                    <th>Selling State</th>
                    <!-- <th>Sale Title</th> -->
                    <!-- <th>Top Rated</th> -->
                    <!-- <th>Sale ID</th> -->
                    <th></th>
                    <!-- <th></th> -->
                    <!-- <th></th> -->
                  </tr>
                </thead>
            <tbody>
            <?php while($page = mysqli_fetch_assoc($subject_set)) { ?>
              <tr>
                <td><?php echo h($page['itemId']); ?></td>
                <td><?php echo h($page['title']); ?></td>
                <td><?php echo h($page['categoryId']); ?></td>
                <td>£<?php echo h($page['currentPrice']); ?></td>
                <!-- <td><?php echo ($page['galleryFile']); ?></td> -->
                <td><?php echo h($page['sellingState']); ?></td>
                <!--<td><?php echo h($page['saleTitle']); ?></td> -->
                <!-- <td><?php echo h($page['topRated']); ?></td> -->
                <!-- <td><?php echo h($page['saleId']); ?></td> -->
                <td><a class="action" href="<?php echo url_for('/stock-view.php?id=' . h(u($page['itemId']))); ?>">View</a></td>
                <!-- <td><a class="action" href="#">Edit</a></td> -->
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