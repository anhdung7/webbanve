<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhanvien;
use DB;
use App\vephim;
use App\hoadon;
use App\lichsuhoadon;
use App\User;

class nhanvienController extends Controller
{
    public function trangchinh()
    {
        session_start();
        if(isset($_SESSION['nhanvien']))
        {
            return view('nhanvien.mainnhanvien');
        }
        else
            return view('nhanvien.loginnhanvien');
    }

    public function kiemtradangnhap()
    {
        if(isset($_POST['login']))
        {
            $taikhoan=$_POST['username'];
            $matkhau=MD5($_POST['password']);
            $checkmk=$_POST['password'];
            if($taikhoan=="")
            {
                echo "<script language='javascript'>
                                        alert('Nhập tài khoản !!');   
                                    </script>";
                ?>
                <script>window.location="/nhanvien1";</script>
                <?php
            }
            else if($checkmk=="")
            {
                echo "<script language='javascript'>
                                        alert('Nhập mật khẩu !!');   
                                    </script>";
                ?>
                <script>window.location="/nhanvien1";</script>
                <?php
            }
            else
            {
            $check=DB::select('select * from nhanviens where username= ?', [$taikhoan]);
            if($check == null)
            {
                echo "<script language='javascript'>
                                        alert('Tài khoản không tồn tại');   
                                    </script>";
                ?>
                <script>window.location="/nhanvien1";</script>
                <?php
            }
            else
            {
                if($check[0]->username==$taikhoan)
                {
                    if($check[0]->password==$matkhau)
                    {
                        session_start();
                        $_SESSION['nhanvien']=$taikhoan;
                        ?>
                        <script>window.location="/nhanvien1";</script>
                        <?php
                    }
                    else
                    {
                        echo "<script language='javascript'>
                                        alert('Sai mật khẩu!!');    
                                    </script>";
                        ?>
                        <script>window.location="/nhanvien1";</script>
                        <?php
                    }
                }
                else
                {
                    echo "<script language='javascript'>
                                        alert('Sai tài khoản!!');   
                                    </script>";
                    ?>
                    <script>window.location="/nhanvien1";</script>
                    <?php
                }
            }
            }
        }
        else
        {
            echo "<script language='javascript'>
                                        alert('Đăng nhập lỗi!!!');  
                                    </script>";
                ?>
                <script>window.location="/nhanvien1";</script>
                <?php
        }
    }

    public function dangxuat()
    {
        session_start();
        unset($_SESSION['nhanvien']);
        echo    "<script language='javascript'>
                    alert('Đã thoát đăng nhập');
                    window.location='/nhanvien1';
                </script>";
    }

    public function thongtin()
    {
        session_start();
        $nhanvieninfo=DB::select('select * from nhanviens where username= ?', [$_SESSION['nhanvien']]);
        return View('nhanvien.info.thongtin')->with('nhanvieninfo',$nhanvieninfo);
    }

    public function formsuathongtin()
    {
        session_start();
        $nhanvieninfo=DB::select('select * from nhanviens where username= ?', [$_SESSION['nhanvien']]);
        return View('nhanvien.info.formsuathongtin')->with('nhanvieninfo',$nhanvieninfo);
    }

    public function suathongtin()
    {
        session_start();
        $nhanvien=DB::select('select * from nhanviens where username= ?', [$_SESSION['nhanvien']]);
        $fixnhanvien=nhanvien::find($nhanvien[0]->id);
        $fixnhanvien->name=$_POST['name'];
        $fixnhanvien->birthday=$_POST['birthday'];
        $fixnhanvien->phone=$_POST['phone'];
        $fixnhanvien->address=$_POST['address'];
        $fixnhanvien->save();
        echo    "<script language='javascript'>
                    alert('Sửa thông tin thành công');
                    window.location='/nhanvien/thongtin';
                </script>";
    }

    public function formsuamatkhau()
    {
        session_start();
        return View('nhanvien.info.formsuamatkhau');
    }

    public function suamatkhau()
    {
        session_start();
        $nhanvien=DB::select('select * from nhanviens where username= ?', [$_SESSION['nhanvien']]);
        $check=$nhanvien[0]->password;
        $oldpassword=$_POST['oldpassword'];
        $password=$_POST['password'];
        $checkpassword=$_POST['checkpassword'];
        if($check==MD5($oldpassword))
        {
            if($password==$checkpassword)
            {
                $fixnhanvien=nhanvien::find($nhanvien[0]->id);
                $fixnhanvien->password=MD5($password);
                $fixnhanvien->save();
                echo    "<script language='javascript'>
                            alert('Sửa mật khẩu thành công');
                            window.location='/nhanvien/thongtin';
                        </script>";
            }
            else
            {
                echo    "<script language='javascript'>
                    alert('Mật khẩu mới sai cú pháp nhập lại !');
                    window.location='/nhanvien/formsuamatkhau';
                </script>";
            }
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Sai mật khẩu cũ !');
                    window.location='/nhanvien/formsuamatkhau';
                </script>";
        }
    }

    public function dshoadonchuaduyet()
    {
        session_start();
        if(isset($_GET['sdt']))
        {
            $sdt=$_GET['sdt'];
            $dshoadon=DB::select('select * from hoadons where tinhtrang=1 and phone=? ORDER BY id DESC',[$sdt]);
        }
        else
        {
            $dshoadon=DB::select('select * from hoadons where tinhtrang=1 ORDER BY id DESC');
        }
        return View('nhanvien.hoadon.dshoadonchuaduyet')->with('dshoadon',$dshoadon);
    }

    public function timhoadonsdt()
    {
        $sdt=$_GET['sdt'];
        $link="/nhanvien/dshoadonchuaduyet?sdt=".$sdt;
        return redirect($link);
    }

    public function formkiemduyet()
    {
        session_start();
        $idhoadon=$_GET['idhoadon'];
        $hoadon=DB::select('select * from hoadons where id=? ORDER BY id DESC',[$idhoadon]);
        $khach=DB::select('select * from users where id=?',[$hoadon[0]->idnguoidung]);
        return View('nhanvien.hoadon.formkiemduyet')->with('hoadon',$hoadon)->with('khach',$khach);
    }

    public function kiemduyethoadon()
    {
        session_start();
        $nhanvien=DB::select('select * from nhanviens where username= ?', [$_SESSION['nhanvien']]);
        $idhoadon=$_POST['idhoadon'];
        $tinhtrang=$_POST['tinhtrang'];
        $hoadon=hoadon::find($idhoadon);
        $dscthoadon=DB::select('select * from cthoadons where idhoadon=?',[$idhoadon]);
        //tinh trang =2 -> duyet / =3 -> huy
        if($tinhtrang==2)
        {
            //doitinhtrang ve
            foreach ($dscthoadon as $key => $value) {
                if($value->theloai==1) //theloai 1 la ve phim 2 la food
                {
                    $vephim= vephim::find($value->idsanpham);
                    $vephim->tinhtrang=2;
                    $vephim->save();
                }
            }
            //duyet hoa don
            $hoadon->tinhtrang=2;
            $hoadon->save();
            //lich su hoa don
            $lichsuhoadon=new lichsuhoadon();
            $lichsuhoadon->idhoadon=$idhoadon;
            $lichsuhoadon->idnhanvien=$nhanvien[0]->id;
            $lichsuhoadon->tacvu=1; //1 la duyet 2 la huy
            $lichsuhoadon->save();
            //cong diem
            $diem=$hoadon->thanhtien/10000;
            $user=User::find($hoadon->idnguoidung);
            $user->point=$user->point+$diem;
            $user->save();
            //chuyen sang form in ve
            echo    "<script language='javascript'>
                    alert('Đã duyệt hóa đơn thành công, tiếp tục để chuyển sang in vé !');
                    window.location='/nhanvien/inhoadon?idhoadon=".$idhoadon."';
                </script>";
        }
        else if($tinhtrang==3)
        {
            //doitinhtrang ve
            foreach ($dscthoadon as $key => $value) {
                if($value->theloai==1) //theloai 1 la ve phim 2 la food
                {
                    $vephim= vephim::find($value->idsanpham);
                    $vephim->tinhtrang=3;
                    $vephim->save();
                    $dsve[]=$value->idsanpham;
                }
            }
            //huy hoa don
            $hoadon->tinhtrang=3;
            $hoadon->save();
            //lich su hoa don
            $lichsuhoadon=new lichsuhoadon();
            $lichsuhoadon->idhoadon=$idhoadon;
            $lichsuhoadon->idnhanvien=$nhanvien[0]->id;
            $lichsuhoadon->tacvu=2; //1 la duyet 2 la huy
            $lichsuhoadon->save();
            echo    "<script language='javascript'>
                    alert('Đã hủy hóa đơn !');
                    window.location='/nhanvien/dshoadonchuaduyet';
                </script>";
        }
        
    }

    public function lichsukiemduyet()
    {
        session_start();
        $nhanvien=DB::select('select * from nhanviens where username= ?', [$_SESSION['nhanvien']]);
        $idnhanvien=$nhanvien[0]->id;
        $dslichsuhoadon=DB::select('select * from lichsuhoadons where idnhanvien=? ORDER BY id DESC',[$idnhanvien]);
        return View('nhanvien.hoadon.lichsuhoadon')->with('dslichsuhoadon',$dslichsuhoadon);
    }

    public function inhoadondaduyet()
    {
        session_start();
        if(isset($_GET['sdt']))
        {
            $sdt=$_GET['sdt'];
            $dshoadon=DB::select('select * from hoadons where tinhtrang=2 and phone=? ORDER BY id DESC',[$sdt]);
        }
        else
        {
            $dshoadon=DB::select('select * from hoadons where tinhtrang=2 ORDER BY id DESC');
        }
        return View('nhanvien.hoadon.inhoadondaduyet')->with('dshoadon',$dshoadon);
    }

    public function timinhoadonsdt()
    {
        $sdt=$_GET['sdt'];
        $link="/nhanvien/inhoadondaduyet?sdt=".$sdt;
        return redirect($link);
    }

    public function inhoadon()
    {
        session_start();
        $idhoadon=$_GET['idhoadon'];
        $dsve=array();
        $dsfood=array();
        $check=hoadon::find($idhoadon);
        if($check->tinhtrang==2)
        {

            $dscthoadon=DB::select('select * from cthoadons where idhoadon=?',[$idhoadon]);
            foreach ($dscthoadon as $key => $value) {
                if($value->theloai==1) //theloai 1 la ve phim 2 la food
                {
                    $dsve[]=$value->idsanpham;
                }
                else
                {
                    $food=DB::select('select * from doannuocuongs where id=?',[$value->idsanpham]);
                    $dsfood[]=array('tensp'=>$food[0]->tensp,'soluong'=>$value->soluong,'gia'=>$food[0]->gia);
                }
            }
            $sql='select * from vephims where ';
            $tong=count($dsve);
            $dem=1;
            foreach ($dsve as $key => $value) {
                $sql=$sql.'id='.$value;
                if($dem<$tong)
                {
                    $sql=$sql.' or ';
                    $dem++;
                }
            }
            $dsvein=DB::select($sql);
            return View('nhanvien.hoadon.inve')->with('dsvein',$dsvein)->with('dsfood',$dsfood);
        }
        else
            echo    "<script language='javascript'>
                    alert('Hóa đơn này chưa thanh toán !');
                    window.location='/nhanvien/inhoadondaduyet';
                </script>";
    }
}
