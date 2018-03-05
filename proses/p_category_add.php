<?php
session_start();
if (isset($_SESSION['login'])) {

	include 'connect.php';
	
	$name    = isset($_POST['category_name']) ? $_POST['category_name'] : '';
	$status    = isset($_POST['status']) ? $_POST['status'] : '';
	
	if (!empty($name)) {

		mysqli_query($connect, "
			INSERT INTO category 
			VALUES (null, '$name')
			");
		
		header("location:../admin/category.php");

	} else {
		echo "Silahkan lengkapi data <a href='../admin/category_add.php'>author</a>";
	}

} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>