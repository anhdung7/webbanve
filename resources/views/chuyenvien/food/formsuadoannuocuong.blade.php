@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form sửa đồ ăn nước uống tại rạp</b>
	</div>
	<br> <br>
	<hr/>
	<form action="/chuyenvien/suadoannuocuong" method="POST" id="formthem">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="<?php echo $spsua->id;?>">
		<div class="row">
			<div class="col-md-2">
				Tên sản phẩm:
			</div>
			<div class="col-md-6">
				<input type="text" name="tensp" class="form-control" placeholder="Nhập tên sản phẩm" required="required" value="<?php echo $spsua->tensp;?>">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Đơn vị tính:
			</div>
			<div class="col-md-6">
				<input type="text" name="donvitinh" class="form-control" placeholder="Nhập đơn vị tính" required="required" value="<?php echo $spsua->donvitinh;?>">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Giá:
			</div>
			<div class="col-md-6">
				<input type="number" name="gia" class="form-control" placeholder="Nhập giá theo VND" required="required" value="<?php echo $spsua->gia;?>">
			</div>
		</div>


		<div class="row">
			<div class="col-md-5">
				<input type="submit" value="Sửa" class="btn btn-success" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">
			</div>
			<div class="col-md-5">
				<div style="height: 45px;"><a href="/chuyenvien/dsdoannuocuong" class="btn btn-primary" style="left: 20%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">Trở về</a></div>
			</div>
		</div>
	</form>
</div>
@endsection