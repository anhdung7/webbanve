@extends('nhanvien.mainnhanvien')

@section('contentnhanvien')
<div class="content">
	<br>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6"><h2>Danh sách các vé in</h2></div>
	</div>
	<hr>
	<?php
		foreach ($dsvein as $key => $value) {
			?>
			<div class="vephim">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-2">Ghế:</div>
					<div class="col-md-2"><?php echo $value->vtghe;?></div>
				</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-2">Giá:</div>
					<div class="col-md-2"><?php echo $value->giave;?></div>
				</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-2">ID suất chiếu:</div>
					<div class="col-md-2"><?php echo $value->idsuatchieu;?></div>
				</div>

			</div>
			<hr>
			<?php
		}
	?>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6"><h2>Danh sách các đồ ăn nước uống</h2></div>
	</div>
	<hr>
	<?php
		foreach ($dsfood as $key => $value) {
			?>
			<div class="vephim">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-2">Tên sản phẩm:</div>
					<div class="col-md-2"><?php echo $value['tensp'];?></div>
				</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-2">Giá:</div>
					<div class="col-md-2"><?php echo $value['gia'];?></div>
				</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-2">Số lượng:</div>
					<div class="col-md-2"><?php echo $value['soluong'];?></div>
				</div>

			</div>
			<hr>
			<?php
		}
	?>
</div>
<script src="./js/jquery-3.6.0.min.js"></script>
<script>
	function xemtt(id)
	{
			var a=confirm("Bạn có muốn in hóa đơn này không?");
			
			if(a==true)
			{
				var link='/nhanvien/xemtt?idhoadon='+id;
				window.open(link,'_self', 1);
			}
	}
</script>
@endsection