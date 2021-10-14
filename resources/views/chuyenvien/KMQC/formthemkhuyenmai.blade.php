@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form thêm khuyến mãi</b>
	</div>
	<br> <br>
	<hr/>
	<form action="/chuyenvien/themkhuyenmai" method="POST" id="formthem">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-2">
				Tên chương trình:
			</div>
			<div class="col-md-6">
				<input type="text" name="tenchuongtrinh" class="form-control" placeholder="Nhập tên sản phẩm" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Nội dung:
			</div>
			<div class="col-md-6">
				<textarea name="noidung" class="form-control" rows="10">
					
				</textarea>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Thời gian bắt đầu:
			</div>
			<div class="col-md-6">
				<input type="date" name="tgbatdau" class="form-control" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Thời gian kết thúc:
			</div>
			<div class="col-md-6">
				<input type="date" name="tgketthuc" class="form-control" required="required">
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Thể loại:
			</div>
			<div class="col-md-6">
				<select name="theloai" id="theloai" class="form-control">
					<option value="0" selected="selected" disabled="disabled">Chọn thể loại</option>
					<option value="1">Sản phẩm</option>
					<option value="2">Phim</option>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Mã muốn khuyến mãi:
			</div>
			<div class="col-md-3" id="dstacdong">
				Chọn thể loại để ra danh sách cụ thể
			</div>
			<div class="col-md-2">
				Giá gốc:
			</div>
			<div class="col-md-2"id="giagoc">
				Chọn sản phẩm để hiện giá 
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Phần trăm khuyến mãi:
			</div>
			<div class="col-md-3">
				<input type="number" name="phantramkm" class="form-control" id="phantramkm" required="required" value="0">
			</div>
			<div class="col-md-2">
				Giá sau khuyến mãi:
			</div>
			<div class="col-md-2">
				<div id="giasaukm">Chọn sản phẩm trước khi tính giá</div>
				<div class="btn btn-primary" id="tinhgia">Tính giá</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-5">
				<input type="submit" value="Thêm" class="btn btn-success" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">
			</div>
			<div class="col-md-5">
				<div style="height: 45px;"><a href="/chuyenvien/dskhuyenmai" class="btn btn-primary" style="left: 20%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">Trở về</a></div>
			</div>
		</div>
	</form>
</div>

<script src="./js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $("#theloai").change(function(){
            var id = $("#theloai").val();
            var url="/chuyenvien/laymatacdong?id="+id;
            $.get(url, function(data){  $("#dstacdong").html(data); } );
        });
    });
</script>
@endsection