<?php include_once 'inc/header.php';?>
<?php include_once 'inc/slider.php';?>

<!-- Pagination -->
<?php
  // per page 3 post 
  $per_page = 3 ;
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{
    $page = 1;
  }
  $start_from = ($page-1)* $per_page;

?>
<!-- Pagination -->

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <?php
              $query = "SELECT * FROM tbl_posts ORDER BY id DESC LIMIT $start_from, $per_page";
              $posts = $dbObj->select($query);
              if ($posts) {
                while ($result = $posts->fetch_assoc()) {
                  
            ?>
            <div class="single-recent-blog-post">
              <div class="thumb">
                <img width="100%" height="300" class="img-responsive" src="admin/<?php echo $result['image']?>" alt="">
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
            <hr>
          <?php

            }
            /* End of while loop*/

            ?>
            
            <!-- Pagination Area Starts -->
            <?php 

              $query = "SELECT * FROM tbl_posts";
              $result = $dbObj->select($query);
              $total_row = $result->num_rows;
              $total_pages = ceil($total_row/$per_page);

            ?>
        
            <div class="row">
              <div class="col-lg-12">
                  <nav class="blog-pagination justify-content-center d-flex">
                      <ul class="pagination">
                          <li class="page-item">
                              <a href="index.php?page=1" class="page-link" aria-label="Previous">
                                  <span aria-hidden="true">
                                      First Page
                                  </span>
                              </a>
                          </li>
                          
                          <?php
                            for ($i=1; $i <= $total_pages ; $i++) { 
                              echo "<li class='page-item'><a href='index.php?page=$i' class='page-link'>$i</a></li>" ;
                            }
                          ?>
                          <li class="page-item">
                              <a href="index.php?page=<?php echo $total_pages;?>" class="page-link" aria-label="Next">
                                  <span aria-hidden="true">
                                      Last Page
                                  </span>
                              </a>
                          </li>
                      </ul>
                  </nav>
              </div>
            </div>
            <!-- Pagination Area Emds -->

          <?php

            }
            /* End of If condition*/

            else{
              echo "<h2>No posts available in blog. </h2>";;
            }
            /* End of Else condition*/

            ?>
            
          
          </div>

<?php include_once 'inc/sidebar.php' ?>

<?php include_once 'inc/footer.php'?>