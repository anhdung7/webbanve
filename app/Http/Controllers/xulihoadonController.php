<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\hoadon;
use App\cthoadon;
use App\vephim;
use App\User;
use App\lichsudoidiem;

class xulihoadonController extends Controller
{
    public function datve()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        session_start();
        $check=DB::select('select * from suatchieus where id=?',[$_POST['idsuat']]);
        $tscheck=strtotime($check[0]->giochieu);
        $giocheck=date("H", $tscheck);
        $ngaycheck=date("d", $tscheck);
        $nowtime=date("H")+2;
        $nowdate=date("d");
        if($giocheck<$nowtime && $nowdate==$ngaycheck)
        {
            echo "<script language='javascript'>
                                            alert('Đã quá thời gian đặt vé !');
                                            window.location='/giohang';
                                        </script>";
        }
        else if(isset($_SESSION['user']))
        {
            $user=DB::select('select * from users where id=?',[$_SESSION['user']]);
            if($user[0]->rank==0)
                $sovedcphep=2;
            else if($user[0]->rank==1)
                $sovedcphep=4;
            else if($user[0]->rank==2)
                $sovedcphep=8;
            $dsgiave=DB::table('giaves')->get();
            $giave=$dsgiave[0]->gia;
            //tinh U22
            $today = date("Y");
            $sn =  date("Y",strtotime($user[0]->birthday));
            $sotuoi = $today - $sn;
            if($sotuoi<22)
            {
                $giave=$dsgiave[2]->gia;
            }
            //xu ly ds ghe dat
            $idphong=$_POST['idphong'];
            $idsuat=$_POST['idsuat'];
            $suat=DB::select('select * from suatchieus where id=?',[$idsuat]);
            //tinh suat dem
            $gettimestamp=strtotime($suat[0]->giochieu);
            $giochieuhour=date("H", $gettimestamp);
            if($giochieuhour>=23||$giochieuhour<6)
            {
                $giave=$dsgiave[3]->gia;
            }
            //suat dac biet
            if($suat[0]->dacbiet==1)
            {
                $giave=$dsgiave[4]->gia;
                $dacbiet=1;
            }
            else
                $dacbiet=0;
            $phim=DB::select('select * from phims where id=?',[$suat[0]->idphim]);
            $phong=DB::select('select * from phongchieus where id=?',[$idphong]);
            $dsghe=explode(",",$phong[0]->ghe);
            $dsghedat=array();
            foreach ($dsghe as $key => $value) {
                if(isset($_POST[$value]))
                {
                    $dsghedat[]=$value;
                }
            }
            if(count($dsghedat)<=$sovedcphep)
            {
                $trungghe=array();
                foreach ($dsghedat as $key => $value) 
                {
                    $check=0;
                    $checkghedoi=substr($value,0,1);
                    //return View('test')->with('checkghedoi',$checkghedoi)->with('dsghedat',$dsghedat);
                    if("L"==$checkghedoi)
                    {
                        if($dacbiet==1)
                            $giave=$dsgiave[5]->gia;
                        else
                            $giave=$dsgiave[1]->gia;
                    }
                    $checktrungghe=$_SESSION['giohang'];
                    foreach ($checktrungghe as $key => $valuecheck) {
                        if($valuecheck['vtghe']==$value && $valuecheck['idsuat']==$idsuat)
                        {
                            
                            $trungghe[]=$value;
                            $check=1;
                        }
                    }
                    //return View('test')->with('trungghe',$trungghe)->with('check1',$check1)->with('check2',$check2);
                    if($check==0)
                    {
                        $_SESSION['giohang'][]=array('theloai'=>'1','vtghe'=>$value,'tgchieu'=>$suat[0]->giochieu,'tenphim'=>$phim[0]->tenphim,'idsuat'=>$idsuat,'giave'=>$giave);      //the loai 1 la ve 
                    }
                }     
            }
            if(count($trungghe)==0)
                echo "<script language='javascript'>
                                                alert('Đã đăng kí thành công,hãy hoàn thành bước thanh toán để đặt vé !');
                                                window.location='/giohang';
                                            </script>";
            else
            {
                $dsghetrung="";
                foreach ($trungghe as $key => $value) {
                    $dsghetrung=$dsghetrung.$value." ";
                }
                echo "<script language='javascript'>
                                                alert('Đăng kí thành công các ghế không trùng,danh sách các ghế trùng là ".$dsghetrung." !');
                                                window.location='/giohang';
                                            </script>";
            }
        }
        else
        {
            echo "<script language='javascript'>
                        alert('Số vé được phép đặt là ".$sovedcphep.", mời quý khách đặt lại !');
                            window.location='/';
                    </script>";
        }
    }

    public function giohang()
    {
        session_start();
        return View('khachhangview.giohang');
    }

    public function xoagiohang()
    {
        session_start();
        $id=$_GET['id'];
        unset($_SESSION['giohang'][$id]);
        echo "<script language='javascript'>
                                            alert('Đã xóa sản phẩm !');
                                            window.location='/giohang';
                                        </script>";
    }

    public function fooddrink()
    {
        session_start();
        $dsfood=DB::select('select * from doannuocuongs');
        return View('khachhangview.fooddrink')->with('dsfood',$dsfood);
    }

    public function themfooddrink()
    {
        session_start();
        $dsfood=DB::select('select * from doannuocuongs');
        foreach ($dsfood as $key => $value) {
            $chuoi='soluong'.$value->id;
            if(isset($_POST[$chuoi]))
            {
                $temp=$_POST[$chuoi];
                if($temp>0)
                {
                    $gia=$temp*$value->gia;
                    $_SESSION['giohang'][]=array('theloai'=>'2','gia'=>$gia,'soluong'=>$temp,'tensp'=>$value->tensp,'idsp'=>$value->id);
                }
            }
        }
        echo "<script language='javascript'>
                                            alert('Đã thêm sản phẩm !');
                                            window.location='/giohang';
                                        </script>";
    }

    public function formthanhtoan()
    {
        session_start();
        $tongtien=0;
        $check=0;
        $dscthoadon=$_SESSION['giohang'];
        foreach ($dscthoadon as $key => $value) {
            if($value['theloai']==1)
            {   
                if($check==0) $check=1;
                $tongtien+=$value['giave'];
            }
            else
            {
                $tongtien+=$value['gia'];
            }
        }
        if($check==0)
        {
            echo "<script language='javascript'>
                                            alert('Chưa có vé phim được đặt !');
                                            window.location='/giohang';
                                        </script>";
        }
        else
            return View('khachhangview.formthanhtoan')->with('tongtien',$tongtien);
    }

    public function thanhtoan()
    {
        session_start();
        $user=DB::select('select * from users where id=?',[$_SESSION['user']]);
        if($user[0]->rank==0)
            $sovedcphep=2;
        else if($user[0]->rank==1)
            $sovedcphep=4;
        else if($user[0]->rank==2)
            $sovedcphep=8;
        $dssp=$_SESSION['giohang'];
        $sove=0;
        foreach ($dssp as $key => $value) {
            if($value['theloai']==1)
                $sove++;
        }
        $phuongthuc=$_POST['phuongthuc'];
        $checkpoint=0;
        $thanhtien=$_POST['thanhtien'];
        if($sovedcphep<$sove && $phuongthuc==1)
        {
            $checkpoint=1;
            echo "<script language='javascript'>
                                            alert('Quý khách chỉ được đặt ".$sovedcphep." vé, hãy đặt lại hay thanh toán bằng phương thức khác!');
                                            window.location='/giohang';
                                        </script>";
        }
        else if($phuongthuc==2)
        {
            $diem=$thanhtien/1000;
            if($diem>$user[0]->point)
            {
                $checkpoint=1;
                echo "<script language='javascript'>
                                            alert('Quý khách không đủ điểm để thanh toán !');
                                            window.location='/giohang';
                                        </script>";
            }
        }
        if($phuongthuc==3) //thanh toan bang the tin dung
        {
            echo "<script language='javascript'>
                                            alert('Hệ thống vẫn chưa có chức năng thanh toán qua thẻ.Xin lỗi quý khách !');
                                            window.location='/giohang';
                                        </script>";
        }
        else if($checkpoint==0) //them hoa don cho phuong thuc 1 va 2
        {
            $hoadon=new hoadon();
            $hoadon->idnguoidung=$user[0]->id;
            $hoadon->phone=$user[0]->phone;
            $hoadon->thanhtien=$thanhtien;
            $hoadon->tinhtrang=$phuongthuc;
            $hoadon->save();
            foreach ($dssp as $key => $value) 
            {
                if($value['theloai']==2) //food drink
                {
                    $cthd=new cthoadon();
                    $cthd->idhoadon=$hoadon->id;
                    $cthd->idsanpham=$value['idsp'];
                    $cthd->theloai=$value['theloai'];
                    $cthd->soluong=$value['soluong'];
                    $cthd->save();
                }
                else
                {
                    //xu li ve phim
                    $vephim=new vephim();
                    $vephim->idnguoidung=$user[0]->id;
                    $vephim->idsuatchieu=$value['idsuat'];
                    $vephim->giave=$value['giave'];
                    $vephim->vtghe=$value['vtghe'];
                    if($phuongthuc==1)
                        $vephim->tinhtrang=$phuongthuc;
                    else
                        $vephim->tinhtrang=$phuongthuc;
                    $vephim->save();
                    //xu li cthd
                    $cthd=new cthoadon();
                    $cthd->idhoadon=$hoadon->id;
                    $cthd->idsanpham=$vephim->id;
                    $cthd->theloai=$value['theloai'];
                    $cthd->soluong='1';
                    $cthd->save();
                }
            }
            if($phuongthuc==2)
            {
                $usertrudiem=User::find($user[0]->id);
                $usertrudiem->point=$usertrudiem->point-$diem;
                $usertrudiem->save();
                $lsdoidiem=new lichsudoidiem();
                $lsdoidiem->idnguoidung=$user[0]->id;
                $lsdoidiem->idsanpham='0';
                $lsdoidiem->soluong='1';
                $lsdoidiem->idhoadon=$hoadon->id;
                $lsdoidiem->sodiemdoi=$diem;
                $lsdoidiem->save();
            }
            unset($_SESSION['giohang']);
            $_SESSION['giohang']=array();
            if($phuongthuc==1)
                echo "<script language='javascript'>
                                            alert('Đã đặt vé thành công. Khi tới rạp quý khách hay đọc số điện thoại để thanh toán. Cảm ơn quý khách !');
                                            window.location='/giohang';
                                        </script>";
            else
                echo "<script language='javascript'>
                                            alert('Đã thanh toán thành công, điểm thưởng tương của quý khách đã bị trừ tương ứng. Khi tới rạp quý khách hãy đọc số điện thoại để nhận vé. Cảm ơn quý khách !');
                                            window.location='/giohang';
                                        </script>";
        }

        return View('test')->with('phuongthuc',$phuongthuc)->with('diem',$diem);
    }
}
