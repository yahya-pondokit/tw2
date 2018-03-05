<?php
session_start();
if(isset($_SESSION['login'])) {
?>
<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Test">
    <meta name="author" content="Yahya">
		<title>Admin | Tambah User</title>
	<script type="text/javascript" charset="utf8" src="../jquery/jquery.min.js"></script>
	<script src="../validate/dist/jquery.validate.js"></script>
	<link rel="stylesheet" href="../css/admin.css">
	<link rel="stylesheet" href="../fontawsem/css/font-awesome.css">
	</head>
	<body>
		<div id="container" class="clearfix">
			<div id="header">
				<h1>ADMIN AL-WAHDAH</h1>
			</div>
			<div class="noise">
				<div class="wrapper clearfix">
					<div id="sidebar-menu">
						<div class="sidebar-list">
							<ul>
							<li><a href="article.php">Artikel</a></li>
							<li><a href="category.php">Kategori</a></li>
							<li><p>Author</p></li>
							<li><a href="../proses/logout.php">Keluar</a></li>
							</ul>
						</div>
					</div>
					<div id="main-menu">
						<div class="content">
							<h1>Tambah User</h1>
							<h3>Masukkan user</h3>
							<div id="content">
								<h2 class="adede"><a href="author.php">Kembali</a></h2>
								<div class="box-content clearfix">
									<form name="useradd" action="../proses/p_author_add.php" method="post">
									<div class="form-style clearfix">
									<label for="name">Username</label>
										<input type="text" name="username" id="name">
									</div>
									<div class="form-style clearfix">
									<label for="mail">Email</label>
										<input type="email" name="email" id="mail">
									</div>
									<div class="form-style clearfix">
									<label for="nama">Nama</label>
										<input type="text" name="name" id="nama">
									</div>
									<div class="form-style clearfix">
									<label for="pass">Password</label>
										<input type="password" name="password" id="pass">
									</div>
									<div class="form-sub">
										<input type="submit" value="Tambah">
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(function() {
			  $("form[name='useradd']").validate({     
					rules: {
						username: {
							required: true,
							maxlength: 12
						},
						email: {
							required: true,
							email: true,
							maxlength: 40
						},
						password: {
							required: true,
							maxlength: 20
						},
						name: {
							required: true,
							maxlength: 20
						}
					},
					messages: {
						username: {
							required: "*Silakan Masukkan username :)",
							maxlength: "*Batas maksimal 12 huruf"
						},
						email: {
							required: "*Harap isikan email anda",
							email: "*Harap isikan email anda dengan benar",
							maxlength: "*Batas maksimal 40 huruf"
						},
						password: {
							required: "*Harap isikan password anda",
							maxlength: "*Batas maksimal 20 karakter"
						},
						name: {
							required: "*Harap isikan nama anda",
							maxlength: "*Batas maksimal 20 huruf"
						}
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
} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>