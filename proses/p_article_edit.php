<?php
session_start();
if (isset($_SESSION['login'])) {
	include 'connect.php';
	
	$id    			= isset($_POST['id']) ? $_POST['id'] : '';
	
	$cat			= isset($_POST['cat']) ? $_POST['cat'] : '';
	$publish 		= isset($_POST['publish']) ? $_POST['publish'] : '';
	
	$title    	= isset($_POST['title']) ? $_POST['title'] : '';
	$content    	= isset($_POST['art_content']) ? $_POST['art_content'] : '';
	// echo $publish.$id;die();
	if (!empty($id) && !empty($cat) && !empty($title) && !empty($content)) {
		mysqli_query($connect, "
			UPDATE article
			SET id_category = '$cat', judul = '$title',
			content = '$content', publish = '$publish'
			WHERE id_article = '$id'
			");
		header("location:../admin/article.php");
	} else {
		echo "Silahkan lengkapi data <a href='../admin/article_edit.php?=".$id."'>artikel</a>";

	}


} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>