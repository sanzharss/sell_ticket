<?php

	include 'init/db.php';
	
	if(CONNECTED){

	include 'init/user.php';
	
	$page;

	if($USER_DATA!=null){

		if($_SERVER['REQUEST_METHOD']=='POST'){

			if(isset($_POST['act'])){

				if($_POST['act']=='logout'){

					unset($_SESSION['user_id']);
					header("Location:?");

				}if($_POST['act']=='delete_account'){
					
					$query = $connection->query("Delete  FROM users 
										WHERE id = ".$_SESSION['user_id']."
										AND active = 1 LIMIT 1");
						 header("Location:?");

				}
				if ($_POST['act']=='add_comment') {
					
					$uid = $_SESSION['user_id'];
					$PostId = $_POST['imageID'];
					$text = $_POST['text'];
					
					$sql_query = "INSERT INTO comments(id,uid, eid, text,active) 
							  VALUES(NULL,".$_SESSION['user_id'].",".$PostId.",\"".$text."\",1)";
							  $connection->query($sql_query);
							  header("Location:?page=event_info&event_id=".$PostId);
			
				}if ($_POST['act']=='mes_to_adm') {
					
					$name = $_POST['name'];
					$email = $_POST['email'];
					$phone = $_POST['phone'];
					$message = $_POST['message'];
					
					$sql_query = "INSERT INTO admin_message(mes_id, sender_name, email, phone,message) 
							  VALUES(NULL,\"".$_SESSION['full_name']."\",\"".$email."\",".$phone.",\"".$message."\")";
							  $connection->query($sql_query);
						
							  header("Location:?");
			
				}if ($_POST['act']=='delete_comment') {
					
					$cid = $_POST['cid'];
					
					$PostId = $_POST['imageID'];
					$sql_text= "UPDATE comments SET active=0 WHERE id = ".$cid." ";	
				

						$connection->query($sql_text);
						 header("Location:?page=event_info&event_id=".$PostId);
			
				}
				if ($_POST['act']=='reserve') {
					
					$qnt = $_POST['qnt'];
					$ep_id = $_POST['ep_id'];
					
					
							  header("Location:?page=pay&ep_id=".$ep_id."&qnt=".$qnt);
			
				}
				if ($_POST['act']=='pay') {
					$qnt=$_POST['qnt'];
						$uid=$_POST['uid'];
					$ep_id=$_POST['ep_id'];
					$cost=$_POST['cost'];
					$name_on_card=$_POST['name_on_card'];
					$number_on_card=$_POST['number_on_card'];
					$validity=$_POST['validity'];
					$secret_code=$_POST['secret_code'];
					
	
			

					$sql_query = "INSERT INTO cheque(ch_id,uid,ep_id,cost,name_on_card,number_on_card,validity,secret_code) 
							  VALUES(NULL,".$uid.",".$ep_id.",".$cost.",\"".$name_on_card."\",".$number_on_card.",\"".$validity."\",\"".$secret_code."\")";
							  $connection->query($sql_query);
							  $query = $connection->query("SELECT ch_id FROM cheque 
						WHERE secret_code = \"".$secret_code."\"");

					if($row=$query->fetch_object()){

						$tempik = $row->ch_id;

					}
							  for($i = 1; $i<=$qnt; $i++){
						$p[] = $_POST['seat_id_number_'.$i];
					}
					$arrlength = count($p);
					for($x = 0; $x <  $arrlength; $x++) {
     echo $p[$x];
	 $squery = "INSERT INTO ticket(ticket_id,ep_id,seat_id,ticket_active,ch_id,uid) 
							  VALUES(NULL,".$ep_id.",".$p[$x].",1,".$tempik.",".$uid.")";
							  $connection->query($squery);
	 
}
							  header("Location:?page=profile&code=$secret_code");
			
				}if ($_POST['act']=='add_event') {
					
					$event_name = $_POST['event_name'];
					$event_info = $_POST['event_info'];
					$event_type = $_POST['event_type'];
					$event_img = $_POST['event_img'];
					
					$sql_query = "INSERT INTO event(event_id,event_name, event_info, event_type,event_img) 
							  VALUES(NULL,\"".$event_name."\",\"".$event_info."\",\"".$event_type."\",\"".$event_img."\")";
							  $connection->query($sql_query);
							  header("Location:?");
			
				}if ($_POST['act']=='add_place') {
					
					$place_name = $_POST['place_name'];
					$seats_amount = $_POST['seats_amount'];
					$seat_row = $_POST['seat_row'];
					$seat_column = $seats_amount/$seat_row; 
					$sql_query = "INSERT INTO places(place_id,place_name, seats_amount) 
							  VALUES(NULL,\"".$place_name."\",".$seats_amount.")";
							  $connection->query($sql_query);
							   $query = $connection->query("SELECT place_id FROM places 
						WHERE place_name = \"".$place_name."\"");

					if($row=$query->fetch_object()){

						$tempik = $row->place_id;

					}
					
					for($i = 1; $i<=$seat_row; $i++){
					for($x = 1; $x<=$seat_column; $x++) {
	 $squery = "INSERT INTO seats(seat_id,seat_row,seat_column,place_id) 
							  VALUES(NULL,".$i.",".$x.",".$tempik.")";
							  $connection->query($squery);
							  
					}

					}
							  header("Location:?");
			
				}if ($_POST['act']=='add_ep') {
					
					$event_id = $_POST['event_id'];
					$place_id = $_POST['place_id'];
					$event_date = $_POST['event_date'];
					$price = $_POST['price'];
					
					$sql_query = "INSERT INTO event_place(ep_id,event_id, place_id, event_date,price) 
							  VALUES(NULL,".$event_id.",".$place_id.",\"".$event_date."\",".$price.")";
							  $connection->query($sql_query);
							  header("Location:?");
			
				}
				
			}
		}	


		$page = 'profile';

		if(isset($_GET['page'])){

			if($_GET['page']=='profile'){

				$page = 'profile';

			}else if($_GET['page']=='concert'){

				$page = 'concert';

			}else if($_GET['page']=='child'){

				$page = 'child';

			}else if($_GET['page']=='movie'){

				$page = 'movie';

			}else if($_GET['page']=='theathre'){

				$page = 'theathre';

			}else if($_GET['page']=='sport'){

				$page = 'sport';

			}else if($_GET['page']=='other'){

				$page = 'other';

			}else if($_GET['page']=='event_info'){

				$page = 'event_info';

			}else if($_GET['page']=='pay'){

				$page = 'pay';

			}else if($_GET['page']=='contacts'){

				$page = 'contacts';

			}else if($_GET['page']=='add_event'){

				$page = 'add_event';

			}else if($_GET['page']=='ch_place'){

				$page = 'ch_event';

			}else if($_GET['page']=='del_event'){

				$page = 'del_event';

			}else if($_GET['page']=='add_place'){

				$page = 'add_place';

			}else if($_GET['page']=='ch_place'){

				$page = 'ch_place';

			}else if($_GET['page']=='del_place'){

				$page = 'del_place';

			}else if($_GET['page']=='add_ep'){

				$page = 'add_ep';

			}else if($_GET['page']=='ch_ep'){

				$page = 'ch_ep';

			}else if($_GET['page']=='del_ep'){

				$page = 'del_ep';

			}else{

				$page = '404';

			}

		}


	}else{

		if($_SERVER['REQUEST_METHOD']=='POST'){

			if(isset($_POST['act'])){

				if($_POST['act']=='login'){

					$login = $_POST['login'];
					$pass = $_POST['password'];

					$query = $connection->query("SELECT * FROM users 
						WHERE login = \"".$login."\" AND password = \"".$pass."\" and active = 1");

					if($row=$query->fetch_object()){

						$_SESSION['user_id'] = $row->id;
						$_SESSION['login'] = $row->login;
						$_SESSION['full_name'] = $row->full_name;
						$_SESSION['age'] = $row->age;
						header("Location:?");

					}

				}
				if($_POST['act']=='register'){
					$login = $_POST['login'];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			$age = $_POST['age'];
			$full_name = $_POST['full_name'];

			if($pass1==$pass2){
				if($pass1&&$login&&$age&&$full_name!=""){
				
				$sql_query = "INSERT INTO users(id,login,password,age,full_name,active) 
							  VALUES(NULL,\"".$login."\",\"".$pass1."\",".$age.",\"".$full_name."\",1)";

				$connection->query($sql_query);
//echo	$sql_query;
				header("Location:?");
					
				}
				

			}
				}
			}

		}

		$page = 'home';

		if(isset($_GET['page'])){

			if($_GET['page']=='home'){

				$page = 'home';

			}else if($_GET['page']=='concert'){

				$page = 'concert';

			}else if($_GET['page']=='child'){

				$page = 'child';

			}else if($_GET['page']=='movie'){

				$page = 'movie';

			}else if($_GET['page']=='theathre'){

				$page = 'theathre';

			}else if($_GET['page']=='sport'){

				$page = 'sport';

			}else if($_GET['page']=='other'){

				$page = 'other';

			}else if($_GET['page']=='event_info'){

				$page = 'event_info';

			}else{

				$page = '404';

			}


		}


	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>About Us</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
	
	<link href="rating.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/script.js"></script>
	<script type="text/javascript" src="js/rating.js"></script>

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
		<?php 
		if($USER_DATA->login=="admin" and $USER_DATA->password=="admin"){
			?>
	
<div id="advanced"><span class="trigger"><strong></strong><em></em></span>
<div class="bg_pro"><div class="pro_main"><a href="" class="pro_logo"></a>
<ul class="pro_menu"><li><a href="index.php"><img src="images/pro_home.png" alt=""></a>
</li><li>
<a href="">Events<span></span></a>
<ul><li><a href="?page=add_event">Add event</a></li>
<li><a href="#">Change event</a></li>
<li><a href="#">Delete event</a></li>
</ul></li>
<li><a href="">Places<span></span></a>
<ul><li><a href="?page=add_place">Add</a></li>
<li><a href="#">Change</a></li>
<li><a href="#">Delete</a></li>
</ul></li>
<li><a href="">Event-Place<span></span></a>
<ul><li><a href="?page=add_ep">Add</a></li>
<li><a href="#">Change</a></li>
<li><a href="#">Delete</a></li></ul></li>
</ul><div class="clear"></div></div></div><div class="bg_pro2"></div>
</div> 
		<?php
		}
	?>
<div class="bg-main">
	<header>
		<div class="container_24">
			<div class="wrapper">
			<?php 
                		if($USER_DATA==null){
                	?>
				<div class="grid_16">
					<h1><a href="index.php">Idealex</a></h1>
				</div>
				
				<div class="grid_8">
				<form action="?" method = "post" id="log_in">
					 <input type="hidden" value="login" name = "act">
					 <input type="text" value="Login" onfocus="if(this.value=='Login'){this.value=''}" onblur="if(this.value==''){this.value='Login'}" name = "login">
					 <input type="password" value="Password" onfocus="if(this.value=='Password'){this.value=''}" onblur="if(this.value==''){this.value='Password'}" name = "password">
					 <button class="btn sign-in" type = "submit" form = "log_in"><span></span>Sign in</button>
				</form>
				<dl class="description-box">
					<dt><a class="description-dark">Sign up<span></span></a></dt>
					<dd>
						<div class="inner">
                        <form id="form2" action = "?" method = "post">
						<input type="hidden" value="register" name = "act">
    <label><span class="text-form">Login:</span><input type="text" name = "login"></label>
	<label><span class="text-form">Password:</span><input type="password" name = "pass1"></label>
	<label><span class="text-form">Confirm Password:</span><input type="password" name = "pass2"></label>
	<label><span class="text-form">Age:</span><input type="text" name = "age"></label>
	<label><span class="text-form">Full Name:</span><input type="text" name = "full_name"></label>
    <button class="btn sign-in" type = "submit" form = "form2"><span></span>Sign up</button>
</form>
						</div>
					</dd>
				</dl>
			</div>
			<?php
                    	}
						else{
							?>
							<div class="grid_21">
					<h1><a href="index.php">Idealex</a></h1>
				</div>
						<div class="grid_3">
				<form action="?" method = "post" id = "nlog">
				<input type="hidden" value="logout" name = "act">
				</form>
				<a><button class="btn sign-out" type = "submit" form = "nlog"><span></span>Sign out</button></a>
				<?php $query = $connection->query("SELECT count(*) counti FROM ticket 
						WHERE uid = ".$_SESSION['user_id']);

					if($row=$query->fetch_object()){

						$bought_tickets = $row->counti;

					} else{ $bought_tickets = 0; }
					?>
			<dl class="description-box">
					<dt><a class="description-dark"><?php echo $_SESSION['full_name']; ?><span></span></a></dt>
					<dd>
						<div class="inner">
						Age: <?php echo $_SESSION['age']; ?> </br>
						<?php echo $bought_tickets; ?> tickets was bought from this site
				
				<form action ="?" method="post" id = "delete">
					<input type="hidden" name="act" value="delete_account">
					<input type="hidden" value="<?php $_SESSION['user_id'];?>" name ="uid">
			    </form>
				
    <button class="btn bookmark danger" type = "submit" form = "delete"><span></span>Delete</button>
	
						</div>
					</dd>
				</dl>
			</div>
						<?php
						}
                    ?>
			</div>
		</div>
		<nav class="main-menu">
			<ul class="sf-menu">
				<li><a href="?page=concert"><em>Concert</em><strong></strong></a></li>
				<li><a href="?page=child"><em>For Children</em><strong></strong></a></li>
				<li><a href="?page=movie"><em>Movies</em><strong></strong></a></li>
				<li><a href="?page=theathre"><em>Theathre</em><strong></strong></a></li>
				<li><a href="?page=sport"><em>Sport</em><strong></strong></a></li>
				<li><a href="?page=other"><em>Others</em><strong></strong></a></li>
				<li class="last"><a href="?page=contacts"><em>Contacts</em><strong></strong></a></li>
			</ul>
			<div class="clear"></div>
		</nav>
		
	</header>
	<?php

        	include 'views/'.($USER_DATA!=null?'logged':'notlogged').'/'.$page.'.php';

        ?>
</div>

<footer>
	<div class=" container_24">
		<div class="wrapper">
			<div class="grid_6 suffix_2">
				<h1 class="footer-logo"><a href="index.php">Home</a></h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ultricies odio magna.</p>
				<p class="color1 privacy">&copy; 2016 <span>|</span>  <a href="#">Privacy Policy</a></p>
			</div>
			<div class="grid_7 suffix_2">
				<h4>Related Links</h4>
				<div class="wrapper">
					<div class="grid_4 alpha">
						<ul class="footer-list">
						</ul>
					</div>
					<div class="grid_3 omega">
						<ul class="footer-list">
						</ul>
					</div>
				</div>
			</div>
			<div class="grid_7">
				<h4>Follow Us</h4>
				<ul class="tooltips">
					<li><a href="#"><img src="images/icon1.png" alt=""><span>RSS</span></a></li>
					<li><a href="#"><img src="images/icon3.png" alt=""><span>Facebook</span></a></li>
					<li><a href="#"><img src="images/icon2.png" alt=""><span>Twitter</span></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
</body>
</html>
<?php
	
	}

?>