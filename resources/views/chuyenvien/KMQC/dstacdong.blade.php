<?php
if($id==1) //ds san pham
{
	?>
		<select name="idtacdong" id="idtacdong" class="form-control">
			<option value="0" selected="selected" disabled="disabled">Chọn sản phẩm</option>
	<?php
	foreach ($dstacdong as $key => $value) {
		?>
		<option value="<?php echo $value->id;?>"><?php echo $value->tensp;?></option>
		<?php
	}
	?>
		</select>
	<?php
}
else //ds phim
{
	?>
		<select name="idtacdong" id="idtacdong" class="form-control">
			<option value="0" selected="selected" disabled="disabled">Chọn phim</option>
	<?php
	foreach ($dstacdong as $key => $value) {
		?>
		<option value="<?php echo $value->id;?>"><?php echo $value->tenphim;?></option>
		<?php
	}
	?>
		</select>
	<?php
}
?>

<script>
    $(document).ready(function(){
        $("#idtacdong").change(function(){
            var id = $("#idtacdong").val();
            var url="/chuyenvien/laygiagoc?id="+id+"&theloai="+<?php echo $id;?>;
            $.get(url, function(data){  $("#giagoc").html(data); } );
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#tinhgia").click(function(){
            var phantram = $("#phantramkm").val();
            var id = $("#idtacdong").val();
            var url="/chuyenvien/laygiasaukm?idsp="+id+"&phantram="+phantram+"&theloai="+<?php echo $id;?>;
            $.get(url, function(data){  $("#giasaukm").html(data); } );
        });
    });
</script>