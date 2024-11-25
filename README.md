install
```
composer install
```

create database

add .env file  
```
cp .env.example .env
```

Edit .env file 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simple
DB_USERNAME=root
DB_PASSWORD=

create key
```
php artisan key:generate
```

create tables simple
migrate
```
php artisan migrate
```

seed
```
php artisan db:seed
```

link storage
```
php artisan storage:link
```

Create user
```
php artisan make:filament-user
```


run
```
php artisan serve
``` 

