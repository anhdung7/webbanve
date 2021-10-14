@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
<div class="content">
	<br>
	<div>
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-3"><b style="font-size: 30px;">Thông tin cá nhân</b></div>
			<div class="col-md-2">
				<a href="/chuyenvien/formsuathongtin" class="btn btn-primary">Sửa thông tin</a>
			</div>
			<div class="col-md-2">
				<a href="/chuyenvien/formsuamatkhau" class="btn btn-primary">Sửa mật khẩu</a>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Tên:</div>
			<div class="col-md-6"><?php echo $chuyenvieninfo[0]->name;?></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Sinh nhật:</div>
			<?php
				$date = $chuyenvieninfo[0]->birthday;
				$birthday = date('d/m/Y', strtotime($date));
			?>
			<div class="col-md-6"><?php echo $birthday;?></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Điện thoại:</div>
			<div class="col-md-6"><?php echo $chuyenvieninfo[0]->phone;?></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Địa chỉ:</div>
			<div class="col-md-6"><?php echo $chuyenvieninfo[0]->address;?></div>
		</div>
	</div>
</div>
@endsection