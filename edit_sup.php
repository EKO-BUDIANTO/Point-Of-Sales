<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Supplier</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body>
<?php
include "koneksi.php";
if(isset($_POST['baten'])){
	$idsup=$_GET["id"];
	  $namasup=$_POST["txtnamasup"];
	  $alamat=$_POST["txtalamat"];
	  $kota=$_POST["txtkota"];
	  $telepon=$_POST["txttelepon"];
	  $sql="update supplier set nama_supplier='$namasup',alamat='$alamat',kota='$kota',no_telepon='$telepon'
			where id_supplier='$idsup'";
	  $hasil=mysqli_query($conn, $sql);
	  header("location:supplier.php?pesan=sukses");
}
elseif(isset($_GET['id'])){
	$sql="select * from supplier where id_supplier='".$_GET['id']."'";
	$h=mysqli_query($conn, $sql);
	$b=mysqli_fetch_array($h);
}
	
	?>
<div class="container">
  <div class="panel panel-default">	
	<div class="panel-heading" style="font-size:24px;"><b>Edit Supplier</b></div>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">ID Supplier :</label>
				<div class="col-sm-2">
					<input type="text" name="txtidcus" value="<?php echo $b ['id_supplier']; ?>" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Supplier :</label>
				<div class="col-sm-4">
					<input type="text" name="txtnamasup" value="<?php echo $b ['nama_supplier']; ?>" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat :</label>
				<div class="col-sm-4">
					<textarea  name="txtalamat" value="<?php echo $b ['alamat']; ?>" class="form-control" placeholder="Alamat" required><?php echo $b ['alamat']; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Kota :</label>
				<div class="col-sm-4">
					<input type="text" name="txtkota" value="<?php echo $b ['kota']; ?>" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Telepon :</label>
				<div class="col-sm-3">
					<input type="text" name="txttelepon" value="<?php echo $b ['no_telepon']; ?>" class="form-control" required>
				</div>
			</div>
				<label class="col-sm-3 control-label">&nbsp;</label>
				<button type="submit" name="baten" class="btn btn-primary">
				<span class="glyphicon glyphicon-save"></span>Simpan</button>
				<a href="supplier.php" class="btn btn-sm btn-danger">Batal</a>
		</form>
	</div>
	</div>
	</div>
</body>
</html>