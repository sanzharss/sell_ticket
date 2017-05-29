<?php

	include 'init/db.php';
	
	if(CONNECTED){ 
		$service_id=null;
if(isset($_GET['service_id'])){
	$service_id = $_GET['service_id'];
} 
	$amount=4500;
if(isset($_GET['amount'])){
	$amount = $_GET['amount'];
} 
		?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Services</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/script.js"></script>
<!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css"> 
<![endif]-->
</head>
<body>
<!-- PRO Framework Panel Begin -->
<div id="advanced"><span class="trigger"><strong></strong><em></em></span><div class="bg_pro"><div class="pro_main"><a href="" class="pro_logo"></a><ul class="pro_menu"><li><a href="index.html"><img src="images/pro_home.png" alt=""></a></li><li><a href="404.html">Pages<span></span></a><ul>	<li><a href="under_construction.html">Under Construction</a></li><li><a href="intro.html">Intro Page</a></li><li><a href="404.html">404 page</a></li></ul></li><li><a href="layouts.html">Layouts</a></li><li><a href="typography.html">Typography</a></li><li><a href="portfolio.html">Gallery Layouts<span></span></a><ul><li><a href="portfolio.html">Portfolio</a></li><li><a href="just-slider.html">Sliders</a><ul><li><a href="just-slider.html">Just Slider</a></li><li><a href="kwicks.html">Kwicks Slider</a></li><li><a href="functional-slider.html">Functional Slider</a></li></ul></li><li><a href="gallery-page1.html">Gallery</a></li></ul></li><li><a href="misc.html">Extras<span></span></a><ul><li><a href="social_media.html">Social and Media<br> Sharing</a></li><li><a href="css3.html">CSS3 Tricks</a></li><li><a href="misc.html">Misc</a></li></ul></li></ul><div class="clear"></div></div></div><div class="bg_pro2"></div></div>
<!-- PRO Framework Panel End -->
<div class="bg-main">
	<header>
		<div class="container_24">
			<div class="wrapper">
				<div class="grid_17">
					<h1><a href="index.html">Idealex</a></h1>
				</div>
				<div class="grid_7">
					<form id="search2">
						 <div class="fleft"><input type="text"></div>
						 <a onClick="document.getElementById('search2').submit()">search</a>
					</form>
				</div>
			</div>
		</div>
		<nav class="main-menu">
			<ul class="sf-menu">
				<li><a href="index.html"><em>about Us</em><strong></strong></a><ul>
						<li><a href="more.html">Who We Are</a></li>
						<li><a href="more.html">News</a></li>
						<li><a href="more.html">Products</a></li>
					</ul>
				</li>
				<li class="current"><a href="index-1.html"><em>services</em><strong></strong></a></li>
				<li><a href="index-2.html"><em>solutions</em><strong></strong></a></li>
				<li><a href="index-3.html"><em>Training</em><strong></strong></a></li>
				<li><a href="index-4.html"><em>support</em><strong></strong></a></li>
				<li><a href="index-5.html"><em>Clients</em><strong></strong></a></li>
				<li class="last"><a href="index-6.html"><em>contacts</em><strong></strong></a></li>
			</ul>
			<div class="clear"></div>
		</nav>
	</header>
	<section class="padsection2">
		<div class="container_24">
			<div class="wrapper">
					<?php

	$query = $connection->query("SELECT * from services where id = ".$service_id);
	while($row=$query->fetch_object()){

?>
				<div class="grid_8">
				<form action="http://localhost:8080/JAVA_15_03/epayForm" method = "post" id="log_in">
					 <input type="hidden" value="php" name = "page">
					 <input type="hidden" value="<?php echo $amount; ?>" name = "amount">
					 <label><span class="text-form">Encryption Key:</span> <input type="text" value="<?php echo $row->encryption_key; ?>" name = "encryptionKey"></label>
					 <label><span class="text-form">Credit Card Number:</span> <input type="text" value="" name = "creditCardNumber"></label>
					 <label><span class="text-form">CSV Code:</span> <input type="password" value="" name = "csvCode"></label>
					 <button class="btn sign-in" type = "submit" form = "log_in"><span></span>Sign in</button>
				</form>
				</div>	
						<?php
	}

?>
			</div>
			<div class="wrapper">
				<div class="grid_24">
					<div class="padline2"><div class="lineH"></div></div>
					<h2 class="padtitle">What We Offer</h2>
				</div>
			</div>
			<div class="wrapper">
				<div class="grid_8">
					<div class="wrapper padbot">
						<div class="imgindent"><img src="images/2page_img4.png" alt=""></div>
						<div class="extra-wrap"><a href="more.html">Marketing consulting</a><br>Sit amet consectetuer adipiscing raes vestibulum molestie lacusenen nonu hendrerit Cum sociis natoque.</div>
					</div>
					<div class="wrapper padbot">
						<div class="imgindent"><img src="images/2page_img5.png" alt=""></div>
						<div class="extra-wrap"><a href="more.html">Business planning</a><br>Sit amet consectetuer adipiscing raes vestibulum molestie lacusenen nonu hendrerit Cum sociis natoque.</div>
					</div>
					<div class="wrapper">
						<div class="imgindent"><img src="images/2page_img6.png" alt=""></div>
						<div class="extra-wrap"><a href="more.html">Investment banking</a><br>Sit amet consectetuer adipiscing raes vestibulum molestie lacusenen nonu hendrerit Cum sociis natoque.</div>
					</div>
				</div>
				<div class="grid_8">
					<div class="wrapper padbot">
						<div class="imgindent"><img src="images/2page_img7.png" alt=""></div>
						<div class="extra-wrap"><a href="more.html">Project management</a><br>Sit amet consectetuer adipiscing raes vestibulum molestie lacusenen nonu hendrerit Cum sociis natoque.</div>
					</div>
					<div class="wrapper padbot">
						<div class="imgindent"><img src="images/2page_img9.png" alt=""></div>
						<div class="extra-wrap"><a href="more.html">Strategic planning</a><br>Sit amet consectetuer adipiscing raes vestibulum molestie lacusenen nonu hendrerit Cum sociis natoque.</div>
					</div>
					<div class="wrapper">
						<div class="imgindent"><img src="images/2page_img10.png" alt=""></div>
						<div class="extra-wrap"><a href="more.html">Customer-centered marketing</a><br>Sit amet consectetuer adipiscing raes vestibulum molestie lacusenen nonu hendrerit Cum sociis natoque.</div>
					</div>
				</div>
				<div class="grid_8">
					<div class="wrapper padbot">
						<div class="imgindent"><img src="images/2page_img11.png" alt=""></div>
						<div class="extra-wrap"><a href="more.html">Direct Marketing</a><br>Sit amet consectetuer adipiscing raes vestibulum molestie lacusenen nonu hendrerit Cum sociis natoque.</div>
					</div>
					<div class="wrapper padbot">
						<div class="imgindent"><img src="images/2page_img12.png" alt=""></div>
						<div class="extra-wrap"><a href="more.html">Employee training</a><br>Sit amet consectetuer adipiscing raes vestibulum molestie lacusenen nonu hendrerit Cum sociis natoque.</div>
					</div>
					<div class="wrapper">
						<div class="imgindent"><img src="images/2page_img13.png" alt=""></div>
						<div class="extra-wrap"><a href="more.html">Internet marketing</a><br>Sit amet consectetuer adipiscing raes vestibulum molestie lacusenen nonu hendrerit Cum sociis natoque.</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
</div>
<footer>
	<div class=" container_24">
		<div class="wrapper">
			<div class="grid_6 suffix_2">
				<h1 class="footer-logo"><a href="index.html">idealex</a></h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ultricies odio magna.</p>
				<p class="color1 privacy">&copy; 2012 <span>|</span>  <a href="index-7.html">Privacy Policy</a></p>
			</div>
			<div class="grid_7 suffix_2">
				<h4>Related Links</h4>
				<div class="wrapper">
					<div class="grid_4 alpha">
						<ul class="footer-list">
							<li><a href="more.html">About Us</a></li>
							<li><a href="more.html">Testimonials</a></li>
							<li><a href="more.html">Our Staff</a></li>
							<li><a href="more.html">Events &amp; Press</a></li>
							<li><a href="more.html">Contact Us</a></li>
						</ul>
					</div>
					<div class="grid_3 omega">
						<ul class="footer-list">
							<li><a href="more.html">Sign Up</a></li>
							<li><a href="more.html">Forums</a></li>
							<li><a href="more.html">Affiliate Program</a></li>
							<li><a href="more.html">FAQ</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="grid_7">
				<h4>Follow Us</h4>
				<ul class="tooltips">
					<li><a href="more.html"><img src="images/icon1.png" alt=""><span>RSS</span></a></li>
					<li><a href="more.html"><img src="images/icon3.png" alt=""><span>Facebook</span></a></li>
					<li><a href="more.html"><img src="images/icon2.png" alt=""><span>Twitter</span></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
</body>
</html>
<?php } ?>