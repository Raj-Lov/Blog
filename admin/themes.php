<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Update Themes
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php
            // Update themes
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $theme = $_POST['theme'];
                
                $theme = $dbObj->link->real_escape_string($theme); 

                
                $query="UPDATE tbl_themes SET themes = '$theme' WHERE id = '1' ";
                $update = $dbObj->update($query);
                if ($update) {
                    $category_success = "<span class='success'> Theme updated successfully! </span>";
                }
                else{
                    $category_failed = "<span class='error'> Theme not updated! </span>";
                }

              }

        ?>  
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                <?php
                    $query = "SELECT * FROM tbl_themes WHERE id = '1' ";
                    $get_themes = $dbObj->select($query);
                    while ($result = $get_themes->fetch_assoc()) { ?>
                            
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <input <?php if($result['themes'] == 'default'){echo "checked";}?> type="radio" name="theme" value="default" id="default" >
                                <label for="default">Default</label>
                            </div>
                            <div class="form-group">
                                <input <?php if($result['themes'] == 'red'){echo "checked";}?> type="radio" name="theme" value="red" id="red" >
                                <label for="red">Red</label>
                            </div>
                            <div class="form-group">
                                <input <?php if($result['themes'] == 'green'){echo "checked";}?> type="radio" name="theme" value="green" id="green" >
                                <label for="green">Green</label>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button name="update" type="submit" class="btn btn-primary">Change</button>
                        </div>
                    </form>

                    <?php
                        }
                    ?>

                </div>
                <!-- /.box -->
            </div>
        </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


 <?php include_once 'inc/footer.php';?>