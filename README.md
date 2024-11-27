# Cài đặt và Cấu hình

## Cài đặt dependencies
```bash
composer install
```

## Cấu hình môi trường
1. Tạo file .env:
```bash
cp .env.example .env
```

2. Cấu hình database trong file .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simple
DB_USERNAME=root
DB_PASSWORD=
```

3. Tạo application key:
```bash
php artisan key:generate
```

## Cài đặt Database
1. Tạo các bảng:
```bash
php artisan migrate
```

2. Thêm dữ liệu mẫu:
```bash
php artisan db:seed
```

## Cấu hình Storage
```bash
php artisan storage:link
```

## Tạo tài khoản Filament
```bash
php artisan make:filament-user
```

## Chạy ứng dụng
```bash
php artisan serve
``` 

