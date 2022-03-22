<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DiaDanhController;
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

Route::get('/', [App\Http\Controllers\Admin\ThongKeController::class,'index'])->middleware('auth'); // man create 05/02/2022
// Route::get('/admin/thongke', [App\Http\Controllers\AdminController::class,'thongke'])->middleware('auth');
// Route::get('/admin/dsdiadanh', [App\Http\Controllers\AdminController::class,'dsdiadanh'])->middleware('auth');
// Route::get('/admin/taodiadanh', [App\Http\Controllers\AdminController::class,'taodiadanh']);
// Route::get('/admin/nhucau', [App\Http\Controllers\AdminController::class,'nhucau']);
// Route::get('/admin/dexuat', [App\Http\Controllers\AdminController::class,'dexuat']);
// Route::get('/admin/taikhoan', [App\Http\Controllers\AdminController::class,'taikhoan']);
// Route::get('/admin/errors', [App\Http\Controllers\AdminController::class,'errors']);

Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class,'showForm'])->name('login'); // Man craete 05/02/2022 | tra ve form login
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class,'authenticate'])->name('login'); // Man craete 05/02/2022 | xu ly dang nhap
Route::post('/admin/logout', [App\Http\Controllers\Admin\LoginController::class,'logout'])->name('logout'); // Man craete 05/02/2022 |xu ly dang xuat

Route::get('/admin/quenmatkhau', [App\Http\Controllers\Admin\LoginController::class,'showQuenMatKhau']); // Man craete 05/02/2022 | tra ve form Quen mat khau
Route::post('/admin/quenmatkhau', [App\Http\Controllers\Admin\LoginController::class,'postQuenMatKhau'])->name('quenMatKhau'); // Man create 05/02/2022 | xu ly gui mail mat khau
Route::get('/admin/datmatkhau/{user}/{token}', [App\Http\Controllers\Admin\LoginController::class,'showDatMatKhau'])->name('datmatkhau'); // view dat mat khau
Route::post('/admin/datmatkhau/{user}/{token}', [App\Http\Controllers\Admin\LoginController::class,'postDatMatKhau'])->name('postDatMatKhau'); // Man craete 05/02/2022 |  xu ly doi mat khau khi nhan link ben mail


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    //quan ly

    //dia danh
    Route::get('/dsdiadanh', [App\Http\Controllers\Admin\DiaDanhController::class,'index'])->name('admin.diadanh');
    Route::get('/hinhdiadanh/{id}', [App\Http\Controllers\Admin\DiaDanhController::class,'getHinhDiaDanh'])->name('admin.hinhdiadanh');
    Route::get('/themdiadanh', [App\Http\Controllers\Admin\DiaDanhController::class,'create'])->name('admin.themdiadanh');
    Route::get('/suadiadanh/{id}', [App\Http\Controllers\Admin\DiaDanhController::class,'edit'])->name('admin.suadiadanh');
    Route::patch('/suadiadanh/{id}/{dsDiaDanh}', [App\Http\Controllers\Admin\DiaDanhController::class,'update'])->name('admin.patchdiadanh');
    Route::delete('/xoahinhdiadanh/{id}', [App\Http\Controllers\Admin\HinhDiaDanhController::class,'destroy'])->name('admin.deletediadanh');
    Route::post('/themdiadanh', [App\Http\Controllers\Admin\DiaDanhController::class,'store'])->name('admin.xulyThemDiaDanh');
    Route::post('/themhinhdiadanh/{id}', [App\Http\Controllers\Admin\HinhDiaDanhController::class,'store'])->name('admin.xulyHinhDiaDanh'); // Thêm rieegn cho view hinh dia danh chứ k phải là view thêm địa danh
    Route::delete('/xoadiadanh/{id}', [App\Http\Controllers\Admin\DiaDanhController::class,'destroy'])->name('admin.deletedDiaDanh');
    Route::get('/chitietdiadanh/{id}', [App\Http\Controllers\Admin\DiaDanhController::class,'show'])->name('admin.showChiTietDiaDanh');

    //Nhu cau    
    Route::get('/nhucau', [App\Http\Controllers\Admin\NhuCauController::class,'index'])->name('admin.nhucau');
    Route::get('/themnhucau', [App\Http\Controllers\Admin\NhuCauController::class,'create'])->name('admin.showThemNhuCau');
    Route::post('/themnhucau', [App\Http\Controllers\Admin\NhuCauController::class,'store'])->name('admin.xulythemnhucau');
    Route::get('/suanhucau/{id}', [App\Http\Controllers\Admin\NhuCauController::class,'edit'])->name('admin.showSuaNhuCau');
    Route::patch('/suanhucau/{nhuCau}', [App\Http\Controllers\Admin\NhuCauController::class,'update'])->name('admin.xuLySuaNhuCau');
    Route::delete('/xoanhucau/{id}', [App\Http\Controllers\Admin\NhuCauController::class,'destroy'])->name('admin.deletednhucau');

    //de xuat
    Route::get('/dexuat', [App\Http\Controllers\Admin\DeXuatController::class,'index'])->name('admin.dexuat');
    Route::get('/duyetdexuat/{id}', [App\Http\Controllers\Admin\DeXuatController::class,'create'])->name('admin.formDeXuat');
    Route::post('/duyetdexuat/{id}', [App\Http\Controllers\Admin\DeXuatController::class,'store'])->name('admin.xulydexuat');
    Route::delete('/xoadexuat/{id}', [App\Http\Controllers\Admin\DeXuatController::class,'destroy'])->name('admin.deletedDeXuat');
   

    //tai khoan
    Route::get('/taikhoan', [App\Http\Controllers\Admin\TaiKhoanController::class,'index'])->name('admin.taiKhoan');
    Route::delete('/xoataikhoan/{id}', [App\Http\Controllers\Admin\TaiKhoanController::class,'destroy'])->name('admin.XuLyXoa');
    Route::post('/khoataikhoan/{id}/{status}', [App\Http\Controllers\Admin\TaiKhoanController::class,'block'])->name('admin.XuLyKhoa');
    Route::post('/mokhoataikhoan/{id}/{status}', [App\Http\Controllers\Admin\TaiKhoanController::class,'Unblock'])->name('admin.XuLyMoKhoa');

    Route::get('/capnhattaikhoan/{id}', [App\Http\Controllers\Admin\TaiKhoanController::class,'edit'])->name('admin.capnhattaiKhoan');
    Route::post('/capnhattaikhoan/{id}', [App\Http\Controllers\Admin\TaiKhoanController::class,'update'])->name('admin.capnhattaikhoan');

    Route::get('/errors', [App\Http\Controllers\AdminController::class,'errors']);
    // thong ke
    Route::get('/thongke', [App\Http\Controllers\Admin\ThongKeController::class,'index'])->name('admin.thongke');

    // baiviet
    Route::get('/baiviet', [App\Http\Controllers\Admin\BaiVietController::class,'index'])->name('admin.baiviet');
    Route::get('/baivietdetails/{id}', [App\Http\Controllers\Admin\BaiVietController::class,'show'])->name('admin.showbaiviet');
    Route::post('/khoabaiviet/{id}/{status}', [App\Http\Controllers\Admin\BaiVietController::class,'UnblockAndBlock'])->name('admin.BlockAndUnblock');
    Route::delete('/xoabaiviet/{id}', [App\Http\Controllers\Admin\TaiKhoanController::class,'destroy'])->name('admin.xoaBaiViet');

});

