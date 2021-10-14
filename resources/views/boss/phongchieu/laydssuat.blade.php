<select name="idsuat" id="dssuat" class="form-control">
            <option value="" selected="selected" disabled="disabled">Chọn rạp</option>
            <?php
            foreach ($dssuat as $key => $value) {
              ?>
              <option value="<?php echo $value->id;?>"><?php echo $value->giochieu;?></option>
              <?php
            }
            ?>
</select>

<script>
    $(document).ready(function(){
        $("#dssuat").change(function(){
            var idsuat = $("#dssuat").val();
            var url="/boss/phimthuocsuat?idsuat="+idsuat;
            $.get(url, function(data){  $("#tenphim").html(data); } );
        });
    });
</script>