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
			<title>Admin | Artikel</title>
		 <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
		<script type="text/javascript" charset="utf8" src="../jquery/jquery.min.js"></script>
		<script type="text/javascript" charset="utf8" src="../datatables/datatables.js"></script>
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
								<li><p>Artikel</p></li>
								<li><a href="category.php">Kategori</a></li>
								<li><a href="author.php">Author</a></li>
								<li><a href="../proses/logout.php">Keluar</a></li>
							</ul>
						</div>
					</div>
				<div id="main-menu">
					<div class="content">
						<h1>Artikel</h1>
						<h3>Edit, tambah dan hapus artikel di sini</h3>
						<div class="box-content">
							<h2 class="raito adede"><a href="article_add.php">Tambah</a></h2>
							<table id="articles">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kategori</th>
									<th>Tanggal</th>
									<th>Judul</th>
									<th>Author</th>
									<th>Isi</th>
									<th>Publish</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								function cat($id)
								{
									include '../proses/connect.php';
									$sql = mysqli_query($connect,"SELECT category_name FROM category WHERE id_category = $id");
									$row = mysqli_fetch_array($sql);
									
									return $row['category_name'];
								}
								function aut($id)
								{
									include '../proses/connect.php';
									$sql = mysqli_query($connect,"SELECT author_name FROM author WHERE id_author = $id");
									$row = mysqli_fetch_array($sql);
									
									return $row['author_name'];
								}
								include '../proses/connect.php';
								$sql = mysqli_query($connect, "SELECT * FROM article ORDER BY date DESC");
								$no = 1;
								while($row = mysqli_fetch_array($sql)) {
								  echo "
								  <tr>
									<td>".$no++."</td>
									<td>".cat($row['id_category'])."</td>
									<td>".date("d F Y", strtotime($row['date']))."</td>
									<td>".$row['judul']."</td>
									<td>".aut($row['id_author'])."</td>
									<td>".(strlen($row['content']) > 100 ? substr($row['content'], 0,100)."..." : $row['content'])."</td>
									<td>".($row['publish'] == 'y' ? "Dipublish" : "Belum Dipublish")."</td>
									<td>
									  <h2 class='button'><a href='article_edit.php?ID=$row[id_article]'>
										<i class='fa fa-fw fa-pencil'></i> Edit
									  </a></h2>
									  <h2 class='button red'><a href='../proses/p_article_delete.php?ID=$row[id_article]'>
										<i class='fa fa-fw fa-trash-o'></i>
										Hapus
									  </a></h2>
									</td>
								  </tr>
								  ";
								}
								?>
							</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#articles').dataTable({
				fixedHeader: true,
				responsive: true
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