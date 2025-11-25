<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Customer</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body>
<?php
if(isset($_POST["simpan"])){
	
	include_once "koneksi.php";
	$idcus=$_POST["id_customer"];
	$namacus=$_POST["nama_customer"];
	$alamat=$_POST["alamat"];
	$telepon=$_POST["no_telepon"];
	$sql="insert into customer (id_customer,nama_customer,alamat,no_telepon)
	values ('$idcus','$namacus','$alamat','$telepon')";
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
				<label class="col-sm-3 control-label">ID Customer :</label>
				<div class="col-sm-2">
					<input type="text" name="id_customer" class="form-control" placeholder="ID Customer" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Customer :</label>
				<div class="col-sm-4">
					<input type="text" name="nama_customer" class="form-control" placeholder="Nama Customer" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat :</label>
				<div class="col-sm-4">
					<textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea>
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
				<a href="customer.php" class="btn btn-sm btn-danger">Batal</a>
				</div>
		</form>
		</div>
	</div>
	</div>
</body>
</html>