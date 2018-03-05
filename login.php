<?php
session_start();
if(isset($_SESSION['login'])) {
  header("location:admin/author.php");
} else {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Test">
		<meta name="author" content="Yahya">
			<title>Al-Wahdah</title>
		<link rel="stylesheet" href="css/login.css">
		<script src="jquery/jquery.min.js"></script>
		<script src="validate/dist/jquery.validate.js"></script>
	</head>
	<body>
		<div id="content">
		<h1>Admin Al-Wahdah</h1>
			<div id="form">
			<h3>Silahkan login</h3>
			<form action="proses/p_login.php" method="post" name="login">
				<p>
				<label>Username<span class="red">*</span></label><br />
				<input type="text" name="username" placeholder="Masukkan Username">
				</p>
				<p>
				<label>Password<span class="red">*</span></label><br />
				<input type="password" name="password" placeholder="Masukkan Password">
				</p>
				<input class="poin" type="submit" value="Login">
			</form>
			</div>
				<?php
					if (isset($_SESSION['error'])){
						echo "<div class='errno'>Username atau password anda tidak terdaftar, silakan masukkan dengan benar :)</div>";
					} else if (isset($_SESSION['notlogged'])){
						echo "<div class='errno'>Silakan login terlebih dahulu :)</div>";
					} 
				?>
		</div>
		<script>
			$(function() {
			  $("form[name='login']").validate({     
					rules: {
					username: "required",
					password: "required"
					},
					messages: {
					username: "Silahkan isikan username anda",
					password: "Silahkan isi password anda"
					},
					submitHandler: function(form) {
					form.submit();
					}
				});
			});
		</script>
	</body>
</html>
<?php
}
?>
