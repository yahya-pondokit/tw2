<?php
session_start();
if(isset($_SESSION['login'])) {
	header("location:article.php");
} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>