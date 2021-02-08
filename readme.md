# MyBlog
> Простой сервис для ведения личного блога.


MyBlog написан с использованием PHP фреймворка Laravel и для удобства использования обернут в многоконтейнерное окружение (Docker + Docker Compose) 

## Установка

OS X & Linux:

```sh
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
docker-compose exec app ln -s /var/www/html/storage/app/public /var/www/html/public/storage
```
## Использование
Для входа в админку добавьте в адресной строке ```/admin```   
 
Логин: default@gmail.com  
Пароль: 1234qwer
