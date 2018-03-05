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
			<title>Admin | Kategori</title>
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
							<li><a href="article.php">Artikel</a></li>
							<li><p>Kategori</p></li>
							<li><a href="author.php">Author</a></li>
							<li><a href="../proses/logout.php">Keluar</a></li>
						</ul>
					</div>
				</div>
			<div id="main-menu">
				<div class="content">
				<h1>Kategori</h1>
				<h3>Edit, tambah dan hapus kategori di sini</h3>
					<div class="box-content">
					<h2 class="raito adede"><a href="category_add.php">Tambah</a></h2>
					<table id="category">
						<thead>
							<tr>
								<th>No.</th>
								<th>Kategori</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						include '../proses/connect.php';

						$sql = mysqli_query($connect, "SELECT category_name, id_category FROM category ORDER BY category_name");
						$no = 1;
						while($row = mysqli_fetch_array($sql)) {
						  echo "
						  <tr>
							<td>".$no++."</td>
							<td>".$row['category_name']."</td>
							<td>
							  <h2 class='button'><a  href='category_edit.php?ID=$row[id_category]'>
								<i class='fa fa-fw fa-pencil'></i> Edit
							  </a></h2>
							  <h2 class='button red'><a href='../proses/p_category_delete.php?ID=$row[id_category]'>
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
			$('#category').dataTable({
				fixedHeader: true
			});
		});
	</script>
</html>
<?php
} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>