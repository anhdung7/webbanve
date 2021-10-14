@extends('boss.mainboss')

@section('contentboss')
	<div class="content">
		<h2>Lịch sử các suất chiếu</h2>
		<br>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID suất chiếu</th>
				<th>Admin</th>
				<th>Tình trạng</th>
				<th>Thời gian tác vụ</th>
			</thead>
			
				<?php
					foreach ($lssuatchieu as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->idsuatchieu;?></td>
							<td><?php echo $dsadmin[$value->idadmin];?></td>
							<?php 
								if($value->tinhtrang==1) $tinhtrang="Thêm";
								else $tinhtrang="Xóa";
							?>
							<td><?php echo $tinhtrang;?></td>
							<td><?php echo $value->created_at;?></td>
						</tr>
						<?php
					}
				?>
		</table>
	</div>
@endsection