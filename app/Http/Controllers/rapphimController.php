<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\rap\suatchieu;

class rapphimController extends Controller
{
    //
    public function index()
    {
        session_start();
    	$dsphim=DB::table('phims')->get();
        $hinhquangcao=DB::table('hinhquangcaos')->get();
        $hinh=array();
        foreach ($hinhquangcao as $key => $value) {
            $hinh[$value->vitri]=$value->tenhinh;
        }
    	return View('khachhangview.trangchinh')->with('dsphim',$dsphim)->with('hinh',$hinh);
    }

    public function registered()
    {
        echo "<script language='javascript'>
                                        alert('Tài khoản đã được đăng kí. Quý khách vui lòng vào mail để kích hoạt tài khoản để đăng nhập !');
                                        window.location='/';  
                                    </script>";
    }

    public function notconfirm()
    {
        echo "<script language='javascript'>
                                        alert('Tài khoản chưa được kích hoạt. Quý khách vui lòng vào mail để kích hoạt tài khoản để đăng nhập !');
                                        window.location='/';  
                                    </script>";
    }

    public function timphim()
    {
        session_start();
        $tenphimtim=$_GET['tenphimtim'];
        $xuli="%".$_GET['tenphimtim']."%";
        $dsphim=DB::select('select * from phims where tenphim like ?',[$xuli]);
        return View('khachhangview.timphim')->with('dsphim',$dsphim)->with('tenphimtim',$tenphimtim);
    }

    public function chonphim()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id=$_GET['idphim'];
        $phim=DB::select('select * from phims where id=?',[$id]);
        $tempsuat=DB::select('select * from suatchieus where idphim=?',[$id]);
        if($phim[0]->tinhtrang==1)
        {
            $dssuat=array();
            foreach ($tempsuat as $key => $value) 
            {
                //ktr nam->thang->ngay
                if(date("Y")==date("Y",strtotime($value->giochieu)))
                {
                    if(date("m")==date("m",strtotime($value->giochieu)))
                    {
                        if(date("d")==date("d",strtotime($value->giochieu)))
                        {
                            if(date("H")<date("H",strtotime($value->giochieu)))
                            {
                                $dssuat[$value->id]=array('giochieu'=>$value->giochieu,'idrap'=>$value->idrap);
                            }
                        }
                    }
                }
            }
            $temprap=DB::select('select * from raps');
            $dsrap=array();
            foreach ($temprap as $key => $value) 
            {
                $dsrap[$value->id]=$value->tenrap;
            }
            return View('khachhangview.phiminfo')->with('phim',$phim)->with('dssuat',$dssuat)->with('dsrap',$dsrap);
        }
        else if($phim[0]->tinhtrang==2)
        {
            $dssuat=array();
            foreach ($tempsuat as $key => $value) 
            {
                if(time()<=strtotime($value->giochieu))
                {
                    if($value->dacbiet==1)
                    {
                        $dssuat[$value->id]=array('giochieu'=>$value->giochieu,'idrap'=>$value->idrap);
                    }
                }
            }
            $temprap=DB::select('select * from raps');
            $dsrap=array();
            foreach ($temprap as $key => $value) 
            {
                $dsrap[$value->id]=$value->tenrap;
            }
            return View('khachhangview.phiminfosapchieu')->with('phim',$phim)->with('dssuat',$dssuat)->with('dsrap',$dsrap);
        }
    }

    public function chonngaysuat()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngaychon=$_GET['ngay'];
        $idphim=$_GET['idphim'];
        $phim=DB::select('select * from phims where id=?',[$idphim]);
        $tempsuat=DB::select('select * from suatchieus where idphim=?',[$idphim]);
        $dssuat=array();
        //ktr nhuan
        $maxthang2=28;
        if(date("Y")%100==0)
        {
            if(date("Y")%400==0)
                $maxthang2=29;
        }
        else
        {
            if(date("Y")%4==0)
                $maxthang2=29;
        }
        //ktr ngay trong thang
        if(date("m")==2)
        {
            $ngaymax=$maxthang2;
        }
        else if(date("m")==4||date("m")==6||date("m")==9||date("m")==11)
        {
            $ngaymax=30;
        }
        else
        {
            $ngaymax=31;
        }
        //ktrngay max
        $nam=date("Y");
        $thang=date("m");
        $ngay=date("d");
        if($ngaychon==2)
        {
            if(date("d")==$ngaymax)
            {
                if(date("m")==12)
                {
                    $thang=1;
                    $nam=date("Y")+1;
                    $ngay=1;
                }
                else
                {
                    $ngay=1;
                    $thang=date("m")+1;
                }
            }
            else
            {
                $ngay=date("d")+1;   
            }
        }
        //ktrasuat
        foreach ($tempsuat as $key => $value) {
            //ktr nam->thang->ngay
            //ktr so sanh tg hien tai
            if($nam==date("Y",strtotime($value->giochieu)))
            {
                if($thang==date("m",strtotime($value->giochieu)))
                {
                    if($ngay==date("d",strtotime($value->giochieu)))
                    {
                        if($ngaychon==2)
                        {
                        $dssuat[$value->id]=array('giochieu'=>$value->giochieu,'idrap'=>$value->idrap);
                        }
                        else
                        {
                            if(date("H")<date("H",strtotime($value->giochieu)))
                            {
                            $dssuat[$value->id]=array('giochieu'=>$value->giochieu,'idrap'=>$value->idrap);
                            }
                        }
                    }
                    
                }
            }
        }
        $temprap=DB::select('select * from raps');
        $dsrap=array();
        foreach ($temprap as $key => $value) {
            $dsrap[$value->id]=$value->tenrap;
        }
        return View('khachhangview.suattrongngay')->with('phim',$phim)->with('dssuat',$dssuat)->with('dsrap',$dsrap);
    }

    public function chonsuat()
    {
        session_start();
        $idsuat=$_GET['idsuat'];
        $idphim=$_GET['idphim'];
        if(isset($_SESSION['user']))
        {
            $suat=DB::select("select * from suatchieus where id=?",[$idsuat]);
            $url="/xuliphongtheosuat?idsuat=".$idsuat."&idphong=".$suat[0]->idphong;
            return redirect($url);
        }
        else
        {
            echo "<script language='javascript'>
                                        alert('Bạn chưa đăng nhập tài khoản !!');
                                    </script>";
        }
        $url="/phim?idphim=".$idphim;
        ?>
                <script>window.location="<?php echo $url;?>";</script>
                <?php
    }


    public function thongtin()
    {
        session_start();
        $iduser=$_SESSION['user'];
        $user=DB::select("select * from users where id=?",[$iduser]);
        return View('khachhangview.thongtinnd')->with('user',$user);
    }

    public function formsuathongtin()
    {
        session_start();
        $iduser=$_SESSION['user'];
        $user=DB::select("select * from users where id=?",[$iduser]);
        return View('khachhangview.formsuathongtinnd')->with('user',$user);
    }

    public function suathongtin()
    {
        session_start();
        $iduser=$_SESSION['user'];
        $user=User::find($iduser);
        $user->name=$_POST['name'];
        $user->phone=$_POST['phone'];
        $user->address=$_POST['address'];
        $user->birthday=$_POST['birthday'];
        $user->save();
        echo "<script language='javascript'>
                                            alert('Đã sửa thông tin cá nhân thành công !');
                                            window.location='/thongtin';
                                        </script>";
    }

    public function formsuamatkhau()
    {
        session_start();
        $iduser=$_SESSION['user'];
        $user=DB::select("select * from users where id=?",[$iduser]);
        return View('khachhangview.formsuamatkhau')->with('user',$user);
    }

    public function suamatkhau()
    {
        session_start();
        $iduser=$_SESSION['user'];
        $user=User::find($iduser);
        $password=$_POST['password'];
        $check=$_POST['oldpassword'];
        $checkpassword=$_POST['checkpassword'];
        if(Hash::check($check,$user->password))
        {
            if($checkpassword==$password)
            {
                $user->password=Hash::make($password);
                $user->save();
                echo "<script language='javascript'>
                                            alert('Đã sửa mật khẩu thành công !');
                                            window.location='/thongtin';
                                        </script>";
            }
            else
            {
                echo "<script language='javascript'>
                                        alert('Nhập sai cú pháp nhập lại mật khẩu mới !');
                                        window.location='/formsuamatkhau';
                                    </script>";
            }
        }
        else
        {
            echo "<script language='javascript'>
                                        alert('Sai mật khẩu cũ !');
                                        window.location='/formsuamatkhau';
                                    </script>";
        }
    }

    public function dsdoidiem()
    {
        session_start();
        $iduser=$_SESSION['user'];
        $user=DB::select("select * from users where id=?",[$iduser]);
        $dsdoidiem=DB::select("select * from lichsudoidiems where idnguoidung=?",[$iduser]);
        $dssanpham=array();
        $temp=DB::table("bangdoidiems")->get();
        foreach ($temp as $key => $value) {
            $dssanpham[$value->id]=$value->tenqua;
        }
        return View('khachhangview.dsdoidiem')->with('user',$user)->with('dsdoidiem',$dsdoidiem)->with('dssanpham',$dssanpham);
    }

    public function test()
    {
        $temp=DB::select('select * from phims');
        $test=array();
        $test[]=$temp[0];
        return View('test')->with('test',$test);
    }
}
