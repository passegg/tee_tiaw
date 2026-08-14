<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * AdminAuth Middleware
 * ตรวจสอบว่า user ได้ login ด้วย admin guard หรือไม่
 * ถ้าไม่ได้ login = redirect ไปหน้า login
 * ถ้า login แล้ว = ปล่อยให้ผ่าน
 */
class AdminAuth
{
    /**
     * handle()
     * ตรวจสอบทั้ง request ก่อนส่งให้ controller
     * @param $request - object request
     * @param $next - callable ที่ส่งต่อไป
     */
    public function handle(Request $request, Closure $next): Response
    {
         // ตรวจสอบว่า admin ได้ login หรือไม่\n        
         if (!auth()->guard('admin')->check()) {           
            // ถ้าไม่ได้ login = redirect ไปหน้า home\n           
            return redirect()->route('home');       
        }       
        // ถ้า login แล้ว = ปล่อยให้ผ่านไปที่ controller\n        
        return $next($request);
    }
}
