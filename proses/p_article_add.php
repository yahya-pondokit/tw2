<?php
session_start();
if (isset($_SESSION['login'])) {

	include 'connect.php';
	
	$title    	= isset($_POST['title']) ? $_POST['title'] : '';
	$content    	= isset($_POST['art_content']) ? $_POST['art_content'] : '';
	
	$img_name		= $_FILES['article_img']['name'];
	$img_type		= $_FILES['article_img']['type'];
	$img_size    	= $_FILES['article_img']['size'];
	$img_tmp_name 	= $_FILES['article_img']['tmp_name'];
	$img_ext	 	= explode('.',$img_name);
	
	
	$cat			= isset($_POST['cat']) ? $_POST['cat'] : '';
	$user			= $_SESSION['author'];
	$date    		= date("Y-m-d H:i:s");
	$publish 		= isset($_POST['publish']) ? $_POST['publish'] : '';
	
	$folder 		= "../gambar/";
	if (!empty($title) && !empty($content) && !empty($cat)) {
		
		if (!is_dir($folder)){
			mkdir($folder, 0777);
		}
		
		if (!empty($img_name)){
			$newName = rand(1111,9999).'.'.end($img_ext);
			move_uploaded_file($img_tmp_name,$folder.$newName);
			$img_name = $newName;
		} else {
			$img_name = null;
		}
		
		mysqli_query($connect, "INSERT INTO article VALUES (null,'$cat','$title','$user','$content','$date','$img_name','$publish')");

		header("location:../admin/article.php");

	} else {
		echo "Silakan lengkapi data <a href='../admin/article_add.php'>Artikel</a>";
	}


} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>