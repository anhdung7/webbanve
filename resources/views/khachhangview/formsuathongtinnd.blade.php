@extends('giaodien')

@section('contentuser')
	<div id="cachtrang"></div>
	<div id="noidungtrang">
	<div style="background-color: red;">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6">Form sửa thông tin người dùng</div>
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
		<form action="/suathongtin" method="post">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">Tên:</div>
				<div class="col-md-6"><input type="text" name="name" class="form-control" value="<?php echo $user[0]->name;?>" required="required"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">Điện thoại:</div>
				<div class="col-md-6"><input type="text" name="phone" class="form-control" value="<?php echo $user[0]->phone;?>" required="required"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">Ngày sinh:</div>
				<?php
					$date = $user[0]->birthday;
					$birthday = date("Y-m-d", strtotime($date));
				?>
				<div class="col-md-6"><input type="date" name="birthday" class="form-control" value="<?php echo $birthday;?>" required="required"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">Địa chỉ:</div>
				<div class="col-md-6"><input type="text" name="address" class="form-control" value="<?php echo $user[0]->address;?>" required="required"></div>
			</div>
			<div class="row">
				<div class="col-md-5"></div>
				<div class="col-md-6"><input type="submit" value="Sửa thông tin" class="btn btn-success"></div>
			</div>
		</form>
	</div>
	</div>
@endsection