@extends('admin.mainadmin')
  
@section('contentadmin')
<link rel="stylesheet" href="./css/phong.css">
<div class="content">
  <div class="row">
      <div class="col-md-5">
        <div style="left: 70%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px; font-size: 30px"> <b>Phòng <?php echo $phong->sophong;?></b></div>
      </div>
      <div class="col-md-5">
        <div style="height: 45px;"><a href="/phongtheosuat" class="btn btn-primary" style="left: 60%; position: absolute;padding-left: 20px; padding-right: 20px; margin-top: 15px;">Trở về</a></div>
      </div>
    </div>
  <hr/>
  <form action="#" method="POST" id="formthem">
    {{ csrf_field() }}
    <div class="<?php echo $manhinh;?>">
      <div id="<?php echo $manhinh;?>">Màn hình chiếu</div>
    </div>
    <div class="bodyphong3day">
      <?php 
        $tachloai=explode(",",$phong->loaiphong);
        $tachhang=explode("-",$tachloai[1]);
        $sopx=$tachhang[0]*100+20;
        $witdh=$sopx."px";
        $sopxgiua=$tachhang[1]*100+20;
        $witdhgiua=$sopxgiua."px";
      ?>
        <!-- day1 -->
      <ul class="dayngoailon" style="width: <?php echo $witdh;?>;">
        <?php
        foreach ($day1 as $key => $value) {
          if(isset($dsve[$value]))
            {
              if($dsve[$value]==1)
              {
          ?>
          <li>
            <label>
              <input type="checkbox" name="<?php echo $value;?>" disabled="disabled" >
              <div class="vedat">
                <i style="font-size: 20px;"><?php echo $value;?></i>
              </div>
            </label>
          </li>
          <?php
              }
              else
              {
          ?>
          <li>
            <label>
              <input type="checkbox" name="<?php echo $value;?>" disabled="disabled" >
              <div class="vemua">
                <i style="font-size: 20px;"><?php echo $value;?></i>
              </div>
            </label>
          </li>
          <?php
              }
            }

            //ko phai la ve da dat hay mua
            else
            {
          ?>
          <li>
            <label>
              <input type="checkbox" name="<?php echo $value;?>" disabled="disabled">
              <div class="icon-box">
                <i style="font-size: 20px;"><?php echo $value;?></i>
              </div>
            </label>
          </li>
          <?php
            }
        }
        ?>
      </ul>
      <!-- day2 -->
      <ul style="width: <?php echo $witdhgiua;?>;">
        <?php
        foreach ($day2 as $key => $value) {
            if(isset($dsve[$value]))
            {
              if($dsve[$value]==1)
              {
          ?>
          <li>
            <label>
              <input type="checkbox" name="<?php echo $value;?>" disabled="disabled" >
              <div class="vedat">
                <i style="font-size: 20px;"><?php echo $value;?></i>
              </div>
            </label>
          </li>
          <?php
              }
              else
              {
          ?>
          <li>
            <label>
              <input type="checkbox" name="<?php echo $value;?>" disabled="disabled" >
              <div class="vemua">
                <i style="font-size: 20px;"><?php echo $value;?></i>
              </div>
            </label>
          </li>
          <?php
              }
            }

            //ko phai la ve da dat hay mua
            else
            {
          ?>
          <li>
            <label>
              <input type="checkbox" name="<?php echo $value;?>" disabled="disabled">
              <div class="icon-box">
                <i style="font-size: 20px;"><?php echo $value;?></i>
              </div>
            </label>
          </li>
          <?php
            }
        }
        ?>
      </ul> 
     <!--  day3 -->
      <ul class="dayngoailon" style="width: <?php echo $witdh;?>;">
        <?php
        foreach ($day3 as $key => $value) {
          if(isset($dsve[$value]))
            {
              if($dsve[$value]==1)
              {
          ?>
          <li>
            <label>
              <input type="checkbox" name="<?php echo $value;?>" disabled="disabled" >
              <div class="vedat">
                <i style="font-size: 20px;"><?php echo $value;?></i>
              </div>
            </label>
          </li>
          <?php
              }
              else
              {
          ?>
          <li>
            <label>
              <input type="checkbox" name="<?php echo $value;?>" disabled="disabled" >
              <div class="vemua">
                <i style="font-size: 20px;"><?php echo $value;?></i>
              </div>
            </label>
          </li>
          <?php
              }
            }

            //ko phai la ve da dat hay mua
            else
            {
          ?>
          <li>
            <label>
              <input type="checkbox" name="<?php echo $value;?>" disabled="disabled">
              <div class="icon-box">
                <i style="font-size: 20px;"><?php echo $value;?></i>
              </div>
            </label>
          </li>
          <?php
            }
        }
        ?>
      </ul> 
    </div>
    
  </form>
</div>
@endsection



