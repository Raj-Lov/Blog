<?php include_once 'inc/header.php';?>

<?php include_once 'inc/sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>

      <br>

    </section>

    <!-- Main content -->
    <section class="content">

      <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                      <?php
                        $query = "SELECT * FROM tbl_posts" ; 
                        $get_data = $dbObj->select($query);
                        if ($total_row = $get_data->num_rows) {
                              
                      ?>
                        <h3><?php echo $total_row; ?></h3>
                        <?php } ?>
                        <p>Total Posts</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <a href="viewpost.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                      <?php
                        $query = "SELECT * FROM tbl_categories" ; 
                        $get_data = $dbObj->select($query);
                        if ($total_row = $get_data->num_rows) {
                              
                      ?>
                        <h3><?php echo $total_row; ?></h3>
                        <?php } ?>

                        <p>Total Category</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <a href="viewcategory.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <?php
                        $query = "SELECT * FROM tbl_users" ; 
                        $get_data = $dbObj->select($query);
                        if ($total_row = $get_data->num_rows) {
                              
                      ?>
                        <h3><?php echo $total_row-1; ?></h3>
                        <?php } ?>

                        <p>Total Author/Editor</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="viewusers.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">

                    <!-- How many post created in monthly wise count -->
                      <?php 
                        $currentMonth = date('m');

                        $query = "SELECT date FROM tbl_posts" ; 
                        $get_data = $dbObj->select($query);

                        if ($get_data) {     

                          $total_posts = 0;
                          $i = 0;

                          while ($result = $get_data->fetch_assoc()) {
                          
                          $getMonth = explode('-', $result['date']);

                          if($getMonth[1] == $currentMonth){ 
                            $total_posts = ++$i;
                            
                              }
                            }
                          ?>
                            
                        <h3><?php echo $total_posts; ?></h3>

                       <?php } ?>

                        <p>Total Posts This Month</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>


        <div class="row">
            <div class="col-xs-12">
                <br><br>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            Today Total Posts 
                        </h3>
                        <hr>
                    </div>
                    <!-- /.box-header -->

                      <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>Post Title</th>
                                  <th>Description</th>
                                  <th>Category</th>
                                  <th>Image</th>
                                  <th>Author</th>
                                  <th>Tags</th>
                                  <th>Date</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = "SELECT tbl_posts.*, tbl_categories.name
                                  FROM tbl_posts
                                  INNER JOIN tbl_categories
                                  ON tbl_posts.cat_id = tbl_categories.id
                                  ORDER BY id DESC" ; 
                              $posts_details = $dbObj->select($query);
                              if ($posts_details) {
                                  $i = 0;
                                  while ($result = $posts_details->fetch_assoc()) {
                                      $i++;

                              // Today date
                              $todayDate = date('Y-m-d');

                              // Get date from database
                              $get_date = $result['date'];
                              $only_date = explode(" ", $get_date);

                              if($todayDate == $only_date[0]){

                          ?>

                              <tr>
                                  <td><?php echo $i;?></td>
                                  <td><?php echo $result['title'];?></td>
                                  <td><?php echo $formatObj->postBodyShorten($result['body'],100);?></td>
                                  <td><?php echo $result['name'];?></td>
                                  <td><img width="50" height="50" src="<?php echo $result['image'];?>" /></td>
                                  <td><?php echo $result['author'];?></td>
                                  <td><?php echo $result['tags'];?></td>
                                  <td><?php echo $formatObj->dateFormat($result['date']);?></td>

                                  <td>
                                      <a href="postview.php?post_id=<?php echo $result['id']?>">View</a>                                    
                              </tr>

                              <?php
                              
                                  }
                                }

                              }

                              ?>

                            </tbody>
                          </table>
                        </div>
                  <!-- /.box-body -->

                </div>
            </div>
        </div>

    </section>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 <?php include_once 'inc/footer.php';?>