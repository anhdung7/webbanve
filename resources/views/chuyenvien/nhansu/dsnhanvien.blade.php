@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
	<div class="content">
		<h2>Danh sách nhân viên</h2>
		<br>
		<a href="/chuyenvien/formthemnv" class="btn btn-primary" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px;">Thêm nhân viên</a>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên</th>
				<th>Phone</th>
				<th>Địa chỉ</th>
				<th>Ngày sinh</th>
				<th>Rạp</th>
				<th></th>
			</thead>
			
				<?php
					foreach ($dsnhanvien as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->name;?></td>
							<td><?php echo $value->phone;?></td>
							<td><?php echo $value->address;?></td>
							<?php $sn=date('d-m-Y', strtotime($value->birthday));?>
							<td><?php echo $sn;?></td>
							<td><?php echo $value->idrap;?></td>
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
				var linkxoa='/chuyenvien/xoanhanvien?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection