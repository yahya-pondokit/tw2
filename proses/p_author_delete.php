<?php
session_start();
if (isset($_SESSION['login'])) {

	include 'connect.php';
	
	$id   = $_GET['ID'] == '1' ? '' : $_GET['ID'];
	if (!empty($id)) {
		mysqli_query($connect, "
			DELETE FROM article 
			WHERE id_author = '$id'
			");
		mysqli_query($connect, "
			DELETE FROM author 
			WHERE id_author = '$id'
			");
		
		// echo $name.$status.$id;die();
		header("location:../admin/author.php");

	} else {
		echo "ID Kosong atau ID Admin <a href='../admin/author.php'>kembali</a>";

	}


} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>