<?php include_once 'inc/header.php';?>

<?php include_once 'inc/slider.php';?>

<?php
  if (!isset($_GET['page']) || $_GET['page']==NULL) {
      // echo "<script>window.location = 'viewcategory.php' ;</script>";
      echo "<script>location.href='404.php'; </script>";
      // header("location:viewcategory.php");
  }
  else{
      $pageid = $_GET['page'] ; 
  }
?>
    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <?php
                # get all data from tbl_pages by id  
                $query="SELECT * FROM tbl_pages WHERE id = '$pageid'";
                $page_data = $dbObj->select($query);

                if ($page_data) {
                    $result = $page_data->fetch_assoc() ;
                    
            ?>  
            <div class="single-recent-blog-post">
              <h1><?php echo $result['name'];?></h1>
              <hr>
              <div class="details mt-20">
                <?php echo $result['body'];?>
              </div>
            </div>
            <?php
              }
              else{
                echo "<script>location.href='404.php'; </script>";
              }
            ?>
          </div>

<?php include_once 'inc/sidebar.php'?>

<?php include_once 'inc/footer.php'?>
            

  