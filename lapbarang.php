<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Barang</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body>
<div class="container">
  <div class="panel panel-default">	
	<div class="panel-heading" style="font-size:24px;"><b>Cari Laporan Barang</b></div>
	<div class="panel-body">
		<form class="form-horizontal" action="lap_barang.php" method="post" target="_blank">
		<div class="form-group">
				<label class="col-sm-3 control-label">Dari Tanggal :</label>
				<div class="col-sm-2">
					<input type="date" name="Dari" class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Sampai :</label>
				<div class="col-sm-2">
					<input type="date" name="Sampai" class="form-control">
				</div>
			</div>
			<label class="col-sm-3 control-label">&nbsp;</label>
				<button type="submit" name="Submit" class="btn btn-sm btn-primary" target="_blank">
				<span class="glyphicon glyphicon-print"></span>Cetak</button>
				<a href="barang.php" class="btn btn-sm btn-danger">Kembali</a>
</body>
</html>