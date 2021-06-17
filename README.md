# Haldustarkvara Pillow

Haldustarkvara Pillow on loodud lehekülgede ja veebide tõhusamaks haldamiseks. Pakkudes kasutajale graafilist liidest vajaliku infoga teeb see haldamise lihtsaks ja mugavaks. Samuti on kasutajal võimalus tellida teavitusi kui mõnel tema haldaval rakendusel on tulnud raamistikule uuendus.


# Pildid

![image](https://user-images.githubusercontent.com/71014202/122397457-a9b6ea80-cf81-11eb-86f2-cde983c67213.png)
![image](https://user-images.githubusercontent.com/71014202/122397516-b5a2ac80-cf81-11eb-9f7c-078b6bdf1f0a.png)


## 

Haldustarkvara Pillow on loodud Tallinna Ülikooli Digitehnoloogiate Instituudis tarkvaraarenduse projekti raames.

## Kasutatud tehnoloogiad

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


## Projekti loojad

**Karl Janar Kinkar** ,
**Margo Narõškin** ,
**Karl Tüksammel** ,
**Torm Erik Raudvee**

## Paigaldusjuhised

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

* If needed, give permission to /bootsrap , /storage/logs and .env file
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

## Litsents
**MIT Licence**

Copyright (c) 2021 Karl Janar Kinkar

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
