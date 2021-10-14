@extends('nhanvien.mainnhanvien')

@section('contentnhanvien')
<div class="content">
	<br>
	<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6"><b style="font-size: 30px;">Form sửa mật khẩu</b></div>
			<div class="col-md-4">
				<a href="/nhanvien/thongtin" class="btn btn-primary">Trở về</a>
			</div>
		</div>
		<hr>
		<form action="/nhanvien/suamatkhau" method="post">
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
@endsection