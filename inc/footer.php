 <!--================ Start Footer Area =================-->
  <footer class="footer-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-5  col-md-4 col-sm-6">
          <div class="single-footer-widget">
            <h6>About Us</h6>
            <p>
              This website is for everyone who write codes. You don't require to sign up in this website.
              We don't collect any of you personal data or information.
              We don't share any data of yours to others. 
              If you have any questions about this privacy statement, contact with me.
            </p>
          </div>
        </div>
        <div class="col-lg-5  col-md-4 col-sm-6">
          <div class="single-footer-widget">
            <h6>Newsletter</h6>
            <p>Stay update with our latest</p>
            <div class="" id="mc_embed_signup">

              <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                method="get" class="form-inline">

                <div class="d-flex flex-row">

                  <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                    required="" type="email">


                  <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                  <div style="position: absolute; left: -5000px;">
                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                  </div>

                  <!-- <div class="col-lg-4 col-md-4">
                        <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                      </div>  -->
                </div>
                <div class="info"></div>
              </form>
            </div>
          </div>
        </div>
        
        <div class="col-lg-2 col-md-4 col-sm-6">
          <div class="single-footer-widget">
            <h6>Follow Us</h6>
            <p>Let us be social</p>

            <!-- get social link from db process here -->
            <?php

            $query = "SELECT * FROM tbl_socials WHERE id = '1' ";
            $get_data = $dbObj->select($query);
            if ($get_data) {
                $result = $get_data->fetch_assoc();

            ?>
            <div class="footer-social d-flex align-items-center">
              <a target="_blank" href="<?php echo $result['facebook']?>">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a target="_blank" href="<?php echo $result['twitter']?>">
                <i class="fab fa-twitter"></i>
              </a>
              <a target="_blank" href="<?php echo $result['linkedin']?>">
                <i class="fab fa-linkedin"></i>
              </a>
              <a target="_blank" href="<?php echo $result['instagram']?>">
                <i class="fab fa-instagram"></i>
              </a>
            </div>

            <?php 
              }
            ?>

          </div>
        </div>
      </div>
      <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
       <!-- Get copyright data from database process here -->
          <?php

          $query = "SELECT * FROM tbl_copyrights WHERE id = '1' ";
          $get_data = $dbObj->select($query);
          if ($get_data) {
              $result = $get_data->fetch_assoc();

          ?>
        <p class="footer-text m-0">
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with   <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"> Colorib</a> | <a href="https://facebook.com/tawfiquebd" target="_blank"><?php echo $result['text']?></a> | 2020 - <?php echo date('Y')?></p>

        <?php
          }
        ?>
      </div>
    </div>
  </footer>
  <!--================ End Footer Area =================-->

  <!-- Js files -->
  <?php include_once 'scripts/js.php';?>
  

</body>
</html>