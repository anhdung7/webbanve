<?php

namespace App\Http\Controllers\chuyenvien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\doannuocuong;

class foodController extends Controller
{
    //
    public function dsdoannuocuong()
    {
        session_start();
        $dsfood=DB::select('select * from doannuocuongs');
        return View('chuyenvien.food.dsdoannuocuong')->with('dsfood',$dsfood);
    }

    public function formthemdoannuocuong()
    {
        session_start();
        return View('chuyenvien.food.formthemdoannuocuong');
    }

    public function themdoannuocuong()
    {
        $newfood=new doannuocuong;
        $newfood->tensp=$_POST['tensp'];
        $newfood->gia=$_POST['gia'];
        $newfood->donvitinh=$_POST['donvitinh'];
        $newfood->save();
        echo "<script language='javascript'>
                                        alert('Thêm sản phẩm thành công !');
                                        window.location='/chuyenvien/dsdoannuocuong';  
                                    </script>";
    }

    public function formsuadoannuocuong()
    {
        session_start();
        $spsua=doannuocuong::find($_GET['id']);
        return View('chuyenvien.food.formsuadoannuocuong')->with('spsua',$spsua);
    }

    public function suadoannuocuong()
    {
        $fixfood=doannuocuong::find($_POST['id']);
        $fixfood->tensp=$_POST['tensp'];
        $fixfood->gia=$_POST['gia'];
        $fixfood->donvitinh=$_POST['donvitinh'];
        $fixfood->save();
        echo "<script language='javascript'>
                                        alert('Sửa sản phẩm thành công !');
                                        window.location='/chuyenvien/dsdoannuocuong';  
                                    </script>";
    }

    public function xoadoannuocuong()
    {
        $id=0;
        $id=$_GET['id'];
        if($id!=0)
        {
            $foodxoa=doannuocuong::find($id);
            $foodxoa->delete();
            echo    "<script language='javascript'>
                    alert('Đã xóa sản phẩm !');
                    window.location='/chuyenvien/dsdoannuocuong';
                </script>";
        }
    }
}
