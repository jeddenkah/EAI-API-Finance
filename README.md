# Step by Step
1. copy .env.example and rename to .env
2. make your database and rename DB_DATABASE in .env 
3. run ``composer install``
4. run ``php artisan migrate``
5. run ``php artisan key:generate``
6. finally, run ``php -S localhost:8000 -t public``
7. try the app using postman or something else