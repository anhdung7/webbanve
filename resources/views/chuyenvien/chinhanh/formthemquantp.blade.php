<form action="/chuyenvien/themquantp" method="post">
	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-2">Tên quận:</div>
		<div class="col-md-7"><input type="text" class="form-control" name="tenquan"></div>
		<input type="hidden" name="idtp" value="<?php echo $idtp;?>">
		<div class="col-md-2"><input type="submit" value="Thêm" class="btn btn-success"></div>
	</div>
</form>