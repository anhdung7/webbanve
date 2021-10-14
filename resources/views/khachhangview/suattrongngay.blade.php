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