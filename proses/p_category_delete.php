<?php
session_start();
if (isset($_SESSION['login'])) {

	include 'connect.php';
	
	$id   = $_GET['ID'];
	if (!empty($id)) {
		mysqli_query($connect, "
			DELETE FROM article 
			WHERE id_category = '$id'
			");
		mysqli_query($connect, "
			DELETE FROM category 
			WHERE id_category = '$id'
			");
		
		// echo $id;die();
		header("location:../admin/category.php");

	} else {
		echo "ID Kosong <a href='../admin/category.php'>kembali</a>";

	}


} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>