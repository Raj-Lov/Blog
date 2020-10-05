<script>
  function myfunction() {
    var search = document.getElementById("search").value;
    if(search == ''){
      alert("Write something before search!");
      return false;
    }
    else{
      return true;
    }
  }
</script>

<!-- Start Blog Post Siddebar -->
          <div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">
                <div class="single-sidebar-widget newsletter-widget">
                  <h4 class="single-sidebar-widget__title">Search Post</h4>

                  <form method="get" action="search.php">
                    <div class="form-group mt-30">
                      <div class="col-autos">
                        <input type="text" name="search" class="form-control" id="search" placeholder="Search Keyword" onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Search Keyword'">
                      </div>
                    </div>
                    <input onclick=" return myfunction()" class="bbtns d-block mt-20 w-100" name="submit" type="submit" value="Search"/>
                  </form>
                </div>


                <div class="single-sidebar-widget post-category-widget">
                  <h4 class="single-sidebar-widget__title">Catgory</h4>
                  <ul class="cat-list mt-20">
                    <?php
                      $query = "SELECT * FROM tbl_categories";
                      $result = $dbObj->select($query);
                      if($result){
                        while ($category = $result->fetch_assoc()) {
                          
                    ?>
                    <li>
                      <a href="posts.php?category=<?php echo $category['id']?>" class="d-flex justify-content-between">
                        <p><?php echo $category['name']?></p>
                        <p>(03)</p>
                      </a>
                    </li>

                    <?php
                      } // end of while condition
                      } // end of if condition
                      else{
                        echo "<li>No Category Available</li>";
                      } // end of else condition
                    ?>

                  </ul>
                </div>

                <div class="single-sidebar-widget popular-post-widget">
                  <h4 class="single-sidebar-widget__title">Latest Post</h4>
                  <div class="popular-post-list">
                  <?php 
                    $query = "SELECT * FROM tbl_posts ORDER BY id DESC LIMIT 5";
                    $post = $dbObj->select($query);
                    if ($post) {
                      while ($result = $post->fetch_assoc()) {
                  ?>
                    <div class="single-post-list">
                      <div class="thumb">
                        <a href="post.php?id=<?php echo $result['id'] ;?>"><img height="200" width="100%" class="card-img rounded-0" src="admin/<?php echo $result['image']?>" alt="Latest Post"></a>
                        <ul class="thumb-info">
                          <li><a href="#"><?php echo $result['author'] ;?></a></li>
                          <li><a href="#"><?php echo $formatObj->dateFormat($result['date']) ;?></a></li>
                        </ul>
                      </div>
                      <div class="details mt-20">
                        <a href="post.php?id=<?php echo $result['id'] ;?>">
                          <h6><?php echo $result['title'] ;?></h6>
                        </a>
                      </div>
                    </div> <hr>
                    
                    <?php

                      }
                      /* End of while loop*/
                    } /* End of if condition*/
                    else{
                      header("location: 404.php");
                    } // End of else condition

                    ?>

                  </div>
                </div>

                  <div class="single-sidebar-widget tag_cloud_widget">
                    <h4 class="single-sidebar-widget__title">Popular Tags</h4>
                    <ul class="list">
                      <li>
                          <a href="#">project</a>
                      </li>
                      <li>
                          <a href="#">love</a>
                      </li>
                      <li>
                          <a href="#">technology</a>
                      </li>
                      <li>
                          <a href="#">travel</a>
                      </li>
                      <li>
                          <a href="#">software</a>
                      </li>
                      <li>
                          <a href="#">life style</a>
                      </li>
                      <li>
                          <a href="#">design</a>
                      </li>
                      <li>
                          <a href="#">illustration</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <!-- End Blog Post Siddebar -->
          </div>
    </section>
    <!--================ End Blog Post Area =================-->
  </main>

