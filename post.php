<?php include_once 'inc/header.php';?>

<?php 
  if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    header("location: 404.php");
  }
  else{
    $id = $_GET['id'];
  }
?>
  
  <!--================ Hero sm Banner start =================-->      
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>Post details</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Post Details</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero sm Banner end =================-->    


  

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="main_blog_details">
            <?php
              $query = "SELECT * FROM tbl_posts WHERE id = $id";
              $post = $dbObj->select($query);
              if ($post) {
                while ($result = $post->fetch_assoc()) {
            ?>

            <img class="img-fluid" src="admin/<?php echo $result['image']?>" alt="">
            <a href="#"><h4><?php echo $result['title']?></h4></a>
            <div class="user_details">
              <div class="float-left tags">
                <!--<?php 
                  for ($i=1; $i < 2 ; $i++) { 
                    echo "<a href='#'>" .$result['tags']. "</a>" ; 
                  }
                ?>
                -->
                <a href="#">Tags Here</a>

              </div>
              <div class="float-right mt-sm-0 mt-3">
                <div class="media">
                  <div class="media-body">
                    <h5><?php echo $result['author']?></h5>
                    <p><?php echo $formatObj->dateFormat($result['date'])?></p>
                  </div>
                  <div class="d-flex">
                    <img width="42" height="42" src="images/blog/c2.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
    
            <!-- Blog post text start here  -->

            <p><?php echo $result['body']?></p>

          

          <!-- Blog post text finished here -->

           <div class="news_d_footer flex-column flex-sm-row">
             <a href="#"><span class="align-middle mr-2"><i class="ti-eye"></i></span>Total view : &nbsp; 4</a>
             <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>2 Comments</a>
             <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-dribbble"></i></a>
                <a href="#"><i class="fab fa-behance"></i></a>
             </div>
            </div>
          </div> <hr> <br>
          

          <!-- Related post  -->
          <div class="related-posts">
            <h2>Related Posts</h2> <br>
                        
            <div class="row">
              <?php
              $cat_id = $result['cat_id'];

              } // first while condition end here

              // getting related posts with current post also
              // $query_cat = "SELECT * FROM tbl_posts WHERE cat_id = '$cat_id' ORDER BY rand() LIMIT 3";

              // getting related posts without current post
              $query_cat = "SELECT * FROM tbl_posts WHERE id NOT IN('$id') AND cat_id = '$cat_id' ORDER BY rand() LIMIT 3";

              $related_post = $dbObj->select($query_cat);
              if ($related_post) {
                while ($rel_post_get = $related_post->fetch_assoc()) {

            ?>
              <div class="col-md-4">
                <a href="post.php?id=<?php echo $rel_post_get['id']?>"><img src="admin/<?php echo $rel_post_get['image']?>" alt="Related Article" class="img-responsive img-thumbnail"><span>Post Title</span></a>
              </div>
                <?php 

              } // related post while end here

              ?>

            </div>

        

          <?php

            } // related post if condition end here

            else{
              echo "<h2>No Related Posts Available</h2>";
            } // related post else condition end here

          ?>

          </div>

          <hr>
          <div class="comments-area">
              <h4>2 Comments</h4>
              <div class="comment-list">
                  <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                          <div class="thumb">
                              <img src="images/blog/c1.jpg" alt="">
                          </div>
                          <div class="desc">
                              <h5><a href="#">Emilly Blunt</a></h5>
                              <p class="date">December 4, 2017 at 3:12 pm </p>
                              <p class="comment">
                                  Never say goodbye till the end comes!
                              </p>
                          </div>
                      </div>
                  </div>
              </div>	
              
              <div class="comment-list">
                  <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                          <div class="thumb">
                              <img src="images/blog/c5.jpg" alt="">
                          </div>
                          <div class="desc">
                              <h5><a href="#">Ina Hayes</a></h5>
                              <p class="date">December 4, 2017 at 3:12 pm </p>
                              <p class="comment">
                                  Never say goodbye till the end comes!
                              </p>
                          </div>
                      </div>
                  </div>
              </div>	   
          </div>


          <div class="comment-form">
            <h4>Leave a Reply</h4>

            <form>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name">
                    <input type="text" class="form-control" id="name" placeholder="Enter Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Full Name'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email">
                    <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                  </div>										
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="subject" placeholder="Website" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Website'">
                </div>
                <div class="form-group">
                    <textarea class="form-control mb-10" rows="5" name="message" placeholder="Comment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Comment'" required=""></textarea>
                </div>
                <a href="#" class="button submit_btn">Post Comment</a>	
            </form>
          </div>
          <?php
            } // first if condition end here . 
            else{
              header("location: 404.php");
            } // first else condition end here . 

          ?>

        </div>


<?php include_once 'inc/sidebar.php' ?>
<?php include_once 'inc/footer.php'?>