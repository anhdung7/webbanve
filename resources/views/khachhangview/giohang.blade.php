@extends('giaodien')

@section('contentuser')
	<div id="cachtrang"></div>
	<div id="noidungtrang">
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6"><h2>Danh sách các vé và sản phẩm</h2></div>
			<div class="col-md-4">
				<a href="/fooddrink" class="btn btn-primary">Sản phẩm ăn uống</a>
			</div>
		</div>
		<!-- ds giohang -->
		<hr>
		<div style="background-color: #2196f3; border-radius: 15px;">
			<br>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-1"><b style="font-size: 15px;">STT</b></div>
			<div class="col-md-1"><b style="font-size: 15px;">Thể loại</b></div>
			<div class="col-md-5"><b style="font-size: 15px;">Mô tả</b></div>
			<div class="col-md-2"><b style="font-size: 15px;">Giá</b></div>
			<div class="col-md-2"></div>
		</div>
			<hr>
		<?php
			$stt=1;
			$tongtien=0;
			// if(!isset($_SESSION['giohang']))
			// 	$_SESSION['giohang']=array();
			$dscthoadon=$_SESSION['giohang'];
			foreach ($dscthoadon as $key => $value) {
				if($value['theloai']==1)
				{	
					?>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-1"><?php echo $stt;?></div>
			<div class="col-md-1">Vé</div>
			<div class="col-md-5">
				<?php echo "Ghế:".$value['vtghe']." - Giờ chiếu:".$value['tgchieu']." - Tên phim:".$value['tenphim'];?> 
			</div>
			<div class="col-md-2"><?php echo $value['giave'];?></div>
			<?php
				$tongtien+=$value['giave'];
			?>
			<div class="col-md-2">
					<div class="btn btn-danger" id="<?php echo $key;?>" name="xoa" onclick="xoa(this.id)">Xóa</div>
			</div>
		</div>
		<hr>
					<?php
					$stt++;
				}
				else
				{
					?>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-1"><?php echo $stt;?></div>
			<div class="col-md-1">Đồ ăn nước uống</div>
			<div class="col-md-5">
				<?php echo "Tên sản phẩm:".$value['tensp']." - Số lượng:".$value['soluong'];?>
			</div>
			<div class="col-md-2"><?php echo $value['gia'];?></div>
			<?php
				$tongtien+=$value['gia'];
			?>
			<div class="col-md-2">
				<div class="btn btn-danger" id="<?php echo $key;?>" name="xoa" onclick="xoa(this.id)">Xóa</div>
			</div>
		</div>	
		<hr>
					<?php
					$stt++;
				}
			}
		?>
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-3">
				Thành tiền:
			</div>
			<div class="col-md-2"><?php echo $tongtien;?></div>
		</div>	
			<br>
		</div>
			<br>
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-3">
				<a href="/formthanhtoan" class="btn btn-primary">Thanh toán</a>
			</div>
		</div>	
		<hr>
	</div>

<script src="./js/jquery-3.6.0.min.js"></script>
<script>
	function xoa(id)
	{
			var a=confirm("Bạn có muốn xóa sản phẩm này không?");
			
			if(a==true)
			{
				var linkxoa='/xoagiohang?id='+id;
				window.open(linkxoa,'_self', 1);
			}
	}
</script>
@endsection