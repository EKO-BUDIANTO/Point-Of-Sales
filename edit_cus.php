<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Customer</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body>
<?php
include "koneksi.php";
if(isset($_POST['baten'])){
	$idcus=$_GET["id"];
	  $namacus=$_POST["txtnamacus"];
	  $alamat=$_POST["txtalamat"];
	  $telepon=$_POST["txttelepon"];
	  $sql="update customer set nama_customer='$namacus',alamat='$alamat',no_telepon='$telepon'
			where id_customer='$idcus'";
	  $hasil=mysqli_query($conn, $sql);
	  header("location:customer.php?pesan=sukses");
}
elseif(isset($_GET['id'])){
	$sql="select * from customer where id_customer='".$_GET['id']."'";
	$h=mysqli_query($conn, $sql);
	$b=mysqli_fetch_array($h);
}
	
	?>
<div class="container">
  <div class="panel panel-default">	
	<div class="panel-heading" style="font-size:24px;"><b>Edit Customer</b></div>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">ID Customer :</label>
				<div class="col-sm-2">
					<input type="text" name="txtidcus" value="<?php echo $b ['id_customer']; ?>" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Customer :</label>
				<div class="col-sm-4">
					<input type="text" name="txtnamacus" value="<?php echo $b ['nama_customer']; ?>" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat :</label>
				<div class="col-sm-4">
					<textarea  name="txtalamat" value="<?php echo $b ['alamat']; ?>" class="form-control" placeholder="Alamat" required><?php echo $b ['alamat']; ?></textarea>
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
				<a href="customer.php" class="btn btn-sm btn-danger">Batal</a>
		</form>
	</div>
	</div>
	</div>
</body>
</html>