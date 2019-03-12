
<?php require_once('../private/initialize.php'); ?>
<?php $page_title = 'Dashboard'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

  <div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo url_for('/index.php'); ?>">Dashboard</a>
            </li>
          </ol>
        </div>
  </div>

<!-- # wrapper end -->
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>