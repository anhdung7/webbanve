@extends('admin.mainadmin')

@section('contentadmin')
<div class="content">
	<div style="height: 60px;left: 45%; position: absolute; padding-left: 20px; font-size: 40px;">
			<b>Form thêm phòng chiếu</b>
	</div>
	<br> <br>
	<hr/>
	<form action="/admin/themphong" method="POST" id="formthem">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-2">
				<b>Số phòng:</b>
			</div>
			<div class="col-md-6">
				<input type="number" class="form-control" required="required" name="sophong">
			</div>
		</div><hr>

		<div class="row">
			<div class="col-md-2">
				<b>Bố trí ghế:</b>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				Số dãy (1-3):
			</div>
			<div class="col-md-6">
				<select name="soday" id="soday" class="form-control">
		            <option value="1" selected="selected">1</option>
		            <option value="2">2</option>
		            <option value="3">3</option>
	          </select>
			</div>
		</div>

		<div class="row">
			<div class="col-md-5">(Dãy ghế xếp từ trái sang phải)</div>
		</div>

		<div id="hangcot">
			<div class="row">
				<div class="col-md-2">
					<b>Dãy giữa</b>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					Số hàng:
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" required="required" name="sohang">
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
					Số cột (ghế trên 1 hàng):
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" required="required" name="socot">
				</div>
			</div><hr>
		</div>

		<div class="row">
			<div class="col-md-2">
				<b>Ghế đôi:</b>
			</div>
			<div class="col-md-6">
				<select name="ghedoi" id="ghedoi" class="form-control">
		            <option value="N" selected="selected">Không</option>
		            <option value="Y">Có</option>
	          </select>
			</div>
		</div>

		<div id="nhapghedoi">
		</div>
		<hr>

		<div class="row">
			<div class="col-md-5">
				<input type="submit" value="Thêm" class="btn btn-success" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">
			</div>
			<div class="col-md-5">
				<div style="height: 45px;"><a href="/admin/dsphong" class="btn btn-primary" style="left: 20%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">Trở về</a></div>
			</div>
		</div>
	</form>
</div>
<br>
<hr>
<div style="width: 500px;">
	<h2>Bảng quy đổi số hàng sang kí tự</h2>
	<table class="table">
		<th>Số hàng</th>
		<th>Kí tự chữ</th>
		<tr>
			<td>1</td>
			<td>A</td>
		</tr>
		<tr>
			<td>2</td>
			<td>B</td>
		</tr>
		<tr>
			<td>3</td>
			<td>C</td>
		</tr>
		<tr>
			<td>4</td>
			<td>D</td>
		</tr>
		<tr>
			<td>5</td>
			<td>E</td>
		</tr>
		<tr>
			<td>6</td>
			<td>F</td>
		</tr>
		<tr>
			<td>7</td>
			<td>G</td>
		</tr>
		<tr>
			<td>8</td>
			<td>H</td>
		</tr>
		<tr>
			<td>9</td>
			<td>I</td>
		</tr>
		<tr>
			<td>10</td>
			<td>K</td>
		</tr>
		<tr>
			<td>Ghế đôi</td>
			<td>L</td>
		</tr>
	</table>
</div>

<script src="./js/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function(){
        $("#soday").change(function(){
        	var ghedoi=document.getElementById('ghedoi');
            var soday = $("#soday").val();
            var url="/hangcot?soday="+soday;
            $.get(url, function(data){  $("#hangcot").html(data);  } );
            ghedoi.options[0].selected=true; 
            ghedoicheck()
        });
    });

	$(document).ready(function(){
        $("#ghedoi").change(function(){
         	ghedoicheck()  
        });
    });
    function ghedoicheck()
    {
    	var check = $("#ghedoi").val();
            var soday = $("#soday").val();
            var url="/ghedoi?check="+check+"&soday="+soday;
            $.get(url, function(data){  $("#nhapghedoi").html(data); } );
    };
</script>
@endsection