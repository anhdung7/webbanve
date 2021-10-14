@extends('admin.mainadmin')

@section('contentadmin')
<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form thêm suất chiếu</b>
	</div>
	<br> <br>
	<hr/>
	<form action="/admin/themsuatchieu" method="POST" id="formthem">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-2">
				Phim chiếu:
			</div>
			<div class="col-md-6">
				<select name="idphim" id="" class="form-control">
					<option value="no" selected="selected" disabled="disabled">Chọn phim</option>
					<?php
						foreach ($dsphim as $key => $value) {
							?><option value="<?php echo $value->id;?>"><?php echo $value->tenphim;?></option><?php
						}
					?>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Phòng chiếu:
			</div>
			<div class="col-md-6">
				<select name="idphong" id="" class="form-control">
					<option value="no" selected="selected" disabled="disabled">Chọn phòng</option>
					<?php
						foreach ($dsphong as $key => $value) {
							?><option value="<?php echo $value->id;?>"><?php echo $value->sophong;?></option><?php
						}
					?>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Suất đặc biệt:
			</div>
			<div class="col-md-6">
				<select name="suatdacbiet" id="suatdacbiet" class="form-control">
					<option value="0" selected="selected">Không</option>
					<option value="1">Có</option>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Giờ chiếu (ngày giờ):
			</div>
			<div class="col-md-6">
				<input type="datetime-local" name="giochieu" class="form-control" placeholder="Nhập thời gian chiếu theo phút" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Số ngày chiếu (tính từ ngày trong giờ chiếu):
			</div>
			<div class="col-md-6">
				<input type="number" name="songaychieult" class="form-control" value="1" required="required">
			</div>
		</div>
		<hr>

		<div class="row">
			<div class="col-md-5">
				<input type="submit" value="Thêm" class="btn btn-success" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">
			</div>
			<div class="col-md-5">
				<div style="height: 45px;"><a href="/dssuatchieu" class="btn btn-primary" style="left: 20%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">Trở về</a></div>
			</div>
		</div>
	</form>
</div>
@endsection