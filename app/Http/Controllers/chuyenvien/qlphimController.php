<?php

namespace App\Http\Controllers\chuyenvien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\rap\phim;
use App\theloai;
use App\danhsachtheloai;
use DB;

class qlphimController extends Controller
{
    //function phim
    public function danhsachphim()
    {
        session_start();
        $dsphim=DB::table('phims')->get();
        return View('chuyenvien.phim.qlphim')->with('dsphim',$dsphim);
    }

    public function formthemphim()
    {
        session_start();
        $theloaiphim=DB::table('theloais')->get();
        return View('chuyenvien.phim.themphim')->with('theloaiphim',$theloaiphim);
    }

    public function themphim(request $rq)
    {
        //quá trình thêm phim
        if($rq->hasFile('hinhanh'))
        {
            //dem tr khi them
            $ds1=DB::select('select * from phims');
            $count1=count($ds1);
            $dstheloai=DB::table('theloais')->get();
            //thong tin hinh
            $hinh=$rq->hinhanh;
            $tenhinh=$hinh->getClientOriginalName();
            //lay gia tri
            $tenphim=$rq->tenphim;
            $thoigianchieu=$rq->thoigianchieu;
            $theloai="";
            foreach ($dstheloai as $key => $value) {
                $check='check'.$value->id;
                if(isset($_POST["$check"]))
                {
                    if($theloai=="")
                        $theloai=$value->tentheloai;
                    else
                        $theloai=$theloai.",".$value->tentheloai;
                }
            }
            //them phim
            $phimmoi=new phim;
            $phimmoi->tenphim=$tenphim;
            $phimmoi->thoigianchieu=$thoigianchieu;
            $phimmoi->theloai=$theloai;
            $phimmoi->hinh=$tenhinh;
            $phimmoi->noidung=$_POST['noidung'];
            $phimmoi->linktrailer=$_POST['linktrailer'];
            $phimmoi->tinhtrang=$_POST['tinhtrang'];
            $phimmoi->save();
            $ds2=DB::select('select * from phims');
            $count2=count($ds2);
            if($count2>$count1)
            {
                //them hinh vao sever
                $hinh->move('./hinhphim', $hinh->getClientOriginalName());
            }
            //them vao ds the loai
            foreach ($dstheloai as $key => $value) {
                $check='check'.$value->id;
                if(isset($_POST["$check"]))
                {
                    $newdstl=new danhsachtheloai();
                    $newdstl->idphim=$phimmoi->id;
                    $newdstl->idtheloai=$value->id;
                    $newdstl->save();
                }
            }
            echo "<script language='javascript'>
                                        alert('Thêm phim thành công !');
                                        window.location='/chuyenvien/qlphim';  
                                    </script>";
        }
        else
        {
            echo "<script language='javascript'>
                                        alert('File hình ảnh lỗi,thêm phim thất bại !');
                                        window.location='/chuyenvien/qlphim';  
                                    </script>";
        }
        
    }

    public function formsuaphim()
    {
        session_start();
        $id=$_GET['id'];
        $phimsua=DB::select('select * from phims where id=?',[$id]);
        return View('chuyenvien.phim.suaphim')->with('phimsua',$phimsua);
    }

    public function suaphim(request $rq)
    {
        session_start();
        if(isset($_SESSION['chuyenvien']))
        {
            $id=$_POST['id'];
            $phimsua=phim::find($id);
            $phimsua->tenphim=$_POST['tenphim'];
            $phimsua->noidung=$_POST['noidung'];
            $phimsua->linktrailer=$_POST['linktrailer'];
            $phimsua->thoigianchieu=$_POST['thoigianchieu'];
            $phimsua->tinhtrang=$_POST['tinhtrang'];
            $phimsua->save();
            echo "<script language='javascript'>
                                        alert('Đã sửa thành công !');
                                        window.location='/chuyenvien/qlphim';  
                                    </script>";
        }
    }

    public function xoaphim()
    {
        //Quá xóa
        $id=$_GET['id'];
        $phimxoa=phim::find($id);
        if($phimxoa->hinh!="")
        {
            unlink("./hinhphim/".$phimxoa->hinh);
        }
        $dstheloai=DB::select('select * from danhsachtheloais where idphim=?',[$phimxoa->id]);
        foreach ($dstheloai as $key => $value) {
            $theloai=danhsachtheloai::find($value->id);
            $theloai->delete();
        }
        $phimxoa->delete();
        //Trả về view danh sách phim
        session_start();
        $dsphim=DB::table('phims')->get();
        return View('chuyenvien.phim.qlphim')->with('dsphim',$dsphim);
    }

    //test engine
    //return View('test')->with('dstheloai',$phimmoi);

    //fucntion theloai
    public function danhsachtheloai()
    {
        session_start();
        $theloaiphim=DB::table('theloais')->get();
        return View('chuyenvien.phim.qltheloai')->with('theloaiphim',$theloaiphim);
    }

    public function formthemtl()
    {
        session_start();
        return View('chuyenvien.phim.themtheloai');
    }

    public function themtheloai(Request $rq)
    {
        //Quá trình thêm
        $check=DB::table('theloais')->get();
        foreach ($check as $key => $value) {
            if($rq->tentheloai==$value->tentheloai)
            {
                 echo "<script language='javascript'>
                                        alert('Đã có thể loại này rồi !!');   
                                    </script>";
                session_start();
                return View('chuyenvien.phim.themtheloai');
            }
        }
        $theloai= new theloai;
        $theloai->tentheloai=$rq->tentheloai;
        $theloai->save();
        //Trả về view danh sách thể loại
        session_start();
        $theloaiphim=DB::table('theloais')->get();
        return View('chuyenvien.phim.qltheloai')->with('theloaiphim',$theloaiphim);
    }

    public function formthemtheloai()
    {
        session_start();
        $theloaiphim=DB::table('theloais')->get();
        return View('chuyenvien.phim.xoatheloai')->with('theloaiphim',$theloaiphim);
    }

    public function xoatheloai()
    {
        //Quá xóa
        $id=$_GET['id'];
        $theloaixoa=theloai::find($id);
        $theloaixoa->delete();
        //Trả về view danh sách thể loại
        session_start();
        $theloaiphim=DB::table('theloais')->get();
        return View('chuyenvien.phim.qltheloai')->with('theloaiphim',$theloaiphim);
    }
}
