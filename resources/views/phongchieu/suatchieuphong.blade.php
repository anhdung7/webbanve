<select name="idsuat" id="dssuat" class="form-control">
	<option value="no" selected="selected" disabled="disabled">Chọn suất</option>
	<?php
		foreach ($dssuat as $key => $value) {
			// code...
			?>
				<option value="<?php echo $value->id;?>"><?php echo $value->giochieu;?></option>
			<?php
		}
	?>
</select>
<script>
    $(document).ready(function(){
        $("#dssuat").change(function(){
            var id = $("#dssuat").val();
            var url2="/phongtenphim?id="+id;
            $.get(url2, function(data2){  $("#tenphim").html(data2); } );
        });
    });
</script>
