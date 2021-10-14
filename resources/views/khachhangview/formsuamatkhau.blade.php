@extends('giaodien')

@section('contentuser')
	<div id="cachtrang"></div>
	<div id="noidungtrang">
	<div style="background-color: red;">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6">Form sửa mật khẩu người dùng</div>
			<div class="col-md-4">
				<a href="/thongtin" class="btn btn-primary">Trở về</a>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6">Nhập thông tin xong nhấn nút sửa</div>
		</div>
		<hr>
		<form action="/suamatkhau" method="post">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">Mật khẩu cũ:</div>
				<div class="col-md-6"><input type="password" name="oldpassword" class="form-control" placeholder="Nhập mật khẩu cũ" required="required"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">Mật khẩu mới:</div>
				<div class="col-md-6"><input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới" required="required"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">Nhập lại mật khẩu mới:</div>
				<div class="col-md-6"><input type="password" name="checkpassword" class="form-control" placeholder="Nhập mật khẩu mới" required="required"></div>
			</div>
			<div class="row">
				<div class="col-md-5"></div>
				<div class="col-md-6"><input type="submit" value="Sửa thông tin" class="btn btn-success"></div>
			</div>
		</form>
	</div>
	</div>
@endsection