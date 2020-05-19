<?php include_once 'inc/header.php';?>

<?php include_once 'inc/sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View Messages
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
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Message Lists</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query="SELECT * FROM tbl_contacts WHERE status = 0 ORDER BY id DESC";
                                $get_messages = $dbObj->select($query);
                                $i = 1;
                                if($get_messages) {
                                    while($result = $get_messages->fetch_assoc())
                                    { 
                                ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $result['name'];?></td>
                                        <td><?php echo $result['email'];?></td>
                                        <td><?php echo $formatObj->postBodyShorten($result['message'],30);?></td>
                                        <td><?php echo $formatObj->dateFormat($result['date']);?></td>
                                        <td><a class="text-primary" href="viewmessage.php?msgid=<?php echo $result['id'];?>">View</a> | <a class="text-warning" href="replymessage.php?msgid=<?php echo $result['id'];?>">Reply</a> | <a class="text-success" href="?seen_message=<?php echo $result['id'];?>">Mark as read</a></td>
                                    </tr>
                                <?php

                                    }
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


        </section>


        <section class="content">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Seen Message Lists</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>sdsf@mail.com</td>
                                        <td>Alsdfadfsafsafsafs</td>
                                        <td>20.20.2020</td>
                                        <td>
                                        <a class="text-danger" onclick='return confirm("Are you sure to delete message ?");' href="editmessage.html">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php include_once 'inc/footer.php';?>