<?php

use App\Http\Controllers\Admin\ChucVuController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\NhanVienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.login.form');
});

Route::prefix('admin')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', [LoginAdminController::class, 'formLogin'])->name('admin.login.form');
        Route::post('/login', [LoginAdminController::class, 'login'])->name('admin.login.submit');
        Route::get('/register', [LoginAdminController::class, 'formRegister'])->name('admin.register.form');
        Route::get('/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');
    });
    Route::get('/dash-board', [LoginAdminController::class, 'formDashBoard'])->name('admin.dashboard');

    Route::prefix('nhan-vien')->group(function () {
        Route::get('/', [NhanVienController::class, 'getIndex'])->name('admin.nhanvien.form');
        Route::get('/search', [NhanVienController::class, 'search'])->name('admin.searchnhanvien.submit');
        // Route::middleware(AccessPermission::class . ':Admin,Editor')->group(function () {
        Route::get('/add', [NhanVienController::class, 'formAdd'])->name('admin.addSnhanvien.form');
        Route::post('/add', [NhanVienController::class, 'add'])->name('admin.addnhanvien.submit');
        Route::get('/update/{MaNV}', [NhanVienController::class, 'formUpdate'])->name('admin.updatenhanvien.form');
        Route::post('/update/{MaNV}', [NhanVienController::class, 'update'])->name('admin.updatenhanvien.submit');
        Route::get('/export', [NhanVienController::class, 'export'])->name('admin.exportnhanvien.submit');
        Route::get('/import', [NhanVienController::class, 'formImport'])->name('admin.importnhanvien.form');
        Route::post('/import', [NhanVienController::class, 'import'])->name('admin.importnhanvien.submit');
        Route::get('/template', [NhanVienController::class, 'teamplateExport'])->name('admin.templateExportnhanvien.submit');
        Route::get('/delete/{MaNV}', [NhanVienController::class, 'delete'])->name('admin.deletenhanvien');
        // });
    });
    Route::prefix('chuc-vu')->group(function () {
        Route::get('/', [ChucVuController::class, 'getIndex'])->name('admin.chucvu.form');
        Route::get('/search', [ChucVuController::class, 'search'])->name('admin.searchchucvu.submit');
        // Route::middleware(AccessPermission::class . ':Admin,Editor')->group(function () {
        Route::get('/add', [ChucVuController::class, 'formAdd'])->name('admin.addchucvu.form');
        Route::post('/add', [ChucVuController::class, 'add'])->name('admin.addchucvu.submit');
        Route::get('/update/{MaCV}', [ChucVuController::class, 'formUpdate'])->name('admin.updatechucvu.form');
        Route::post('/update/{MaCV}', [ChucVuController::class, 'update'])->name('admin.updatechucvu.submit');
        Route::get('/export', [ChucVuController::class, 'export'])->name('admin.exportchucvu.submit');
        Route::get('/import', [ChucVuController::class, 'formImport'])->name('admin.importchucvu.form');
        Route::post('/import', [ChucVuController::class, 'import'])->name('admin.importchucvu.submit');
        Route::get('/template', [ChucVuController::class, 'teamplateExport'])->name('admin.templateExportchucvu.submit');
        Route::get('/delete/{MaCV}', [ChucVuController::class, 'delete'])->name('admin.deletechucvu');
        // });
    });
});
