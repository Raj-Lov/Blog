<!--================Slider Areastart =================-->  
    <section>
      <div class="container">
        <div class="owl-carousel owl-theme blog-slider">
          
          <?php
            $query = "SELECT * FROM tbl_sliders ORDER BY id DESC LIMIT 5" ; 
            $get_sliders = $dbObj->select($query);
            if ($get_sliders) {
                while ($result = $get_sliders->fetch_assoc()) {
                
          ?>
          <div class="card blog__slide text-center">
            <a href="post.php">
              <div class="blog__slide__img">
                <img class="card-img rounded-0 img-responsive" src="admin/<?php echo $result['image']; ?>" alt="Slider Image">
              </div>
              <div class="blog__slide__content">
                <h2><?php echo $result['title']; ?></h2>
              </div>              
            </a>
          </div>
          
          <?php

                }
              }

          ?>
        </div>
      </div>
    </section>
    <!--================Slider Area end =================-->  