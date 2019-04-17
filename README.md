# CEM (Company Employee Management)


Before serving the server please do the following:
- composer install
- update the env to setup database and smtp server
- php artisan migrate
- php artisan db:seed --class=UsersTableSeeder
- php artisan storage:link
- php artisan serve
- Main user credentials: admin@admin.com 'password' 