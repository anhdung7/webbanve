<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chuyenvienhethong;
use DB;
use App\rap\bangdoidiem;

class chuyenvienController extends Controller
{
    //
     public function trangchinh()
    {
        session_start();
        if(isset($_SESSION['chuyenvien']))
        {
            return view('chuyenvien.mainchuyenvien');
        }
        else
            return view('chuyenvien.loginchuyenvien');
    }

    public function kiemtradangnhap()
    {
        if(isset($_POST['login']))
        {
            $taikhoan=$_POST['username'];
            $matkhau=MD5($_POST['password']);
            $checkmk=$_POST['password'];
            if($taikhoan=="")
            {
                echo "<script language='javascript'>
                                        alert('Nhập tài khoản !!');   
                                    </script>";
                ?>
                <script>window.location="/chuyenvien1";</script>
                <?php
            }
            else if($checkmk=="")
            {
                echo "<script language='javascript'>
                                        alert('Nhập mật khẩu !!');   
                                    </script>";
                ?>
                <script>window.location="/chuyenvien1";</script>
                <?php
            }
            else
            {
            $check=DB::select('select * from chuyenvienhethongs where username= ?', [$taikhoan]);
            if($check == null)
            {
                echo "<script language='javascript'>
                                        alert('Tài khoản không tồn tại');   
                                    </script>";
                ?>
                <script>window.location="/chuyenvien1";</script>
                <?php
            }
            else
            {
                if($check[0]->username==$taikhoan)
                {
                    if($check[0]->password==$matkhau)
                    {
                        session_start();
                        $_SESSION['chuyenvien']=$taikhoan;
                        ?>
                        <script>window.location="/chuyenvien1";</script>
                        <?php
                    }
                    else
                    {
                        echo "<script language='javascript'>
                                        alert('Sai mật khẩu!!');    
                                    </script>";
                        ?>
                        <script>window.location="/chuyenvien1";</script>
                        <?php
                    }
                }
                else
                {
                    echo "<script language='javascript'>
                                        alert('Sai tài khoản!!');   
                                    </script>";
                    ?>
                    <script>window.location="/chuyenvien1";</script>
                    <?php
                }
            }
            }
        }
        else
        {
            echo "<script language='javascript'>
                                        alert('Đăng nhập lỗi!!!');  
                                    </script>";
                ?>
                <script>window.location="/chuyenvien1";</script>
                <?php
        }
    }

    public function dangxuat()
    {
        session_start();
        unset($_SESSION['chuyenvien']);
        echo    "<script language='javascript'>
                    alert('Đã thoát đăng nhập');
                    window.location='/chuyenvien1';
                </script>";
    }

    public function thongtin()
    {
        session_start();
        $chuyenvieninfo=DB::select('select * from chuyenvienhethongs where username= ?', [$_SESSION['chuyenvien']]);
        return View('chuyenvien.info.thongtin')->with('chuyenvieninfo',$chuyenvieninfo);
    }

    public function formsuathongtin()
    {
        session_start();
        $chuyenvieninfo=DB::select('select * from chuyenvienhethongs where username= ?', [$_SESSION['chuyenvien']]);
        return View('chuyenvien.info.formsuathongtin')->with('chuyenvieninfo',$chuyenvieninfo);
    }

    public function suathongtin()
    {
        session_start();
        $chuyenvieninfo=DB::select('select * from chuyenvienhethongs where username= ?', [$_SESSION['chuyenvien']]);
        $fixcv=chuyenvienhethong::find($chuyenvieninfo[0]->id);
        $fixcv->name=$_POST['name'];
        $fixcv->birthday=$_POST['birthday'];
        $fixcv->phone=$_POST['phone'];
        $fixcv->address=$_POST['address'];
        $fixcv->save();
        echo    "<script language='javascript'>
                    alert('Sửa thông tin thành công');
                    window.location='/chuyenvien/thongtin';
                </script>";
    }

    public function formsuamatkhau()
    {
        session_start();
        return View('chuyenvien.info.formsuamatkhau');
    }

    public function suamatkhau()
    {
        session_start();
        $chuyenvieninfo=DB::select('select * from chuyenvienhethongs where username= ?', [$_SESSION['chuyenvien']]);
        $check=$chuyenvieninfo[0]->password;
        $oldpassword=$_POST['oldpassword'];
        $password=$_POST['password'];
        $checkpassword=$_POST['checkpassword'];
        if($check==MD5($oldpassword))
        {
            if($password==$checkpassword)
            {
                $fixcv=chuyenvienhethong::find($chuyenvieninfo[0]->id);
                $fixcv->password=MD5($password);
                $fixcv->save();
                echo    "<script language='javascript'>
                            alert('Sửa mật khẩu thành công');
                            window.location='/chuyenvien/thongtin';
                        </script>";
            }
            else
            {
                echo    "<script language='javascript'>
                    alert('Mật khẩu mới sai cú pháp nhập lại !');
                    window.location='/chuyenvien/formsuamatkhau';
                </script>";
            }
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Sai mật khẩu cũ !');
                    window.location='/chuyenvien/formsuamatkhau';
                </script>";
        }
    }

    public function dsbangdoidiem()
    {
        session_start();
        $dsbangdoidiem=DB::table('bangdoidiems')->get();
        return View('chuyenvien.bangdoidiem.dsbangdoidiem')->with('dsbangdoidiem',$dsbangdoidiem);
    }

    public function formthembangdoidiem()
    {
        session_start();
        return View('chuyenvien.bangdoidiem.formthembangdoidiem');
    }

    public function thembangdoidiem()
    {
        $check=DB::table('bangdoidiems')->get();
        $tenqua=$_POST['tenqua'];
        $diemdoi=$_POST['sodiemdoi'];
        $flag=0;
        foreach ($check as $key => $value) {
            if($value->tenqua==$tenqua)
            {
                $flag=1;
            }
        }
        if($flag==0)
        {
            $sp= new bangdoidiem;
            $sp->tenqua=$tenqua;
            $sp->sodiemdoi=$diemdoi;
            $sp->save();
            return redirect('/chuyenvien/dsbangdoidiem');
        }
        else
        {
            echo "<script language='javascript'>
                                        alert('Đã có thể loại này rồi !!'); 
                                        window.location='/chuyenvien/formthembangdoidiem';  
                                    </script>";
        }
    }

    public function xoabangdoidiem()
    {
        $id=$_GET['id'];
        $spxoa=bangdoidiem::find($id);
        $spxoa->delete();
        return redirect('/chuyenvien/dsbangdoidiem');
    }

    public function dslichsudoidiem()
    {
        session_start();
        $dslichsudoidiem=DB::table('lichsudoidiems')->get();
        $temp=DB::select('select * from bangdoidiems');
        $dssanpham=array();
        foreach ($temp as $key => $value) {
            // code...
            $dssanpham[$value->id]=$value->tenqua;
        }
        return View('chuyenvien.bangdoidiem.lichsudoidiem')->with('dslichsudoidiem',$dslichsudoidiem)->with('dssanpham',$dssanpham);
    }
}
