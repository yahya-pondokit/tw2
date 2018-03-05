<?php
include 'connect.php';

$user = $_POST['username'];
$password = $_POST['password'];

if (!empty($user) && !empty($password)) {
	$sql = mysqli_query($connect, "SELECT * FROM author WHERE username = '$user' AND password = '$password'");
	$result = mysqli_num_rows($sql);
	session_start();
	if ($result) {
		$row = mysqli_fetch_array($sql);
		$_SESSION['login'] = true;
		$_SESSION['email'] = $email;
		$_SESSION['author'] = $row['id_author'];
		header("location:../admin/article.php");
	} else {
		$_SESSION['error'] = true;
		header("location:../login.php");
	}
}
?>