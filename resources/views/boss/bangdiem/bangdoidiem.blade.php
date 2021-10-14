@extends('boss.mainboss')

@section('contentboss')
	<div class="content">
		<h2>Danh sách các sản phẩm đổi điểm tại rạp</h2>
		<br>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th>Số điểm đổi</th>
			</thead>
			
				<?php
					foreach ($bangdoidiem as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->tenqua;?></td>
							<td><?php echo $value->sodiemdoi;?></td>
						</tr>
						<?php
					}
				?>
		</table>
	</div>
@endsection