@extends('boss.mainboss')

@section('contentboss')
<div class="content">
  <div class="row">
      <div class="col-md-12">
        <div style="left: 35%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px; font-size: 30px"> <b>Danh sách phòng theo suất</b></div>
      </div>
    </div>
  <div style="padding-top: 120px">
    <form action="/xuliphongtheosuat" method="get">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2"><b style="font-size: 20px">Rạp :</b></div>
        <div class="col-md-2">
          <select name="idrap" id="dsrap" class="form-control">
            <option value="" selected="selected" disabled="disabled">Chọn rạp</option>
            <?php
            foreach ($dsrap as $key => $value) {
              ?>
              <option value="<?php echo $value->id;?>"><?php echo $value->tenrap;?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </div>
      <hr>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2"><b style="font-size: 20px">Phòng :</b></div>
        <div class="col-md-2" id="cbophong">
          Chọn rạp để hiển thị danh sách phòng
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2"><b style="font-size: 20px;">Suất chiếu:</b></div>
        <div class="col-md-2" id="cbosuat">Chọn phòng để hiển thị danh sách suất</div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2"><b style="font-size: 20px;">Phim chiếu:</b></div>
        <div class="col-md-2" id="tenphim">Chọn suất chiếu để hiển thị phim sẽ chiếu</div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-5">
          <input type="submit" value="Đồng ý" style="margin-top: 15px;" class="btn btn-success">
        </div>
      </div>
    </form>
  </div>
</div>

<script src="./js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $("#dsrap").change(function(){
            var idrap = $("#dsrap").val();
            var url="/boss/phongthuocrap?idrap="+idrap;
            $.get(url, function(data){  $("#cbophong").html(data); } );
        });
    });
</script>
@endsection



