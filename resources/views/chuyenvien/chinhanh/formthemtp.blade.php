@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
	<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form thêm thành phố vào hệ thống</b>
	</div>
	<br> <br>
	<hr/>
	<form action="/chuyenvien/themthanhpho" method="POST" id="formthem">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-2">
				Tên thành phố:
			</div>
			<div class="col-md-6">
				<input type="text" name="nametp" class="form-control" required="required">
			</div>
		</div>
		<div id="quan">
			<div class="row">
				<div class="col-md-2">
					Số quận muốn thêm:
				</div>
				<div class="col-md-6">
					<input type="number" id="numberquan" name="numberquan" class="form-control" value="0">
				</div>
				<div class="col-md-2">
					<div class="btn btn-primary" id="nutquan">OK</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<input type="submit" value="Thêm" class="btn btn-success" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">
			</div>
		</div>
	</form>
</div>
<script src="./js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $("#nutquan").click(function(){
            var sl = $("#numberquan").val();
            if(sl<1)
            {
            	window.alert("Số lượng phải lớn hơn hoặc bằng 1!");
            }
            else
            {
            var url="/chuyenvien/formlistquan?sl="+sl;
            $.get(url, function(data){  $("#quan").html(data); } );
       		}
        });
    });
</script>
@endsection