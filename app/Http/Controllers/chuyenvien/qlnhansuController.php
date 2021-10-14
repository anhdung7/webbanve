<?php

namespace App\Http\Controllers\chuyenvien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\admin;
use App\nhanvien;

class qlnhansuController extends Controller
{
    public function dsquanly()
    {
        session_start();
        $dsquanly=DB::table('admins')->get();
        $temp=DB::table('raps')->get();
        $dsrap=array();
        foreach ($temp as $key => $value) {
            $dsrap[$value->id]=$value->tenrap;
        }
        return View('chuyenvien.nhansu.dsquanly')->with('dsquanly',$dsquanly)->with('dsrap',$dsrap);
    }

    public function dsnhanvien()
    {
        session_start();
        $dsnhanvien=DB::table('nhanviens')->get();
        $temp=DB::table('raps')->get();
        $dsrap=array();
        foreach ($temp as $key => $value) {
            $dsrap[$value->id]=$value->tenrap;
        }
        return View('chuyenvien.nhansu.dsnhanvien')->with('dsnhanvien',$dsnhanvien)->with('dsrap',$dsrap);
    }

    public function dschuyenvien()
    {
        session_start();
        $dschuyenvien=DB::table('chuyenvienhethongs')->get();
        return View('chuyenvien.nhansu.dschuyenvien')->with('dschuyenvien',$dschuyenvien);
    }
    
    public function formthemquanly()
    {
        session_start();
        $temp=DB::select('select * from raps');
        $dsrap=array();
        foreach ($temp as $key => $value) {
            $dsrap[$value->id]=$value->tenrap;
        }
        return View('chuyenvien.nhansu.formthemquanly')->with('dsrap',$dsrap);
    }

    public function themquanly()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $check=DB::select('select * from admins where username=?',[$_POST['username']]);
        $checkphone=DB::select('select * from admins where phone=?',[$_POST['phone']]);
        if($check==null && $checkphone==null)
        {
            $layngay=strtotime($_POST['birthday']);
            $checknam=date("Y", $layngay);
            $tuoi=date("Y")-$checknam;
            if($tuoi>18)
            {
                $newadmin=new admin();
                $newadmin->name=$_POST['name'];
                $newadmin->birthday=$_POST['birthday'];
                $newadmin->phone=$_POST['phone'];
                $newadmin->address=$_POST['address'];
                $newadmin->username=$_POST['username'];
                $newadmin->password=MD5($_POST['password']);
                $newadmin->idrap=$_POST['idrap'];
                $newadmin->save();
                echo    "<script language='javascript'>
                            alert('Đã thêm quản lý');
                        </script>";
                $link='/chuyenvien/dsquanlyrap';
                return redirect($link);
            }
            else
            {
                echo    "<script language='javascript'>
                            alert('Năm sinh không hợp lệ!');
                            window.location='/chuyenvien/formthemql';
                        </script>";
            }
        }
        else
        {
            echo "<script language='javascript'>
                                        alert('Trùng tên tài khoản hãy nhập tài khoản khác !');
                                        window.location='/chuyenvien/formthemql';  
                                    </script>";
        }
    }

    public function xoaquanly()
    {
        $id=0;
        $id=$_GET['id'];
        if($id!=0)
        {
            $qlxoa=admin::find($id);
            $qlxoa->delete();
            echo    "<script language='javascript'>
                    alert('Đã xóa quản lý');
                </script>";
        }
        $link='/chuyenvien/dsquanlyrap';
        return redirect($link);
    }

    public function formthemnhanvien()
    {
        session_start();
        $temp=DB::select('select * from raps');
        $dsrap=array();
        foreach ($temp as $key => $value) {
            $dsrap[$value->id]=$value->tenrap;
        }
        return View('chuyenvien.nhansu.formthemnhanvien')->with('dsrap',$dsrap);
    }

    public function themnhanvien()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $check=DB::select('select * from nhanviens where username=?',[$_POST['username']]);
        $checkphone=DB::select('select * from nhanviens where phone=?',[$_POST['phone']]);
        if($check==null && $checkphone==null)
        {
            $layngay=strtotime($_POST['birthday']);
            $checknam=date("Y", $layngay);
            $tuoi=date("Y")-$checknam;
            if($tuoi>18)
            {
                $newnv=new nhanvien();
                $newnv->name=$_POST['name'];
                $newnv->birthday=$_POST['birthday'];
                $newnv->phone=$_POST['phone'];
                $newnv->address=$_POST['address'];
                $newnv->username=$_POST['username'];
                $newnv->password=MD5($_POST['password']);
                $newnv->idrap=$_POST['idrap'];
                $newnv->save();
                echo    "<script language='javascript'>
                            alert('Đã thêm nhân viên');
                        </script>";
                $link='/chuyenvien/dsnhanvienrap';
                return redirect($link);
            }
            else
            {
                echo    "<script language='javascript'>
                            alert('Năm sinh không hợp lệ!');
                            window.location='/chuyenvien/formthemnv';
                        </script>";
            }
        }
        else
        {
            echo "<script language='javascript'>
                                        alert('Trùng tên tài khoản hãy nhập tài khoản khác !');
                                        window.location='/chuyenvien/formthemnv';  
                                    </script>";
        }
    }

    public function xoanhanvien()
    {
        $id=0;
        $id=$_GET['id'];
        if($id!=0)
        {
            $nvxoa=nhanvien::find($id);
            $nvxoa->delete();
            echo    "<script language='javascript'>
                    alert('Đã xóa nhân viên');
                </script>";
        }
        $link='/chuyenvien/dsnhanvienrap';
        return redirect($link);
    }
}
