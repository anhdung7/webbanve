<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\boss;
use App\admin;
use App\nhanvien;
use App\chuyenvienhethong;

class bossController extends Controller
{
    //
    public function trangchinh()
    {
    	session_start();
    	if(isset($_SESSION['boss']))
    	{
    		return view('boss.mainboss');
    	}
    	else
    		return view('boss.loginboss');
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
                <script>window.location="/boss1";</script>
                <?php
            }
            else if($checkmk=="")
            {
                echo "<script language='javascript'>
                                        alert('Nhập mật khẩu !!');   
                                    </script>";
                ?>
                <script>window.location="/boss1";</script>
                <?php
            }
            else
            {
    		$check=DB::select('select * from bosses where username= ?', [$taikhoan]);
    		if($check == null)
    		{
    			echo "<script language='javascript'>
										alert('Tài khoản không tồn tại');	
									</script>";
				?>
				<script>window.location="/boss1";</script>
				<?php
    		}
    		else
    		{
    			if($check[0]->username==$taikhoan)
    			{
    				if($check[0]->password==$matkhau)
    				{
    					session_start();
    					$_SESSION['boss']=$taikhoan;
						?>
						<script>window.location="/boss1";</script>
						<?php
    				}
    				else
    				{
    					echo "<script language='javascript'>
										alert('Sai mật khẩu!!');	
									</script>";
						?>
						<script>window.location="/boss1";</script>
						<?php
    				}
    			}
    			else
    			{
    				echo "<script language='javascript'>
										alert('Sai tài khoản!!');	
									</script>";
					?>
					<script>window.location="/boss1";</script>
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
				<script>window.location="/boss1";</script>
				<?php
    	}
    }

    public function dangxuat()
    {
    	session_start();
    	unset($_SESSION['boss']);
    	echo 	"<script language='javascript'>
					alert('Đã thoát đăng nhập');
					window.location='/boss1';
				</script>";
    }

    public function thongtin()
    {
        session_start();
        if(isset($_SESSION['boss']))
        {
            $bossinfo=DB::select('select * from bosses where username= ?', [$_SESSION['boss']]);
            return View('boss.info.thongtin')->with('bossinfo',$bossinfo);
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Lỗi hệ thống');
                    window.location='/';
                </script>";
        }
    }

    public function formsuathongtin()
    {
        session_start();
        if(isset($_SESSION['boss']))
        {
            $bossinfo=DB::select('select * from bosses where username= ?', [$_SESSION['boss']]);
            return View('boss.info.formsuathongtin')->with('bossinfo',$bossinfo);
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Lỗi hệ thống');
                    window.location='/';
                </script>";
        }
    }

    public function suathongtin()
    {
        session_start();
        if(isset($_SESSION['boss']))
        {
            $bossinfo=DB::select('select * from bosses where username= ?', [$_SESSION['boss']]);
            $fixboss=boss::find($bossinfo[0]->id);
            $fixboss->name=$_POST['name'];
            $fixboss->phone=$_POST['phone'];
            $fixboss->email=$_POST['email'];
            $fixboss->save();
            echo    "<script language='javascript'>
                        alert('Sửa thông tin thành công');
                        window.location='/boss/thongtin';
                    </script>";
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Lỗi hệ thống');
                    window.location='/';
                </script>";
        }
    }

    public function formsuamatkhau()
    {
        session_start();
        if(isset($_SESSION['boss']))
        {
            return View('boss.info.formsuamatkhau');
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Lỗi hệ thống');
                    window.location='/';
                </script>";
        }
    }

    public function suamatkhau()
    {
        session_start();
        if(isset($_SESSION['boss']))
        {
            $bossinfo=DB::select('select * from bosses where username= ?', [$_SESSION['boss']]);
            $check=$bossinfo[0]->password;
            $oldpassword=$_POST['oldpassword'];
            $password=$_POST['password'];
            $checkpassword=$_POST['checkpassword'];
            if($check==MD5($oldpassword))
            {
                if($password==$checkpassword)
                {
                    $fixboss=boss::find($bossinfo[0]->id);
                    $fixboss->password=MD5($password);
                    $fixboss->save();
                    echo    "<script language='javascript'>
                                alert('Sửa mật khẩu thành công');
                                window.location='/boss/thongtin';
                            </script>";
                }
                else
                {
                    echo    "<script language='javascript'>
                        alert('Mật khẩu mới sai cú pháp nhập lại !');
                        window.location='/boss/formsuamatkhau';
                    </script>";
                }
            }
            else
            {
                echo    "<script language='javascript'>
                        alert('Sai mật khẩu cũ !');
                        window.location='/boss/formsuamatkhau';
                    </script>";
            }
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Lỗi hệ thống');
                    window.location='/';
                </script>";
        }
    }

    public function khoitaoboss()
    {
        $check=DB::select('select * from bosses');
        if($check==null)
        {
        	$boss=new boss();
        	$boss->username="boss321";
        	$boss->password=MD5("boss321");
        	$boss->name="Ông chủ";
        	$boss->phone="0966036315";
        	$boss->email="adstyles7@gmail.com";
        	$boss->save();
        	echo 	"<script language='javascript'>
    					alert('Khởi tạo xong');
    					window.location='/boss1';
    				</script>";
        }
        else
        {
            echo    "<script language='javascript'>
                        alert('Chào mừng đến rạp phim');
                        window.location='/';
                    </script>";
        }
    }

    public function xoaquanly()
    {
        session_start();
        if(isset($_SESSION['boss']))
        {
            $id=0;
        	$id=$_GET['id'];
        	if($id!=0)
        	{
        		$qlxoa=admin::find($id);
        		$qlxoa->delete();
        		echo 	"<script language='javascript'>
    					alert('Đã xóa quản lý');
    				</script>";
        	}
        	$link='/boss/dsquanlyrap';
    		return redirect($link);
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Lỗi hệ thống');
                    window.location='/';
                </script>";
        }
    }

    public function xoanhanvien()
    {
        session_start();
        if(isset($_SESSION['boss']))
        {
        	$id=0;
        	$id=$_GET['id'];
        	if($id!=0)
        	{
        		$nvxoa=nhanvien::find($id);
        		$nvxoa->delete();
        		echo 	"<script language='javascript'>
    					alert('Đã xóa nhân viên');
    				</script>";
        	}
        	$link='/boss/dsnhanvienrap';
    		return redirect($link);
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Lỗi hệ thống');
                    window.location='/';
                </script>";
        }
    }

    public function formthemchuyenvien()
    {
        session_start();
        if(isset($_SESSION['boss']))
        {
            return View('boss.formthemchuyenvien');
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Lỗi hệ thống');
                    window.location='/';
                </script>";
        }
    }

    public function themchuyenvien()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        session_start();
        if(isset($_SESSION['boss']))
        {
            $check=DB::select('select * from chuyenvienhethongs');
            // $check=DB::select('select * from chuyenvienhethongs where username=?',[$_POST['username']]);
            // $checkphone=DB::select('select * from chuyenvienhethongs where phone=?',[$_POST['phone']]);
            //if($check==null && $checkphone==null)
            if($check==null)
            {
                $layngay=strtotime($_POST['birthday']);
                $checknam=date("Y", $layngay);
                $tuoi=date("Y")-$checknam;
                if($tuoi>18)
                {
                    $newcv=new chuyenvienhethong();
                    $newcv->name=$_POST['name'];
                    $newcv->birthday=$_POST['birthday'];
                    $newcv->phone=$_POST['phone'];
                    $newcv->address=$_POST['address'];
                    $newcv->username=$_POST['username'];
                    $newcv->password=MD5($_POST['password']);
                    $newcv->save();
                    echo    "<script language='javascript'>
                                alert('Đã thêm chuyên viên');
                            </script>";
                    $link='/boss/dschuyenvien';
                    return redirect($link);
                }
                else
                {
                    echo    "<script language='javascript'>
                                alert('Năm sinh không hợp lệ!');
                                window.location='/boss/formthemchuyenvien';
                            </script>";
                }
            }
            else
            {
                //alert('Trùng tên tài khoản hãy nhập tài khoản khác !');
                echo "<script language='javascript'>
                                            alert('Hệ thống chỉ được có 1 chuyên viên !');
                                            window.location='/boss/formthemchuyenvien';  
                                        </script>";
            }
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Lỗi hệ thống');
                    window.location='/';
                </script>";
        }
    }

    public function xoachuyenvien()
    {
        session_start();
        if(isset($_SESSION['boss']))
        {
            $id=0;
            $id=$_GET['id'];
            if($id!=0)
            {
                $cvxoa=chuyenvienhethong::find($id);
                $cvxoa->delete();
                echo    "<script language='javascript'>
                        alert('Đã xóa chuyên viên');
                    </script>";
            }
            $link='/boss/dschuyenvien';
            return redirect($link);
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Lỗi hệ thống');
                    window.location='/';
                </script>";
        }
    }
}
