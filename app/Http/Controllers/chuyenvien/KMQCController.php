<?php

namespace App\Http\Controllers\chuyenvien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\hinhquangcao;
use App\rap\giave;
use App\khuyenmai;

class KMQCController extends Controller
{
    //
    public function dshinhquangcao()
    {
        session_start();
        $dshinh=DB::table('hinhquangcaos')->get();
        return View('chuyenvien.KMQC.dshinhquangcao')->with('dshinh',$dshinh);
    }

    public function formsuahinhquangcao()
    {
        session_start();
        $id=$_GET['id'];
        $hinhquangcao=DB::select("select * from hinhquangcaos where id=?",[$id]);
        return View('chuyenvien.KMQC.formsuahinhquangcao')->with('hinhquangcao',$hinhquangcao);
    }

    public function suahinhquangcao(request $rq)
    {
        if($rq->vitri<1 || $rq->vitri>5)
        {
            echo "<script language='javascript'>
                                        alert('Vị trí hình không được lớn hơn 5 và bé hơn 1 !');
                                        window.location='/chuyenvien/dshinhquangcao';  
                                    </script>";
        }
        else
        {
            $hinhquangcao= hinhquangcao::find($rq->id);
            if($rq->hasFile('filehinh'))
            {
                $hinh=$rq->filehinh;
                $tenhinh=$hinh->getClientOriginalName();
                $hinh->move('./anhquangcao', $hinh->getClientOriginalName());
                unlink("./anhquangcao/".$hinhquangcao->tenhinh);
                $hinhquangcao->tenhinh=$tenhinh;
            }
            if($hinhquangcao->vitri!=$rq->vitri)
            {
                $tim=DB::select('select * from hinhquangcaos where vitri=?',[$rq->vitri]);
                $hinhdoivt=hinhquangcao::find($tim[0]->id);
                $temp=$hinhquangcao->vitri;
                $hinhquangcao->vitri=$rq->vitri;
                $hinhdoivt->vitri=$temp;
                $hinhdoivt->save();
            }
            $hinhquangcao->save();
            return redirect('/chuyenvien/dshinhquangcao');
        }
    }

    public function dsgiave()
    {
        session_start();
        $dsgiave=DB::table('giaves')->get();
        return View('chuyenvien.KMQC.dsgiave')->with('dsgiave',$dsgiave);
    }

    public function formsuagiave()
    {
        session_start();
        $id=$_GET['id'];
        $giave=DB::select("select * from giaves where id=?",[$id]);
        return View('chuyenvien.KMQC.formsuagiave')->with('giave',$giave);
    }

    public function suagiave(request $rq)
    {
        session_start();
        if(isset($_SESSION['chuyenvien']))
        {
            $id=$_POST['id'];
            $giavesua=giave::find($id);
            $giavesua->gia=$_POST['gia'];
            $giavesua->save();
            echo "<script language='javascript'>
                                            alert('Sửa giá thành công !');
                                            window.location='/chuyenvien/dsgiave';  
                                        </script>";
        }
        else
        {
            echo "<script language='javascript'>
                                            alert('Hệ thống lỗi !');
                                            window.location='/';  
                                        </script>";
        }
    }

    public function dskhuyenmai()
    {
        session_start();
        $dskhuyenmai=DB::select('select * from khuyenmais');
        return View('chuyenvien.KMQC.dskhuyenmai')->with('dskhuyenmai',$dskhuyenmai);
    }

    public function formsuakhuyenmai()
    {
        
    }

    public function suakhuyenmai()
    {
        
    }

    public function formthemkhuyenmai()
    {
        session_start();
        return View('chuyenvien.KMQC.formthemkhuyenmai');
    }

    public function laymatacdong()
    {
        $id=$_GET['id'];
        if($id==1)//san pham
        {
            $dstacdong=DB::select('select * from doannuocuongs');
        }
        else //phim
        {
            $dstacdong=DB::select('select * from phims');
        }
        return View('chuyenvien.KMQC.dstacdong')->with('dstacdong',$dstacdong)->with('id',$id);
    }

    public function laygiagoc()
    {
        $id=$_GET['id'];
        $theloai=$_GET['theloai'];
        if($theloai==1)//sp
        {
            $laygia=DB::select('select * from doannuocuongs where id=?',[$id]);
            $gia=$laygia[0]->gia." VND";
        }
        else //phim
            $gia="Phim không có giá cụ thể";
        return View('chuyenvien.KMQC.giagoc')->with('gia',$gia);
    }

    public function laygiasaukm()
    {
        $idsp=$_GET['idsp'];
        $theloai=$_GET['theloai'];
        $phantram=$_GET['phantram'];
        if($theloai==2)
        {
            $giasaukm="Phim không có giá cụ thể";
        }
        else
        {
            $laygia=DB::select('select * from doannuocuongs where id=?',[$idsp]);
            $giasaukm=round($laygia[0]->gia*(100-$phantram)/100,-3);
        }
        return View('chuyenvien.KMQC.giasaukm')->with('giasaukm',$giasaukm);
    }

    public function themkhuyenmai()
    {
        session_start();
        if(isset($_SESSION['chuyenvien']))
        {
            $noidung=$_POST['noidung'];
            if(strlen($noidung)>2000)
            {
                echo "<script language='javascript'>
                                            alert('Nội dung dài hơn 2000 kí tự !');
                                            window.location='/chuyenvien/formthemkhuyenmai';  
                                        </script>";
            }
            else if($_POST['theloai']==0)
            {
                echo "<script language='javascript'>
                                            alert('Chưa chọn thể loại !');
                                            window.location='/chuyenvien/formthemkhuyenmai';  
                                        </script>";
            }
            else if($_POST['idtacdong']==0)
            {
                echo "<script language='javascript'>
                                            alert('Chưa chọn sản phẩm !');
                                            window.location='/chuyenvien/formthemkhuyenmai';  
                                        </script>";
            }
            else
            {
                $khuyenmaithem=new khuyenmai();
                $khuyenmaithem->tenchuongtrinh=$_POST['tenchuongtrinh'];
                $khuyenmaithem->noidung=$noidung;
                $khuyenmaithem->tgbatdau=$_POST['tgbatdau'];
                $khuyenmaithem->tgketthuc=$_POST['tgketthuc'];
                $khuyenmaithem->theloai=$_POST['theloai'];
                $khuyenmaithem->idtacdong=$_POST['idtacdong'];
                $khuyenmaithem->phantramkm=$_POST['phantramkm'];
                $khuyenmaithem->save();
                echo "<script language='javascript'>
                                            alert('Đã thêm khuyến mãi !');
                                            window.location='/chuyenvien/dskhuyenmai';  
                                        </script>";
            }
        }
    }

    public function xoakhuyenmai()
    {
        session_start();
        if(isset($_SESSION['chuyenvien']))
        {
            $id=$_GET['id'];
            $kmxoa=khuyenmai::find($id);
            $kmxoa->delete();
            echo "<script language='javascript'>
                                            alert('Đã xóa thành công !');
                                            window.location='/chuyenvien/dskhuyenmai';  
                                        </script>";
        }
        else
        {
            echo "<script language='javascript'>
                                            alert('Hệ thống lỗi !');
                                            window.location='/';  
                                        </script>";
        }
    }
}

