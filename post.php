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

            <img width="100%" height="300" class="img-responsive" src="admin/<?php echo $result['image']?>" alt="Post image">
            <a href="#"><h4><?php echo $result['title']?></h4></a>
            <div class="user_details">
              <div class="float-right mt-sm-0 mt-3">
                <div class="media">
                  <div class="media-body">
                    <h5><?php echo $result['author']?></h5>
                    <p><?php echo $formatObj->dateFormat($result['date'])?></p>
                  </div>
                  <div class="d-flex">
                    <?php
                      // Get author image in posts using join query 
                      $joinquery = "SELECT tbl_users.image, tbl_posts.id, tbl_posts.user_id
                      FROM tbl_users
                      INNER JOIN tbl_posts
                      ON tbl_users.id = tbl_posts.user_id AND tbl_posts.id = $id" ;

                      $getImage = $dbObj->select($joinquery);
                      if ($getImage) {
                        while ($getresult = $getImage->fetch_assoc()) {
                    ?>
                    <!-- <img width="42" height="42" src="images/blog/c2.jpg" alt=""> -->
                    <img width="42" height="42" src="admin/<?php echo $getresult['image']; ?>" alt="">
                    <?php 
                        }
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
    
            <!-- Blog post text start here  -->

           <?php echo $result['body']?>

          

          <!-- Blog post text finished here -->

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
              <div class="col-md col-sm col-xs">
                <a href="post.php?id=<?php echo $rel_post_get['id']?>"><img src="admin/<?php echo $rel_post_get['image']?>" alt="Related Article" class="related-img img-responsive ">
                <h6 align="center">Post Title</h6>
              </a>
                
              </div>
            <?php 

              } // related post while end here

             } // related post if condition end here

            
           //    echo "  " ;
           // // related post else condition end here
            
            else { ?>
              <div class="col-sm-6">
                <h2>No Related Posts Available</h2>
              </div>
            
            <?php } ?>

            </div>

        

          
          </div>

          <hr>

          <div class="comments-area">
            <h4>Comments</h4>

            <div id="disqus_thread"></div>
              <script>

              /**
              *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
              *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
              /*
              var disqus_config = function () {
              this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
              this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
              };
              */
              (function() { // DON'T EDIT BELOW THIS LINE
              var d = document, s = d.createElement('script');
              s.src = 'https://techblogtawfique.disqus.com/embed.js';
              s.setAttribute('data-timestamp', +new Date());
              (d.head || d.body).appendChild(s);
              })();
              </script>
              <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                              
                 
          </div>

          <?php
            } // first if condition end here . 
            else{
              header("location: 404.php");
            } // first else condition end here . 

          ?>

        </div>
        <?php include_once 'inc/sidebar.php' ?>
    </div>
    

<?php include_once 'inc/footer.php'?>