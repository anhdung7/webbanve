@extends('admin.mainadmin')

@section('contentadmin')
<div class="content">
	<br>
	<a href="/admin/formthemsuatchieu" class="btn btn-primary" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px;">Thêm suất chiếu</a>
	<br>
	<br>
	<table class="table" border="0">
			<thead>
				<th>ID suất</th>
				<th>ID phim</th>
				<th>Giờ chiếu</th>
				<th>ID phòng</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					foreach ($dssuatchieu as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->idphim;?></td>
							<td><?php echo $value->giochieu;?></td>
							<td><?php echo $dsphong[$value->idphong];?></td>
							<td><button class="btn btn-danger" id="<?php echo $value->id;?>" name="xoa" onclick="xoa(this.id)">Xóa</button></td>
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
			var a=confirm("Bạn có muốn xóa suất chiếu này không?");
			
			if(a==true)
			{
				var linkxoa='/admin/xoasuatchieu?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection