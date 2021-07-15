
<?php 
include 'koneksi.php';
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<div class="container mt-5">
	<div class="col-md-4 mx-auto text-center">
		<h3>Halamana Login</h3>
		<br>
		<div class="form-group">
			<form role="form" action="" nethod="post">
				<input type="text" class="form-control" placeholder="Username" name="Username" required="">
</div>
	<div class="form-group">
		<input type="password" class="form-control" placeholder="Password" name="password" required="">
	</div>
	<button type="submit" class="btn btn-primary btn-block" name="Masuk">Login</button>
</form>
</div>
</div>
</body>


<?php
if (isset($_POST['masuk'])){
	include 'konekasi.php';
	$Username = $_POST['Username'];
	$password = $_POST['password'];

	$ambil = $koneksi >query("SELECT * FROM user WHERE username = '$username' AND password = '$password' ");
	$cocok = $ambil->num_rows;
	if($cocok > 0){
		$data = $ambil -> fetch_assoc();

		if ($data ['sebagai'] == "admin"){
			$_SESSION['username'] = "username";
			$_SESSION['sebagai'] = "admin";
			echo "<div class='col-md-3 col-md-offsed-3 mx-auto'>";
			echo "<div class='alert alert-success text-center'> Login Berhasil </div>";
			echo "	<meta http-equiv='refresh' content='1;url=admin/menu.php'>";
			echo " </div>";


		}else if($data ['sebagai'] == "dokter"){
			$_SESSION['username'] = "username";
			$_SESSION['sebagai'] = "dokter";
			echo "<div class-'col-md-3 col-md-offsed-3 mx-auto'>";
			echo "<div class='alert alert-success text-center'> Login Berhasil </div>";
			echo "	<meta http-equiv='refresh' content='1;url=dokter/menu.php'>";
			echo " </div>";

	}else if($data ['sebagai'] == "apoteker"){
			$_SESSION['username'] = "username";
			$_SESSION['sebagai'] = "apoteker";
			echo "<div class='col-md-3 col-md-offsed-3 mx-auto'>";
			echo "<div class='alert alert-success text-center'> Login Berhasil </div>";
			echo "	<meta http-equiv='refresh' content='1;url=apoteker/menu.php'>";
			echo " </div>";
}else {
			echo "<div class='col-md-3 col-md-offsed-3 mx-auto'>";
			echo "<div class='alert alert-success text-center'> Login Gagal</div>";
			echo "	<meta http-equiv='refresh' content='1;url=index.php'>";
			echo " </div>";
		}
	}
}

  ?>
</html>
