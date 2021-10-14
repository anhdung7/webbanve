@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form sửa phim</b>
	</div>
	<br> <br>
	<hr/>
	<form action="/chuyenvien/suaphim" method="POST" id="formthem" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="<?php echo $phimsua[0]->id;?>">
		<div class="row">
			<div class="col-md-2">
				Tên phim:
			</div>
			<div class="col-md-6">
				<input type="text" name="tenphim" class="form-control" placeholder="Nhập tên phim" required="required" value="<?php echo $phimsua[0]->tenphim;?>">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Nội dung:
			</div>
			<div class="col-md-6">
				<textarea name="noidung" id="" cols="30" rows="5" class="form-control">
					<?php echo $phimsua[0]->noidung;?>
				</textarea>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Link trailer phim:
			</div>
			<div class="col-md-6">
				<input type="text" name="linktrailer" class="form-control" placeholder="Link trailer" required="required" value="<?php echo $phimsua[0]->linktrailer;?>">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Thời gian chiếu:
			</div>
			<div class="col-md-6">
				<input type="number" name="thoigianchieu" class="form-control" placeholder="Nhập thời gian chiếu theo phút" required="required" value="<?php echo $phimsua[0]->thoigianchieu;?>">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Tình trạng:
			</div>
			<div class="col-md-6">
				<select name="tinhtrang" id="tinhtrang" class="form-control">
					<?php 
					if($phimsua[0]->tinhtrang==1)
					{
						?>
					<option value="1" selected="selected">Chiếu ngay</option>
					<option value="2">Sắp chiếu</option>
						<?php
					}
					else
					{
						?>
					<option value="1">Chiếu ngay</option>
					<option value="2" selected="selected">Sắp chiếu</option>
						<?php
					}
					?>
				</select>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-md-5">
				<input type="submit" value="Sửa" class="btn btn-success" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">
			</div>
			<div class="col-md-5">
				<div style="height: 45px;"><a href="/chuyenvien/qlphim" class="btn btn-primary" style="left: 20%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">Trở về</a></div>
			</div>
		</div>
	</form>
</div>
@endsection