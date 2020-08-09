<?php include_once 'inc/header.php';?>

<?php include_once 'inc/sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                <h1>
                View Users
            </h1>
            
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">User Lists</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Photo</th>
                                            <th>Role</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $query = "SELECT * FROM tbl_users ORDER BY role ASC" ; 
                                        $users = $dbObj->select($query);
                                        if ($users) {
                                            $i = 0;
                                            while ($result = $users->fetch_assoc()) {
                                                $i++;
                                            
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $result['name'];?></td>
                                            <td><?php echo $result['username'];?></td>
                                            <td><?php echo $result['email'];?></td>
                                            <td>
                                                <?php 
                                                    if($result['image']){
                                                        echo "<img width='50' height='50' src='$result[image]' ";
                                                    }
                                                    else{
                                                        echo "No Image";
                                                    }
                                                ?>
                                                
                                            </td>
                                            <td>
                                                <?php 
                                                    if($result['role'] == 1){
                                                        echo "Admin";
                                                    }
                                                    else if($result['role'] == 2){
                                                        echo "Editor";
                                                    }
                                                    else if($result['role'] == 3){
                                                        echo "Author";
                                                    }
                                                    else{
                                                        echo "Not Assigned";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $formatObj->dateFormat($result['date']);?></td>
                                            <td><a href="edit_user.php?id=<?php echo $result['id']?>">Edit</a> | <a onclick="return confirm('Are you sure to Delete this User?');" href="delete_user.php?delete_id=<?php echo $result['id']?>">Delete</a></td>
                                        </tr>

                                        <?php
                                            }
                                        }
                                        else{
                                            echo "<h1>No users found</h1>";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php include_once 'inc/footer.php';?>