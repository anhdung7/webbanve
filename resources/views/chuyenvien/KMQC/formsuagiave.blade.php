@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form sửa đồ ăn nước uống tại rạp</b>
	</div>
	<br> <br>
	<hr/>
	<form action="/chuyenvien/suagiave" method="POST" id="formthem" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="<?php echo $giave[0]->id;?>">
		<div class="row">
			<div class="col-md-2">
				Tên loại vé:
			</div>
			<div class="col-md-6">
				<input type="text" name="tenloai" class="form-control" disabled="disabled" value="<?php echo $giave[0]->tenloai;?>">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Giá:
			</div>
			<div class="col-md-6">
				<input type="number" name="gia" class="form-control" value="<?php echo $giave[0]->gia;?>" required="required">
			</div>
		</div>


		<div class="row">
			<div class="col-md-5">
				<input type="submit" value="Sửa" class="btn btn-success" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">
			</div>
			<div class="col-md-5">
				<div style="height: 45px;"><a href="/chuyenvien/dsgiave" class="btn btn-primary" style="left: 20%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">Trở về</a></div>
			</div>
		</div>
	</form>
</div>
@endsection