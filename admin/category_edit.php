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
		<title>Admin | Edit Kategori</title>
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
						<h1>EDIT KATEGORI</h1>
						<h3>edit kategori yang sudah ada</h3>
							<h2 class="adede"><a href="category.php">Kembali</a></h2>
						<div class="box-content clearfix">
						<div id="content">
						<form name="cated" action="../proses/p_category_edit.php" method="post" class="form-horizontal">
							<?php
							include '../proses/connect.php';
							$id = $_GET['ID'];
							$sql = mysqli_query($connect, "SELECT * FROM category WHERE id_category = $id");
							$row = mysqli_fetch_array($sql);
							?>
							<input type="hidden" name="id" value="<?= $id ?>">
								<div class="form-style clearfix">
							<label>Kategori</label>
							<input type="text" name="category_name" value="<?= $row['category_name'] ?>">
								</div>
								<div class="form-sub">
							<input type="submit" value="Edit">
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
			  $("form[name='cated']").validate({     
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