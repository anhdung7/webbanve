@extends('boss.mainboss')

@section('contentboss')
	<div class="content">
		<br>
		<h2>Danh sách các rạp</h2>
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
							<td></td>
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
				var linkxoa='/boss/xoarap?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection