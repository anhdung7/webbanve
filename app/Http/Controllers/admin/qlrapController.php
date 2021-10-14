<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\nhanvien;

class qlrapController extends Controller
{
    //
    public function dsnhanvien()
    {
        session_start();
        $tk=$_SESSION['admin'];
        $admin=DB::select('select * from admins where username= ?',[$tk]);
        $dsnhanvien=DB::select('select * from nhanviens where idrap=? ORDER BY id ASC',[$admin[0]->idrap]);
        return View('admin.qlrap.dsnhanvien')->with('dsnhanvien',$dsnhanvien);
    }

    public function formthemnhanvien()
    {
        session_start();
        $tk=$_SESSION['admin'];
        $admin=DB::select('select * from admins where username= ?',[$tk]);
        return View('admin.qlrap.formthemnhanvien')->with('idrap',$admin[0]->idrap);
    }

    public function themnhanvien()
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
                    window.location='/admin/dsnhanvien';
                </script>";
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
                    window.location='/admin/dsnhanvien';
                </script>";
        }
    }

    public function dsnguoidung()
    {
        session_start();
        $dsnguoidung=DB::select('select * from users');
        return View('admin.qlrap.dsnguoidung')->with('dsnguoidung',$dsnguoidung);
    }
}
