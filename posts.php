<?php 
// Include the header file to load the top section of the webpage
include_once 'inc/header.php'; 
?>

<!--================ Hero sm Banner start =================-->      
<section class="mb-30px">
  <div class="container">
    <!-- Hero Banner Section -->
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <!-- Page Title -->
        <h1>Category</h1>
        <!-- Breadcrumb navigation for easier navigation -->
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">PHP</a></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--================ Hero sm Banner end =================-->    

<section class="blog-post-area section-margin mt-4">
  <div class="container">
    <div class="row">
      <!-- Main content area -->
      <div class="col-lg-8">

        <?php
        // Check if the 'category' parameter is set in the URL, otherwise redirect to the 404 page
        if (!isset($_GET['category']) || $_GET['category'] == NULL) {
            header("location: 404.php"); // Redirect to 404 if category is missing
        } else {
            // Retrieve the category ID from the URL
            $cat_id = $_GET['category'];
        }

        // Query to fetch posts belonging to the specified category
        $query = "SELECT * FROM tbl_posts WHERE cat_id = '$cat_id' ";
        $posts = $dbObj->select($query);

        // Check if there are any posts in the category
        if ($posts) {
            // Loop through the posts and display them
            while ($result = $posts->fetch_assoc()) {
        ?>
        <!-- Display each post -->
        <div class="single-recent-blog-post">
          <div class="thumb">
            <!-- Display the image of the blog post -->
            <img width="100%" height="300" class="img-responsive" src="admin/<?php echo $result['image'] ?>" alt="">
            <!-- Post meta information -->
            <ul class="thumb-info">
              <li><a href="#"><i class="ti-user"></i><?php echo $result['author'] ?></a></li>
              <li><a href="#"><i class="ti-notepad"></i><?php echo $formatObj->dateFormat($result['date']) ?></a></li>
              <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
            </ul>
          </div>
          <div class="details mt-20">
            <!-- Blog post title with a link to the full post -->
            <a href="post.php?id=<?php echo $result['id'] ?>">
              <h3><?php echo $result['title'] ?></h3>
            </a>
            <!-- Shortened blog post content -->
            <?php echo $formatObj->postBodyShorten($result['body']) ?>
            <!-- Button to read the full post -->
            <a class="button" href="post.php?id=<?php echo $result['id'] ?>">Read More <i class="ti-arrow-right"></i></a>
          </div>
        </div>
        <?php
            } // End of while loop
        } else {
            // If no posts are found in the category, display a message
            echo "<h4>No posts found in this category!</h4>";
        }
        ?>

      </div>

      <?php 
      // Include the sidebar file for the right-hand section of the page
      include_once 'inc/sidebar.php'; 
      ?>

      <?php 
      // Include the footer file to load the bottom section of the webpage
      include_once 'inc/footer.php'; 
      ?>
