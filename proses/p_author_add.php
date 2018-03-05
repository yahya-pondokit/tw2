<?php
session_start();
if (isset($_SESSION['login'])) {

	include 'connect.php';
	
	$username    = isset($_POST['username']) ? $_POST['username'] : '';
	$mail    = isset($_POST['email']) ? $_POST['email'] : '';
	$name    = isset($_POST['name']) ? $_POST['name'] : '';
	$pass    = isset($_POST['password']) ? $_POST['password'] : '';
	
	if (!empty($username) && !empty($mail) && !empty($name) && !empty($pass)) {
		$sql = mysqli_query($connect, "SELECT * FROM author WHERE username = '$username'");
		$result = mysqli_num_rows($sql);
		if($result){
			echo "USERNAME ATAU PASSWORD SUDAH ADA. <a href='../admin/author_add.php'>Kembali ?</a>";
		}else{
			mysqli_query($connect, "
				INSERT INTO author 
				VALUES (null, '$username', '$mail', '$pass', '$name')
				");
			
			header("location:../admin/author.php");
		}
	} else {
		echo "Silahkan lengkapi data <a href='../admin/author_add.php'>author</a>";
	}

} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>