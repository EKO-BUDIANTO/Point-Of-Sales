<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Supplier</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body>
<?php
if(isset($_POST["simpan"])){
	
	include_once "koneksi.php";
	$idsup=$_POST["id_supplier"];
	$namasup=$_POST["nama_supplier"];
	$alamat=$_POST["alamat"];
	$kota=$_POST["kota"];
	$telepon=$_POST["no_telepon"];
	$sql="insert into supplier (id_supplier,nama_supplier,alamat,kota,no_telepon)
	values ('$idsup','$namasup','$alamat','$kota','$telepon')";
	$hasil=mysqli_query($conn, $sql) or die ("mysqli_error");
	echo  "<div style='margin-bottom:-55px' class='alert alert-success' role='alert' align='center'><span class='glyphicon glyphicon-ok'></span> Data Berhasil Di Simpan</div>";
}
?>
<div class="container">
  <div class="panel panel-default">	
	<div class="panel-heading" style="font-size:24px;"><b>Tambah Customer</b></div>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">ID Supplier :</label>
				<div class="col-sm-2">
					<input type="text" name="id_supplier" class="form-control" placeholder="ID Supplier" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Supplier :</label>
				<div class="col-sm-4">
					<input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat :</label>
				<div class="col-sm-4">
					<textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Kota :</label>
				<div class="col-sm-3">
					<input type="text" name="kota" class="form-control" placeholder="Kota" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Telepon :</label>
				<div class="col-sm-3">
					<input type="text" name="no_telepon" class="form-control" placeholder="Telepon" required>
				</div>
			</div>
				<label class="col-sm-3 control-label">&nbsp;</label>
				<div class="col-sm-3">
				<button type="submit" name="simpan" class="btn btn-primary">
				<span class="glyphicon glyphicon-save"></span>Simpan</button>
				<a href="supplier.php" class="btn btn-sm btn-danger">Batal</a>
				</div>
		</form>
		</div>
	</div>
	</div>
</body>
</html>