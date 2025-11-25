<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
	<style type="text/css">
	body{
		background: url(image/index.jpg);
		background-size: 100% 100%;
	}
	.kotak{	
		margin-top: 150px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	img.tengah{
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 200px;
		height: 200px;
	}
	
	</style>
</head>
<body>
	
	<div class="container">
	<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert' align='center'><span class='glyphicon glyphicon-remove'></span>  Login Gagal !! Username atau Password Salah !!</div>";
			}
		}
		?>
		<div class="panel panel-default">
			<form action="cek_login.php" method="post">
				<div class="col-md-4 col-md-offset-4 kotak">
				<img class="tengah" src="image/lock.jpg" />
					<h1></h1>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" id="userid" class="form-control" placeholder="Username" name="user" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
						<input type="password" id="pass" class="form-control" placeholder="Password" name="pass" required>
					</div>		
					<button type="submit" class="btn btn-block btn-success">
					 <span class="glyphicon glyphicon-login"></span>Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="assets/dist/sweetalert.min.js"></script>
</body>
</html>