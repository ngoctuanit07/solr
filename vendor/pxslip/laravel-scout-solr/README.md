# Solr Engine for Scout #

[![Latest Stable Version](https://poser.pugx.org/pxslip/laravel-scout-solr/version?format=flat)](https://packagist.org/packages/pxslip/laravel-scout-solr)
[![Latest Unstable Version](https://poser.pugx.org/pxslip/laravel-scout-solr/v/unstable?format=flat)](//packagist.org/packages/pxslip/laravel-scout-solr)
[![Total Downloads](https://poser.pugx.org/pxslip/laravel-scout-solr/downloads?format=flat)](https://packagist.org/packages/pxslip/laravel-scout-solr)

This engine provides the interface between Laravel Scout and a Solr instance.

## Installation ##

`composer require pxslip/laravel-scout-solr`

For Laravel <= 5.4 the service provider should be registered in `config/app.php`

```php
'providers' => [
    // ...other providers
    Scout\Solr\ScoutSolrServiceProvider::class,
]
```

## Usage ##

As the engine uses some functionality that is not fully compatible with `Laravel\Scout\Builder` and `Laravel\Scout\Searchable` you will need to use the `Scout\Solr\Builder` and `Scout\Solr\Searchable` versions instead:

```php
use Scout\Solr\Searchable;

class MyModel extends Model {
    use Searchable;
    ...
}

// and then to perform a search

MyModel::where(...)
    ->orWhere(...)
    ->facetField(...)
```

## TO DO ##

- [x] Add bindings instead of just passing the string for better escaping
- [x] Add nested querying to Builder
- [x] Add nested querying to ScoutEngine
- [ ] Write tests
