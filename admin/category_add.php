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
		<title>Admin | Tambah Kategori</title>
	<script type="text/javascript" charset="utf8" src="../jquery/jquery.min.js"></script>
	<script src="../validate/dist/jquery.validate.js"></script>
	<link rel="stylesheet" href="../css/admin.css">
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
							<li><p>Kategori</p></li>
							<li><a href="author.php">Author</a></li>
							<li><a href="../proses/logout.php">Keluar</a></li>
							</ul>
						</div>
					</div>
					<div id="main-menu">
						<div class="content">
						<h1>TAMBAH KATEGORI</h1>
						<h3>tambah kategori artikel</h3>
							<h2 class="adede"><a href="category.php">Kembali</a></h2>
						<div class="box-content clearfix">
							<div id="content">
								<form name="catadd" action="../proses/p_category_add.php" method="post">
									<div class="form-style clearfix">
								<label for="name">Nama Kategori</label>
									<input type="text" name="category_name" id="name">
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
			  $("form[name='catadd']").validate({     
					rules: {
						category_name: {
							required: true,
							maxlength: 20
						}
					},
					messages: {
						category_name: {
							required: "*Silakan Masukkan nama kategori :)",
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