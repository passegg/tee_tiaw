<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

/**
 * PostController
 * ควบคุมการจัดการ Post (สร้าง, ดู, แก้ไข, ลบ)
 */
class PostController extends Controller
{
    /**
     * index()
     * ดึง Post ทั้งหมด และแสดงไปยังหน้า home
     */
    public function index()
    {
        $posts = post::all();  // ดึงข้อมูล post ทั้งหมด
        return view('home', compact('posts'));  // ส่งข้อมูล ไปยัง home view
    }

    /**
     * admin()
     * ดึง Post ทั้งหมด และแสดงไปยังหน้า staff/admin (สำหรับ admin เท่านั้น)
     */
    public function admin()
    {
        $posts = post::all();
        return view('staff.admin', compact('posts'));
    }

    /**
     * create()
     * แสดงหน้า form สำหรับสร้าง post ใหม่
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * store()
     * รับข้อมูล: title, content, image, location
     * ตรวจสอบข้อมูล -> บันทึกลงฐานข้อมูล
     * ถ้ามีไฟล์ภาพ = อัปโหลดไปยัง storage/images
     */
    public function store(Request $request)
    {
        // ตรวจสอบข้อมูลที่รับมา
        $request->validate([
            'title' => 'required',  // ชื่อ post ต้องกรอก
            'content' => 'required',  // เนื้อหา post ต้องกรอก
            'image' => 'nullable|image|mimes:jpeg,png,jpg',  // ภาพไม่บังคับ แต่ถ้ามี ต้องเป็นรูป
            'location' => 'nullable',
        ]);

        // สร้าง post ใหม่
        post::create($request->only('title', 'content', 'location') + [
            // ถ้ามีไฟล์ภาพ = อัปโหลดไปยัง storage/images ถ้าไม่มี = null
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : null,
        ]);
    
        // ส่ง success message กลับไปหน้า admin
        return redirect()->route('staff.admin')->with('success', 'Post created successfully.');
    }

    /**
     * show()
     * แสดง post เดี่ยว (ดูรายละเอียด)
     */
    public function show(post $post)
    {
        return view('staff.show', compact('post'));  // ส่ง post data ไปยัง view
    }

    /**
     * edit()
     * แสดงหน้า form สำหรับแก้ไข post (pre-fill ข้อมูลเก่า)
     */
    public function edit(post $post)
    {
        return view('staff.edit', compact('post'));
    }

    /**
     * update()
     * รับข้อมูลแก้ไข: title, content, image
     * ตรวจสอบข้อมูล -> อัปเดตลงฐานข้อมูล
     * ถ้ามีรูปใหม่ = อัปโหลด + บันทึก ถ้าไม่มี = ใช้รูปเก่า
     */
    public function update(Request $request, post $post)
    {
        // ตรวจสอบข้อมูล
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'location' => 'nullable',
        ]);

        // อัปเดต post
        $post->update($request->only('title', 'content', 'location') + [
            // ถ้ามีรูปใหม่ = อัปโหลด ถ้าไม่มี = ใช้รูปเก่า
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : $post->image,
        ]);

        // ส่ง success message
        return redirect()->route('staff.admin')->with('success', 'Post updated successfully.');
    }

    /**
     * destroy()
     * ลบ post
     * ถ้ามีรูป = ลบรูปออกจาก storage ด้วย
     */
    public function destroy(post $post)
    {
        // ถ้า post มีรูป = ลบรูปออกจาก storage
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        // ลบ post จากฐานข้อมูล
        $post->delete();

        // ส่ง success message
        return redirect()->route('staff.admin')->with('success', 'Post deleted successfully.');
    }
}

