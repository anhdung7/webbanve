@extends('giaodien')

@section('contentuser')
	<div id="cachtrang"></div>
	<div id="noidungtrang">
		<div class="">
			<br>
			<h2 style="font-size: 45px;">Danh sách các rạp</h2>
			<?php
			foreach ($dstp as $keytp => $valuetp) 
			{
				?>
			<div class="row">
				<div class="col-md-3">
					<div style="font-size: 30px; color: purple;"><?php echo $valuetp->tenthanhpho;?></div>
				</div>
			</div>
				<?php
				foreach ($dsquan as $keyquan => $valuequan) 
				{
					if($valuequan->idthanhpho==$valuetp->id)
					{
						foreach ($dsrap as $key => $value) 
						{
							if($value->idquan==$valuequan->id)
							{
								?>
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-3">
										<div style="font-size: 25px; color: #2196f3;">
										<?php echo "Quận (huyện) ".$valuequan->tenquan;?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-3">
										<div style="font-size: 20px; ">
										<?php echo "Rạp ".$value->tenrap;?>
										</div>	
									</div>
									<div class="col-md-4">
										<div style="font-size: 20px; ">
										<?php echo "Địa chỉ: ".$value->diachi;?>
										</div>
									</div>
								</div>
								<?php
							}
						}
					}
				}
			}
			?>
		</div>	
				<br> <br> <br>
	</div>

@endsection