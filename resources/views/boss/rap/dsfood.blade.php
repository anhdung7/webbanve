@extends('boss.mainboss')

@section('contentboss')
	<div class="content">
		<h2>Danh sách các sản phẩm dùng tại rạp</h2>
		<br>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
			</thead>
			
				<?php
					foreach ($dsfood as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->tensp;?></td>
							<td><?php echo $value->gia;?></td>
						</tr>
						<?php
					}
				?>
		</table>
	</div>
@endsection