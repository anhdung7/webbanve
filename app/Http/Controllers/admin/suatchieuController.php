<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\rap\suatchieu;
use App\lichsusuatchieu;

class suatchieuController extends Controller
{
    //
    public function danhsachsuatchieu()
    {
    	session_start();
        $tk=$_SESSION['admin'];
        $admin=DB::select('select * from admins where username= ?',[$tk]);
    	$dssuatchieu=DB::select('select * from suatchieus where idrap=? ORDER BY idphong ASC,giochieu ASC',[$admin[0]->idrap]);
        $dsphim=DB::table('phims')->get();
        $dsphong=array();
        $tempphong=DB::select('select * from phongchieus where idrap=?',[$admin[0]->idrap]);
        foreach ($tempphong as $key => $value) {
            $dsphong[$value->id]=$value->sophong;
        }
    	return View('admin.suatchieu.danhsachsuatchieu')->with('dssuatchieu',$dssuatchieu)->with('dsphim',$dsphim)->with('dsphong',$dsphong);
    }

    public function formthemsuatchieu()
    {
    	session_start();
        $tk=$_SESSION['admin'];
        $admin=DB::select('select * from admins where username= ?',[$tk]);
    	$dsphim=DB::table('phims')->get();
    	$dsphong=DB::select('select * from phongchieus where idrap= ?',[$admin[0]->idrap]);
    	return View('admin.suatchieu.formthemsuatchieu')->with('dsphim',$dsphim)->with('dsphong',$dsphong);
    }

    public function themsuatchieu()
    {
        session_start();
        $tk=$_SESSION['admin'];
        $admin=DB::select('select * from admins where username= ?',[$tk]);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if(isset($_SESSION['admin']))
        {
            $error=0;
            if(empty($_POST['idphim']))
            {
                echo "<script language='javascript'>
                                            alert('Chưa chọn phim!!'); 
                                            window.location='/admin/formthemsuatchieu';  
                                        </script>";
            }
            else if(empty($_POST['idphong']))
            {
                echo "<script language='javascript'>
                                            alert('Chưa chọn phòng!!');  
                                            window.location='/admin/formthemsuatchieu'; 
                                        </script>";
            }
            else if($_POST['songaychieult']<0)
            {
                echo "<script language='javascript'>
                                            alert('Số ngày chiếu liên tục ít nhất phải là 1!!');  
                                            window.location='/admin/formthemsuatchieu'; 
                                        </script>";
            }
            else
            {
                $songaychieult=$_POST['songaychieult'];
                $ngaygiochieu=strtotime($_POST['giochieu']);
                $suatloi=array();
                //neu danh sach suat co ton tai thi ngay do khong duoc add
                for ($i=1; $i <=$songaychieult ; $i++) 
                {
                    $dssuat=suatchieuController::kiemtrasuat($ngaygiochieu,$_POST['idphim'],$_POST['idphong']);
                    //return View('test')->with('dssuat',$dssuat);
                    if($dssuat==null)
                    {
                        $chuoingaygiochieu=date("Y-m-d",$ngaygiochieu)."T".date("H:i",$ngaygiochieu);
                        $newsc=new suatchieu();
                        $newsc->idphim=$_POST['idphim'];
                        $newsc->idphong=$_POST['idphong'];
                        $newsc->giochieu=$chuoingaygiochieu;
                        $newsc->dacbiet=$_POST['suatdacbiet'];
                        $newsc->idrap=$admin[0]->idrap;
                        $newsc->save();
                        $schis=new lichsusuatchieu();
                        $schis->idsuatchieu=$newsc->id;
                        $schis->idadmin=$admin[0]->id;
                        $schis->tinhtrang=1;
                        $schis->save();
                    }
                    else
                    {
                        $suatloi[]=$dssuat;
                    }
                    $ngaygiochieu=$ngaygiochieu+86400;
                }
                if($suatloi==null)
                    echo "<script language='javascript'>
                                                alert('Đã thêm suất chiếu thành công !');  
                                                window.location='/admin/dssuatchieu'; 
                                            </script>";
                else if(count($suatloi)==$songaychieult)
                {
                    echo "<script language='javascript'>
                                                alert('Các suất chiếu đều lỗi,danh sách các suất lỗi sẽ được hiển thị!');  
                                                window.location='/admin/dssuatchieu'; 
                                            </script>";
                }
                else
                {
                    echo "<script language='javascript'>
                                                alert('Thêm thành công 1 số suất,danh sách các suất lỗi sẽ được hiển thị!');  
                                                window.location='/admin/dssuatchieu'; 
                                            </script>";
                }
            }
        }
        else
        {
            echo "<script language='javascript'>
                                            alert('Lỗi hệ thống !');  
                                            window.location='/'; 
                                        </script>";
        }
    }

    public function kiemtrasuat($ngaygiochieu,$idphim,$idphong)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $phim=DB::select('select * from phims where id=?',[$idphim]);
        $sophut=$phim[0]->thoigianchieu%60;
        $sogio=$phim[0]->thoigianchieu/60;
        $dssuat=array();
        for ($j=-4; $j <= $sogio; $j++) 
        {
            $tssautinh=$ngaygiochieu+($j*3600);
            $gio=date("H",$tssautinh);
            //tinh lai so gio va ca phut
            $checkngaychieu=date("Y-m-d",$tssautinh)." ".$gio;
            $sql="select * from suatchieus where idphong='".$idphong."' and giochieu like '%".$checkngaychieu."%'";
            $temp=DB::select($sql);
            //return $temp;
            //return date("Y-m-d H:i",$tssautinh);
            //da co suat
            if($temp!=null)
            {
                if($j<=-2) //check suat phia truoc
                {
                    $checkphim=DB::select('select * from phims where id=?',[$temp[0]->idphim]);
                    $checkgiophim=$checkphim[0]->thoigianchieu/60;
                    $checkphutphim=$checkphim[0]->thoigianchieu%60;
                    $tssauphim=$tssautinh+$checkphutphim*60+$checkgiophim*60*60;
                    if($tssauphim>$ngaygiochieu)
                        return $temp;
                }
                else //cung 1 khung gio chac chan se trung
                    return $temp;
            }
        }
        return $dssuat;
    }

    public function xoasuatchieu()
    {
        session_start();
        $id=$_GET['id'];
        $tk=$_SESSION['admin'];
        $admin=DB::select('select * from admins where username= ?',[$tk]);
        $scxoa=suatchieu::find($id);
        $scxoa->delete();
        $schis=new lichsusuatchieu();
        $schis->idsuatchieu=$id;
        $schis->idadmin=$admin[0]->id;
        $schis->tinhtrang=2;
        $schis->save();
        echo "<script language='javascript'>
                                        alert('Đã xóa suất chiếu !');  
                                        window.location='/admin/dssuatchieu'; 
                                    </script>";
    }

    public function lichsusuatchieu()
    {
        session_start();
        $tk=$_SESSION['admin'];
        $admin=DB::select('select * from admins where username= ?',[$tk]);
        $dslichsu=DB::select('select * from lichsusuatchieus where idadmin=? ORDER BY id DESC',[$admin[0]->id]);
        return View('admin.suatchieu.lichsusuatchieu')->with('dslichsu',$dslichsu);
    }
}
