@extends('boss.mainboss')

@section('contentboss')
<div class="content">
	<br>
	<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6"><b style="font-size: 30px;">Form sửa thông tin cá nhân</b></div>
			<div class="col-md-4">
				<a href="/boss/thongtin" class="btn btn-primary">Trở về</a>
			</div>
		</div>
		<hr>
		<form action="/boss/suathongtin" method="post">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">Tên:</div>
				<div class="col-md-6"><input type="text" name="name" class="form-control" value="<?php echo $bossinfo[0]->name;?>" required="required"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">Điện thoại:</div>
				<div class="col-md-6"><input type="text" name="phone" class="form-control" value="<?php echo $bossinfo[0]->phone;?>" required="required"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">E-mail:</div>
				<div class="col-md-6"><input type="email" name="email" class="form-control" value="<?php echo $bossinfo[0]->email;?>" required="required"></div>
			</div>
			<div class="row">
				<div class="col-md-5"></div>
				<div class="col-md-6"><input type="submit" value="Sửa thông tin" class="btn btn-success"></div>
			</div>
		</form>
</div>
@endsection