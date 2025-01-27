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
        <h1>Search Results</h1>
        <!-- Breadcrumb navigation for easier navigation -->
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Search</a></li>
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
      <div class="col-lg-8">

        <?php
        // Check if the 'search' parameter is set in the URL, otherwise redirect to a 404 page
        if (!isset($_GET['search']) || $_GET['search'] == NULL) {
            echo "<script>location.href ='404.php'; </script>";
        } else {
            // Retrieve the search term from the URL
            $search = $_GET['search'];

            // SQL query to search posts by title or body containing the search term
            $query = "SELECT * FROM tbl_posts WHERE title LIKE '%$search%' OR body LIKE '%$search%'";
            $posts = $dbObj->select($query);

            // Check if any posts match the search query
            if ($posts) {
                // Display a message showing the search keyword
                echo "<h4 class='orange-color'>Showing results for : $search</h4> <br>";

                // Loop through the results and display each post
                while ($result = $posts->fetch_assoc()) {
        ?>

        <!-- Single Blog Post -->
        <div class="single-recent-blog-post">
          <div class="thumb">
            <!-- Display the image of the blog post -->
            <img class="img-responsive" width="100%" height="300" src="admin/<?php echo $result['image'] ?>" alt="">
            <!-- Post meta information -->
            <ul class="thumb-info">
              <li><a href="#"><i class="ti-user"></i><?php echo $result['author'] ?></a></li>
              <li><a href="#"><i class="ti-notepad"></i><?php echo $formatObj->dateFormat($result['date']) ?></a></li>
              <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
            </ul>
          </div>
          <div class="details mt-20">
            <!-- Blog post title with a link to the post -->
            <a href="post.php?id=<?php echo $result['id'] ?>">
              <h3><?php echo $result['title'] ?></h3>
            </a>
            <!-- Tags for the post -->
            <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
            <!-- Display a shortened version of the blog post body -->
            <p><?php echo $formatObj->postBodyShorten($result['body']) ?></p>
            <!-- Button to read the full post -->
            <a class="button" href="post.php?id=<?php echo $result['id'] ?>">Read More <i class="ti-arrow-right"></i></a>
          </div>
        </div> 
        <hr>

        <?php
                } /* End of while loop */
            } else {
                // If no posts match the search term, display an error message
                echo "<h2 class='search'>Your search keyword was not found</h2>";
            }
        }
        ?>

      </div>

      <?php 
      // Include the sidebar file
      include_once 'inc/sidebar.php'; 
      ?>

      <?php 
      // Include the footer file
      include_once 'inc/footer.php'; 
      ?>
