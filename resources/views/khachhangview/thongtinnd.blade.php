@extends('giaodien')

@section('contentuser')
	<div id="cachtrang"></div>
	<div id="noidungtrang">
		<br>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4"><h2>Thông tin người dùng</h2></div>
			<div class="col-md-2">
				<a href="/formsuathongtin" class="btn btn-primary">Sửa thông tin</a>
			</div>
			<div class="col-md-2">
				<a href="/formsuamatkhau" class="btn btn-primary">Sửa mật khẩu</a>
			</div>
		</div>
		<hr>
	<div style="background-color: #2196f3; border-radius: 15px;">
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Tên:</div>
			<div class="col-md-6"><?php echo $user[0]->name;?></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">E-mail:</div>
			<div class="col-md-6"><?php echo $user[0]->email;?></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Điện thoại:</div>
			<div class="col-md-6"><?php echo $user[0]->phone;?></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Địa chỉ:</div>
			<div class="col-md-6"><?php echo $user[0]->address;?></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Sinh nhật:</div>
			<?php
				$date = $user[0]->birthday;
				$birthday = date('d/m/Y', strtotime($date));
			?>
			<div class="col-md-6"><?php echo $birthday;?></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Số điểm thưởng:</div>
			<div class="col-md-6"><?php echo $user[0]->point;?></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Cấp tài khoản:</div>
			<div class="col-md-6"><?php echo $user[0]->rank;?></div>
		</div>
		<br>
	</div>
	</div>
@endsection