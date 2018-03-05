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
			<title>Admin | Edit Artikel</title>
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
		<h1>EDIT ARTIKEL</h1>
		<h3>edit artikel</h3>
		<div id="content">
			<h2 class="adede"><a href="article.php">Kembali</a></h2>
			<div class="box-content">
		<form action="../proses/p_article_edit.php" method="post" class="form-horizontal">
            <?php
            include '../proses/connect.php';
            $id = $_GET['ID'];
            $sql = mysqli_query($connect, "SELECT * FROM article WHERE id_article = $id");
            $row = mysqli_fetch_array($sql);
            ?>
            <input type="hidden" name="id" value="<?= $id ?>">
				<div class="form-style clearfix">
			<label>Judul</label>
			<input type="text" name="title" value="<?= $row['judul'] ?>">
				</div>
				<div class="form-style clearfix">
					<label for="cat">KATEGORI</label>
					<select name="cat" class="form-control">
					  <?php
						$sql2 = mysqli_query($connect,"SELECT category_name, id_category FROM category");
						while($row2 = mysqli_fetch_array($sql2)){
							if ($row2['id_category'] == $row['id_category']){
								$select = 'selected';
							} else {
								$select = '';
							}
							echo "<option value='$row[id_category]' $select>".$row2['category_name']."</option>";
						}
					  ?>
					</select>
				</div>
				<div class="form-style clearfix">
				<label>ARTICLE</label>
				<textarea name="art_content" id="art_content"><?= $row['content'] ?></textarea>
				</div>
				<div class="form-radio clearfix">
			<label>Publish</label>
                        <label><input type="radio" name="publish" value="y" <?= ($row['publish'] == 'y') ? 'checked' : '' ?>>
                        Aktif</label>
						<label>
                        <input type="radio" name="publish" value="n" <?= ($row['publish'] == 'n') ? 'checked' : '' ?>>
                        Tidak Aktif</label>
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
			CKEDITOR.replace( 'art_content' );
		</script>
	</body>
</html>
<?php
} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>