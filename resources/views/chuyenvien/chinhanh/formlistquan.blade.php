<?php
	$flag=0;
	for ($i=1; $i <= $sl; $i++) { 
		?>
			<div class="row">
				<div class="col-md-2">Quận thứ <?php echo $i;?>:</div>
				<div class="col-md-6">
					<input type="text" name="quan<?php echo $i;?>" class="form-control" required="required">
				</div>
				<?php
					if($flag==0)
					{
						?>
						<div class="col-md-2"><a href="/chuyenvien/formthemthanhpho" class="btn btn-primary">Nhập lại số quận</a></div>
						<?php
						$flag++;
					}
				?>
			</div>
		<?php
	}
	?>
	<input type="hidden" name="soquan" value="<?php echo $sl;?>">
	<?php
?>