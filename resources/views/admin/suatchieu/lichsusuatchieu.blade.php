@extends('admin.mainadmin')

@section('contentadmin')
<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Danh sách lịch sử suất chiếu</b>
	</div>
	<br> <br> <br>
	<table class="table" border="0">
			<thead>
				<th>ID suất</th>
				<th>Tác vụ</th>
				<th>Thời gian tác vụ</th>
			</thead>
			<tbody>
				<?php
					foreach ($dslichsu as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->idsuatchieu;?></td>
							<?php 
								if($value->tinhtrang == 1)
									$tinhtrang="Thêm";
								else
									$tinhtrang="Xóa";
							?>
							<td><?php echo $tinhtrang;?></td>
							<td><?php echo $value->created_at;?></td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
</div>
@endsection