<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

/**
 * ===============================================
 * ADMIN ROUTES (ไม่ต้อง login)
 * ===============================================
 */

// แสดงหน้า login form
Route::get('/center_contro/come_center_contro', [AdminController::class, 'showLogin'])->name('admin.login');
// ประมวลผล login (รับ POST จากฟอร์ม)
Route::post('/center_contro/come_center_contro', [AdminController::class, 'login'])->name('admin.login.post');

// แสดงหน้า register form
Route::get('/center_contro/add_center_contro', [AdminController::class, 'showRegister'])->name('admin.register');
// ประมวลผล register (รับ POST จากฟอร์ม)
Route::post('/center_contro/add_center_contro', [AdminController::class, 'register'])->name('admin.register.post');

// ออกจากระบบ
Route::post('/center_contro/logout', [AdminController::class, 'logout'])->name('admin.logout');

/**
 * ===============================================
 * PUBLIC ROUTES (ไม่ต้อง login)
 * ===============================================
 */

// หน้าแรก - แสดง Post ทั้งหมด
Route::get('/', [PostController::class, 'index']) ->name('home');
// แสดงหน้า create post form
Route::get('/staff/create', [PostController::class, 'create']) ->name('staff.create');
// บันทึก post ใหม่
Route::post('/staff/create', [PostController::class, 'store']) ->name('store');

/**
 * ===============================================
 * PROTECTED ROUTES (ต้อง login เป็น admin ก่อน)
 * ===============================================
 */
Route::middleware('admin')->group(function () {
    Route::get('/staff/admin', [PostController::class, 'admin']) ->name('staff.admin');
    Route::resource('staff', PostController::class)->parameters(['staff' => 'post'])->except(['index', 'create', 'store']);
});