@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
	<div class="content">
		<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form thêm sản phẩm đổi điểm</b>
		</div>
		<br> <br> <br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>ID người dùng</th>
				<th>ID sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
			</thead>
			
				<?php
					foreach ($dslichsudoidiem as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->idnguoidung;?></td>
							<td><?php echo $value->idsanpham;?></td>
							<td><?php echo $dssanpham[$value->idsanpham];?></td>
							<td><?php echo $value->soluong;?></td>
						</tr>
						<?php
					}
				?>
		</table>
	</div>

<script src="./js/jquery-3.6.0.min.js"></script>
<script>
	function xoa(id)
	{
			var a=confirm("Bạn có muốn xóa sản phẩm đổi này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/xoabangdoidiem?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection