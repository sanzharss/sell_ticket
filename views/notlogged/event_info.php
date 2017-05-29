<script language="javascript" type="text/javascript">
$(function() {
    $("#rating_star").codexworld_rating_widget({
        starLength: '5',
        initialValue: '',
        callbackFunctionName: 'processRating',
        imageDirectory: 'images/',
        inputAttr: 'postID'
    });
});

function processRating(val, attrVal){
    $.ajax({
        type: 'POST',
        url: 'rating.php',
        data: 'postID='+attrVal+'&ratingPoints='+val,
        dataType: 'json',
        success : function(data) {
            if (data.status == 'ok') {
                alert('You have rated '+val+' to CodexWorld');
                $('#avgrat').text(data.average_rating);
                $('#totalrat').text(data.rating_number);
            }else{
                alert('Some problem occured, please try again.');
            }
        }
    });
}
</script>
<style type="text/css">
    .overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
</style>

<section class="padsection4">
		<div class="container_24">

			<div class="wrapper">
				<div class="grid_16">
						<?php
$event_id=$_GET['event_id'];	
$squery = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM post_rating WHERE post_id = ".$event_id." AND status = 1";
$result = $connection->query($squery);
$ratingRow = $result->fetch_assoc();
	
	$query = $connection->query("SELECT distinct e.*,day(w.event_date) day, monthname(w.event_date) month, w.price FROM event e join event_place w on e.event_id = w.event_id where e.event_id = ".$event_id." ORDER BY w.event_date DESC");
	
	
	while($row=$query->fetch_object()){

?>
					<h2 class="padtitle"><?php echo $row->event_name; ?></h2>
					<div class="wrapper">
						<img src="<?php echo $row->event_img; ?>" alt="" height="200" width="300" class="imgindent4">
						<p class="color1"><?php echo $row->event_name; ?></p>
						<p>Event date: <?php echo $row->day; ?> <?php echo $row->month; ?></p>
						<p>Price <?php echo $row->price; ?></p>
					</div>
					<div><?php echo $row->event_info; ?></div>
					
					<p class="padbot2"></p>
					 <input name="rating" value="0" id="rating_star" type="hidden" postID="<?php echo $event_id ;?>" />
    <div class="overall-rating">(Average Rating <span id="avgrat"><?php echo $ratingRow['average_rating']; ?></span>
Based on <span id="totalrat"><?php echo $ratingRow['rating_number']; ?></span>  rating)</span></div>
					<?php 
                		if($USER_DATA!=null){
                	?>
					<dl class="description-box">
					<dt><a class="description-dark">Add comment<span></span></a></dt>
					<dd>
						<div class="inner">
                        <form id="form1" action = "?" method = "post">		
		<input type="hidden" value="<?php echo $event_id ;?>" name ="imageID">
						<input type="hidden" value="add_comment" name = "act">
   <label>
        <div class="text-form">Comment:</div>
        <textarea name = "text">Add here your comment</textarea>
    </label>
    <button class="btn comment2 inf" type = "submit" form = "form1"><span></span>Comment</button>
</form>
						</div>
					</dd>
				</dl>
				<?php
						}else{
						?>
						<dl class="description-box">
					<dt><a class="description-dark">Add comment<span></span></a></dt>
					<dd>
						<div class="inner">
						You cannot add comment, please sign up
						</div>
					</dd>
				</dl>
				<?php
						}
			$sqlquery = $connection->query("
				SELECT b.*, u.full_name AS name 
				FROM comments b
				JOIN users u ON b.uid = u.id
				WHERE b.eid = ".$event_id." and b.active=1
			");
			while($row1 = $sqlquery->fetch_object()){ 
			?>
				<div class="grid_8">
				<div class="quotes_2">
					<blockquote><?php echo $row1->text; ?></blockquote>
					<span></span>
				</div>
				<div class="quotes-links"><a><?php echo $row1->name; ?></a><br></div>
			</div>
			<?php } ?>
			<?php } ?>
				</div>
				<div class="grid_8">
				<dl class="description-box">
					<dt><a class="btn success style_4">Buy ticket</a><br> <br></dt>
					<dd>
						<div class="inner">
    You cannot buy tickets, please sign up or sign in 
					
						</div>
					</dd>
				</dl>
				</div>
			</div>
			
		</div>
	</section>	
		