<?php

session_start();
include "../koneksi.php";
include "auth_user.php";
?>

<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>

<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Terminal Pasirhayam</title>
  <!-- Library CSS -->
  <?php
    include "bundle_css.php";
  ?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
        include 'content_header.php';
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              <li class="header"><h4><b><center>Menu Panel</center></b></h4></li>
              <li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
              <li ><a href="dosen.php"><i class="fa fa-user"></i><span>Angkutan</span></a></li>
              <li ><a href="report.php"><i class="icon fa fa-print"></i><span>Report</span></a></li>
          <li><a href="#"><i class="fa fa-user-circle-o"></i><span>User</span></a></li>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Report
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-print"></i> Report</li>
          </ol>
        </section>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
        <a href="#"><button class="btn btn-success" type="button" data-target="#exampleModal" data-toggle="modal"><i class="fa fa-print"></i> Report Berdasarkan Tanggal Input</button></a>
                  <br></br>
          
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

 
               
    
        <!-- Modal -->
<form method="POST" action="report-filter.php" target="_blank" >
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><small>PRINT FILTER DATE</small></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>



    <div class="modal-body">

      <div class="form-group">
                <label>Masa Uji</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input id="stayf" name="uji" type="text" class="form-control">
                  </div>
      </div>

      <div class="form-group">
        <div class="form-group">
        <label class="control-label">Dari Tanggal</label>
        <input type="date" name="from" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
    </div>
    <div class="form-group">
        <label class="control-label">Sampai Tanggal</label>
        <input type="date" name="end" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
    </div>                
    <div class="form-group">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit" name="submit" value="proses" onclick="return valid();">Print</button>
    </div>
</div>
</div>  
</div>
</div>
</div>
</form>
</form>
<!--end modal-->
   

      
    </div>
    <?php
    include "content_footer.php";
  ?>
  
    </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->
  <!-- Library Scripts -->
  <?php
    include "bundle_script.php";
  ?>
  </body>
</html>
