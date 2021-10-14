@extends('boss.mainboss')

@section('contentboss')
	<div class="content">
		<h2>Danh sách các suất chiếu</h2>
		<br>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>ID phim</th>
				<th>Tên phim</th>
				<th>Giờ chiếu</th>
				<th>Phòng chiếu</th>
				<th>Rạp</th>
			</thead>
			
				<?php
					foreach ($dssuatchieu as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->idphim;?></td>
							<td><?php echo $dsphim[$value->idphim];?></td>
							<td><?php echo $value->giochieu;?></td>
							<td><?php echo $dsphong[$value->idphong];?></td>
							<td><?php echo $dsrap[$value->idrap];?></td>
						</tr>
						<?php
					}
				?>
		</table>
	</div>
@endsection