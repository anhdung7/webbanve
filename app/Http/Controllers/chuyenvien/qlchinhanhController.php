<?php

namespace App\Http\Controllers\chuyenvien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\thanhpho;
use App\quan;
use App\rap;
use DB;

class qlchinhanhController extends Controller
{
    public function dstpquan()
    {
        session_start();
        $dstp=DB::table('thanhphos')->get();
        return View('chuyenvien.chinhanh.dstpquan')->with('dstp',$dstp);
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
        return View('chuyenvien.chinhanh.dsrap')->with('dsrap',$dsrap)->with('dsquan',$dsquan);
    }

    public function listquan()
    {
        $idtp=$_GET['id'];
        $dsquan=DB::select('select * from quans where idthanhpho=?',[$idtp]);
        return View('chuyenvien.chinhanh.listquan')->with('dsquan',$dsquan)->with('idtp',$idtp);
    }

    public function formthemquantp()
    {
        $idtp=$_GET['id'];
        return View('chuyenvien.chinhanh.formthemquantp')->with('idtp',$idtp);
    }

    public function themquantp()
    {
        $idtp=$_POST['idtp'];
        $tenquan=$_POST['tenquan'];
        $quan= new quan;
        $quan->tenquan=$tenquan;
        $quan->idthanhpho=$idtp;
        $quan->save();
        echo "<script language='javascript'>
                                        alert('Thêm quận thành công!');
                                        window.location='/chuyenvien/dstpquan';
                                    </script>";
    }

    public function xoaquan()
    {
        $id=$_GET['id'];
        $quan= quan::find($id);
        $quan->delete();
        echo "<script language='javascript'>
                                        alert('Xóa quận thành công!');
                                        window.location='/chuyenvien/dstpquan';
                                    </script>";
    }

    public function formthemthanhpho()
    {
        session_start();
        return View('chuyenvien.chinhanh.formthemtp');
    }

    public function formthemrap()
    {
        session_start();
        $dsquan=DB::table('quans')->get();
        $temp=DB::table('thanhphos')->get();
        $dstp=array();
        foreach ($temp as $key => $value) {
            $dstp[$value->id] = $value->tenthanhpho;
        }
        return View('chuyenvien.chinhanh.formthemrap')->with('dsquan',$dsquan)->with('dstp',$dstp);
    }

    public function formlistquan()
    {
        $sl=$_GET['sl'];
        return View('chuyenvien.chinhanh.formlistquan')->with('sl',$sl);
    }

    public function themthanhpho()
    {
        session_start();
        $tenthanhpho=$_POST['nametp'];
        $tp= new thanhpho;
        $tp->tenthanhpho=$tenthanhpho;
        $tp->save();
        if(isset($_POST['soquan']))
        {
            $slquan=$_POST['soquan'];
            for ($i=1; $i <= $slquan; $i++) { 
                $temp="quan$i";
                $tenquan=$_POST[$temp];
                $quan=new quan;
                $quan->idthanhpho=$tp->id;
                $quan->tenquan=$tenquan;
                $quan->save();
            }
        }
        return redirect('/chuyenvien/dstpquan');
    }

    public function themrap()
    {
        session_start();
        $tenrap=$_POST['namerap'];
        $diachi=$_POST['diachi'];
        $idquan=$_POST['idquan'];
        $rap= new rap;
        $rap->tenrap=$tenrap;
        $rap->diachi=$diachi;
        $rap->idquan=$idquan;
        $rap->save();
        echo "<script language='javascript'>
                                        alert('Thêm rạp thành công!');
                                        window.location='/chuyenvien/dsrap';
                                    </script>";
    }

    public function xoathanhpho()
    {
        $id=$_GET['id'];
        $listquan=DB::select('select * from quans where idthanhpho =?',[$id]);
        foreach ($listquan as $key => $value) {
            $quan= quan::find($value->id);
            $quan->delete();
        }
        $thanhpho= thanhpho::find($id);
        $thanhpho->delete();
        echo "<script language='javascript'>
                                        alert('Xóa thành phố và các quận thành công!');
                                        window.location='/chuyenvien/dstpquan';
                                    </script>";
    }

    public function xoarap()
    {
        $id=$_GET['id'];
        $rap= rap::find($id);
        $rap->delete();
        echo "<script language='javascript'>
                                        alert('Xóa rạp thành công!');
                                        window.location='/chuyenvien/dsrap';
                                    </script>";
    }
}
