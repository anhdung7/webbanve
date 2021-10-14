@extends('chuyenvien.mainchuyenvien')

@section('contentchuyenvien')
	<div class="content">
		<br>
		<h2>Danh sách hình quảng cáo trang chính</h2> 	
		<br>
		<br>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên hình</th>
				<th>Vị trí</th>
				<th></th>
			</thead>
			
				<?php
					foreach ($dshinh as $key => $value) {
						?>
						<tr>
							<td><?php echo $value->id;?></td>
							<td><?php echo $value->tenhinh;?></td>
							<td><?php echo $value->vitri;?></td>
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
			var a=confirm("Bạn có muốn sửa hình này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/formsuahinhquangcao?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection