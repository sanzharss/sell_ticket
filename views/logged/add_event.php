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
				<input type="hidden" value="add_event" name = "act">
    <label><span class="text-form">Name of the event:</span><input type="text" name = "event_name"></label>
    <label>
        <div class="text-form">Information about this event:</div>
        <textarea name = "event_info"></textarea>
    </label>
    <label>
        <span class="text-form fleft">Type of the event:</span>
        <select name = "event_type">
	
            <option value="Concert">Concert</option>
            <option value="Theathre">Theathre</option>
            <option value="Movie">Movie</option>
            <option value="For children">For children</option>
            <option value="Sport">Sport</option>
            <option value="Other">Other</option>
			
	
        </select>
    </label>
    <label><span class="text-form">Reference to image:</span><input type="text" name = "event_img"></label>
	
						
    <button class="btn" type = "submit" form = "form1"><span></span>Add</button>
</form>
				</div>
			</div>

		</div>
		
		
		</div>
</section>	