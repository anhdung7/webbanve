<div class="slider">
	<div class="slides">
		<!-- slide nút -->
    	<input type="radio" name="radiohinh" id="radio1">
    	<input type="radio" name="radiohinh" id="radio2">
    	<input type="radio" name="radiohinh" id="radio3">
    	<input type="radio" name="radiohinh" id="radio4">
    	<input type="radio" name="radiohinh" id="radio5">
    	<!-- danh sách hình -->
    	<div class="slide first">
    		<img src="../anhquangcao/<?php echo $hinh[1];?>" alt="">
    	</div>
    	<div class="slide">
    		<img src="../anhquangcao/<?php echo $hinh[2];?>" alt="">
    	</div>
    	<div class="slide">
    		<img src="../anhquangcao/<?php echo $hinh[3];?>" alt="">
    	</div>
    	<div class="slide">
    		<img src="../anhquangcao/<?php echo $hinh[4];?>" alt="">
    	</div>
    	<div class="slide">
    		<img src="../anhquangcao/<?php echo $hinh[5];?>" alt="">
    	</div>
    	<!-- thanh điều hướng slide -->
    	<div class="nav-slideauto">
    		<div class="auto-btn1"></div>
    		<div class="auto-btn2"></div>
    		<div class="auto-btn3"></div>
    		<div class="auto-btn4"></div>
    		<div class="auto-btn5"></div>
    	</div>
    	<!-- manualslide -->
    	<div class="nav-manual">
    		<label for="radio1" class="manual-btn"></label>
    		<label for="radio2" class="manual-btn"></label>
    		<label for="radio3" class="manual-btn"></label>
    		<label for="radio4" class="manual-btn"></label>
    		<label for="radio5" class="manual-btn"></label>
    	</div>
  	</div>
</div>
<script src="./js/jquery-3.6.0.min.js"></script>
<script>
	var counter=1;
	$(document).ready(function(){
	    $("#radio1").click(function(){
	        counter=1;
	    });
	    $("#radio2").click(function(){
	        counter=2;
	    });
	    $("#radio3").click(function(){
	        counter=3;
	    });
	    $("#radio4").click(function(){
	        counter=4;
	    });
	    $("#radio5").click(function(){
	        counter=5;
	    });
	});
	setInterval(function()
	{
		document.getElementById('radio'+ counter).checked = true;
		counter++;
		if(counter>5)
		{
			counter=1;
		}
	}, 10000);
</script>