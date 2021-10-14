@extends('admin.mainadmin')

@section('contentadmin')
	<div class="content">
		<h2>Danh sách người dùng</h2>
		<br>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên</th>
				<th>Phone</th>
				<th>E-mail</th>
				<th>Ngày sinh</th>
				<th></th>
			</thead>
			
				<?php
					foreach ($dsnguoidung as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->name;?></td>
							<td><?php echo $value->phone;?></td>
							<td><?php echo $value->email;?></td>
							<?php $sn=date('d-m-Y', strtotime($value->birthday));?>
							<td><?php echo $sn;?></td>
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
			var a=confirm("Bạn có muốn xóa nhân viên này không?");
			
			if(a==true)
			{
				var linkxoa='/admin/xoanhanvien?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection