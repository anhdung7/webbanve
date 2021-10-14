@extends('boss.mainboss')

@section('contentboss')
<div class="content">
	<br>
	<div>
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-3"><b style="font-size: 30px;">Thông tin cá nhân</b></div>
			<div class="col-md-2">
				<a href="/boss/formsuathongtin" class="btn btn-primary">Sửa thông tin</a>
			</div>
			<div class="col-md-2">
				<a href="/boss/formsuamatkhau" class="btn btn-primary">Sửa mật khẩu</a>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Tên:</div>
			<div class="col-md-6"><?php echo $bossinfo[0]->name;?></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">Điện thoại:</div>
			<div class="col-md-6"><?php echo $bossinfo[0]->phone;?></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2">E-mail:</div>
			<div class="col-md-6"><?php echo $bossinfo[0]->email;?></div>
		</div>
	</div>
</div>
@endsection