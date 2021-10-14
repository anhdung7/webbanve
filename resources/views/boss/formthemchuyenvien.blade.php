@extends('boss.mainboss')

@section('contentboss')
<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form thêm chuyên viên hệ thống</b>
	</div>
	<br> <br>
	<hr/>
	<form action="/boss/themchuyenvien" method="POST" id="formthem">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-2">
				Họ tên:
			</div>
			<div class="col-md-6">
				<input type="text" name="name" class="form-control" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Ngày sinh:
			</div>
			<div class="col-md-6">
				<input type="date" name="birthday" class="form-control" placeholder="Nhập thời gian chiếu theo phút" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Điện thoại:
			</div>
			<div class="col-md-6">
				<input type="number" name="phone" class="form-control" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Địa chỉ:
			</div>
			<div class="col-md-6">
				<input type="text" name="address" class="form-control" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Tài khoản:
			</div>
			<div class="col-md-6">
				<input type="text" name="username" class="form-control" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Mật khẩu:
			</div>
			<div class="col-md-6">
				<input type="text" name="password" class="form-control" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-5">
				<input type="submit" value="Thêm" class="btn btn-success" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">
			</div>
		</div>
	</form>
</div>
@endsection