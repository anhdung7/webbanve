@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
<div class="content">
	<br>
	<a href="/chuyenvien/formthemtheloai" class="btn btn-primary" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px;">Thêm thể loại</a>
	<br>
	<br>
	<table class="table" border="0">
			<thead>
				<th>ID</th>
				<th>Tên thể loại</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					foreach ($theloaiphim as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->tentheloai;?></td>
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
			var a=confirm("Bạn có muốn xóa thể loại này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/xoatheloai?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection