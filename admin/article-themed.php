<?php
session_start();
if(isset($_SESSION['login'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>WEB saia</title>
		 <link rel="stylesheet" type="text/css" href="../css/admin.css">
		 <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
		<script type="text/javascript" charset="utf8" src="../jquery/jquery.min.js"></script>
		<script type="text/javascript" charset="utf8" src="../datatables/datatables.js"></script>
	</head>
	<body>
		<div id="container" class="clearfix">
				<div id="header">
					<h1>ADMIN AL-WAHDAH</h1>
				</div>
			<div class="wrapper">
				<div id="sidebar-menu">
					<div class="sidebar-list">
						<ul>
							<li><a href="#">LOFI</a></li>
							<li><a href="#">LOFI</a></li>
							<li><a href="#">LOFI</a></li>
						</ul>
					</div>
				</div>
				<div id="main-menu">
					<div class="content">
						<h1>Title Goes Here</h1>
						<h3>Short and simple description here</h3>
						<div class="box-content">
							<form action="../proses/p_article_add.php" method="post" enctype="multipart/form-data">
							<div class="form-style">
								<label for="">TNama</label>
								<input type="text" name="">
							</div>
							<div class="form-style">
								<label for="">CONTOH AE</label>
								<input type="email" name="">
							</div>
							<div class="form-sub">
								<input type="submit" name="CONTOH">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
} else {
	$_SESSION['notlogged'] = true;
	header("location:../login.php");
}
?>