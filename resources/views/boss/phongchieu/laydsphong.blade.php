<select name="idphong" id="dsphong" class="form-control">
            <option value="" selected="selected" disabled="disabled">Chọn phòng</option>
            <?php
            foreach ($dsphong as $key => $value) {
              ?>
              <option value="<?php echo $value->id;?>"><?php echo $value->sophong;?></option>
              <?php
            }
            ?>
</select>

<script>
    $(document).ready(function(){
        $("#dsphong").change(function(){
            var idphong = $("#dsphong").val();
            var url="/boss/suatthuocphong?idphong="+idphong;
            $.get(url, function(data){  $("#cbosuat").html(data); } );
        });
    });
</script>