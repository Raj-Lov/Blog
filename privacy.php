<?php 
// Include the header file to load the top section of the webpage
include_once 'inc/header.php'; 

// Include the slider file for the homepage banner/slider section
include_once 'inc/slider.php'; 
?>
    
<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin mt-4">
  <div class="container">
    <div class="row">
      <!-- Main content area -->
      <div class="col-lg-8">
        <div class="single-recent-blog-post">
          <!-- Privacy Policy Title -->
          <h1>Privacy Policy</h1>
          <hr>
          <!-- Image for the Privacy Policy section -->
          <div class="thumb">
            <img class="img-fluid" src="img/blog/blog1.png" alt="Privacy Policy Image">
          </div>
          <div class="details mt-20">
            <!-- Privacy Policy Content -->
            <p>
              The owner of this "[Sample Blog Disclaimer]" blog does not share personal information with third-parties nor does [sampleblogdisclaimer.blogspot.com] store information collected about your visit for use other than to analyze content performance through the use of cookies, which you can turn off at any time by modifying your Internet browser’s settings. The owner is not responsible for the republishing of the content found on this blog on other websites or media without permission.

              <br><br><strong>Blog Comments Policy</strong><br><br>
              The owner of this blog reserves the right to edit or delete any comments submitted to this blog without notice due to:
              <br><br>
              1. Comments deemed to be spam or questionable spam.<br>
              2. Comments including profanity.<br>
              3. Comments containing language or concepts that could be deemed offensive.<br>
              4. Comments that attack a person individually.<br><br>

              This privacy policy statement is made on [March 02, 2012] and may change in the future with or without notice. You should read this privacy policy on this page whenever it is updated.
            </p>
          </div>
        </div>
      </div>

      <?php 
      // Include the sidebar file for the right-hand section of the page
      include_once 'inc/sidebar.php'; 
      ?>

      <?php 
      // Include the
