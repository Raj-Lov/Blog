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
  
  <?php
    if (isset($_GET['id'])) {
      $postid = $_GET['id'];
      
      $query = "SELECT * FROM tbl_posts WHERE id = '$postid' ";
      $get_data = $dbObj->select($query);
      if ($get_data) {
        $result = $get_data->fetch_assoc();
    
  ?>
  <meta name="keyword" content="<?php echo $result['tags'] ;?>">
  <?php
      }
    }
    else{
      ?>
  <meta name="keyword" content="<?php echo KEYWORD ;?>">
  <?php
    }
  ?>
  <meta name="description" content="<?php echo DESCRIPTION; ?>">