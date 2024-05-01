<?php

use App\Http\Controllers\Admin\CaLamController;
use App\Http\Controllers\Admin\ChucVuController;
use App\Http\Controllers\Admin\DangKyCaLamController;
use App\Http\Controllers\Admin\DieuChuyenNhanVienController;
use App\Http\Controllers\Admin\HopDongController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\PhongBanController;
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

    Route::prefix('phong-ban')->group(function () {
        Route::get('/', [PhongBanController::class, 'getIndex'])->name('admin.phongban.form');
        Route::get('/search', [PhongBanController::class, 'search'])->name('admin.searchphongban.submit');
        // Route::middleware(AccessPermission::class . ':Admin,Editor')->group(function () {
        Route::get('/add', [PhongBanController::class, 'formAdd'])->name('admin.addphongban.form');
        Route::post('/add', [PhongBanController::class, 'add'])->name('admin.addphongban.submit');
        Route::get('/update/{MaPB}', [PhongBanController::class, 'formUpdate'])->name('admin.updatephongban.form');
        Route::post('/update/{MaPB}', [PhongBanController::class, 'update'])->name('admin.updatephongban.submit');
        Route::get('/export', [PhongBanController::class, 'export'])->name('admin.exportphongban.submit');
        Route::get('/import', [PhongBanController::class, 'formImport'])->name('admin.importphongban.form');
        Route::post('/import', [PhongBanController::class, 'import'])->name('admin.importphongban.submit');
        Route::get('/template', [PhongBanController::class, 'teamplateExport'])->name('admin.templateExportphongban.submit');
        Route::get('/delete/{MaPB}', [PhongBanController::class, 'delete'])->name('admin.deletephongban');
        // });
    });

    Route::prefix('ca-lam')->group(function () {
        Route::get('/', [CaLamController::class, 'getIndex'])->name('admin.calam.form');
        Route::get('/search', [CaLamController::class, 'search'])->name('admin.searchcalam.submit');
        // Route::middleware(AccessPermission::class . ':Admin,Editor')->group(function () {
        Route::get('/add', [CaLamController::class, 'formAdd'])->name('admin.addcalam.form');
        Route::post('/add', [CaLamController::class, 'add'])->name('admin.addcalam.submit');
        Route::get('/update/{MaCa}', [CaLamController::class, 'formUpdate'])->name('admin.updatecalam.form');
        Route::post('/update/{MaCa}', [CaLamController::class, 'update'])->name('admin.updatecalam.submit');
        Route::get('/export', [CaLamController::class, 'export'])->name('admin.exportcalam.submit');
        Route::get('/import', [CaLamController::class, 'formImport'])->name('admin.importcalam.form');
        Route::post('/import', [CaLamController::class, 'import'])->name('admin.importcalam.submit');
        Route::get('/template', [CaLamController::class, 'teamplateExport'])->name('admin.templateExportcalam.submit');
        Route::get('/delete/{MaCa}', [CaLamController::class, 'delete'])->name('admin.deletecalam');
        // });
    });

    Route::prefix('hop-dong')->group(function () {
        Route::get('/', [HopDongController::class, 'getIndex'])->name('admin.hopdong.form');
        Route::get('/search', [HopDongController::class, 'search'])->name('admin.searchhopdong.submit');
        // Route::middleware(AccessPermission::class . ':Admin,Editor')->group(function () {
        Route::get('/add', [HopDongController::class, 'formAdd'])->name('admin.addhopdong.form');
        Route::post('/add', [HopDongController::class, 'add'])->name('admin.addhopdong.submit');
        Route::get('/update/{MaHD}', [HopDongController::class, 'formUpdate'])->name('admin.updatehopdong.form');
        Route::post('/update/{MaHD}', [HopDongController::class, 'update'])->name('admin.updatehopdong.submit');
        Route::get('/export', [HopDongController::class, 'export'])->name('admin.exporthopdong.submit');
        Route::get('/import', [HopDongController::class, 'formImport'])->name('admin.importhopdong.form');
        Route::post('/import', [HopDongController::class, 'import'])->name('admin.importhopdong.submit');
        Route::get('/template', [HopDongController::class, 'teamplateExport'])->name('admin.templateExporthopdong.submit');
        Route::get('/delete/{MaHD}', [HopDongController::class, 'delete'])->name('admin.deletehopdong');
        // });
    });

    Route::prefix('dieu-chuyen-nhan-vien')->group(function () {
        Route::get('/', [DieuChuyenNhanVienController::class, 'getIndex'])->name('admin.dieuchuyennv.form');
        Route::get('/search', [DieuChuyenNhanVienController::class, 'search'])->name('admin.searchdieuchuyennv.submit');
        // Route::middleware(AccessPermission::class . ':Admin,Editor')->group(function () {
        Route::get('/add', [DieuChuyenNhanVienController::class, 'formAdd'])->name('admin.adddieuchuyennv.form');
        Route::post('/add', [DieuChuyenNhanVienController::class, 'add'])->name('admin.adddieuchuyennv.submit');
        Route::get('/update/{MaPhieu}', [DieuChuyenNhanVienController::class, 'formUpdate'])->name('admin.updatedieuchuyennv.form');
        Route::post('/update/{MaPhieu}', [DieuChuyenNhanVienController::class, 'update'])->name('admin.updatedieuchuyennv.submit');
        Route::get('/export', [DieuChuyenNhanVienController::class, 'export'])->name('admin.exportdieuchuyennv.submit');
        Route::get('/import', [DieuChuyenNhanVienController::class, 'formImport'])->name('admin.importdieuchuyennv.form');
        Route::post('/import', [DieuChuyenNhanVienController::class, 'import'])->name('admin.importdieuchuyennv.submit');
        Route::get('/template', [DieuChuyenNhanVienController::class, 'teamplateExport'])->name('admin.templateExportdieuchuyennv.submit');
        Route::get('/delete/{MaPhieu}', [DieuChuyenNhanVienController::class, 'delete'])->name('admin.deletedieuchuyennv');
        // });
    });

    Route::prefix('dk-ca-lam')->group(function () {
        Route::get('/', [DangKyCaLamController::class, 'getIndex'])->name('admin.dkcalam.form');
        Route::get('/search', [DangKyCaLamController::class, 'search'])->name('admin.searchdkcalam.submit');
        // Route::middleware(AccessPermission::class . ':Admin,Editor')->group(function () {
        Route::get('/add', [DangKyCaLamController::class, 'formAdd'])->name('admin.adddkcalam.form');
        Route::post('/add', [DangKyCaLamController::class, 'add'])->name('admin.adddkcalam.submit');
        Route::get('/update/{Id}', [DangKyCaLamController::class, 'formUpdate'])->name('admin.updatedkcalam.form');
        Route::post('/update/{Id}', [DangKyCaLamController::class, 'update'])->name('admin.updatedkcalam.submit');
        Route::get('/export', [DangKyCaLamController::class, 'export'])->name('admin.exportdkcalam.submit');
        Route::get('/import', [DangKyCaLamController::class, 'formImport'])->name('admin.importdkcalam.form');
        Route::post('/import', [DangKyCaLamController::class, 'import'])->name('admin.importdkcalam.submit');
        Route::get('/template', [DangKyCaLamController::class, 'teamplateExport'])->name('admin.templateExportdkcalam.submit');
        Route::get('/delete/{Id}', [DangKyCaLamController::class, 'delete'])->name('admin.deletedkcalam');
        // });
    });
});
