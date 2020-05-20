<?php 
  include_once '../lib/Session.php';
  include_once '../config/config.php';
  include_once '../lib/Database.php';
  include_once '../helpers/Format.php';

  // object/instance crate 
  $dbObj = new Database();
  $formatObj = new Format();

  // Session checking 
  Session::checkSession();

  // Logout and session destroy
  if (isset($_GET['action']) && $_GET['action'] == "logout") {
    Session::destroy();
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blog | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Datatables css -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>LTE</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Blog Dashboard</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">
                <?php
                  $query = "SELECT * FROM tbl_contacts WHERE status = 0 ORDER BY id DESC";
                  $get_data = $dbObj->select($query);
                  if ($get_data) {
                    $total_message = $get_data->num_rows;
                    echo $total_message;
                    
                    // echo "<pre>";
                    // print_r($result);
                    // echo "</pre>";

                ?>

              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $total_message; ?> messages</li>
              <?php 

              while ($result = $get_data->fetch_assoc()) {

                ?>
              <li><ul class="menu">
                  <li><!-- start message -->
                    <a href="viewmessage.php?msgid=<?php echo $result['id']?>">
                      <h4>
                        <?php echo $result['name']?>
                        <small><i class="fa fa-clock-o"></i><?php echo $formatObj->dateFormat($result['date']);?></small>
                      </h4>
                      <p><?php echo $result['subject']?></p>
                    </a>
                  </li>
                </ul>
              </li>

              <?php
                  }
                }

              ?>

              <li class="footer"><a href="inbox.php">See All Messages</a></li>
            </ul>
          </li>

          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="changepassword.php">Change Password</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="?action=logout" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>