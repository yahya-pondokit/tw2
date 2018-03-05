<?php
session_start();
if (isset($_SESSION['login'])) {

	include 'connect.php';
	
	$id   = $_GET['ID'];
	if (!empty($id)) {
		mysqli_query($connect, "
			DELETE FROM comment 
			WHERE id_article = $id
			");
		mysqli_query($connect, "
			DELETE FROM article 
			WHERE id_article = $id
			");
		
		// echo $id;die();
		header("location:../admin/article.php");

	} else {
		echo "ID Kosong <a href='../admin/article.php'>kembali</a>";

	}


} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>