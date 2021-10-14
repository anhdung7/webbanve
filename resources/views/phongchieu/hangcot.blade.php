<?php
	if($soday < 3) 
	{ 
		?>	
			<div class="row">
				<div class="col-md-2">
					<b> <?php 
						if($soday==1) echo "Dãy giữa";
						else echo "Mỗi dãy";
					?>
					</b>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					Số hàng:
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" required="required" name="sohang">
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
					Số cột (ghế trên 1 hàng):
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" required="required" name="socot">
				</div>
			</div>
		<?php
	}
	else
	{
		?>
			<!-- day ngoai -->
			<div class="row">
				<div class="col-md-2">
					<b>Dãy ngoài</b>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					Số hàng:
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" required="required" name="sohangngoai">
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
					Số cột (ghế trên 1 hàng):
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" required="required" name="socotngoai">
				</div>
			</div>

			<!-- day giua -->
			<div class="row">
				<div class="col-md-2">
					<b>Dãy giữa</b>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					Số hàng:
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" required="required" name="sohanggiua">
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
					Số cột (ghế trên 1 hàng):
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" required="required" name="socotgiua">
				</div>
			</div>
		<?php
	}
?>

			<hr>