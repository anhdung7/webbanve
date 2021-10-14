<?php

namespace App\Http\Controllers\boss;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\rap\admin;
use App\rap\nhanvien;
use App\thanhpho;
use App\quan;
use App\rap;

class rap1Controller extends Controller
{
    //
    public function dsquanly()
    {
    	session_start();
    	$dsquanly=DB::table('admins')->get();
    	$temp=DB::table('raps')->get();
        $dsrap=array();
        foreach ($temp as $key => $value) {
            $dsrap[$value->id]=$value->tenrap;
        }
    	return View('boss.rap.dsquanly')->with('dsquanly',$dsquanly)->with('dsrap',$dsrap);
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
        return View('boss.rap.dsnhanvien')->with('dsnhanvien',$dsnhanvien)->with('dsrap',$dsrap);
    }

    public function dschuyenvien()
    {
        session_start();
        $dschuyenvien=DB::table('chuyenvienhethongs')->get();
        return View('boss.rap.dschuyenvien')->with('dschuyenvien',$dschuyenvien);
    }

    public function dstpquan()
    {
        session_start();
        $dstp=DB::table('thanhphos')->get();
        return View('boss.rap.dstpquan')->with('dstp',$dstp);
    }

    public function dsrap()
    {
        session_start();
        $dsrap=DB::table('raps')->get();
        $tempquan=DB::table('quans')->get();
        $temptp=DB::table('thanhphos')->get();
        $dstp=array();
        foreach ($temptp as $key => $value) {
            $dstp[$value->id] = $value->tenthanhpho;
        }
        $dsquan=array();
        foreach ($tempquan as $key => $value) {
            $dsquan[$value->id] = array('tenquan'=>$value->tenquan,'tentp'=>$dstp[$value->idthanhpho]);
        }
        return View('boss.rap.dsrap')->with('dsrap',$dsrap)->with('dsquan',$dsquan);
    }

    public function listquan()
    {
        $idtp=$_GET['id'];
        $dsquan=DB::select('select * from quans where idthanhpho=?',[$idtp]);
        return View('boss.rap.listquan')->with('dsquan',$dsquan)->with('idtp',$idtp);
    }
}
