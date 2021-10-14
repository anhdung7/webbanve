@extends('nhanvien.mainnhanvien')

@section('contentnhanvien')
<div class="content">
	<br>
	<div class="row">
		<div class="col-md-5"></div>
		<div class="col-md-5">
	<h2>Kiểm duyệt hóa đơn</h2></div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-2">ID hóa đơn:</div>
		<div class="col-md-5"><?php echo $hoadon[0]->id;?></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-2">Tên khách hàng:</div>
		<div class="col-md-5"><?php echo $khach[0]->name;?></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-2">Số điện thoại:</div>
		<div class="col-md-5"><?php echo $hoadon[0]->phone;?></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-2">Điểm thưởng:</div>
		<div class="col-md-5"><?php echo $khach[0]->point;?></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-2">Tổng tiền:</div>
		<div class="col-md-5"><?php echo $hoadon[0]->thanhtien;?></div>
	</div>
	<hr>
	<form action="/nhanvien/kiemduyethoadon" method="post">
		{{ csrf_field() }}
		<input type="hidden" value="<?php echo $hoadon[0]->id;?>" name="idhoadon">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">
				<b>Tác vụ:</b>
			</div>
			<div class="col-md-2">
				<select name="tinhtrang" class="form-control">
					<option value="2" selected="selected">Duyệt</option>
					<option value="3">Hủy</option>
				</select>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-5">
				<input type="submit" value="Đồng ý" class="btn btn-primary">
			</div>
		</div>
	</form>
</div>
@endsection