<?php
if($soday==2)
{
		?>	
			<div class="row">
				<div class="col-md-2">
					<b>Mỗi dãy</b>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					Số ghế:
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" required="required" name="soghedoi">
				</div>
			</div>
		<?php
}
else
{
	?>
			<div class="row">
				<div class="col-md-2">
					<b>Dãy giữa</b>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					Số ghế:
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" required="required" name="soghedoi">
				</div>
			</div>
	<?php
}
?>