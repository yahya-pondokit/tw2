<?php
session_start();
if(isset($_SESSION['login'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>WEB saia</title>
		 <style>
		 table, td {
		 border-collapse: collapse;border:1px solid #333;
		 }
		 </style>
	</head>
	<body>
		<h1>HALAMAN NGADMIN MEME</h1>
		<h3>Bisa edit artikel delelel</h3>
		<div id="content">
			<table>
                <?php
				// $connect = mysqli_connect("localhost", "root", "123", "pondok_it");
				include 'proses/connect.php';

				$sql = mysqli_query($connect, "SELECT * FROM article ORDER BY date DESC");
				$no = 1;
				while($row = mysqli_fetch_array($sql)) {
				  echo "
				  <tr>
					<td>".$no++."</td>
					<td>".$row['id_article']."</td>
					<td>".$row['id_category']."</td>
					<td>".date("d F Y", strtotime($row['date']))."</td>
					<td>".$row['username']."</td>
					<td>".(($row['active'] == 'a') ? 'Yessu' : 'Kagak')."</td>
					<td>".$row['content']."</td>
					<td>
					  <a class='btn btn-info btn-xs' href='a_edit.php?ID=$row[id_article]'>
						<i class='fa fa-pencil'></i> Edit
					  </a>
					  <a class='btn btn-danger btn-xs delete' href='proses/p_a_delete.php?ID=$row[id_article]'>
						<i class='fa fa-trash-o'></i>
						Hapus
					  </a>
					</td>
				  </tr>
				  ";
				}
                ?>
			</table>
		</div>
	
	</body>
</html>
<?php
} else {
  echo "Please <a href='login.php'>login</a> first.";
}
?>