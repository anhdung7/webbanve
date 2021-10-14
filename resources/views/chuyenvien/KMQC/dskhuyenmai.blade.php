@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
	<div class="content">
		<br>
		<div class="row">
			<div class="col-md-5"><h2>Danh sách cac khuyến mãi</h2></div>
			<div class="col-md-5">
				<a href="/chuyenvien/formthemkhuyenmai" class="btn btn-primary">Thêm khuyến mãi</a>
			</div>
		</div>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên chương trình</th>
				<th>Thời gian bắt đầu</th>
				<th>Thời gian kết thúc</th>
				<th>Thể loại</th>
				<th>Id tác động</th>
				<th></th>
			</thead>
			
				<?php
					foreach ($dskhuyenmai as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->tenchuongtrinh;?></td>
							<td><?php echo $value->tgbatdau;?></td>
							<td><?php echo $value->tgketthuc;?></td>
							<?php 
								if($value->theloai==1)
									$theloai="Sản phẩm";
								else if($value->theloai==2)
									$theloai="Phim";
								else if($value->theloai==0)
									$theloai="Không có";
							?>
							<td><?php echo $theloai;?></td>
							<td><?php echo $value->idtacdong;?></td>
							<td>
								<?php
									if($value->id!=0)
									{
								?>
								<button class="btn btn-success" id="<?php echo $value->id;?>" name="sua" onclick="sua(this.id)">Sửa</button>
								<button class="btn btn-danger" id="<?php echo $value->id;?>" name="sua" onclick="xoa(this.id)">Xóa</button>
							<?php }?>
							</td>
						</tr>
						<?php
					}
				?>
		</table>
	</div>

<script src="./js/jquery-3.6.0.min.js"></script>
<script>
	function sua(id)
	{
			var a=confirm("Bạn có muốn sửa khuyến mãi này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/formsuakhuyenmai?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
	function xoa(id)
	{
			var a=confirm("Bạn có muốn xóa khuyến mãi này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/xoakhuyenmai?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection