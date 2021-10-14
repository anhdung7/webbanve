@extends('admin.mainadmin')
  
@section('contentadmin')
<?php
  if(isset($_SESSION['admin']))
  {
      $ttadmin=DB::select('select * from admins where username= ?', [$_SESSION['admin']]);
  }
?>
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
        <div class="col-md-2"><b style="font-size: 20px">Phòng :</b></div>
        <div class="col-md-2">
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
        $("#dsphong").change(function(){
            var id = $("#dsphong").val();
            var url="/suatchieuphong?id="+id;
            $.get(url, function(data){  $("#cbosuat").html(data); } );
        });
    });
</script>
@endsection



