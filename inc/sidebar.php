<!-- Start Blog Post Siddebar -->
          <div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">
                <div class="single-sidebar-widget newsletter-widget">
                  <h4 class="single-sidebar-widget__title">Search Post</h4>
                  <div class="form-group mt-30">
                    <div class="col-autos">
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search Keyword" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Search Keyword'">
                    </div>
                  </div>
                  <button class="bbtns d-block mt-20 w-100">Search</button>
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
                        echo "No Category Available";
                      } // end of else condition
                    ?>

                  </ul>
                </div>

                <div class="single-sidebar-widget popular-post-widget">
                  <h4 class="single-sidebar-widget__title">Popular Post</h4>
                  <div class="popular-post-list">
                    <div class="single-post-list">
                      <div class="thumb">
                        <img class="card-img rounded-0" src="images/blog/blog4.png" alt="">
                        <ul class="thumb-info">
                          <li><a href="#">Adam Colinge</a></li>
                          <li><a href="#">Dec 15</a></li>
                        </ul>
                      </div>
                      <div class="details mt-20">
                        <a href="post.php">
                          <h6>Accused of assaulting flight attendant miktake alaways</h6>
                        </a>
                      </div>
                    </div>
                    <div class="single-post-list">
                      <div class="thumb">
                        <img class="card-img rounded-0" src="images/blog/blog4.png" alt="">
                        <ul class="thumb-info">
                          <li><a href="#">Adam Colinge</a></li>
                          <li><a href="#">Dec 15</a></li>
                        </ul>
                      </div>
                      <div class="details mt-20">
                        <a href="post.php">
                          <h6>Tennessee outback steakhouse the
                            worker diagnosed</h6>
                        </a>
                      </div>
                    </div>
                    <div class="single-post-list">
                      <div class="thumb">
                        <img class="card-img rounded-0" src="images/blog/blog4.png" alt="">
                        <ul class="thumb-info">
                          <li><a href="#">Adam Colinge</a></li>
                          <li><a href="#">Dec 15</a></li>
                        </ul>
                      </div>
                      <div class="details mt-20">
                        <a href="post.php">
                          <h6>Tennessee outback steakhouse the
                            worker diagnosed</h6>
                        </a>
                      </div>
                    </div>
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