@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form thêm sản phẩm đổi điểm</b>
	</div>
	<br> <br>
	<hr/>
	<form action="/chuyenvien/thembangdoidiem" method="POST" id="formthem" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-2">
				Tên sản phẩm:
			</div>
			<div class="col-md-6">
				<input type="text" name="tenqua" class="form-control" placeholder="Nhập tên sản phẩm" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Số điểm đổi:
			</div>
			<div class="col-md-6">
				<input type="number" name="sodiemdoi" class="form-control" placeholder="Nhập số điểm" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-5">
				<input type="submit" value="Thêm" class="btn btn-success" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">
			</div>
			<div class="col-md-5">
				<div style="height: 45px;"><a href="/chuyenvien/dsbangdoidiem" class="btn btn-primary" style="left: 20%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">Trở về</a></div>
			</div>
		</div>
	</form>
</div>
@endsection