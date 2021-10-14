@extends('giaodien')

@section('contentuser')
	<div id="cachtrang"></div>
	<div id="noidungtrang">	
		<form action="/thanhtoan" method="post">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-5"><h2>Thanh toán hóa đơn</h2></div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">Phương thức thanh toán:</div>
				<div class="col-md-5">
					<select name="phuongthuc" id="phuongthuc" class="form-control">
						<option value="1" selected="selected">Tại rạp</option>
						<option value="2">Bằng điểm thưởng</option>
						<option value="3">Bằng thẻ tín dụng</option>
					</select>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">Tổng tiền:</div>
				<div class="col-md-2">
					<?php echo $tongtien;?>
					<input type="hidden" name="thanhtien" value="<?php echo $tongtien;?>">
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-5"></div>
				<div class="col-md-2">
					<input type="submit" class="btn btn-primary" value="Đồng ý">
				</div>
			</div>
		</form>
	</div>

@endsection