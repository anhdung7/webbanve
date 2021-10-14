@extends('giaodien')
  
@section('contentuser')
<link rel="stylesheet" href="./css/phong.css">
<div id="cachtrang"></div>
<div class="content">
  <form action="/datve" method="POST" id="formthem">
    {{ csrf_field() }}
    <div class="<?php echo $manhinh?>">
      <div id="<?php echo $manhinh?>">Màn hình chiếu</div>
    </div>
    <div class="bodyphong2day">
      <?php 
        $tachloai=explode(",",$phong->loaiphong);
        $tachhang=explode("-",$tachloai[1]);
        $sopx=$tachhang[0]*100+20;
        $witdh=$sopx."px";
      ?>
        <!-- day1 -->
      <ul class="dayngoailon" style="width: <?php echo $witdh;?>;">
        <?php
        foreach ($day1 as $key => $value) {
          if(isset($dsve[$value]) && $dsve[$value]!=3)
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
              <input type="checkbox" name="<?php echo $value;?>">
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
      <ul class="dayngoailon" style="width: <?php echo $witdh;?>;">
        <?php
        foreach ($day2 as $key => $value) {
          if(isset($dsve[$value]) && $dsve[$value]!=3)
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
              <input type="checkbox" name="<?php echo $value;?>">
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
    <input type="hidden" name="idphong" value="<?php echo $phong->id;?>">
    <input type="hidden" name="idsuat" value="<?php echo $idsuat;?>">
    <div class="nutdatve">
      <input type="submit" value="Đặt vé" class="btn btn-success" style="margin-left: 900px;">
    </div>
  </form>
</div>
@endsection



