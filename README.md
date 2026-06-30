# README — Shop Project

سیستم فروشگاه اینترنتی مبتنی بر **PHP** و **CodeIgniter** با معماری **MVC** که شامل بخش کاربری (Frontend) و پنل مدیریت (Admin Panel) است.
این اسکریپت یک پروژه تمرینی مربوط به چند سال گذشته است که به تازگی هسته فریمورک را به آخرین نسخه مربوط به نسخه 3 فریمورک CodeIgniter  ارتقاع دادم.
---

## معرفی پروژه

این پروژه یک پلتفرم فروشگاهی کامل است که برای مدیریت فروشگاه آنلاین طراحی شده و قابلیت‌های اصلی زیر را فراهم می‌کند:

- مدیریت محصولات، دسته‌بندی‌ها و تصاویر محصولات
- مدیریت مشتریان و سفارش‌ها
- سبد خرید و فرآیند ثبت سفارش
- سیستم پیشنهاد محصولات
- پشتیبانی از تاریخ شمسی (Jalali)
- پنل مدیریت حرفه‌ای با DataTables و CKEditor
- قابلیت توسعه برای اتصال به سرویس‌های SOAP

---

## معماری سیستم

معماری این سیستم بر پایه الگوی **MVC** طراحی شده است:

- **Model**: مدیریت داده‌ها و ارتباط با پایگاه داده
- **View**: نمایش صفحات سایت و پنل مدیریت
- **Controller**: کنترل منطق برنامه و ارتباط بین Model و View

### ساختار پوشه‌ها

```text
/application/config
/application/controllers
/application/controllers/panel
/application/core
/application/helpers
/application/libraries
/application/models
/application/views
/application/language
```

---

## کلاس‌های پایه (Core Layer)

مسیر کلاس‌های پایه:

```text
/application/core
```

کلاس‌های اصلی این بخش:

| فایل | توضیح |
|---|---|
| `MY_Controller.php` | کنترلر پایه عمومی |
| `SiteController.php` | کنترلر پایه برای بخش سایت |
| `PanelController.php` | کنترلر پایه برای پنل مدیریت |
| `MY_Model.php` | مدل پایه سفارشی |

---

## نصب و راه‌اندازی

### 1. پیش‌نیازها

برای اجرای پروژه، موارد زیر مورد نیاز است:

- PHP نسخه `7.x` یا بالاتر
- MySQL
- Apache یا Nginx
- فعال بودن `mod_rewrite` یا rewrite equivalent در وب‌سرور

### 2. مراحل نصب

#### کلون کردن پروژه

```bash
git clone <repository-url>
```

#### تنظیم پایگاه داده

فایل زیر را ویرایش کرده و اطلاعات دیتابیس را وارد کنید:

```text
/application/config/database.php
```

#### تنظیمات پایه پروژه

فایل‌های تنظیمات زیر را بررسی و متناسب با محیط اجرا پیکربندی کنید:

```text
/application/config/config.php
/application/config/site_config.php
/application/config/panel_config.php
```

#### تنظیم دسترسی فایل‌ها

اطمینان حاصل کنید پوشه‌های زیر دسترسی نوشتن داشته باشند:

```text
/application/cache
/application/logs
```

### 3. اجرای پروژه

آدرس بخش سایت:

```text
http://localhost/shop
```

آدرس پنل مدیریت:

```text
http://localhost/shop/index.php/panel/dashboard
```

---

## قابلیت‌های سیستم

### بخش کاربری (Frontend)

- مشاهده محصولات
- جستجوی محصولات
- دسته‌بندی محصولات
- مدیریت سبد خرید
- ثبت‌نام و ورود کاربران
- ثبت نظر برای محصولات
- نمایش محصولات پیشنهادی
- پشتیبانی از محصولات ترکیبی (Combo)

### پنل مدیریت (Admin Panel)

- داشبورد آماری
- مدیریت محصولات
- مدیریت دسته‌بندی‌ها
- مدیریت تصاویر محصولات
- مدیریت مشتریان
- مدیریت سفارش‌ها
- مدیریت وضعیت سفارش‌ها
- مدیریت تولیدکنندگان
- مدیریت روش‌های ارسال
- مدیریت محصولات پیشنهادی

---

## مستندات API

پروژه دارای کتابخانه اختصاصی SOAP در مسیر زیر است:

```text
/application/libraries/nuSoap_lib.php
```

### Endpoints پیشنهادی

```http
GET /api/products
GET /api/customers/{id}
POST /api/orders
```

> نکته: در نسخه فعلی، توسعه API می‌تواند به سمت REST API کامل گسترش پیدا کند.

---

## پایگاه داده

جداول اصلی پروژه شامل موارد زیر است:

```text
products
product_groups
product_pictures
customers
carts
orders
order_status
manufacturers
shipping_methods
suggestions
```

### روابط اصلی پیشنهادی

```text
Customer  → Order
Order     → Order_Items
Product   → Order_Items
```

---

## ملاحظات امنیتی

برای افزایش امنیت پروژه، رعایت موارد زیر ضروری است:

- فعال‌سازی CSRF
- استفاده از HTTPS در محیط عملیاتی
- هش کردن رمز عبور با الگوریتم `bcrypt`
- جلوگیری از SQL Injection با Query Builder یا Prepared Statements
- محدودسازی دسترسی به پنل مدیریت
- اعتبارسنجی ورودی‌های کاربران در سمت سرور
- محدودسازی سطح دسترسی فایل‌ها و پوشه‌های حساس

---

## تکنولوژی‌های استفاده‌شده

- PHP
- CodeIgniter
- MySQL
- jQuery
- Bootstrap
- DataTables
- CKEditor
- Jalali Datepicker
- Font Awesome
- SOAP / NuSOAP

---

## پیشنهاد برای توسعه آینده

- پیاده‌سازی کامل REST API
- افزودن درگاه پرداخت آنلاین
- افزودن سیستم تخفیف و کوپن
- استفاده از Redis برای کشینگ
- کانتینریزه کردن پروژه با Docker
- افزودن Unit Testing
- بهبود ساختار احراز هویت و سطح دسترسی کاربران
- بهینه‌سازی SEO برای صفحات محصول و دسته‌بندی
- افزودن لاگ فعالیت مدیران در پنل مدیریت
- توسعه گزارش‌های فروش و سفارش‌ها

---
