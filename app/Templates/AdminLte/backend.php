<?php
/**
 * Backend Default Layout
 */

use Helpers\Profiler;

// Prepare the current User Info.
$user = Auth::user();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?> | <?= SITETITLE; ?></title>
    <?= $meta; // Place to pass data / plugable hook zone ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php
    Assets::css(array(
        // Bootstrap 3.3.5
        template_url('bootstrap/css/bootstrap.min.css', 'AdminLte'),
        // Font Awesome
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        // Ionicons
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        // Theme style
        template_url('dist/css/AdminLTE.min.css', 'AdminLte'),
        // AdminLTE Skins
        template_url('dist/css/skins/_all-skins.min.css', 'AdminLte'),
        // Custom CSS
        template_url('css/style.css', 'AdminLte'),
    ));

    echo $css; // Place to pass data / plugable hook zone

    //Add Controller specific JS files.
    Assets::js(array(
        template_url('plugins/jQuery/jQuery-2.2.0.min.js', 'AdminLte'),
    ));

    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?= site_url('users/dashboard'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">CP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?= __('Control Panel'); ?></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" style="margin-right: 10px;">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?= template_url('dist/img/avatar5.png', 'AdminLte'); ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?= $user->username; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?= template_url('dist/img/avatar5.png', 'AdminLte'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?= $user->realname; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= site_url('users/profile'); ?>" class="btn btn-default btn-flat"><?= __('Profile'); ?></a>
                </div>
                <div class="pull-right">
                  <a href="<?= site_url('logout'); ?>" class="btn btn-default btn-flat"><?= __('Sign out'); ?></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <form action="<?= site_url('admin/search'); ?>" method="POST" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><?= __('ADMINISTRATION'); ?></li>
            <li <?php if ($currentUri == 'users/dashboard') { echo "class='active'"; } ?>>
                <a href="<?= site_url('users/dashboard'); ?>"><i class="fa fa-dashboard"></i> <span><?= __('Dashboard'); ?></span></a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?= $content; ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <?php if(ENVIRONMENT == 'development') { ?>
      <small><?= Profiler::getReport(); ?></small>
      <?php } ?>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.novaframework.com/" target="_blank"><b>Nova Framework</b></a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<?php
Assets::js(array(
    // Bootstrap 3.3.5
    template_url('bootstrap/js/bootstrap.min.js', 'AdminLte'),
    // AdminLTE App
    template_url('dist/js/app.min.js', 'AdminLte'),
));

echo $js; // Place to pass data / plugable hook zone
echo $footer; // Place to pass data / plugable hook zone
?>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
