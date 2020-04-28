<?php include_once 'config/config.php';?>
<?php include_once 'lib/Database.php';?>
<?php include_once 'helpers/Format.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/slider.php';?>
<?php
  $dbObj = new Database();
  $formatObj = new Format();

?>

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <?php
              $query = "SELECT * FROM tbl_posts LIMIT 3";
              $posts = $dbObj->select($query);
              if ($posts) {
                while ($result = $posts->fetch_assoc()) {
                  
            ?>
            <div class="single-recent-blog-post">
              <div class="thumb">
                <img class="img-fluid" src="admin/upload/<?php echo $result['image']?>" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i><?php echo $result['author']?></a></li>
                  <li><a href="#"><i class="ti-notepad"></i><?php echo $formatObj->dateFormat($result['date'])?></a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="post.php?id=<?php echo $result['id']?>">
                  <h3><?php echo $result['title'] ?></h3>
                </a>
                <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                <p><?php echo $formatObj->postBodyShorten($result['body'])?></p>
                <a class="button" href="post.php?id=<?php echo $result['id']?>">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          <?php
              }
              /* End of while loop*/
            }
            /* End of If condition*/
            else{
              header("location:404.php");
            }
            /* End of Else condition*/
            ?>
            
          <!-- Pagination Area Starts -->
            <div class="row">
              <div class="col-lg-12">
                  <nav class="blog-pagination justify-content-center d-flex">
                      <ul class="pagination">
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Previous">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-left"></i>
                                  </span>
                              </a>
                          </li>
                          <li class="page-item active"><a href="#" class="page-link">1</a></li>
                          <li class="page-item"><a href="#" class="page-link">2</a></li>
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Next">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-right"></i>
                                  </span>
                              </a>
                          </li>
                      </ul>
                  </nav>
              </div>
            </div>
            <!-- Pagination Area Emds -->
          </div>

<?php include_once 'inc/sidebar.php' ?>

<?php include_once 'inc/footer.php'?>