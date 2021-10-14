<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class footerController extends Controller
{
    //
    public function hethongrap()
    {
        session_start();
        $dsrap=DB::select('select * from raps');
        $dstp=DB::select('select * from thanhphos');
        $dsquan=DB::select('select * from quans');
        return View('khachhangview.footer.hethongrap')->with('dsrap',$dsrap)->with('dsquan',$dsquan)->with('dstp',$dstp);
    }

    public function tuyendung()
    {
        session_start();
        return View('khachhangview.footer.tuyendung');
    }

    public function huongdandatve()
    {
        session_start();
        return View('khachhangview.footer.huongdandatve');
    }

    public function quydinhthanhvien()
    {
        session_start();
        return View('khachhangview.footer.quydinhthanhvien');
    }

    public function dieukhoan()
    {
        session_start();
        return View('khachhangview.footer.dieukhoan');
    }

    public function chinhsach()
    {
        session_start();
        return View('khachhangview.footer.chinhsach');
    }
}
