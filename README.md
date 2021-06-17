
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
$ npm install --production
$ pip install -r requirements.txt 
or
$ pip3 install -r requirements.txt 
```
* Create mysql database, then
```
$ cp .env.example .env
$ vim .env
```
* Edit .env to your needs, DB_CONNECTION must be mysql, MAIL_* have to be filled.
```
$ php artisan migrate:fresh --seed
```

* Adding cron job to server
```
$ * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
````

* If neede, give permission to /bootsrap , /storage/logs and .env file
* try:
```
$ chmod -R gu+w storage/
$ chmod -R guo+w storage/
$ chmod -R gu+w bootstrap/cache/
$ chmod -R guo+w bootstrap/cache/
$ chmod -R gu+w .env
$ chmod -R guo+w .env
```
```
$ php artisan key:generate
```
* For next steps follow: https://laravel.com/docs/8.x/deployment



