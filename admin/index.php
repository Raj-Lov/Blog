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
                        <h3>290</h3>

                        <p>Total Posts</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <a href="http://localhost/employee_information_system/employee" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>26</h3>

                        <p>Total Category</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <a href="http://localhost/employee_information_system/designation" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>6</h3>

                        <p>Total Author/Editor</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="http://localhost/employee_information_system/card-payment" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">

                        <h3>0</h3>

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
                        <div id="employeeDataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="employeeDataTable_length"><label>Show <select name="employeeDataTable_length" aria-controls="employeeDataTable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="employeeDataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="employeeDataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="employeeDataTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="employeeDataTable_info">
                            <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="employeeDataTable" rowspan="1" colspan="1" style="width: 119.7px;" aria-sort="ascending" aria-label="SL: activate to sort column descending">SL</th><th class="sorting" tabindex="0" aria-controls="employeeDataTable" rowspan="1" colspan="1" style="width: 181.633px;" aria-label="Name: activate to sort column ascending">Name</th><th class="sorting" tabindex="0" aria-controls="employeeDataTable" rowspan="1" colspan="1" style="width: 141.5px;" aria-label="NID: activate to sort column ascending">NID</th><th class="sorting" tabindex="0" aria-controls="employeeDataTable" rowspan="1" colspan="1" style="width: 228.65px;" aria-label="Office ID: activate to sort column ascending">Office ID</th><th class="sorting" tabindex="0" aria-controls="employeeDataTable" rowspan="1" colspan="1" style="width: 191.783px;" aria-label="Phone: activate to sort column ascending">Phone</th><th class="sorting" tabindex="0" aria-controls="employeeDataTable" rowspan="1" colspan="1" style="width: 338.183px;" aria-label="Profile Picture: activate to sort column ascending">Profile Picture</th><th class="sorting" tabindex="0" aria-controls="employeeDataTable" rowspan="1" colspan="1" style="width: 164.55px;" aria-label="Time: activate to sort column ascending">Time</th></tr>
                            </thead>
                            <tbody>

                            
                            
                            <tr class="odd"><td colspan="7" class="dataTables_empty" valign="top">No data available in table</td></tr></tbody>

                        </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="employeeDataTable_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="employeeDataTable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="employeeDataTable_previous"><a href="#" aria-controls="employeeDataTable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button next disabled" id="employeeDataTable_next"><a href="#" aria-controls="employeeDataTable" data-dt-idx="1" tabindex="0">Next</a></li></ul></div></div></div></div>
                    </div> <br><br>
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