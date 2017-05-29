

<div class="pad-slider">
			<div class="main-slider">
				<ul class="items">
					<li>
						<img src="https://pp.vk.me/c627624/v627624193/23dae/KLj5q3uC9bE.jpg" alt="" />
						<div class="slider-banner"><span>The Hunger Games: Mockingjay - Part 2</span></div>
					</li>
					<li>
						<img src="https://pp.vk.me/c628430/v628430193/40b24/DPX26FE_Ev8.jpg" alt="" />
						<div class="slider-banner"><span>Champions League</span></div>
					</li>
					<li>
						<img src="https://pp.vk.me/c628430/v628430193/40b3f/2hH5l5BXmQw.jpg" alt="" />
						<div class="slider-banner"><span>And other good events in this site</span></div>
					</li>
				</ul>
			</div>
		</div>	
		
		<h1>
	
	 <?php
	 
if(isset($_GET['code'])){
	$code = $_GET['code'];?>
	Your secret code to take a ticket(s) <?php   echo $code;
}   else{
?> Welcome <?php	echo $USER_DATA->full_name;
}
?>

	
</h1>
	<section class="padsection7">
	<div class="container_24">
<!--  Hovers Begin -->
		<div class="wrapper"><div class="grid_24">
			<h2 class="title3">All events</h2></div>
		</div>
		<div class="wrapper">
		<?php

	$query = $connection->query("SELECT distinct e.*, day(w.event_date) day, monthname(w.event_date) month, w.price price FROM event e join event_place w using (event_id) ORDER BY w.event_date DESC");
	while($row=$query->fetch_object()){

?>
			<div class="grid_8">
				
				<div class="view view_fourth">
					 <img src="<?php echo $row->event_img; ?>" alt="" height="200" width="300" />
					 <div class="mask">
						<h2><?php echo $row->event_name; ?></h2>
						<p>Date: <?php echo $row->day; ?> <?php echo $row->month; ?></p>
						<p>Minimum price <?php echo $row->price; ?></p>
						<a href="?page=event_info&event_id=<?php echo $row->event_id?>" class="btn">More</a>
					 </div>
				</div>
				
			</div>
			<?php
	}

?>
		</div>
		
		
		</div>
</section>	