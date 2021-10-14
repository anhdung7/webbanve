@extends('nhanvien.mainnhanvien')

@section('contentnhanvien')
<div class="content">
	<br>
	<form action="/nhanvien/timhoadonsdt">
	<div class="row">
		<div class="col-md-6"><h2>Danh sách các hóa đơn chưa duyệt</h2></div>
		<div class="col-md-1">Số điện thoại:</div>
		<div class="col-md-2">
			<input type="text" name="sdt" class="form-control" placeholder="Nhập số điện thoại">
		</div>
		<div class="col-md-2"><input type="submit" value="Tìm" class="btn btn-primary"></div>
	</div>
	</form>
	<br>
	<br>
	<table class="table" border="0">
			<thead>
				<th>ID</th>
				<th>Số điện thoại</th>
				<th>Thành tiền</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					foreach ($dshoadon as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->phone;?></td>
							<td><?php echo $value->thanhtien;?></td>
							<td><button class="btn btn-primary" id="<?php echo $value->id;?>" name="xoa" onclick="kiemduyet(this.id)">Kiểm duyệt</button></td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
</div>
<script src="./js/jquery-3.6.0.min.js"></script>
<script>
	function kiemduyet(id)
	{
			var a=confirm("Bạn có muốn kiệm duyệt hóa đơn này không?");
			
			if(a==true)
			{
				var link='/nhanvien/formkiemduyet?idhoadon='+id;
				window.open(link,'_self', 1);
			}
	}
</script>
@endsection