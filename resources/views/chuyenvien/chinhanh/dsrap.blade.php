@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
	<div class="content">
		<h2>Danh sách các rạp</h2>
		<br>
		<a href="/chuyenvien/formthemrap" class="btn btn-primary" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px;">Thêm rạp</a>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên rạp</th>
				<th>Địa chỉ</th>
				<th>Thuộc quận</th>
				<th></th>
			</thead>
			
				<?php
					foreach ($dsrap as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->tenrap;?></td>
							<td><?php echo $value->diachi;?></td>
							<td><?php echo "Quận ".$dsquan[$value->idquan]['tenquan']." - ".$dsquan[$value->idquan]['tentp'];?></td>
							<td>
								<button class="btn btn-danger" id="<?php echo $value->id;?>" name="xoa" onclick="xoa(this.id)">Xóa</button>
							</td>
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
			var a=confirm("Bạn có muốn xóa rạp này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/xoarap?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection