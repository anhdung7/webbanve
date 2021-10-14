@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
	<div class="content">
		<br>
		<h2>Danh sách các loại giá vé</h2> 	
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên loại</th>
				<th>Giá</th>
				<th></th>
			</thead>
			
				<?php
					foreach ($dsgiave as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->tenloai;?></td>
							<td><?php echo $value->gia;?></td>
							<td>
								<button class="btn btn-success" id="<?php echo $value->id;?>" name="sua" onclick="sua(this.id)">Sửa</button>
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
			var a=confirm("Bạn có muốn giá loại này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/formsuagiave?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection