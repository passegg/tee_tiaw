<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * AdminController
 * ควบคุมการทำงานของระบบ Admin (login, register, logout)
 */
class AdminController extends Controller
{
    /**
     * showLogin()
     * ไว้แสดงหน้า login form - รับอีเมลและรหัสผ่าน
     */
    public function showLogin()
    {
        return view('center_contro.come_center_contro');
    }

    /**
     * login()
     * ตรวจสอบข้อมูล login (อีเมล + รหัสผ่าน)
     * ถ้าถูกต้อง = บันทึก session และ redirect ไปหน้า staff/admin
     * ถ้าผิด = แสดงข้อความ error
     */
    public function login(Request $request)
    {
        // ตรวจสอบว่ากรอกอีเมลและรหัสผ่าน
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // พยายาม login ด้วย admin guard
        if (Auth::guard('admin')->attempt($credentials)) {
            // ถ้า login สำเร็จ = สร้าง session ใหม่
            $request->session()->regenerate();
            // ไป staff/admin page
            return redirect()->intended(route('staff.admin'));
        }

        // ถ้า login ไม่สำเร็จ = กลับไปหน้า login และแสดง error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * showRegister()
     * ไว้แสดงหน้า register form - สำหรับสร้าง admin account ใหม่
     */
    public function showRegister()
    {
        return view('center_contro.add_center_contro');
    }

    /**
     * register()
     * รับข้อมูล: ชื่อ, อีเมล, รหัสผ่าน (ต้องยืนยันรหัสผ่านด้วย)
     * สร้าง admin account ใหม่ในฐานข้อมูล
     * เข้ารหัสผ่านก่อนบันทึก
     */
    public function register(Request $request)
    {
        // ตรวจสอบข้อมูลที่รับมา
        $request->validate([
            'name' => 'required|string|max:255',  // ชื่อต้องกรอก
            'email' => 'required|string|email|max:255|unique:admins',  // อีเมลต้องไม่ซ้ำ
            'password' => 'required|string|min:8|confirmed',  // รหัสผ่าน >= 8 ตัว + ต้องยืนยัน
        ]);

        // สร้าง Admin account ใหม่
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // เข้ารหัสผ่านก่อนบันทึก
        ]);

        // ส่ง success message และ redirect ไปหน้า login
        return redirect()->route('admin.login')->with('success', 'Admin account created successfully. Please login.');
    }

    /**
     * logout()
     * ออกจากระบบ: ลบ session และ token
     * redirect ไปหน้า login
     */
    public function logout(Request $request)
    {
        // ออกจากระบบ
        Auth::guard('admin')->logout();

        // ลบ session ที่เก่า
        $request->session()->invalidate();
        // สร้าง token ใหม่เพื่อความปลอดภัย
        $request->session()->regenerateToken();

        // ไป login page
        return redirect()->route('home');
    }
}
