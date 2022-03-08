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

#region test
Route::get('/story', 'StoryController@Story')->name('getcookie');
//cookie
Route::post('/cookie/set', 'CookieController@setCookie')->name('setcookie');
Route::get('/cookie/get', 'CookieController@getCookie')->name('getcookie');
//caching
Route::get('/redis', function () {
    print_r(app()->make('redis'));
});
Route::get('/getredis', 'ProducsController@GetRedis');
Route::get('/setredis', 'ProducsController@SetRedis');
Route::get('/clearredis', 'ProducsController@ClearDB');

//session
Route::get('/products', 'ProducsController@Get')->name('products');
Route::post('/sessiontest', 'ProducsController@TestSession')->name('sessiontest');
Route::get('/giohang', 'ProducsController@SeeSession')->name('giohang');
Route::post('/sessionupdate', 'ProducsController@UpdateSession')->name('sessionupdate');
Route::post('/sessiondelete', 'ProducsController@DeleteSession')->name('sessiondelete');
Route::get('/foreign', 'ProducsController@Foreign')->name('foreign');
//mail
Route::get('/mail', 'EmailController@index')->name('mail');
Route::post('/sendmail', 'EmailController@SendMail')->name('sendmail');
#endregion endtest

#region Random stuff
Route::get('/layout', function () {
    return view('_LayoutShare._layout');
})->name('layoutTrangChu');
#region ----Về câu chuyện PetPro----
//----------------------------------------------------
Route::get('/', 'HomeController@Home')->name('home');
Route::get('/cau-chuyen-pet-pro', 'CauChuyenPetProController@CauChuyenPetPro')->name('CauChuyenPetPro');
Route::get('/cau-chuyen-pet-pro/gioi-thieu-benh-vien', 'CauChuyenPetProController@GioiThieuBenhVien')->name('GioiThieuBenhVien');
Route::get('/cau-chuyen-pet-pro/doi-ngu-bac-si', 'CauChuyenPetProController@DoiNguBacSi')->name('DoiNguBacSi');
Route::get('/cau-chuyen-pet-pro/trang-thiet-bi-hien-dai', 'CauChuyenPetProController@TrangThietBiHD')->name('TrangThietBiHD');
Route::get('/cau-chuyen-pet-pro/khach-hang-noi-ve-petpro', 'CauChuyenPetProController@KHNoivePetPro')->name('KHNoivePetPro');
Route::get('/cau-chuyen-pet-pro/{slug}', 'CauChuyenPetProController@DieuHuongCauChuyen')->name('DieuHuongCauChuyen');
#endregion


#region ----Blog----
//----------------------------------------------------
Route::get('/kien-thuc-thu-cung', 'BlogController@BlogHome')->name('KienThuc');
Route::get('/kien-thuc-thu-cung/tim-kiem', 'BlogController@BlogSearch')->name('TimKiemKienThuc');
Route::get('/kien-thuc-thu-cung', 'BlogController@BlogCategory')->name('KienThucCategory');
Route::post('/kien-thuc-thu-cung/binh-luan', 'BlogController@loadComment')->name('loadcomment');
Route::post('/kien-thuc-thu-cung/dang-binh-luan', 'BlogController@UpComment')->name('upcomment');
Route::get('/kien-thuc-thu-cung/chi-tiet-bai-viet/{slug}', 'BlogController@BlogDetail')->name('blogdetail');
Route::get('/kien-thuc-thu-cung/{slug}', 'BlogController@BlogHome')->name('KienThuc');
// Route::get('/kien-thuc/danh-sach-binh-luan', 'BlogController@HienBinhLuan')->name('HienBinhLuan');
#endregion

#region ----Shop----
//----------------------------------------------------
Route::get('/shop/tim-kiem', 'ShopController@ShopSearch')->name('ShopSearch');
Route::get('/shop', 'ShopController@ShopCategory')->name('ShopCategory');
Route::get('/shop/san-pham/{slug}', 'ShopController@ShopDetail')->name('shopdetail');
Route::post('/shop/xac-nhan-mua', 'ShopController@ShopConfirm')->name('ShopConfirm');
Route::get('/shop/{slug}', 'ShopController@ShopHome')->name('ShopHome');
#endregion

#region ----Tuyển dụng----
//----------------------------------------------------
Route::get('/tuyen-dung', 'TuyenDungController@TuyenDung')->name('TuyenDung');
Route::post('/tuyen-dung/bai-viet', 'TuyenDungController@loadRecruit')->name('loadrecruit');
Route::get('/tuyen-dung/chi-tiet-tuyen-dung/{id}', 'TuyenDungController@ChiTietTuyenDung')->name('ChiTietTuyenDung');
#endregion

#region----Submit form liên hệ----
//----------------------------------------------------
Route::get('/lien-he', 'LienHeController@LienHe')->name('LienHe');
Route::post('/lien-he/xac-nhan-lien-he', 'LienHeController@XacNhanLienHe')->name('XacNhanLienHe');
#endregion

#region----Đặt lịch hẹn----
//----------------------------------------------------
Route::get('/dat-lich-hen', 'BookingController@DatLich')->name('DatLich');
Route::post('/dat-lich-hen/xac-nhan', 'BookingController@XacNhanDatLich')->name('XacNhanDatLich');
#endregion

#region DichVu
//----------------------------------------------------
Route::get('/dich-vu-benh-vien', 'DichVuController@Services')->name('DichVuBV');
Route::get('chuyen-khoa/{slug}', 'DichVuController@ServiceDetail')->name('chuyenkhoaGroup');
Route::get('dich-vu/{slug}', 'DichVuController@ServiceDetail')->name('dichvuGroup');
// Route::get('/dich-vu-benh-vien/chuyen-khoa/{slug}', 'DichVuController@ServiceDetail')->name('chuyenkhoaGroup');
// Route::get('/dich-vu-benh-vien/dich-vu/{slug}', 'DichVuController@ServiceDetail')->name('dichvuGroup');

#endregion
