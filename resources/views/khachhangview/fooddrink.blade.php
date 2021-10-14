@extends('giaodien')

@section('contentuser')
	<div id="cachtrang"></div>
	<div id="noidungtrang">
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8"><h2>Danh sách các sản phẩm ăn uống tại rạp</h2></div>
		</div>
		<form action="/themfooddrink" method="post">
			{{ csrf_field() }}
		<!-- ds san pham -->
		<br>
		<div style="background-color: #2196f3; border-radius: 15px;">
			<br>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3"><b style="font-size: 15px;">Tên sản phẩm</b></div>
			<div class="col-md-3"><b style="font-size: 15px;">Giá</b></div>
			<div class="col-md-3"><b style="font-size: 15px;">Số lượng</b></div>
		</div>
		<hr>
		<?php
			$stt=1;
			$tong=0;
			// if(!isset($_SESSION['giohang']))
			// 	$_SESSION['giohang']=array();
			$dscthoadon=$_SESSION['giohang'];
			foreach ($dsfood as $key => $value) {
					?>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3"><?php echo $value->tensp;?></div>
			<div class="col-md-3"><?php echo $value->gia;?></div>
			<div class="col-md-3">
				<input type="number" class="form-control" name="soluong<?php echo $value->id;?>" value="0">
			</div>
		</div>
		<hr>
					<?php
					$stt++;
				}
		?>
		</div>
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-5">
				<input type="submit" value="Thêm" class="btn btn-success">
			</div>
		</div>
		</form>
	</div>
@endsection