<?php
	include "koneksi.php";
	include "header.php";
	
	$tes = "select * from penjualan";
	
?>
	
	<?php
 // set page
 $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

 $perpage = 10;

 // metentukan offset
 // offset sendiri menentukan data yang akan di lewati setiap baris
 $limit = ($page - 1) * $perpage;

 $prev = 1;
 $next = 2;

 // menentukan angka awal untuk paging
 $start_page = ($page - $prev) < 1 ? 1 : ($page - $prev);

 // set query


		   
		if(isset($_POST["txtcari"]))
		{
			$sql = "select * from penjualan  
			where tanggal_jual like '%".$_POST["txtcari"]."%'";
		}
		else
		{
			$sql = "select * from penjualan order by tanggal_jual desc";
		}

//
		   
 // menentukan jumlah data yang ada di table users
 $rs = mysqli_query($conn, $sql);
 $record = mysqli_num_rows($rs);

 // menentukan total paging
 $total_page = ceil($record / $perpage);

 // menentukan jumlah angka yang akan di tampilkan
 $display_page = $start_page + $prev + $next;
 if($display_page > $total_page){
  $display_page = $total_page;
 }

 // memecah data berdasarkan :
 // $limit : data awal yang akan di lewati
 // $perpage : jumlah data yang akan di tampilkan
 $sql .= ' LIMIT '.$limit.','.$perpage;
 $data = mysqli_query($conn, $sql);
?>	

<html>
<head>
   <title>Form Penjualan</title>
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<style>
	th{
		background-color: dodgerblue;
		color: white;
	}
	form {
		
		margin:25px auto;
	}
</style>
</head>
 
<body>
<div class="container">
<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "sukses"){
				echo "<div style='margin-bottom:-55px' class='alert alert-succes' role='alert' align='center'><span class='glyphicon glyphicon-ok'></span>  Update Data Berhasil...</div>";
			}
		}
		?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading" style="font-size:24px;"><b>Daftar Penjualan</b></div>
  <div class="panel-body">
<div class="row"><form id="form1" name="form1" method="post" action="">
	  <div class="col-md-8">
      <a href="tambah_jual.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Tambah</a>
	  <label for="txtcari"></label>
	  <button type="submit" class="btn btn-default">
	  <span class="glyphicon glyphicon-search"></span>Search</button>
	  <!--<input type="submit" name="submit" id="submit" class="btn btn-info" value="Cari" />-->
      <input type="date" name="txtcari" placeholder="Cari Barang..." />
                    <!--muncul jika ada pencarian (tombol reset pencarian)-->
                    <?php
                    if(isset($_REQUEST['txtcari'])){
                    ?>
                        <a class="btn btn-default btn-outline" href="penjualan.php"> Reset Pencarian</a>
                    <?php
                    }
                    ?>
                </div>
	  
</form></div>
<div class="table-responsive">
<table class="table table-bordered">
      <th>ID Transaksi</th>
      <th>ID Customer</th>
      <th>Tanggal</th>
      <th>Bayar</th>
      <th>Kembali</th>
      <th>Aksi</th>
   </tr> 

   <?php

	
    while ($row =mysqli_fetch_array($data)) { 
	
	?>
   <tr>	
      <td><?php echo $row['id_penjualan'] ?></td>
      <td><?php echo $row['id_customer'] ?></td>
      <td><?php echo $row['tanggal_jual'] ?></td>
	  <td><?php echo $row['bayar'] ?></td>
	  <td><?php echo $row['kembali'] ?></td>
      <td align="center">
 <a class="btn btn-block btn-info" href="kwitansi.php?id=<?php echo $row['id_penjualan'] ?>" target="_blank"><span class="glyphicon glyphicon-print">Cetak</span></a>
 
      </td>
    </tr>
 <?php } ?>
</table>
<?php
  $paging = null;
  if($total_page > 1){
   $paging .= '<ul class="pagination">';

   if($page > ($prev + 1)){
    $paging .= '<li><a href="penjualan.php?page=1">first</a></li>';
    $paging .= '<li><a href="penjualan.php?page='.($page - 1).'">prev</a></li>';
   }

   for($i=$start_page; $i<=$display_page; $i++){
    if($i == $page){
     $paging .= '<li><a href="#'.$i.'">'.$i.'</a></li>';
    }else{
     $paging .= '<li><a href="penjualan.php?page='.$i.'">'.$i.'</a></li>';
    }
   }

   if($total_page > $display_page){
    $paging .= '<li><a href="penjualan.php?page='.($page + 1).'">next</a></li>';
    $paging .= '<li><a href="penjualan.php?page='.$total_page.'">last</a></li>';
   }

   $paging .= '<ul>';
  }
  echo $paging;
 ?>
</body>
</html>
