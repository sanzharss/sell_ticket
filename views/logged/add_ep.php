<section class="padsection7">
	<div class="container_24">
<!--  Hovers Begin -->
		<div class="wrapper"><div class="grid_24">
			<h2 class="title3">Add event</h2></div>
		</div>
		<div class="wrapper">
	
			<div class="grid_16">
				<div class="wrapper">
				<form id="form1" action = "?" method = "post">
				<input type="hidden" value="add_ep" name = "act">
	<label>
        
        	 <span class="text-form fleft">Place of the event:</span>
        <select name = "place_id"><?php
						
			$sqlquery = $connection->query("
				SELECT place_id, place_name from places
				");
			while($row1 = $sqlquery->fetch_object()){ 
			?>
            <option value="<?php echo $row1->place_id; ?>"><?php echo $row1->place_name; ?></option>
				<?php } ?>
        </select>
    </label>
	<label>
       <span class="text-form fleft">Type of the event:</span>
        <select name = "event_id">
		<?php
						
			$sqlquery = $connection->query("
				SELECT event_id, event_name from event
				");
			while($row1 = $sqlquery->fetch_object()){ 
			?>
            <option value="<?php echo $row1->event_id; ?>"><?php echo $row1->event_name; ?></option>
				<?php } ?>
        </select>
    </label>
    <label><span class="text-form">Price:</span><input type="text" name = "price"></label>
    <label><span class="text-form">Date of the event:</span><input type="date" value="2017-08-14" name = "event_date"></label>
    <label><span class="text-form">Encryption key:</span><input type="text" value="" name = "enKey"></label>
					
    <button class="btn" type = "submit" form = "form1"><span></span>Add</button>
</form>
				</div>
			</div>

		</div>
		
		
		</div>
</section>	