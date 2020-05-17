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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php 
  // Retrieve page names to show in title bar from database by page id
    if (isset($_GET['page'])) {
      $pagetitle = $_GET['page'];
      
      $query = "SELECT * FROM tbl_pages WHERE id = '$pagetitle' ";
      $page_title = $dbObj->select($query);
      if ($page_title) {
        $result = $page_title->fetch_assoc();
    
  ?>
  <title><?php echo ucwords($result['name']);?> - <?php echo TITLE; ?></title>
  <?php
      }
    }
    // Get post heading to show in title bar
    else if(isset($_GET['id'])){
      $postid = $_GET['id'];
      $query = "SELECT * FROM tbl_posts WHERE id = '$postid' ";
      $post_title = $dbObj->select($query);
      if($post_title){
        $result = $post_title->fetch_assoc();
      ?>
  <title><?php echo ucwords($result['title']);?> - <?php echo TITLE; ?></title>

     <?php 
      }
    }
    else{
      // calling getTitle() method to show page title with title modify  . 
      if ($formatObj->getTitle() == TRUE) {
        ?>
  <title><?php echo $formatObj->getTitle();?> - <?php echo TITLE; ?></title>

      <?php
      }
    }

  ?>

	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
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