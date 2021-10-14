@extends('giaodien')

@section('contentuser')
	<div id="cachtrang"></div>
	<div id="noidungtrang">
		<br>
	<div >
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-3"><h2>Lịch sử đổi điểm</h2></div>
		</div>
		<hr>
		<div class="row" style="font-size: 15px;">
			<div class="col-md-2"></div>
			<div class="col-md-2">Số điểm hiện có:</div>
			<div class="col-md-6"><?php echo $user[0]->point." điểm";?></div>
		</div>
		<br>
		<table class="table" style="background-color: #2196f3; border-radius: 15px;" border="0">
			<thead>
				<th>Tên sản phẩm</th>
				<th>Mã hóa đơn</th>
				<th>Số lượng đổi</th>
				<th>Số điểm đổi</th>
				<th>Thời gian đổi</th>
			</thead>
			<tbody>
				<?php
					foreach ($dsdoidiem as $key => $value) {
						?>
						<tr>
							<td><?php echo $dssanpham[$value->idsanpham];?></td>
							<td><?php echo $value->idhoadon;?></td>
							<td><?php echo $value->soluong;?></td>
							<td><?php echo $value->sodiemdoi;?></td>
							<td><?php echo $value->created_at;?></td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
	</div>
@endsection