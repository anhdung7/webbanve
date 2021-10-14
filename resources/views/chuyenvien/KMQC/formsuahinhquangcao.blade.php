@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form sửa đồ ăn nước uống tại rạp</b>
	</div>
	<br> <br>
	<hr/>
	<form action="/chuyenvien/suahinhquangcao" method="POST" id="formthem" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="<?php echo $hinhquangcao[0]->id;?>">
		<div class="row">
			<div class="col-md-2">
				Vị trí:
			</div>
			<div class="col-md-6">
				<input type="number" name="vitri" class="form-control" placeholder="Nhập tên sản phẩm" required="required" value="<?php echo $hinhquangcao[0]->vitri;?>">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				File hình:
			</div>
			<div class="col-md-6">
				<input type="file" name="filehinh" class="form-control" placeholder="Nhập đơn vị tính" >
			</div>
		</div>


		<div class="row">
			<div class="col-md-5">
				<input type="submit" value="Sửa" class="btn btn-success" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">
			</div>
			<div class="col-md-5">
				<div style="height: 45px;"><a href="/chuyenvien/dshinhquangcao	" class="btn btn-primary" style="left: 20%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">Trở về</a></div>
			</div>
		</div>
	</form>
</div>
@endsection