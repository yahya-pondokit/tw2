<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Test">
    <meta name="author" content="Yahya">
		<title>ARCHIVE</title>
	<script type="text/javascript" charset="utf8" src="jquery/jquery.min.js"></script>
	<script src="validate/dist/jquery.validate.js"></script>
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
							<li><a href="../triwulan">HOME</a></li>
							<li><a href="#">ABOUT</a></li>
							<li class="liner"><a href="#">ARCHIVE</a></li>
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
				$id = $_GET['ID'];
				$sql = mysqli_query($connect, "SELECT id_category, judul, content, img, date FROM article WHERE id_article = $id");
				$row = mysqli_fetch_array($sql);
					  echo "
							<div class='content'>
							<div class='wall clearfix'>
							<div class='cat-sign'>
								".cat($row['id_category'])."
							</div>
							<div class='main-title'>
								<h3>".date("F d", strtotime($row['date']))."</h3>
								<h1>".$row['judul']."</h1>
							</div>
							<div class='main-content'>";
							if ($row['img'] == !null) {
								echo "
									<div class='image-container img-post'>
									<img src='gambar/".$row['img']."'>
									</div>
								";
							}
							echo "
								<p>".$row['content']."
								</p>
							</div>
					  
					  ";
						$sqlc = mysqli_query($connect, "SELECT c_name, comment, c_time FROM comment WHERE id_article = $id ORDER BY c_time DESC");
                ?>
						</div>
							<div class="comment">
								<?php
									echo mysqli_num_rows($sqlc)." comment(s)";
								?>
								<div class="com-content clearfix">
									<div class="com-img">
										<img src="gambars/check.png">
									</div>
									<div class="com-text clearfix">
									<form action="proses/p_comment.php" method="post" name="comval">
										<input type="hidden" name="id" value="<?= $_GET['ID'] ?>">
										<textarea class="com-show" name="comment" placeholder="Komentar disini.."></textarea>
										<div class="jhide">
											<div class="ele">
												<input type="text" name="c_name" placeholder="Nama">
											</div>
											<div class="ele">
											<input type="email" name="c_mail" placeholder="Email">
											</div>
											<div class="ele">
											<input type="text" name="c_phone" placeholder="No. Handphone">
											</div>
											<input type="submit" value="Komentar">
										</div>
									</form>
									</div>
								</div>
								<?php
									while($rowc = mysqli_fetch_array($sqlc)){
									echo "
										<div class='com-content clearfix'>
											<div class='com-img'>
												<img src='gambars/check.png'>
											</div>
											<div class='com-text clearfix'>
												<div class='com-name'>
												".$rowc['c_name']."
												</div>
												<div class='com-post'>
												".$rowc['comment']."
												</div>
											</div>
										</div>
										";
									}
								?>
							</div>
						</div>
			</div>
			<div id="footer">
				<div class="wrapper footer">
					<div class="logo-big">
						<h1>Al-Wahdah</h1>
					</div>
					<div class="footer-menu">
						<ul>
							<li><a href="index.php">HOME</a></li>
							<li><a href="#">ABOUT</a></li>
							<li><a href="#">ARCHIVE</a></li>
							<li><a href="#">CONTACT</a></li>
							<li><a href="#"><i class="fa fa-fw fa-search"></i></a></li>
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
				$('.com-show').click(function(){
					$('.jhide').slideToggle();
				});
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
			$(function() {
			  $("form[name='comval']").validate({     
					rules: {
						comment: {
							required: true,
							minlength: 10
						},
						c_mail: {
							required: true,
							email: true,
							maxlength: 40
						},
						c_phone: {
							required: true,
							number: true,
							maxlength: 14
						},
						c_name: {
							required: true,
							maxlength: 40
						}
					},
					messages: {
						comment: {
							required: "Silakan berkomentar :)",
							minlength: "Komentar dibawah 10 huruf tidak dipulish"
						},
						c_mail: {
							required: "Harap isikan email anda",
							email: "Harap isikan email anda dengan benar",
							maxlength: "Batas maksimal 40 huruf"
						},
						c_phone: {
							required: "Harap isikan nomor telfon anda",
							number: "Pastikan anda sudah mengisi dengan benar",
							maxlength: "Batas maksimal 14 digit"
						},
						c_name: {
							required: "Harap isikan nama anda",
							maxlength: "Batas maksimal 40 huruf"
						}
					},
					submitHandler: function(form) {
					form.submit();
					}
				});
			});
		</script>
  </body>
</html>