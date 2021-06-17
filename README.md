
## Server Requirements
Requirements for server:
* Python >= 3.x with pip
* Node >= v12.14
* PHP >= 7.3
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Composer
* MySQL 5.7+

## Setup
To run this project:


Installing requirements:
```
$ git clone https://github.com/karljanar/Suvepraktika2021.git
$ cd Suvepraktika2021
$ composer install --optimize-autoloader --no-dev
$ composer update
$ npm install
$ pip install -r requirements.txt 
```
* Create mysql database, then
```
$ cp .env.exapmle .env
$ vim .env
```
* Edit .env to your needs, DB_CONNECTION must be mysql, MAIL_* have to be filled.
```
$ php artisan config:cache
$ php artisan route:cache
$ php artisan view:cache
$ php artisan migrate:fresh --seed
```

