## About

This API will import data from a third party API using Laravel's artisan command and then save it to the database.

## Features
- RESTful routing
- Uses Laravel Doctrine as the database layer

## Basic Usage
```
php artisan import:data {count}
```

## API Endpoints
| Method | URI             | Action                                        |
|--------|-----------------|---------------------------------------------  |
|`GET`   |`/customers`     |`App\Http\Controllers\CustomerController@index`|
|`GET`   |`/customers/{id}`|`App\Http\Controllers\CustomerController@show` |
