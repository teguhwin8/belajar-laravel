## Dummy Database
`https://www.mockaroo.com/`

## Syntacs

### Make Controller:

`php artisan make:controller ArticleController`

### Make Models:

`php artisan make:model Article`

### Make Migration:

`php artisan make:migration create_articles_table`

### Slugable

Source: `https://github.com/cviebrock/eloquent-sluggable`

Instalation:

`composer require cviebrock/eloquent-sluggable ^7.0`

`php artisan vendor:publish --provider="Cviebrock\EloquentSluggable\ServiceProvider"`

Note: `Install with the same version of laravel version`

### Authentication

Specifically for laravel 7:

Step 1: Install laravel UI

`composer require laravel/ui:^2.4`

Step 2: Implement Bootstrap UI and auth

`php artisan ui bootstrap --auth`

### Publish Laravel Mail and Notifications

`php artisan vendor:publish --tag=laravel-mail`

`php artisan vendor:publish --tag=laravel-notifications`

### Make middleware

`php artisan make:middleware CheckAdmin`
