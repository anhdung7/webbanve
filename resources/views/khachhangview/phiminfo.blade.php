@extends('giaodien')

@section('contentuser')
	<div id="cachtrang"></div>
	<div id="noidungtrang">
				
		<div id="hinhanhphim"><img src="./hinhphim/<?php echo $phim[0]->hinh;?>" alt=""></div>
		<div class="thongtinphim">
			<div class="phiminfo">
				<table class="table" style="color:white;">
					<tr>
						<td>Tên phim </td>
						<td><?php echo $phim[0]->tenphim;?></td>
					</tr>
					<tr>
						<td>Thời gian chiếu</td>
						<td><?php echo $phim[0]->thoigianchieu;?> phút</td>
					</tr>
					<tr>
						<td>Thể loại</td>
						<td><?php echo $phim[0]->theloai;?></td>
					</tr>
					<tr>
						<td>Link trailer</td>
						<td><?php echo $phim[0]->linktrailer;?></td>
					</tr>
					<tr>
						<td>Nội dung</td>
						<td>
							<?php echo $phim[0]->noidung;?>
						</td>
					</tr>
				</table>
			</div>
			
		</div>

		<div class="chonngay">
			<br><h2>Các suất chiếu</h2>
			<div class="row">
				<div class="col-md-2">
					<div class="btn" id="btn-today">
						<h3 style="text-decoration: underline; color: purple;">Hôm nay</h3>
					</div>
				</div>
				<h3>||</h3>
				<div class="col-md-2">
					<div class="btn" id="btn-nextday">
						<h3>Ngày mai</h3>
					</div>
				</div>
			</div>
		</div>
		<div id="suatchieu">
					<?php
					foreach ($dsrap as $keyrap => $valuerap) { 
					$flag=0;
						foreach ($dssuat as $key => $value) {
							if($value['idrap']==$keyrap)
							{
								if($flag==0)
								{
									?>
									<div><h2><?php echo $valuerap;?></h2></div>
									<?php
									$flag=1;
								}
								$giochieu=substr($value['giochieu'], 11,5);
								?>
								<a href="/suat?idsuat=<?php echo $key;?>&idphim=<?php echo $phim[0]->id;?>"class="button-suat"><?php echo $giochieu;?></a>
								<?php
								unset($dssuat[$key]);
							}
						}
					}
					?>
		</div>
		<br> <br> <br>
	</div>

<script src="./js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $("#btn-nextday").click(function(){
            var url="/chonngaysuat?ngay=2&idphim=<?php echo $phim[0]->id;?>";
            $.get(url, function(data){  
            	$("#suatchieu").html(data);
            	$("#btn-today").html('<h3>Hôm nay</h3>');
            	$("#btn-nextday").html('<h3 style="text-decoration: underline; color: purple;">Ngày mai</h3>');
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#btn-today").click(function(){
            var url="/chonngaysuat?ngay=1&idphim=<?php echo $phim[0]->id;?>";
            $.get(url, function(data){  
            	$("#suatchieu").html(data);
            	$("#btn-today").html('<h3 style="text-decoration: underline; color: purple;">Hôm nay</h3>');
            	$("#btn-nextday").html('<h3>Ngày mai</h3>'); 
            });
        });
    });
</script>
@endsection