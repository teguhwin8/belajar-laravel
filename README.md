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
