<section class="padsection7">
	<div class="container_24">
<!--  Hovers Begin -->
		<div class="wrapper"><div class="grid_24">
			<h2 class="title3">Theathres</h2></div>
		</div>
		<div class="wrapper">
		<?php

	$query = $connection->query("SELECT distinct e.*, day(w.event_date) day, monthname(w.event_date) month, w.price price FROM event e join event_place w using (event_id) where e.event_type = 'Theathre' ORDER BY w.event_date DESC");
	while($row=$query->fetch_object()){

?>
			<div class="grid_8">
				<div class="wrapper">
				<div class="view view_fourth">
					 <img src="<?php echo $row->event_img; ?>" alt="" height="200" width="300" />
					 <div class="mask">
						<h2><?php echo $row->event_name; ?></h2>
						<p>Date: <?php echo $row->day; ?> <?php echo $row->month; ?></p>
						<p>Price: <?php echo $row->price; ?></p>
						<a href="?page=event_info&event_id=<?php echo $row->event_id?>" class="btn">More</a>
					 </div>
				</div>
				</div>
			</div>
			<?php
	}

?>
		</div>
		
		
		</div>
</section>	