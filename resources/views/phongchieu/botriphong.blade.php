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
        <div style="left: 35%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px; font-size: 30px"> <b>Danh sách phòng của rạp</b></div>
      </div>
    </div>
  <div style="padding-top: 120px">
    <form action="/xuliphong" method="get">
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
        <div class="col-md-5"></div>
        <div class="col-md-5">
          <input type="submit" value="Đồng ý" style="margin-top: 15px;" class="btn btn-success">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection



