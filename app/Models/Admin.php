<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;  // ใช้ Authenticatable เพื่อให้ใช้ Auth
use Illuminate\Notifications\Notifiable;

/**
 * Admin Model
 * แทนตารางฐานข้อมูล 'admins'
 * ใช้สำหรับ authentication ของ admin
 */
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * fillable
     * ระบุฟิลด์ที่สามารถบันทึก/อัปเดต ได้โดยตรง (ป้องกัน mass assignment)
     */
    protected $fillable = [
        'name',      // ชื่อ admin
        'email',     // อีเมล admin
        'password',  // รหัสผ่าน
    ];

    /**
     * hidden
     * ฟิลด์ที่ซ่อน เมื่อแปลง model เป็น array/JSON
     * เพื่อไม่ให้รหัสผ่าน/token หลุดออกมา
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * casts
     * ระบุประเภทข้อมูลของแต่ละฟิลด์
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',  // แปลง email_verified_at เป็น datetime object
            'password' => 'hashed',  // แปลง password เป็น hash (ใช้ auto-hashing ที่ Laravel 11)
        ];
    }
}
