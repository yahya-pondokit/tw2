<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Test">
    <meta name="author" content="Yahya">
    <title>HOME</title>
	<script type="text/javascript" charset="utf8" src="jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="fontawsem/css/font-awesome.css">
  </head>
  <body>
		<div id="container">
			<div class="wrapper">
				<div id="header">
					<div class="header-logo-big">
						<h1><a href="#">Al-Wahdah</a></h1>
					</div>
					<div class="menu mob-menu">
					<form method="post">
						<ul>
							<li class="liner"><a href="../triwulan">HOME</a></li>
							<li><a href="#">ABOUT</a></li>
							<li><a href="#">ARCHIVE</a></li>
							<li><a href="#">CONTACT</a></li>
							<li  class="hd" style="position:relative;">
								<label>
									<input type="text" name="search" id="src" class="src-article">
									<button class="src-icon" type="submit">
										<i class="fa fa-fw fa-search"></i>
									</button>
									<span class="trigger"></span>
								</label>
							</li>
						</ul>
					</form>
					</div>
					<div class="isianaja" style="width: 40px;float: right;">
					<span id="burger" class="clearfix" style="width: 0px;">
						<span></span>
						<span></span>
						<span></span>
					</span>
					</div>
				</div>
			</div>
			<div id="main">
				<div class="wrapper">
				 <?php
				// $connect = mysqli_connect("localhost", "root", "123", "pondok_it");
				include 'proses/connect.php';
				function cat($id)
				{
					include 'proses/connect.php';
					$sql = mysqli_query($connect, "SELECT category_name FROM category WHERE id_category = $id");
					$row = mysqli_fetch_array($sql);
					
					return $row['category_name'];
				}
				
				if (!empty($_POST['search'])) {
					$search = $_POST['search'];
					$sql = mysqli_query($connect, "SELECT id_article, id_category, judul, content, img, date FROM article WHERE judul LIKE '%".$search."%' OR content LIKE '%".$search."%' AND publish = 'y' ORDER BY date DESC");
					$no = 0;
						echo "
							<div class='content'>
								<div class='wall clearfix'>
									<div class='main-title res'>
										<h1>Search result for <span class='srcres'>&laquo;".$search."&raquo;</span></h1>
									</div>
									<div class='main-content'>
										<p>Found ".mysqli_num_rows($sql)." entries
										</p>
									</div>
								</div>
							</div>
						";
					while($row = mysqli_fetch_array($sql)) {
					  echo "
							<div class='content'>";
							if ($row['img'] == !null) {
								echo "
									<div class='image-container'>
									<img src='gambar/".$row['img']."'>
									</div>
								";
							}
						echo "
							<div class='wall clearfix'>
							<div class='cat-sign'>
								".cat($row['id_category'])."
							</div>
							<div class='main-title'>
								<h3>".date("F d", strtotime($row['date']))."</h3>
								<h1><a href='post.php?ID=$row[id_article]'>".$row['judul']."</a></h1>
							</div>
							<div class='main-content'>
								".$row['content']."
								
							</div>
							<div class='read'><a href='post.php?ID=$row[id_article]'>READ MORE</a>
							</div>
							<div class='tags'>
								<a href='#'>#yosemite</a>
								<a href='#'>#national</a>
								<a href='#'>#park</a>
							</div>
						</div>
						</div>
					  ";
					}
				} else {	
				$sql = mysqli_query($connect, "SELECT id_article, id_category, judul, content, img, date FROM article WHERE publish = 'y' ORDER BY date DESC");
					while($row = mysqli_fetch_array($sql)) {
					  echo "
							<div class='content'>
							";
							if ($row['img'] == !null) {
								echo "
									<div class='image-container'>
									<img src='gambar/".$row['img']."'>
									</div>
								";
							}
						echo "
							<div class='wall clearfix'>
							<div class='cat-sign'>
								".cat($row['id_category'])."
							</div>
							<div class='main-title'>
								<h3>".date("F d", strtotime($row['date']))."</h3>
								<h1><a href='post.php?ID=$row[id_article]'>".$row['judul']."</a></h1>
							</div>
							<div class='main-content'>
								".$row['content']."
								
							</div>
							<div class='read'><a href='post.php?ID=$row[id_article]'>READ MORE</a>
							</div>
							<div class='tags'>
								<a href='#'>#yosemite</a>
								<a href='#'>#national</a>
								<a href='#'>#park</a>
							</div>
						</div>
						</div>
					  
					  ";
					}
				}
                ?>
				</div>
			</div>
			<div id="footer">
				<div class="wrapper footer">
					<div class="logo-big">
						<h1>Al-Wahdah</h1>
					</div>
					<div class="footer-menu">
						<ul>
							<li><a href="#">HOME</a></li>
							<li><a href="#">ABOUT</a></li>
							<li><a href="#">ARCHIVE</a></li>
							<li><a href="#">CONTACT</a></li>
							<li class="hd"><a href="#"><i class="fa fa-fw fa-search"></i></a></li>
						</ul>
					</div>
					<div class="footer-text">
					<p>
					Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.
					</p>
					</div>
					<div class="copy">
					<p> &copy; 2018-Al-Wahdah. All Rights Reserved.</p>
					</div>
					<div class="social-media">
						<ul>
							<li><a href="#"><i class="fa fa-fw fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-fw fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-fw fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-fw fa-pinterest"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$('.trigger').click(function(){
					$('.trigger').hide();
					$('.src-article').addClass('shown');
				});
				$('#burger').click(function(){
					if ($(this).hasClass('open')){
						$(this).removeClass('open');
					} else {
						$(this).addClass('open');
					}
					if ($('.menu').hasClass('aligned')){
						$('.menu').removeClass('aligned');
					} else {
						$('.menu').addClass('aligned');
					}
				});
			});
		</script>
  </body>
</html>