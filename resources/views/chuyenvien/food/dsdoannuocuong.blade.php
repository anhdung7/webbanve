@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
	<div class="content">
		<br>
		<h2>Danh sách đồ ăn nước uống bán tại rạp</h2>
		<a href="/chuyenvien/formthemdoannuocuong" class="btn btn-primary" style="left: 50%; position: absolute;padding-left: 20px; padding-right: 20px;">Thêm sản phẩm</a>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th>Đơn vị tính</th>
				<th>Giá</th>
				<th></th>
			</thead>
			
				<?php
					foreach ($dsfood as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->tensp;?></td>
							<td><?php echo $value->donvitinh;?></td>
							<td><?php echo $value->gia;?></td>
							<td>
								<button class="btn btn-success" id="<?php echo $value->id;?>" name="sua" onclick="sua(this.id)">Sửa</button>
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
			var a=confirm("Bạn có muốn xóa sản phẩm này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/xoadoannuocuong?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
	function sua(id)
	{
			var a=confirm("Bạn có muốn sửa sản phẩm này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/formsuadoannuocuong?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection