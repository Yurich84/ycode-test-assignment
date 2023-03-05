<p align="center">
<img height="80" src="https://laravel.com/img/logomark.min.svg">
<img height="80" src="https://vuejs.org/images/logo.png" alt="Vue logo">
</p>

## Extensions

- [Laravel 10](https://laravel.com/)
- [Vue3 Composition Api](https://vuejs.org)
- [Lodash](https://lodash.com) js utilities

## Install

- `git clone git@github.com:Yurich84/ycode-test-assignment.git`
- `cd ycode-test-assignment`


- `composer install-app` - this will deploy project

or deploy it manually

- `cp .env.example .env`
- `touch database/database.sqlite`
- `composer install`
- `php artisan key:generate`
- `php artisan migrate --seed`

Add Ycode credentials


- `YCODE_API_URL`
- `YCODE_API_TOKEN`
- `YCODE_PRODUCTS_COLLECTION`
- `YCODE_ORDERS_COLLECTION`
- `YCODE_ORDER_ITEMS_COLLECTION`

## Testing

- `php artisan test`

## Run

- `php artisan serv`
- `npm run dev`

go to http://localhost:8000

## Description
For ease of deployment, the application runs on sqlite, but you also can run it in docker instead.
