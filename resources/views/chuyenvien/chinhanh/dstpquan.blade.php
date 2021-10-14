@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
	<div class="content">
		<h2>Danh sách các thành phố và các quận</h2>
		<br>
		<a href="/chuyenvien/formthemthanhpho" class="btn btn-primary" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px;">Thêm thành phố</a>
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
						<button class="btn btn-danger" id="<?php echo $value->id;?>" name="xoa" onclick="xoatp(this.id)">Xóa</button>
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
	function xoatp(id)
	{
			var a=confirm("Bạn có muốn xóa thành phố này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/xoathanhpho?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	};
	function xemquan(id)
	{
		var url="/chuyenvien/listquan?id="+id;
		var div="#dsquantp"+id;
        $.get(url, function(data){  $(div).html(data); } );
	};
</script>
@endsection