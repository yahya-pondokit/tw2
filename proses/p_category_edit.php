<?php
session_start();
if (isset($_SESSION['login'])) {

	include 'connect.php';
	
	$name    = isset($_POST['category_name']) ? $_POST['category_name'] : '';
	$id   = isset($_POST['id']) ? $_POST['id'] : '';
	if (!empty($name)) {

		mysqli_query($connect, "
			UPDATE category 
			SET category_name = '$name'
			WHERE id_category = '$id'
			");
		
		// echo $name.$status.$id;die();
		header("location:../admin/category.php");

	} else {
		echo "Silahkan lengkapi data <a href='../admin/c_edit.php'>kategori</a>";

	}


} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>