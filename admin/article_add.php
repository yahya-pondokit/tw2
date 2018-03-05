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
			<title>Admin | Tambah Artikel</title>
		<script src="../_ckeditor/ckeditor.js"></script>
		<script src="../jquery/jquery.min.js"></script>
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
								<li><p>Artikel</p></li>
								<li><a href="category.php">Kategori</a></li>
								<li><a href="author.php">Author</a></li>
								<li><a href="../proses/logout.php">Keluar</a></li>
						</ul>
					</div>
				</div>
			<div id="main-menu">
				<div class="content">
		<h1>Tambah Artikel</h1>
		<h3>tambah artikel disini</h3>
		<div id="content">
			<h2 class="adede"><a href="article.php">KEMBALI</a></h2>
			<div class="box-content">
			<form action="../proses/p_article_add.php" method="post" enctype="multipart/form-data" name="authora">
				<div class="form-style clearfix">
					<label for="title">JUDUL</label>
					<input type="text" id="title" name="title">
				</div>
				<div class="form-style clearfix">
					<label for="cat">KATEGORI</label>
					<select name="cat" class="form-control">
					  <?php
					    include '../proses/connect.php';
						$sql = mysqli_query($connect,"SELECT category_name, id_category FROM category");
						while($row = mysqli_fetch_array($sql)){
							echo "<option value='$row[id_category]'>".$row['category_name']."</option>";
						}
					  ?>
					</select>
				</div>
				<div class="form-style clearfix">
					<label for="img">GAMBAR</label>
					<input type="file" id="img" name="article_img">
				</div>
				<div class="form-style clearfix">
					<label>ISI</label>
					<textarea name="art_content" id="art_content"></textarea>
				</div>
				<div class="form-radio clearfix">
				<label>Status</label>
                        <label><input type="radio" name="publish" value="y" checked>
                        Publish</label>
                        <label><input type="radio" name="publish" value="n">
                        Tidak Publish</label>
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
			CKEDITOR.replace( 'art_content' );
			$(function() {
			  $("form[name='authora']").validate({
					rules: {
					title: "required"
					},
					messages: {
					title: "*Masukkan judul terlebih dahulu"
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