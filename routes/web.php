<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//loginroutes

Auth::routes(['verify' => true]);

Route::get('/registered','rapphimController@registered');

Route::get('/notconfirm','rapphimController@notconfirm');

//test api routes
Route::get('/APIhoadon','APIController@infohoadon');

Route::get('/logingoogle','APIController@loginGG');

Route::get('/logoutgoogle','APIController@logoutGG');

//rapphim routes
Route::get('/test','rapphimController@test');

Route::get('/','rapphimController@index');

Route::get('/phim','rapphimController@chonphim');

Route::get('/timphim','rapphimController@timphim');

Route::get('/chonngaysuat','rapphimController@chonngaysuat');

Route::get('/suat','rapphimController@chonsuat')->middleware('verified');

//footer routes

Route::get('/hethongrap','footerController@hethongrap');

Route::get('/tuyendung','footerController@tuyendung');

Route::get('/huongdandatve','footerController@huongdandatve');

Route::get('/quydinhthanhvien','footerController@quydinhthanhvien');

Route::get('/dieukhoan','footerController@dieukhoan');

Route::get('/chinhsach','footerController@chinhsach');

//hoa don,hang hoa,gio hang user routes

Route::post('/datve','xulihoadonController@datve');

Route::get('/fooddrink','xulihoadonController@fooddrink');

Route::post('/themfooddrink','xulihoadonController@themfooddrink');

Route::get('/giohang','xulihoadonController@giohang');

Route::get('/xoagiohang','xulihoadonController@xoagiohang');

Route::get('/formthanhtoan','xulihoadonController@formthanhtoan');

Route::post('/thanhtoan','xulihoadonController@thanhtoan');

//user routes

Route::get('/thongtin','rapphimController@thongtin');

Route::get('/formsuathongtin','rapphimController@formsuathongtin');

Route::post('/suathongtin','rapphimController@suathongtin');

Route::get('/formsuamatkhau','rapphimController@formsuamatkhau');

Route::post('/suamatkhau','rapphimController@suamatkhau');

Route::get('/dsdoidiem','rapphimController@dsdoidiem');

//boss routes 

route::get('/boss1','bossController@trangchinh');

route::post('/checkloginboss','bossController@kiemtradangnhap');

route::get('/newboss','bossController@khoitaoboss');

route::get('/logoutboss','bossController@dangxuat');

Route::get('/boss/thongtin','bossController@thongtin');

Route::get('/boss/formsuathongtin','bossController@formsuathongtin');

Route::post('/boss/suathongtin','bossController@suathongtin');

Route::get('/boss/formsuamatkhau','bossController@formsuamatkhau');

Route::post('/boss/suamatkhau','bossController@suamatkhau');

//quan ly nhan vien boss route

route::get('/boss/formthemchuyenvien','bossController@formthemchuyenvien');

route::post('/boss/themchuyenvien','bossController@themchuyenvien');

route::get('/boss/xoachuyenvien','bossController@xoachuyenvien');

route::get('/boss/xoanhanvien','bossController@xoanhanvien');

route::get('/boss/xoaquanly','bossController@xoaquanly');

//ql cac rap (boss)

route::get('/boss/dsquanlyrap','boss\rap1Controller@dsquanly');

route::get('/boss/dsnhanvienrap','boss\rap1Controller@dsnhanvien');

route::get('/boss/dschuyenvien','boss\rap1Controller@dschuyenvien');

route::get('/boss/dstpquan','boss\rap1Controller@dstpquan');

route::get('/boss/dsrap','boss\rap1Controller@dsrap');

route::get('/listquan','boss\rap1Controller@listquan');

//boss routes suat chieu, food, guest, point

route::get('/boss/dssuatchieu','boss\rap2Controller@dssuatchieu');

route::get('/boss/lssuatchieu','boss\rap2Controller@lssuatchieu');

route::get('/boss/dsfood','boss\rap2Controller@dsfood');

route::get('/boss/dskhachhang','boss\rap2Controller@dskhachhang');

route::get('/boss/bangdoidiem','boss\rap2Controller@bangdoidiem');

route::get('/boss/lsdoidiem','boss\rap2Controller@lsdoidiem');

//boss routes phong chieu

route::get('/boss/botriphong','boss\rap2Controller@botriphong');

route::get('/boss/phongtheosuat','boss\rap2Controller@phongtheosuat');

route::get('/boss/phongthuocrap','boss\rap2Controller@phongthuocrap');

route::get('/boss/suatthuocphong','boss\rap2Controller@suatthuocphong');

route::get('/boss/phimthuocsuat','boss\rap2Controller@phimthuocsuat');

//Route::get('/home', 'HomeController@index')->name('home');

//chuyen vien routes

route::get('/chuyenvien1','chuyenvienController@trangchinh');

route::post('/checkloginchuyenvien','chuyenvienController@kiemtradangnhap');

route::get('/logoutchuyenvien','chuyenvienController@dangxuat');

Route::get('/chuyenvien/thongtin','chuyenvienController@thongtin');

Route::get('/chuyenvien/formsuathongtin','chuyenvienController@formsuathongtin');

Route::post('/chuyenvien/suathongtin','chuyenvienController@suathongtin');

Route::get('/chuyenvien/formsuamatkhau','chuyenvienController@formsuamatkhau');

Route::post('/chuyenvien/suamatkhau','chuyenvienController@suamatkhau');

//qlphim chuyenvien route

route::get('/chuyenvien/qlphim','chuyenvien\qlphimController@danhsachphim');

route::get('/chuyenvien/formthemphim','chuyenvien\qlphimController@formthemphim');

route::post('/chuyenvien/themphim','chuyenvien\qlphimController@themphim');

route::get('/chuyenvien/formsuaphim','chuyenvien\qlphimController@formsuaphim');

route::post('/chuyenvien/suaphim','chuyenvien\qlphimController@suaphim');

route::get('/chuyenvien/xoaphim','chuyenvien\qlphimController@xoaphim');

route::get('/chuyenvien/qltheloai','chuyenvien\qlphimController@danhsachtheloai');

route::get('/chuyenvien/formthemtheloai','chuyenvien\qlphimController@formthemtl');

route::post('/chuyenvien/themtheloai','chuyenvien\qlphimController@themtheloai');

route::get('/chuyenvien/xoatheloai','chuyenvien\qlphimController@xoatheloai');

//chuyenvien routes chi nhanh

route::get('/chuyenvien/dstpquan','chuyenvien\qlchinhanhController@dstpquan');

route::get('/chuyenvien/dsrap','chuyenvien\qlchinhanhController@dsrap');

route::get('/chuyenvien/listquan','chuyenvien\qlchinhanhController@listquan');

route::get('/chuyenvien/formthemquantp','chuyenvien\qlchinhanhController@formthemquantp');

route::post('/chuyenvien/themquantp','chuyenvien\qlchinhanhController@themquantp');

route::get('/chuyenvien/xoaquan','chuyenvien\qlchinhanhController@xoaquan');

route::get('/chuyenvien/formthemthanhpho','chuyenvien\qlchinhanhController@formthemthanhpho');

route::get('/chuyenvien/formthemrap','chuyenvien\qlchinhanhController@formthemrap');

route::get('/chuyenvien/formlistquan','chuyenvien\qlchinhanhController@formlistquan');

route::post('/chuyenvien/themthanhpho','chuyenvien\qlchinhanhController@themthanhpho');

route::post('/chuyenvien/themrap','chuyenvien\qlchinhanhController@themrap');

route::get('/chuyenvien/xoathanhpho','chuyenvien\qlchinhanhController@xoathanhpho');

route::get('/chuyenvien/xoarap','chuyenvien\qlchinhanhController@xoarap');

//chuyenvien nhan su routes

route::get('/chuyenvien/dsquanlyrap','chuyenvien\qlnhansuController@dsquanly');

route::get('/chuyenvien/dsnhanvienrap','chuyenvien\qlnhansuController@dsnhanvien');

route::get('/chuyenvien/formthemql','chuyenvien\qlnhansuController@formthemquanly');

route::post('/chuyenvien/themquanly','chuyenvien\qlnhansuController@themquanly');

route::get('/chuyenvien/xoaquanly','chuyenvien\qlnhansuController@xoaquanly');

route::get('/chuyenvien/formthemnv','chuyenvien\qlnhansuController@formthemnhanvien');

route::post('/chuyenvien/themnhanvien','chuyenvien\qlnhansuController@themnhanvien');

route::get('/chuyenvien/xoanhanvien','chuyenvien\qlnhansuController@xoanhanvien');

//bangdoidiem chuyenvien route

route::get('/chuyenvien/dsbangdoidiem','chuyenvienController@dsbangdoidiem');

route::get('/chuyenvien/formthembangdoidiem','chuyenvienController@formthembangdoidiem');

route::post('/chuyenvien/thembangdoidiem','chuyenvienController@thembangdoidiem');

route::get('/chuyenvien/xoabangdoidiem','chuyenvienController@xoabangdoidiem');

route::get('/chuyenvien/dslichsudoidiem','chuyenvienController@dslichsudoidiem');

//chuyen vien routes khuyenmai, quangcao, gia ve

route::get('/chuyenvien/dshinhquangcao','chuyenvien\KMQCController@dshinhquangcao');

route::get('/chuyenvien/formsuahinhquangcao','chuyenvien\KMQCController@formsuahinhquangcao');

route::post('/chuyenvien/suahinhquangcao','chuyenvien\KMQCController@suahinhquangcao');

route::get('/chuyenvien/dsgiave','chuyenvien\KMQCController@dsgiave');

route::get('/chuyenvien/formsuagiave','chuyenvien\KMQCController@formsuagiave');

route::post('/chuyenvien/suagiave','chuyenvien\KMQCController@suagiave');

route::get('/chuyenvien/dskhuyenmai','chuyenvien\KMQCController@dskhuyenmai');

route::get('/chuyenvien/formsuakhuyenmai','chuyenvien\KMQCController@formsuakhuyenmai');

route::post('/chuyenvien/suakhuyenmai','chuyenvien\KMQCController@suakhuyenmai');

route::get('/chuyenvien/formthemkhuyenmai','chuyenvien\KMQCController@formthemkhuyenmai');

route::post('/chuyenvien/themkhuyenmai','chuyenvien\KMQCController@themkhuyenmai');

route::get('/chuyenvien/xoakhuyenmai','chuyenvien\KMQCController@xoakhuyenmai');

route::get('/chuyenvien/laymatacdong','chuyenvien\KMQCController@laymatacdong');

route::get('/chuyenvien/laygiagoc','chuyenvien\KMQCController@laygiagoc');

route::get('/chuyenvien/laygiasaukm','chuyenvien\KMQCController@laygiasaukm');

//food chuyenvien routes

route::get('/chuyenvien/dsdoannuocuong','chuyenvien\foodController@dsdoannuocuong');

route::get('/chuyenvien/formthemdoannuocuong','chuyenvien\foodController@formthemdoannuocuong');

route::post('/chuyenvien/themdoannuocuong','chuyenvien\foodController@themdoannuocuong');

route::get('/chuyenvien/formsuadoannuocuong','chuyenvien\foodController@formsuadoannuocuong');

route::post('/chuyenvien/suadoannuocuong','chuyenvien\foodController@suadoannuocuong');

route::get('/chuyenvien/xoadoannuocuong','chuyenvien\foodController@xoadoannuocuong');

//admin routes

route::get('/admin1','admin\adminController@trangchinh');

route::post('/checklogin','admin\adminController@kiemtradangnhap');

route::get('/logout','admin\adminController@dangxuat');

Route::get('/admin/thongtin','admin\adminController@thongtin');

Route::get('/admin/formsuathongtin','admin\adminController@formsuathongtin');

Route::post('/admin/suathongtin','admin\adminController@suathongtin');

Route::get('/admin/formsuamatkhau','admin\adminController@formsuamatkhau');

Route::post('/admin/suamatkhau','admin\adminController@suamatkhau');

//suatchieu admin routes

route::get('/admin/dssuatchieu','admin\suatchieuController@danhsachsuatchieu');

route::get('/admin/formthemsuatchieu','admin\suatchieuController@formthemsuatchieu');

route::post('/admin/themsuatchieu','admin\suatchieuController@themsuatchieu');

route::get('/admin/xoasuatchieu','admin\suatchieuController@xoasuatchieu');

route::get('/admin/lichsusuatchieu','admin\suatchieuController@lichsusuatchieu');

//qlrap admin routes

route::get('/admin/dsnhanvien','admin\qlrapController@dsnhanvien');

route::get('/admin/lsduyetnhanvien','admin\qlrapController@lsduyetnhanvien'); //*chualam

route::get('/admin/formthemnhanvien','admin\qlrapController@formthemnhanvien');

route::post('/admin/themnhanvien','admin\qlrapController@themnhanvien');

route::get('/admin/xoanhanvien','admin\qlrapController@xoanhanvien');

route::get('/admin/dsnguoidung','admin\qlrapController@dsnguoidung');

route::get('/admin/lsddnguoidung','admin\qlrapController@lsddnguoidung'); //*chualam

//nhanvien routes

route::get('/nhanvien1','nhanvienController@trangchinh');

route::post('/checkloginnv','nhanvienController@kiemtradangnhap');

route::get('/logoutnv','nhanvienController@dangxuat');

Route::get('/nhanvien/thongtin','nhanvienController@thongtin');

Route::get('/nhanvien/formsuathongtin','nhanvienController@formsuathongtin');

Route::post('/nhanvien/suathongtin','nhanvienController@suathongtin');

Route::get('/nhanvien/formsuamatkhau','nhanvienController@formsuamatkhau');

Route::post('/nhanvien/suamatkhau','nhanvienController@suamatkhau');

//kiem duyet hoa don nhanvien routes

Route::get('/nhanvien/dshoadonchuaduyet','nhanvienController@dshoadonchuaduyet');

Route::get('/nhanvien/timhoadonsdt','nhanvienController@timhoadonsdt');

Route::get('/nhanvien/formkiemduyet','nhanvienController@formkiemduyet');

Route::post('/nhanvien/kiemduyethoadon','nhanvienController@kiemduyethoadon');

Route::get('/nhanvien/lichsukiemduyet','nhanvienController@lichsukiemduyet');

Route::get('/nhanvien/inhoadondaduyet','nhanvienController@inhoadondaduyet');

Route::get('/nhanvien/timinhoadonsdt','nhanvienController@timinhoadonsdt');

Route::get('/nhanvien/inhoadon','nhanvienController@inhoadon');

//routes danh sach phong chieu admin sight

route::get('/admin/dsphong','phongchieuController@dsphong');

route::get('/hangcot','phongchieuController@hangcot');

route::get('/ghedoi','phongchieuController@ghedoi');

route::get('/admin/formthemphong','phongchieuController@formthemphong');

route::post('/admin/themphong','phongchieuController@themphong');

route::get('/admin/xoaphong','phongchieuController@xoaphong');

route::get('/phongtheosuat','phongchieuController@phongtheosuat');

route::get('/suatchieuphong','phongchieuController@suatchieuphong');

route::get('/phongtenphim','phongchieuController@phongtenphim');

route::get('/xuliphong','phongchieuController@xuliphong');

route::get('/xuliphongtheosuat','phongchieuController@xuliphongtheosuat');

route::get('/botriphong','phongchieuController@botriphong');



