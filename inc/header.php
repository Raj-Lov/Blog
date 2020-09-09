<?php include_once 'config/config.php';?>
<?php include_once 'lib/Database.php';?>
<?php include_once 'helpers/Format.php';?>
<?php
  // object/instance crate 
  
  $dbObj = new Database();
  $formatObj = new Format();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta -->
  <?php include_once 'scripts/meta.php';?>
  <!-- Link:style -->
  <?php include_once 'scripts/css.php';?>
	
</head>
<body>
  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <?php
            // retrieve site logo , site title and slogan database
            $query = "SELECT * FROM tbl_site_titles WHERE id = '1' ";
            $get_data = $dbObj->select($query);
            if ($get_data) {
                $result = $get_data->fetch_assoc();

          ?>

          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.php"><img src="admin/<?php echo $result['logo'];?>" alt="Logo Here"></a>
          <a href="index.php"><span class="title"><?php echo $result['title'] ;?> </span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <?php
            
            }

          ?>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">
              <?php
                $path = $_SERVER['SCRIPT_FILENAME'];
                $current_page = basename($path,'.php');
              ?>
              <li 
            <?php if ($current_page == "index") { echo 'class=" active nav-item"';} ?>

              class=" nav-item "><a class="nav-link" href="index.php">Home</a></li>
              

              <?php
                $query = "SELECT * FROM tbl_pages ";
                $get_pages = $dbObj->select($query);
                if ($get_pages) {
                  while($result = $get_pages->fetch_assoc()){

              ?> 

              <li 
              <?php
                if (isset($_GET['page']) && $_GET['page'] == $result['id']) {
                 echo "class='nav-item active'";
                }
              ?>
              class="nav-item"><a class="nav-link" href="page.php?page=<?php echo $result['id']?>"><?php echo $result['name']?></a></li>
              <?php
                  }
                }
              ?>
              <li 
            <?php if ($current_page == "contact_us") { echo 'class=" active nav-item"';} ?>

              class="nav-item"><a class="nav-link" href="contact_us.php">Contact</a></li>
              
            </ul>

            <!-- get social links from db  -->
            <?php

            $query = "SELECT * FROM tbl_socials WHERE id = '1' ";
            $get_data = $dbObj->select($query);
            if ($get_data) {
                $result = $get_data->fetch_assoc();

            ?>
            <ul class="nav navbar-nav navbar-right navbar-social">
              <li><a target="_blank" href="<?php echo $result['facebook']?>"><i class="ti-facebook"></i></a></li>
              <li><a target="_blank" href="<?php echo $result['twitter']?>"><i class="ti-twitter-alt"></i></a></li>
              <li><a target="_blank" href="<?php echo $result['linkedin']?>"><i class="ti-linkedin"></i></a></li>
              <li><a target="_blank" href="<?php echo $result['instagram']?>"><i class="ti-instagram"></i></a></li>
            </ul>

            <?php 
              }
            ?>

          </div> 
        </div>
      </nav>
    </div>
  </header>
  <main class="site-main">