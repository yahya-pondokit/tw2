<?php
session_start();
if (isset($_SESSION['login'])) {
	include 'connect.php';
	
	$username    = isset($_POST['username']) ? $_POST['username'] : '';
	$author_mail   = isset($_POST['author_mail']) ? $_POST['author_mail'] : '';
	$author_name   = isset($_POST['author_name']) ? $_POST['author_name'] : '';
	$password   = isset($_POST['password']) ? $_POST['password'] : '';
	
	$id   = isset($_POST['id']) ? $_POST['id'] : '';
	
	if (!empty($username) && !empty($author_mail) && !empty($author_name)) {
		if ($id != $_SESSION['author']){
				if (!empty($password)){
				mysqli_query($connect, "
					UPDATE author
					SET username = '$username', author_mail = '$author_mail',
					author_name = '$author_name', password = '$password'
					WHERE id_author = '$id'
					");
				} else {
				mysqli_query($connect, "
					UPDATE author
					SET username = '$username', author_mail = '$author_mail',
					author_name = '$author_name'
					WHERE id_author = '$id'
					");
				}
				header("location:../admin/author.php");
		} else {
			echo "SEPERTINYA INI KAMU YANG GANTI YA? <a href='../admin/author.php'>Kembali ?</a>";
		}
	} else {
		echo "Silahkan lengkapi data <a href='../admin/author_edit.php?=".$username."'>author</a>";

	}


} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>