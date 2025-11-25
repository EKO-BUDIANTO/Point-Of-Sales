<?php
		session_start();
		include 'koneksi.php';
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		$sql="select * from users
			where nama_user='$user' and password='$pass' limit 0,1";
		$h=mysqli_query($conn, $sql);
		if($h){
			$r=mysqli_fetch_array($h);
			if($r){
				$_SESSION['user_id']=$user;
				header('Location:index.php');
			}else{
				header("location:login.php?pesan=gagal")or die(mysql_error());
			}
		}
?>