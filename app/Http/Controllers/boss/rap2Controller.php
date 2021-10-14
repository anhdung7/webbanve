<?php

namespace App\Http\Controllers\boss;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class rap2Controller extends Controller
{
    //
    public function dssuatchieu()
    {
        session_start();
        $dssuatchieu=DB::select('select * from suatchieus');
        $temp=DB::table('phims')->get();
        $tempphong=DB::table('phongchieus')->get();
        $temprap=DB::table('raps')->get();
        $dsphim=array();
        foreach ($temp as $key => $value) {
            $dsphim[$value->id]=$value->tenphim;
        }
        $dsphong=array();
        foreach ($tempphong as $key => $value) {
            $dsphong[$value->id]=$value->sophong;
        }
        $dsrap=array();
        foreach ($temprap as $key => $value) {
            $dsrap[$value->id]=$value->tenrap;
        }
        return View('boss.suatchieu.dssuatchieu')->with('dssuatchieu',$dssuatchieu)->with('dsphim',$dsphim)->with('dsphong',$dsphong)->with('dsrap',$dsrap);
    }

    public function lssuatchieu()
    {
        session_start();
        $lssuatchieu=DB::table('lichsusuatchieus')->get();
        $temp=DB::table('admins')->get();
        $dsadmin=array();
        foreach ($temp as $key => $value) {
            $dsadmin[$value->id]=$value->name;
        }
        return View('boss.suatchieu.lssuatchieu')->with('lssuatchieu',$lssuatchieu)->with('dsadmin',$dsadmin);
    }

    public function dsfood()
    {
        session_start();
        $dsfood=DB::table('doannuocuongs')->get();
        return View('boss.rap.dsfood')->with('dsfood',$dsfood);
    }

    public function dskhachhang()
    {
        session_start();
        $dskhachhang=DB::table('users')->get();
        return View('boss.rap.dskhachhang')->with('dskhachhang',$dskhachhang);
    }

    public function bangdoidiem()
    {
        session_start();
        $bangdoidiem=DB::table('bangdoidiems')->get();
        return View('boss.bangdiem.bangdoidiem')->with('bangdoidiem',$bangdoidiem);
    }

    public function lsdoidiem()
    {
        session_start();
        $tempbang=DB::table('bangdoidiems')->get();
        $tempuser=DB::table('users')->get();
        $lsdoidiem=DB::table('lichsudoidiems')->get();
        $bangdoidiem=array();
        foreach ($tempbang as $key => $value) {
            $bangdoidiem[$value->id]=array('tenqua'=>$value->tenqua,'diem'=>$value->sodiemdoi);
        }
        $dsnguoidung=array();
        foreach ($tempuser as $key => $value) {
            $dsnguoidung[$value->id]=$value->name;
        }
        return View('boss.bangdiem.lsdoidiem')->with('lsdoidiem',$lsdoidiem)->with('bangdoidiem',$bangdoidiem)->with('dsnguoidung',$dsnguoidung);
    }

    public function botriphong()
    {
        session_start();
        $dsrap=DB::select('select * from raps');
        return View('boss.phongchieu.botriphong')->with('dsrap',$dsrap);
    }

    public function phongtheosuat()
    {
        session_start();
        $dsrap=DB::select('select * from raps');
        return View('boss.phongchieu.phongtheosuat')->with('dsrap',$dsrap);
    }

    public function phongthuocrap()
    {
        $dsphong=DB::select('select * from phongchieus where idrap=?',[$_GET['idrap']]);
        return View('boss.phongchieu.laydsphong')->with('dsphong',$dsphong);
    }

    public function suatthuocphong()
    {
        $dssuat=DB::select('select * from suatchieus where idphong=?',[$_GET['idphong']]);
        return View('boss.phongchieu.laydssuat')->with('dssuat',$dssuat);
    }

    public function phimthuocsuat()
    {
        $suat=DB::select('select * from suatchieus where id=?',[$_GET['idsuat']]);
        $phim=DB::select('select * from phims where id=?',[$suat[0]->idphim]);
        return View('boss.phongchieu.tenphim')->with('phim',$phim);
    }

}
