<?php include_once 'inc/header.php';?>

 <?php include_once 'inc/sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Category
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                <?php
                  if(isset($_POST['save'])){
                    $name = $formatObj->validation($_POST['name']);

                    // mysqli_real_escape_string removes special character like --> 
                    // \n, \r, \, '', "", And Characters encoded/returns are NUL (ASCII 0)
                    // It returns empty/null value .  
                    $name = $dbObj->link->real_escape_string($name); 

                    if (empty($name)) {
                        echo "<span class='error'> Category field must not be empty! </span>";
                    }
                    else{
                        $checkQuery = "SELECT * FROM tbl_categories WHERE name = '$name'";
                        $checkCatExist = $dbObj->select($checkQuery);
                        if ($checkCatExist) {
                            if ($checkCatExist->num_rows > 0) {
                                echo "<span class='error'> Category name already exist, Try another one! </span>";
                            }
                            
                        }
                        else{
                            $query="INSERT INTO tbl_categories(name) VALUES('$name')";
                            $insert = $dbObj->create($query);
                            if ($insert) {
                                echo "<span class='success'> Category saved successfully! </span>";
                            }
                            else{
                                echo "<span class='error'> Category not saved! </span>";
                            }
                        }

                        
                    }

                    


                  }


                ?>  
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="category">Category Name</label>
                                <input type="text" name="name" class="form-control" id="category" placeholder="Enter Category Name">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button name="save" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


 <?php include_once 'inc/footer.php';?>