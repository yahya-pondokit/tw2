<?php
	include 'connect.php';
			
			$id = $_POST['id'];
			$cname	= isset($_POST['c_name']) ? $_POST['c_name'] : '';
			$comment	= isset($_POST['comment']) ? $_POST['comment'] : '';
			$cmail	= isset($_POST['c_mail']) ? $_POST['c_mail'] : '';
			$cphone	= isset($_POST['c_phone']) ? $_POST['c_phone'] : '';
			$date   = date("Y-m-d H:i:s");
			// echo $id.$cname.$comment.$cmail.$cphone.$date;die();
			if (!empty($cname) && !empty($comment) && !empty($cmail) && !empty($cphone)) {
			mysqli_query($connect, "INSERT INTO comment
				VALUES (null, '$id', '$cname', '$cmail', '$cphone', '$comment', '$date')
			");
			}
		// echo $id;die();
		header("location:../post.php?ID=$id");
?>