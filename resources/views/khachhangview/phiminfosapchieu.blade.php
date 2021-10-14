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
				<div class="col-md-5">
					<div>
						<h3>Suất chiếu đặc biệt</h3>
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
								$ngaychieu=substr($value['giochieu'], 8,2)."-".substr($value['giochieu'], 5,2);
								?>
								<a href="/suat?idsuat=<?php echo $key;?>&idphim=<?php echo $phim[0]->id;?>"class="button-suat"><?php echo $ngaychieu." ".$giochieu;?></a>
								<?php
								unset($dssuat[$key]);
							}
						}
					}
					?>
		</div>
		<br> <br> <br>
	</div>
@endsection