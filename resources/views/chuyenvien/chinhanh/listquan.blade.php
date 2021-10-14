<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-4"><b style="font-size: 18px;">Danh sách các quận </b></div>
</div>
<hr>
<?php
	foreach ($dsquan as $key => $value) {
		?>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-4"><?php echo "Quận ".$value->tenquan;?></div>
			<div class="col-md-4">
				<div class="btn btn-danger" id="<?php echo $value->id;?>" onclick="xoaquan(this.id)">Xóa quận</div></div>
		</div>
		<hr>
		<?php
	}
?>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-3">
		<div class="btn btn-danger" id="<?php echo $idtp;?>" onclick="dong(this.id)">Đóng danh sách quận</div>
	</div>
	<div class="col-md-7" id="themquantp<?php echo $idtp;?>">
		<div class="btn btn-success" id="<?php echo $idtp;?>" onclick="formthem(this.id)">Thêm quận</div>
	</div>
</div>
<script>
	function dong(id)
	{
		var div="#dsquantp"+id;
		$(div).html("");
	};
	function formthem(id)
	{
		var url="/chuyenvien/formthemquantp?id="+id;
		var div="#themquantp"+id;
        $.get(url, function(data){  $(div).html(data); } );
	};
	function xoaquan(id)
	{
			var a=confirm("Bạn có muốn xóa quận này không?");
			
			if(a==true)
			{
				var linkxoa='/chuyenvien/xoaquan?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	};
</script>