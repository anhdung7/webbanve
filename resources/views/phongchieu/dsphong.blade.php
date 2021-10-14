@extends('admin.mainadmin')

@section('contentadmin')
<div class="content">
	<br>
	<h2>Danh sách các phòng chiếu rạp <?php echo $tenrap;?></h2>
	<a href="/admin/formthemphong" class="btn btn-primary" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px;">Thêm phòng chiếu</a>
	<br>
	<br>
	<table class="table" border="0">
			<thead>
				<th>ID</th>
				<th>Số phòng</th>
				<th>Loại phòng</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					foreach ($dsphong as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->sophong;?></td>
							<td><?php echo $value->loaiphong;?></td>
							<td>
								<button class="btn btn-danger" id="<?php echo $value->id;?>" name="xoa" onclick="xoa(this.id)">Xóa</button>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
</div>
<script src="./js/jquery-3.6.0.min.js"></script>
<script>
	function xoa(id)
	{
			var a=confirm("Bạn có muốn xóa phòng này không?");
			
			if(a==true)
			{
				var linkxoa='/admin/xoaphong?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection