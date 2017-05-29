<?php 
$ep_id=null;
if(isset($_GET['ep_id'])){
	$ep_id = $_GET['ep_id'];
} 
$qnt=null;
if(isset($_GET['qnt'])){
	$qnt = $_GET['qnt'];
}
echo $ep_id;
echo $qnt;
$sum = 0;

?>


<section class="padsection7">
	<div class="container_24">
<!--  Hovers Begin -->
		<div class="wrapper"><div class="grid_24">
			<h2 class="title3">Pay</h2></div>
		</div>
		<div class="wrapper">
		
			<div class="grid_24">
				<div class="wrapper">
				<form id="form1" action = "?" method = "post">
				

    
    
		<?php for($i = 1; $i<=$qnt; $i++){ ?>
    <label>
	Please, choose your <?php echo $i; ?> seat </br>
        <span class="text-form fleft">Seat:</span>
        <select name = "seat_id_number_<?php echo $i;?>">
						<?php

	
	
$query = $connection->query("SELECT s.seat_id, s.seat_row, s.seat_number FROM event_place ep left outer join places p on ep.place_id = p.place_id left outer join
seats s on p.place_id = s.place_id 	where ep.ep_id = ".$ep_id." and seat_id not in (SELECT seat_id from ticket where ep_id = ".$ep_id.") ORDER BY ep.event_date DESC");
	
	while($row=$query->fetch_object()){

?>
            <option value = "<?php echo $row->seat_id; ?>"><?php echo $row->seat_row; ?> row, <?php echo $row->seat_number; ?> seat</option>
					<?php
		
	}

?>
        </select>
    </label>
   
   <?php } ?>
   <?php $query = $connection->query("SELECT * FROM event_place 
   where ep_id = ".$ep_id." ORDER BY event_date DESC"); 
   while($row=$query->fetch_object()){
   ?>
		<label><span class="text-form">Cost: </span><?php $sum = $row->price*$qnt; echo $sum; ?></label>
		<label><span class="text-form">Name on card: </span><input type="text" name="name_on_card"></label>
		<label><span class="text-form">Number on card (16 number): </span><input type="text" name="number_on_card"></label>
		<label><span class="text-form">Validity until: </span><input type="date" value="2017-08-14" name="validity"></label>
		<input type="hidden" name="uid" value="<?php echo $USER_DATA->id?>">
			<input type="hidden" name="ep_id" value="<?php echo $row->ep_id?>">
			<input type="hidden" name="qnt" value="<?php echo $qnt?>">
			<input type="hidden" name="cost" value="<?php echo $sum ?>">
			<input type="hidden" name="secret_code" value="<?php echo rand(1,9999999) ?>">
			<input type="hidden" name="act" value="pay">
 <?php } ?>
   
    <button class="btn" type = "submit" form = "form1"><span></span>Pay</button>
</form>
				</div>
			</div>

		</div>
		
		
		</div>
</section>	