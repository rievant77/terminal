<?php

session_start();
include "../koneksi.php";
include "auth_user.php";

$noken	= $_GET["noken"];


$queryangkutan = mysqli_query ($konek, "SELECT * FROM angkutan WHERE noken='$noken'");
if($queryangkutan == false){
		die ("Terjadi Kesalahan : ". mysqli_error($konek));
	}
$angkutan = mysqli_fetch_array ($queryangkutan);	

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
			        <li class="active"><a href="dosen.php"><i class="fa fa-user"></i><span>Angkutan</span></a></li>
			        <!--li class="active"><a href="#"><i class="fa fa-user"></i><span>Report</span></a></li>
					<li><a href="#"><i class="fa fa-user-circle-o"></i><span>User</span></a></li-->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Terminal
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-user"></i> Terminal</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

              		<table border="10" width="100%" class="table table-bordered table-striped table-scalable">
              			<thead>
              				<tr>                                      
		                    	<td>No. Kendaraan</td>
		                    	<td><center>:</center></td>
		                    	<td><?php echo"$angkutan[noken]";?></td>
		                    </tr>
		                    <tr>                                      
		                    	<td>Perusahaan PO</td>
		                    	<td><center>:</center></td>
		                    	<td><?php echo"$angkutan[po]";?></td>
		                    </tr>
		                    <tr>                                      
		                    	<td>Nama Sopir</td>
		                    	<td><center>:</center></td>
		                    	<td><?php echo"$angkutan[supir]";?></td>
		                    </tr>
		                   <tr>                                      
		                    	<td>Kartu Pengawas</td>
		                    	<td><center>:</center></td>
		                    	<td><?php echo"$angkutan[kp]";?></td>
		                    </tr>
		                    <tr>                                      
		                    	<td>Masa Berlaku Uji</td>	
		                    	<td><center>:</center></td>
		                    	<td><?php echo"$angkutan[uji]";?></td>
		                    </tr>
		                    <tr>                                      
		                    	<td>Penumpang Naik</td>
		                    	<td><center>:</center></td>
		                    	<td><?php echo"$angkutan[naik]";?></td>
		                    </tr>
		                    <tr>                                      
		                    	<td>Penumpang Turun</td>
		                    	<td><center>:</center></td>
		                    	<td><?php echo"$angkutan[turun]";?></td>
		                    </tr>
		                    <tr>                                      
		                    	<td>Kelengkapan</td>
		                    	<td><center>:</center></td>
		                    	<td><?php echo"$angkutan[kel]";?></td>
		                    </tr>


		                     <p class="page-header"><a href="dosen.php"><button class="btn btn-default">Kembali</button></a> 
		                    
              			</thead>
			     
				</div>
			</div>
			</div>
			</div>
		</section>
	</div>
	</div>

	<?php
		//include	"content_footer.php";
		include "bundle_script.php";
	?>

  </body>
</html>
