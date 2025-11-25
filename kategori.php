<?php
	include "koneksi.php";
	include "header.php";
	$tes = "select * from kategori";
	$data = mysqli_query($conn, $tes);

  	if(isset($_POST["txtcari"])){
	  $tes=$tes." where nama_kategori like '%".$_POST["txtcari"]."%'";
	 
  	}
  	$data = mysqli_query($conn, $tes);
?>
<html>
<head>
   <title>Form Kategori Barang</title>
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
  <div class="panel-heading" style="font-size:24px;"><b>Daftar Kategori Barang</b></div>
  <div class="panel-body">
      <!--<a href="tambah_bar.php" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>-->
<!--<form align="right">
	<input class="search" type="text" placeholder="Cari..." required>
	<input class="button" type="button" Value="Search">
</form>-->
<!--<div class="row col-sm-10 col-md-offset-1 custyle">-->
<div class="row"><form id="form1" name="form1" method="post" action="">
	  <div class="col-md-8">
      <a href="tambah_kat.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Tambah</a>
	  <label for="txtcari"></label>
	  <button type="submit" class="btn btn-default">
	  <span class="glyphicon glyphicon-search"></span>Search</button>
	  <!--<input type="submit" name="submit" id="submit" class="btn btn-info" value="Cari" />-->
      <input type="text" name="txtcari" placeholder="Cari Kategori..." />
                    <!--muncul jika ada pencarian (tombol reset pencarian)-->
                    <?php
                    if(isset($_REQUEST['txtcari'])){
                    ?>
                        <a class="btn btn-default btn-outline" href="kategori.php"> Reset Pencarian</a>
                    <?php
                    }
                    ?>
                </div>
</form></div>    
<div class="table-responsive">
<table class="table table-bordered">
      <th>ID Kategori</th>
      <!--<th>ID</th>-->
      <th>Nama Kategori</th>
      <th>Aksi</th>
   </tr> 

   <?php 
    while ($row =mysqli_fetch_array($data)) { ?>
   <tr>	
      <td><?php echo $row['id_kategori'] ?></td>
      <td><?php echo $row['nama_kategori'] ?></td>
      <td align="center">
 <a class="btn btn-primary" href="edit_kat.php?id=<?php echo $row['id_kategori'] ?>"><span class="glyphicon glyphicon-edit">Edit</span></a>
 
	  <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='del_kat.php?id=<?php echo $row['id_kategori']; ?>' }"<a class="btn btn-danger"><span class="glyphicon glyphicon-trash">Hapus</span></a>
      </td>
    </tr>
 <?php } ?>
</table>

</body>
</html>