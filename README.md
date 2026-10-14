# Computer Store

Website bán máy tính và linh kiện theo `rules.md` và `spec.md`.

## Stack

- PHP 8.3 thuần/OOP, MVC tự triển khai, server-rendered views.
- MySQL 8.x, InnoDB, `utf8mb4`, PDO prepared statements.
- Bootstrap 5 cho public UI.
- TailAdmin Free cho admin UI (tích hợp PHP Views; tài nguyên template phải được nhóm kiểm tra license trước khi đưa vào).
- Composer chỉ dùng PSR-4 autoload và thư viện độc lập; không dùng PHP framework/CMS.

## Cài đặt local

1. Cài PHP 8.3 với các extension `fileinfo`, `pdo`, `pdo_mysql` và Composer.
2. Chạy `composer install`.
3. Sao chép `.env.example` thành `.env` rồi điền thông tin MySQL.
4. Tạo database `computer_store` và chạy các file SQL trong `database/migrations/` theo thứ tự.
5. Cài Node.js LTS rồi chạy `npm install` và `npm run build` để copy Bootstrap assets.
6. Cấu hình Apache DocumentRoot trỏ đến thư mục `public/`, bật `mod_rewrite`.

Không truy cập trực tiếp `app/`, `config/`, `resources/` hoặc `.env`. Ảnh upload phải dùng tên ngẫu nhiên, kiểm tra MIME bằng Fileinfo và lưu dưới `public/uploads/`.

## TailAdmin

TailAdmin Free là template được yêu cầu cho phần admin. Đặt các asset đã được nhóm xác minh vào `public/assets/admin/` và chuyển markup vào `resources/views/layouts/admin.php`; không đưa Node server hoặc React/Next.js vào runtime PHP.

## Kiểm tra

```bash
composer check
composer test
npm run build
```
