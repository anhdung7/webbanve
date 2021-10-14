@extends('boss.mainboss')

@section('contentboss')
	<div class="content">
		<br>
		<h2>Danh sách các thành phố và các quận</h2>
		<br>
		<br>
		<hr>
		<div class="row">
			<div class="col-md-2"><b style="font-size: 20px;"> ID</b></div>
			<div class="col-md-4"><b style="font-size: 20px;"> Tên thành phố</b></div>
			<div class="col-md-4"><b style="font-size: 20px;"> Tác vụ</b></div>
		</div>
		<hr>
		<?php
			foreach ($dstp as $key => $value) {
				?>
				<div class="row">
					<div class="col-md-2"><?php echo $value->id;?></div>
					<div class="col-md-4"><?php echo $value->tenthanhpho;?></div>
					<div class="col-md-4">
						<button class="btn btn-primary" id="<?php echo $value->id;?>" name="xemquan" onclick="xemquan(this.id)">Xem các quận</button>
					</div>
				</div>
				<div id="dsquantp<?php echo $value->id;?>">
				</div>
				<hr>
				<?php
			}
		?>
	</div>

<script src="./js/jquery-3.6.0.min.js"></script>
<script>
	function xemquan(id)
	{
		var url="/listquan?id="+id;
		var div="#dsquantp"+id;
        $.get(url, function(data){  $(div).html(data); } );
	};
</script>
@endsection