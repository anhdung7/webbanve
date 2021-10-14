@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form thêm phim</b>
	</div>
	<br> <br>
	<hr/>
	<form action="/chuyenvien/themphim" method="POST" id="formthem" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-2">
				Tên phim:
			</div>
			<div class="col-md-6">
				<input type="text" name="tenphim" class="form-control" placeholder="Nhập tên phim" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Nội dung:
			</div>
			<div class="col-md-6">
				<textarea name="noidung" id="" cols="30" rows="5" class="form-control">
				</textarea>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Link trailer phim:
			</div>
			<div class="col-md-6">
				<input type="text" name="linktrailer" class="form-control" placeholder="Link trailer" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Thời gian chiếu:
			</div>
			<div class="col-md-6">
				<input type="number" name="thoigianchieu" class="form-control" placeholder="Nhập thời gian chiếu theo phút" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Hình ảnh:
			</div>
			<div class="col-md-6">
				<input type="file" name="hinhanh" class="form-control" required="true">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Tình trạng:
			</div>
			<div class="col-md-6">
				<select name="tinhtrang" id="tinhtrang" class="form-control">
					<option value="1" selected="selected">Chiếu ngay</option>
					<option value="2">Sắp chiếu</option>
				</select>
			</div>
		</div>

		<div>
			<div class="row">
				<div class="col-md-6">Thể loại:</div>
			</div>
		<?php 
			$tong=count($theloaiphim);
			$dem=0;
			echo "<div class='row'>";
			foreach ($theloaiphim as $key => $value)
			{
				if($dem<=$tong)
				{
					if($dem%3==0)
					{
						echo "</div>";
						echo "<div class='row'>";
						?>
						<div class="col-md-3">
							<input type="checkbox" name="check<?php echo $value->id;?>" value="true">	<?php echo $value->tentheloai;?>
						</div>
						<?php
						$i=1;
						$dem++;
					}
					else
					{
						?>
						<div class="col-md-3">
							<input type="checkbox" name="check<?php echo $value->id;?>">	<?php echo $value->tentheloai;?>
						</div>
						<?php
						$i++;
						$dem++;
					}
				}
				else
				{
					echo "</div>";
					break;
				}
			}?>
		</div>

		<hr>

		<div class="row">
			<div class="col-md-5">
				<input type="submit" value="Thêm" class="btn btn-success" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">
			</div>
			<div class="col-md-5">
				<div style="height: 45px;"><a href="/chuyenvien/qlphim" class="btn btn-primary" style="left: 20%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">Trở về</a></div>
			</div>
		</div>
	</form>
</div>
@endsection