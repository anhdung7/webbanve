<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\rap\phongchieu;

class phongchieuController extends Controller
{
    //
    public function dsphong()
    {
    	session_start();
    	$adminrap=DB::select('select * from admins where username= ?', [$_SESSION['admin']]);
		$idrap=$adminrap[0]->idrap;
    	$dsphong=DB::select('select * from phongchieus where idrap=?',[$idrap]);
    	$dsrap=DB::table('raps')->get();
    	foreach ($dsrap as $key => $value) {
    		if($value->id==$idrap)
    		{
    			$tenrap=$value->tenrap;
    			break;
    		}
    	}
    	return View('phongchieu.dsphong')->with('dsphong',$dsphong)->with('tenrap',$tenrap);
    }

    public function formthemphong()
    {
    	session_start();
    	return View('phongchieu.formthemphong');
    }

    public function hangcot()
    {
    	$soday=$_GET['soday'];
    	return View('phongchieu.hangcot')->with('soday',$soday);
    }

    public function ghedoi()
    {
    	$check=$_GET['check'];
    	if($check=="Y")
    	{
	    	$soday=$_GET['soday'];
	    	return View('phongchieu.ghedoi')->with('soday',$soday);
    	}
    }

    public function themphong()
    {
    	session_start();
    	$adminrap=DB::select('select * from admins where username= ?', [$_SESSION['admin']]);
		$idrap=$adminrap[0]->idrap;
    	$check=DB::select('select * from phongchieus where idrap =?',[$idrap]);
    	$sophong=$_POST['sophong'];
    	$flag=0;
    	foreach ($check as $key => $value) {
    		if($sophong==$value->sophong)
    		{
    			echo "<script language='javascript'>
                                        alert('Đã có số phòng này tại rạp !');
                                        window.location='/admin/formthemphong'; 
                                    </script>";
                                    $flag=1;
    		}
    	}
    	if($flag==0)
    	{
    		$chuoichuyen=array(1=>"A",2=>"B",3=>"C",4=>"D",5=>"E",6=>"F",7=>"G",8=>"H",9=>"I",10=>"J",11=>"K");
    		$ghe="";
    		$loaiphong="";
    		$soday=$_POST['soday'];
    		$tong=0;
    		if($soday==1)
    		{
    			$hang1=$_POST['sohang'];
    			$cot1=$_POST['socot'];
    			$ghedoi=$_POST['ghedoi'];
    			$loaiphong=$loaiphong."1,".$cot1.",".$ghedoi;
    		}
    		else if($soday==2)
    		{
    			$hang1=$_POST['sohang'];
    			$cot1=$_POST['socot'];
    			$hang2=$_POST['sohang'];
    			$cot2=$_POST['socot'];
    			$ghedoi=$_POST['ghedoi'];
    			$loaiphong=$loaiphong."2,".$cot1."-".$cot2.",".$ghedoi;
    		}
    		else
    		{
    			$hang1=$_POST['sohangngoai'];
    			$cot1=$_POST['socotngoai'];
    			$hang2=$_POST['sohanggiua'];
    			$cot2=$_POST['socotgiua'];
    			$hang3=$_POST['sohangngoai'];
    			$cot3=$_POST['socotngoai'];
    			$ghedoi=$_POST['ghedoi'];
    			$loaiphong=$loaiphong."3,".$cot1."-".$cot2."-".$cot3.",".$ghedoi;
    		}
    		for ($day=1; $day <=$soday ; $day++) {
    			if($day==1){
    				$hang=$hang1;
    				$cot=$cot1;
    			}
    			else if($day==2)
    			{
    				$hang=$hang2;
    				$cot=$cot2;
    			}
    			else
    			{
    				$hang=$hang3;
    				$cot=$cot3;
    			}
    			for ($i=1; $i <=$hang ; $i++) { 
	    			for ($j=1; $j <=$cot ; $j++) { 
	    				$ghe=$ghe.$chuoichuyen[$i].$day;
	    				if($j<10)
	    					$ghe=$ghe."0".$j;
	    				else
	    					$ghe=$ghe.$j;
	    				if($i<$hang || $j<$cot)
	    					$ghe=$ghe.",";
    				}
    			}
    				if($day<$soday)
    				$ghe=$ghe.",";
    		}
    		if($ghedoi=="Y")
	    	{
	    		if($soday==2)
	    		{
	    			$soghedoi=$_POST['soghedoi'];
	    			for ($i=1; $i <=$soghedoi ; $i++) { 
	    				if($i<10)
	    					$ghe=$ghe.","."L10".$i;
	    				else
	    					$ghe=$ghe.","."L1".$i;
	    			}
	    			for ($i=1; $i <=$soghedoi ; $i++) { 
	    				if($i<10)
	    					$ghe=$ghe.","."L20".$i;
	    				else
	    					$ghe=$ghe.","."L2".$i;
	    			}
	    		}
	    		else if($soday==1)
	    		{
	    			$soghedoi=$_POST['soghedoi'];
	    			for ($i=1; $i <=$soghedoi ; $i++) { 
	    				if($i<10)
	    					$ghe=$ghe.","."L10".$i;
	    			else
	    				$ghe=$ghe.","."L1".$i;
	    			}
	    		}
	    		else
	    		{
	    			$soghedoi=$_POST['soghedoi'];
	    			for ($i=1; $i <=$soghedoi ; $i++) { 
	    				if($i<10)
	    					$ghe=$ghe.","."L20".$i;
	    				else
	    					$ghe=$ghe.","."L2".$i;
	    				}
	    		}
	    	}
    		$phongnew=new phongchieu();
    		$phongnew->sophong=$_POST['sophong'];
    		$phongnew->ghe=$ghe;
    		$phongnew->loaiphong=$loaiphong;
    		$phongnew->idrap=$idrap;
    		$phongnew->save();
    		return redirect('/admin/dsphong');
    	}
    }

    public function xoaphong()
    {
    	$id=$_GET['id'];
    	$phongxoa=phongchieu::find($id);
    	$phongxoa->delete();
    	echo "<script language='javascript'>
                                        alert('Đã xóa phòng thành công !');
                                        window.location='/admin/dsphong'; 
                                    </script>";
    }

	public function phongtheosuat()
	{
		session_start();
		if(isset($_SESSION['admin']))
		{
			$adminrap=DB::select('select * from admins where username= ?', [$_SESSION['admin']]);
			$idrap=$adminrap[0]->idrap;
		}
		$dsphong=DB::select('select * from phongchieus where idrap=?',[$idrap]);
		return View('phongchieu.phongtheosuat')->with('dsphong',$dsphong);
	}

	public function suatchieuphong()
	{
		$id=$_GET['id'];
		$dssuat=DB::select('select * from suatchieus where idphong=?',[$id]);
		return View('phongchieu.suatchieuphong')->with("dssuat",$dssuat);
	}

	public function phongtenphim()
	{
		$id=$_GET['id'];
		$suat=DB::select('select * from suatchieus where id=?',[$id]);
		$idphim=$suat['0']->idphim;
		$phim=DB::select('select * from phims where id=?',[$idphim]);
		return View('phongchieu.tenphim')->with("phim",$phim);
	}

	public function botriphong()
	{
		session_start();
		if(isset($_SESSION['admin']))
		{
			$adminrap=DB::select('select * from admins where username= ?', [$_SESSION['admin']]);
			$idrap=$adminrap[0]->idrap;
		}
		$dsphong=DB::select('select * from phongchieus where idrap=?',[$idrap]);
		return View('phongchieu.botriphong')->with('dsphong',$dsphong);
	}

	public function xuliphong()
	{
		session_start();
		if(isset($_GET['idphong']))
		{
			$idphong=$_GET['idphong'];
			$phong=phongchieu::find($idphong);
			$tachloai=explode(",",$phong->loaiphong);
			if($tachloai[0]==3)
				$manhinh="manhinhlon";
			else
			{
				if($tachloai[0]==2)
				{
					$cot=explode("-",$tachloai[1]);
					$tong=$cot[0]+$cot[1];
				}
				else
					$tong=$tachloai[1];
				if($tong>10)
					$manhinh="manhinhlon";
				else
					$manhinh="manhinh";
			}
			if($tachloai[0]==1)
			{
				$dsghe=explode(",", $phong->ghe);
				if(isset($_SESSION['admin']))
					return View('phongchieu.admin.phong1daybt')->with("dsghe",$dsghe)->with("phong",$phong)->with('manhinh',$manhinh);
				else if(isset($_SESSION['boss']))
					return View('phongchieu.boss.phong1daybt')->with("dsghe",$dsghe)->with("phong",$phong)->with('manhinh',$manhinh);
			}
			else if($tachloai[0]==2)
			{
				$dsghe=explode(",", $phong->ghe);
				$day1=array();
				$day2=array();
				$dem1=0;
				$dem2=0;
				$idphong=$phong->id;
				foreach ($dsghe as $key => $value) {
					if(substr($value, 1, 3)<200)
					{
						$day1[$dem1]=$value;
						$dem1++;
					}
					else
					{
						$day2[$dem2]=$value;
						$dem2++;
					}
				}
				if(isset($_SESSION['admin']))
					return View('phongchieu.admin.phong2daybt')->with("day1",$day1)->with("day2",$day2)->with("phong",$phong)->with('manhinh',$manhinh);
				else if(isset($_SESSION['boss']))
					return View('phongchieu.boss.phong2daybt')->with("day1",$day1)->with("day2",$day2)->with("phong",$phong)->with('manhinh',$manhinh);
			}
			else
			{
				$dsghe=explode(",", $phong->ghe);
				$day1=array();
				$day2=array();
				$day3=array();
				$dem1=0;
				$dem2=0;
				$dem3=0;
				foreach ($dsghe as $key => $value) {
					if(substr($value, 1, 3)<200)
					{
						$day1[$dem1]=$value;
						$dem1++;
					}
					else if (substr($value, 1, 3)<300)
					{
						$day2[$dem2]=$value;
						$dem2++;
					}
					else
					{
						$day3[$dem3]=$value;
						$dem3++;
					}
				}
				if(isset($_SESSION['admin']))
					return View('phongchieu.admin.phong3daybt')->with("day1",$day1)->with("day2",$day2)->with("day3",$day3)->with("phong",$phong)->with('manhinh',$manhinh);
				else if(isset($_SESSION['boss']))
					return View('phongchieu.boss.phong3daybt')->with("day1",$day1)->with("day2",$day2)->with("day3",$day3)->with("phong",$phong)->with('manhinh',$manhinh);
			}
			return View('test')->with('tachloai',$tachloai);
		}
		else if(isset($_SESSION['admin']))
		{
			echo "<script language='javascript'>
                                        alert('Chưa chọn phòng !');
                                        window.location='/botriphong'; 
                                    </script>";
		}
	}

	public function xuliphongtheosuat()
	{
		session_start();
		if(isset($_GET['idphong']))
		{
			$idphong=$_GET['idphong'];
			$idsuat=$_GET['idsuat'];
			$tempdsve=DB::select('select * from vephims where tinhtrang!=3 and idsuatchieu=?',[$idsuat]);
			$dsve=array();
			foreach ($tempdsve as $key => $value) {
				$dsve[$value->vtghe]=$value->tinhtrang;
			}
			$phong=phongchieu::find($idphong);
			$tachloai=explode(",",$phong->loaiphong);
			if($tachloai[0]==3)
				$manhinh="manhinhlon";
			else
			{
				if($tachloai[0]==2)
				{
					$cot=explode("-",$tachloai[1]);
					$tong=$cot[0]+$cot[1];
				}
				else
					$tong=$tachloai[1];
				if($tong>10)
					$manhinh="manhinhlon";
				else
					$manhinh="manhinh";
			}
			if($tachloai[0]==1)
			{
				$dsghe=explode(",", $phong->ghe);
				if(isset($_SESSION['admin']))
					return View('phongchieu.admin.phong1day')->with("dsghe",$dsghe)->with("phong",$phong)->with('manhinh',$manhinh)->with('idsuat',$idsuat)->with('dsve',$dsve);
				else if(isset($_SESSION['boss']))
					return View('phongchieu.boss.phong1day')->with("dsghe",$dsghe)->with("phong",$phong)->with('manhinh',$manhinh)->with('idsuat',$idsuat)->with('dsve',$dsve);
				else 
					return View('phongchieu.nguoidung.phong1daynd')->with("dsghe",$dsghe)->with("phong",$phong)->with('manhinh',$manhinh)->with('idsuat',$idsuat)->with('dsve',$dsve);
			}
			else if($tachloai[0]==2)
			{
				$dsghe=explode(",", $phong->ghe);
				$day1=array();
				$day2=array();
				$dem1=0;
				$dem2=0;
				$idphong=$phong->id;
				foreach ($dsghe as $key => $value) {
					if(substr($value, 1, 3)<200)
					{
						$day1[$dem1]=$value;
						$dem1++;
					}
					else
					{
						$day2[$dem2]=$value;
						$dem2++;
					}
				}
				if(isset($_SESSION['admin']))
					return View('phongchieu.admin.phong2day')->with("day1",$day1)->with("day2",$day2)->with("phong",$phong)->with('manhinh',$manhinh)->with('idsuat',$idsuat)->with('dsve',$dsve);
				else if(isset($_SESSION['boss']))
					return View('phongchieu.boss.phong2day')->with("day1",$day1)->with("day2",$day2)->with("phong",$phong)->with('manhinh',$manhinh)->with('idsuat',$idsuat)->with('dsve',$dsve);
				else
					return View('phongchieu.nguoidung.phong2daynd')->with("day1",$day1)->with("day2",$day2)->with("phong",$phong)->with('manhinh',$manhinh)->with('idsuat',$idsuat)->with('dsve',$dsve);
			}
			else
			{
				$dsghe=explode(",", $phong->ghe);
				$day1=array();
				$day2=array();
				$day3=array();
				$dem1=0;
				$dem2=0;
				$dem3=0;
				foreach ($dsghe as $key => $value) {
					if(substr($value, 1, 3)<200)
					{
						$day1[$dem1]=$value;
						$dem1++;
					}
					else if (substr($value, 1, 3)<300)
					{
						$day2[$dem2]=$value;
						$dem2++;
					}
					else
					{
						$day3[$dem3]=$value;
						$dem3++;
					}
				}
				if(isset($_SESSION['admin']))
					return View('phongchieu.admin.phong3day')->with("day1",$day1)->with("day2",$day2)->with("day3",$day3)->with("phong",$phong)->with('manhinh',$manhinh)->with('idsuat',$idsuat)->with('dsve',$dsve);
				else if(isset($_SESSION['boss']))
					return View('phongchieu.boss.phong3day')->with("day1",$day1)->with("day2",$day2)->with("day3",$day3)->with("phong",$phong)->with('manhinh',$manhinh)->with('idsuat',$idsuat)->with('dsve',$dsve);
				else
					return View('phongchieu.nguoidung.phong3daynd')->with("day1",$day1)->with("day2",$day2)->with("day3",$day3)->with("phong",$phong)->with('manhinh',$manhinh)->with('idsuat',$idsuat)->with('dsve',$dsve);
			}
			//return View('test')->with('tachloai',$tachloai);
		}
		else if(isset($_SESSION['admin']))
		{
			echo "<script language='javascript'>
                                        alert('Chưa chọn phòng !');
                                        window.location='/phongtheosuat'; 
                                    </script>";
		}
	}

}
