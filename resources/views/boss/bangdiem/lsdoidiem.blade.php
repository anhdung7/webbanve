@extends('boss.mainboss')

@section('contentboss')
	<div class="content">
		<h2>Danh sách các sản phẩm đổi điểm tại rạp</h2>
		<br>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID người dùng</th>
				<th>Tên người dùng</th>
				<th>ID sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Điểm sản phẩm</th>
				<th>Số lượng</th>
			</thead>
			
				<?php
					foreach ($lsdoidiem as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->idnguoidung;?></td>
							<td><?php echo $dsnguoidung[$value->idnguoidung];?></td>
							<td><?php echo $value->idsanpham;?></td>
							<td><?php echo $bangdoidiem[$value->idsanpham]->tenqua;?></td>
							<td><?php echo $bangdoidiem[$value->idsanpham]->diem;?></td>
							<td><?php echo $value->soluong;?></td>
						</tr>
						<?php
					}
				?>
		</table>
	</div>
@endsection