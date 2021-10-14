@extends('boss.mainboss')

@section('contentboss')
	<div class="content">
		<h2>Danh sách khách hàng</h2>
		<br>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên</th>
				<th>Phone</th>
				<th>Địa chỉ</th>
				<th>Ngày sinh</th>
				<th>Điểm tích lũy</th>
				<th>Cấp tài khoản</th>
			</thead>
			
				<?php
					foreach ($dskhachhang as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->name;?></td>
							<td><?php echo $value->phone;?></td>
							<td><?php echo $value->address;?></td>
							<?php $sn=date('d-m-Y', strtotime($value->birthday));?>
							<td><?php echo $sn;?></td>
							<td><?php echo $value->point;?></td>
							<td><?php echo $value->rank;?></td>
						</tr>
						<?php
					}
				?>
		</table>
	</div>
@endsection