@extends('giaodien')

@section('contentuser')
<!-- Shell -->
<div id="shell">
	<!-- Header -->
	<div id="header">
		<br> <br> <br> <br> <br>
		<!-- <h1 id="logo"><a href="#">Movie Hunter</a></h1> -->
		
		
		<!-- Navigation -->
		<!-- <div id="navigation">
			<ul>
			    <li><a class="active" href="#">HOME</a></li>
			    <li><a href="#">NEWS</a></li>
			    <li><a href="#">IN THEATERS</a></li>
			    <li><a href="#">COMING SOON</a></li>
			    <li><a href="#">CONTACT</a></li>
			    <li><a href="#">ADVERTISE</a></li>
			</ul>
		</div> -->
		<!-- end Navigation -->
		
		<!-- Sub-menu -->
		<div id="sub-navigation">
			<div id="search">
				<form action="/timphim" method="get" accept-charset="utf-8">
					<label for="search-field">TÌM KIẾM PHIM</label>					
					<input type="text" name="tenphimtim" placeholder="Nhập tên phim" id="search-field" title="Enter search here" class="blink search-field" value="<?php echo $tenphimtim;?>"   />
					<input type="submit" value="TÌM" class="button-search" />
				</form>
			</div>
		</div>
		<!-- end Sub-Menu -->
		
	</div>
	<!-- end Header -->
	
	<!-- Main -->
	<div id="main">
		<!-- Content -->
		<div id="content">

			<!-- Box -->
			<div class="box">
				<div class="head">
					<h2>DANH SÁCH TÌM KIẾM</h2>
					<p class="text-right">&nbsp;</p>
				</div>

				<!-- Movie -->
				<?php
					foreach ($dsphim as $key => $value) {
						if($value->tinhtrang==1)
						{
						?>
				<div class="movie">
					
					<div class="movie-image">
						<span class="play"><span class="name"><?php echo $value->tenphim;?></span></span>
						<a href="/phim?idphim=<?php echo $value->id;?>"><img src="./hinhphim/<?php echo $value->hinh;?>" alt="movie" /></a>
					</div>
					<div class="moviename">
						<p style="font-size: 15px"><a href="/phim?idphim=<?php echo $value->id;?>"><?php echo $value->tenphim;?></a></p> <br>
					</div>	
					<div class="rating">
						
						<p>RATING</p>
						<div class="stars">
							<div class="stars-in">
								
							</div>
						</div>
						<span class="comments">12</span>
					</div>
				</div>
						<?php
						}
					}
				?>
				<!-- end Movie -->

				<div class="cl">&nbsp;</div>
			</div>
			<!-- end Box -->
			
		</div>
		<!-- end Content -->
		<div class="cl">&nbsp;</div>
	</div>
	<!-- end Main -->
	<br> <br> <br> <br> <br> <br> <br> <br> <br>
</div>
<!-- end Shell -->
@endsection