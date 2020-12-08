

# Laravel UserAPI

## Description

API made on laravel frame work with possibility to respond on 3 requests.

1. POST /login - Possible only for registered users. Request example:
```
{
"email":"bob@gmail.com",
"password":"amazingpassword"
}
```
2. GET /me - Possible only for authorized users. This request should respond with user data:
```
{
"name":"bob",
"email":"bob@gmail.com",
"phone":"99933999"
}
```
3. PUT /me - Possible only for authorized users to change their phone number. This request accepts json data with new phone number: 
```
{
"number":"37122233344"
}
```


## Project setup

Copy .env.example file to .env on the root folder.

Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

```
npm install

composer install

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan passport:install

php artisan serve
```

After server is up and running register with desired name/email/password on laravel page.
Fill your new email and password on  PostLoginTest.php line 13. ``` ['email' => 'bob@gmail.com', 'password' => '123456']```

To run tests: ``` php artisan test ``` 

To use PUT /me request, you must set plain text token from POST /login response, as Bearer Token in Authorization section in Postman or as header - `Authorization: 'Bearer yourtokenrighthere'`
![alt text](https://i.imgur.com/0Do80ek.png)



