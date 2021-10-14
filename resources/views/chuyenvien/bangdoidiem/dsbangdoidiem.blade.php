@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
	<div class="content">
		<br>
		<a href="/chuyenvien/formthembangdoidiem" class="btn btn-primary" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px;">Thêm sản phẩm</a>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên quà</th>
				<th>Số điểm đổi</th>
				<th></th>
			</thead>
			
				<?php
					foreach ($dsbangdoidiem as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->tenqua;?></td>
							<td><?php echo $value->sodiemdoi;?></td>
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
			var a=confirm("Bạn có muốn xóa sản phẩm đổi này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/xoabangdoidiem?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection