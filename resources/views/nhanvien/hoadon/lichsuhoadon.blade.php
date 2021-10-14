@extends('nhanvien.mainnhanvien')

@section('contentnhanvien')
<div class="content">
	<br>
	<div class="row">
		<div class="col-md-6"><h2>Danh sách các hóa đơn đã kiểm duyệt</h2></div>
	</div>
	<br>
	<br>
	<table class="table" border="0">
			<thead>
				<th>ID</th>
				<th>ID hóa đơn</th>
				<th>Tác vụ</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					foreach ($dslichsuhoadon as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->idhoadon;?></td>
							<?php if($value->tacvu==1) $tacvu="Thêm"; else $tacvu="Xóa";?>
							<td><?php echo $tacvu;?></td>
							<td><button class="btn btn-primary" id="<?php echo $value->id;?>" name="thongtin" onclick="xemtt(this.id)">Xem thông tin</button></td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
</div>
<script src="./js/jquery-3.6.0.min.js"></script>
<script>
	function xemtt(id)
	{
			var a=confirm("Bạn có muốn xem thông tin hóa đơn này không?");
			
			if(a==true)
			{
				var link='/nhanvien/xemtt?idhoadon='+id;
				window.open(link,'_self', 1);
			}
	}
</script>
@endsection