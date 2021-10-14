@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
	<div class="content">
		<br>
		<a href="/chuyenvien/formthemphim" class="btn btn-primary" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px;">Thêm phim</a>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên phim</th>
				<th>Thể loại</th>
				<th>Hình</th>
				<th>Tình trạng</th>
				<th></th>
			</thead>
			
				<?php
					foreach ($dsphim as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->tenphim;?></td>
							<td><?php echo $value->theloai;?></td>
							<td><?php if($value->hinh!="") echo "Có"; else echo "Không";?></td>
							<td><?php if($value->tinhtrang=="1") echo "Đang chiếu"; else echo "Sắp chiếu";?></td>
							<td>
								<button class="btn btn-primary" id="<?php echo $value->id;?>" name="sua" onclick="sua(this.id)">Sửa</button>
								<button class="btn btn-danger" id="<?php echo $value->id;?>" name="xoa" onclick="xoa(this.id)">Xóa</button>
							</td>
						</tr>
						<?php
					}
				?>
		</table>
	</div>

<script src="./js/jquery-3.6.0.min.js"></script>
<script>
	function xoa(id)
	{
			var a=confirm("Bạn có muốn xóa phim này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/xoaphim?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}

	function sua(id)
	{
			var b=confirm("Bạn có muốn sửa phim này không?");
			
			if(b==true)
			{
				var linksua='/chuyenvien/formsuaphim?id='+id;
				window.open(linksua,'_self', 1);
			}
	}
</script>
@endsection