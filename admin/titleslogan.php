<?php include_once 'inc/header.php';?>

<?php include_once 'inc/sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <?php

        $query = "SELECT * FROM tbl_site_titles WHERE id = '1' ";
        $get_data = $dbObj->select($query);
        if ($get_data) {
            $result = $get_data->fetch_assoc();

        ?>
        <section class="content-header">
            <h1>
                Update Site Title & Slogan
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="" enctype="multipart/form-data" role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">Website Title</label>
                                    <input name="title" type="text" class="form-control" id="title" value="<?php echo $result['title']?>">
                                </div>
                                <div class="form-group">
                                    <label for="sologan">Website Sologan</label>
                                    <input name="slogan" type="text" class="form-control" id="sologan" value="<?php echo $result['slogan']?>">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input name="logo" type="file" class="form-control" id="logo">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-md-4">
                    <h3 class="text-center">Logo</h3>
                    <div class="logo text-center">
                        <img class="img-thumbnail img-responsive" width="200" height="200" src="<?php echo $result['logo']?>">
                    </div>
                </div>
            </div>
            
            <?php
   
            }

            ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php include_once 'inc/footer.php';?>