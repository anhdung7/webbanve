@extends('layouts.app')
<?php 
    $id="";
    if(isset(Auth::user()->id))
    $id=Auth::user()->id;
    if($id!="")
    {
    	if(!isset($_SESSION['user']))
    	{
        //session_start();
        $_SESSION['user']=$id;
        if(!isset($_SESSION['giohang']))
            $_SESSION['giohang']=array();
    	}
    }
    //echo $_SESSION['user'];
    //tao session
?>
<?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>Rạp phim Star</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./css/style.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
	<![endif]-->
	<!-- <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-func.js"></script> -->
</head>
<body>
    <div class="relative">
        
    @yield('contentuser')
    </div>
    <div class="footer-main">
        <br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3" style="font-size: 30px;"><b>VỀ RẠP STAR</b></div>
            <div class="col-md-3" style="font-size: 30px;"><b>QUY ĐỊNH VÀ ĐIỀU KHOẢN</b></div>
            <div class="col-md-3" style="font-size: 30px;"><b>LIÊN HỆ</b></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3"><a href="/hethongrap">Hệ thống rạp</a></div>
            <div class="col-md-3"><a href="/quydinhthanhvien">Quy định thành viên</a></div>
            <div class="col-md-3">Địa chỉ:abcxyz,P.abc,Q.xyz,TP.HCM</div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3"><a href="/tuyendung">Tuyển dụng</a></div>
            <div class="col-md-3"><a href="/dieukhoan">Điều khoản</a></div>
            <div class="col-md-3">Hotline:1900xxxx</div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3"><a href="/huongdandatve">Hướng dẫn đặt vé</a></div>
            <div class="col-md-3"><a href="/chinhsach">Chính sách dành cho người dùng</a></div>
            <div class="col-md-3">
                 <strong>Copyright &copy; 2021 STU</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <a href="#">
                <img src="./css/images/bocongthuong.png" alt="" style="width: 30%;">
                </a>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                 <div class="social">
                    <span style="color: white;">FOLLOW US ON:</span>
                    <ul>
                        <li><a class="twitter" href="#a">twitter</a></li>
                        <li><a class="facebook" href="#b">facebook</a></li>
                    </ul>
                </div> 
            </div>
        </div>  
    </div>
</body>
</html>
