<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin;
use DB;

class adminController extends Controller
{
    //
    public function trangchinh()
    {
    	session_start();
    	if(isset($_SESSION['admin']))
    	{
    		return view('admin.mainadmin');
    	}
    	else
    		return view('admin.loginadmin');
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
                <script>window.location="/admin1";</script>
                <?php
            }
            else if($checkmk=="")
            {
                echo "<script language='javascript'>
                                        alert('Nhập mật khẩu !!');   
                                    </script>";
                ?>
                <script>window.location="/admin1";</script>
                <?php
            }
            else
            {
    		$check=DB::select('select * from admins where username= ?', [$taikhoan]);
    		if($check == null)
    		{
    			echo "<script language='javascript'>
										alert('Tài khoản không tồn tại');	
									</script>";
				?>
				<script>window.location="/admin1";</script>
				<?php
    		}
    		else
    		{
    			if($check[0]->username==$taikhoan)
    			{
    				if($check[0]->password==$matkhau)
    				{
    					session_start();
    					$_SESSION['admin']=$taikhoan;
						?>
						<script>window.location="/admin1";</script>
						<?php
    				}
    				else
    				{
    					echo "<script language='javascript'>
										alert('Sai mật khẩu!!');	
									</script>";
						?>
						<script>window.location="/admin1";</script>
						<?php
    				}
    			}
    			else
    			{
    				echo "<script language='javascript'>
										alert('Sai tài khoản!!');	
									</script>";
					?>
					<script>window.location="/admin1";</script>
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
				<script>window.location="/admin1";</script>
				<?php
    	}
    }

    public function dangxuat()
    {
    	session_start();
    	unset($_SESSION['admin']);
    	echo 	"<script language='javascript'>
					alert('Đã thoát đăng nhập');
					window.location='/admin1';
				</script>";
    }

    public function thongtin()
    {
        session_start();
        $admininfo=DB::select('select * from admins where username= ?', [$_SESSION['admin']]);
        return View('admin.info.thongtin')->with('admininfo',$admininfo);
    }

    public function formsuathongtin()
    {
        session_start();
        $admininfo=DB::select('select * from admins where username= ?', [$_SESSION['admin']]);
        return View('admin.info.formsuathongtin')->with('admininfo',$admininfo);
    }

    public function suathongtin()
    {
        session_start();
        $admin=DB::select('select * from admins where username= ?', [$_SESSION['admin']]);
        $fixadmin=admin::find($admin[0]->id);
        $fixadmin->name=$_POST['name'];
        $fixadmin->birthday=$_POST['birthday'];
        $fixadmin->phone=$_POST['phone'];
        $fixadmin->address=$_POST['address'];
        $fixadmin->save();
        echo    "<script language='javascript'>
                    alert('Sửa thông tin thành công');
                    window.location='/admin/thongtin';
                </script>";
    }

    public function formsuamatkhau()
    {
        session_start();
        return View('admin.info.formsuamatkhau');
    }

    public function suamatkhau()
    {
        session_start();
        $admin=DB::select('select * from admins where username= ?', [$_SESSION['admin']]);
        $check=$admin[0]->password;
        $oldpassword=$_POST['oldpassword'];
        $password=$_POST['password'];
        $checkpassword=$_POST['checkpassword'];
        if($check==MD5($oldpassword))
        {
            if($password==$checkpassword)
            {
                $fixadmin=admin::find($admin[0]->id);
                $fixadmin->password=MD5($password);
                $fixadmin->save();
                echo    "<script language='javascript'>
                            alert('Sửa mật khẩu thành công');
                            window.location='/admin/thongtin';
                        </script>";
            }
            else
            {
                echo    "<script language='javascript'>
                    alert('Mật khẩu mới sai cú pháp nhập lại !');
                    window.location='/admin/formsuamatkhau';
                </script>";
            }
        }
        else
        {
            echo    "<script language='javascript'>
                    alert('Sai mật khẩu cũ !');
                    window.location='/admin/formsuamatkhau';
                </script>";
        }
    }
}
