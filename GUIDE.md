# project_Name: tee_tiaw
นี่คือเว็บไซต์สำหรับการโพสต์แนะนำที่เที่ยวคล้าย blog แต่เราได้เพิ่มระบบ login สำหรับการโพสต์มาด้วย

---

## ✨ ฟีเจอร์หลักของระบบ (Key Features)
- 🔐 **ระบบจัดการผู้ใช้และการเข้าสู่ระบบ:** รองรับการแบ่งสิทธิ์ (Admin / User)
- 📝 **ระบบจัดการข้อมูล (CRUD):** เพิ่ม ลบ แก้ไข และค้นหาข้อมูลได้อย่างครบถ้วน
- 📸 **มีระบบการใส่รูปภาพ ** สามารถใส่รูปภาพในโพสต์ได้

---

## 🛠️ เครื่องมือและเทคโนโลยีที่ใช้ (Tech Stack)
- **Backend:** PHP 8.2.12, Laravel Framework (MVC)
- **Database:** MySQL
- **Frontend:** Blade Template, Bootstrap, JavaScript
- **Development Tools:** XAMPP, Composer, Git

---

## 🚀 วิธีการติดตั้งและรันในเครื่อง (Local Setup)

1. **Clone repository ลงเครื่อง:**
   ```bash
   > git clone [https://github.com/your-username/your-repo-name.git](https://github.com/your-username/your-repo-name.git)
   > cd your-repo-name
   ```

2. ติดตั้ง Dependencies
```bash
    > composer install
    > npm install && npm run build
```
3. ตั้งค่า Environment (.env)
```bash
    > cp .env.example .env
    > php artisan key:generate
```
4. ตั้งค่าฐานข้อมูลในไฟล์ .env ให้ตรงกับ XAMPP
```bash
    DB_CONNECTION=mysql (เปลี่ยนได้)
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE= (your database name)
    DB_USERNAME=root
    DB_PASSWORD=
```
5. เริ่มการทำงานของเซิร์ฟเวอร์
```bash
    > php artisan serve
```