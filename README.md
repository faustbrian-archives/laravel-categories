# Laravel Categories

[![Latest Version](https://badgen.net/packagist/v/konceiver/laravel-categories)](https://packagist.org/packages/konceiver/laravel-categories)
[![Software License](https://badgen.net/packagist/license/konceiver/laravel-categories)](https://packagist.org/packages/konceiver/laravel-categories)
[![Build Status](https://img.shields.io/github/workflow/status/konceiver/laravel-categories/run-tests?label=tests)](https://github.com/konceiver/laravel-categories/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Coverage Status](https://badgen.net/codeclimate/coverage/konceiver/laravel-categories)](https://codeclimate.com/github/konceiver/laravel-categories)
[![Quality Score](https://badgen.net/codeclimate/maintainability/konceiver/laravel-categories)](https://codeclimate.com/github/konceiver/laravel-categories)
[![Total Downloads](https://badgen.net/packagist/dt/konceiver/laravel-categories)](https://packagist.org/packages/konceiver/laravel-categories)

This package was created by, and is maintained by [Brian Faust](https://github.com/faustbrian), and provides categories for Laravel Eloquent Models.

## Installation

```bash
composer require konceiver/laravel-categories
```

## Usage

Check [lazychaser/laravel-nestedset](https://github.com/lazychaser/laravel-nestedset) to learn how to create, update, delete, etc. categories.

### Setup a Model

``` php
<?php

namespace App;

use Konceiver\Categories\Concerns\HasCategories;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasCategories;
}
```

### Get an array with ids and names of categories (useful for drop-downs)

```php
$post->categoriesList();
```

### Attach the Post Model these Categories

```php
$post->syncCategories([Category::find(1), Category::find(2), Category::find(3)]);
```

### Detach the Post Model from these Categories

```php
$post->syncCategories([]);
```

### Detach the Post Model from all Categories and attach it to the new ones

```php
$post->syncCategories([Category::find(1), Category::find(3)]);
```

### Attach the Post Model to the given Category

```php
$post->assignCategory(Category::find(1));
```

### Detach the Post Model from the given Category

```php
$post->removeCategory(Category::find(1));
```

### Get all Posts that are attached to the given Category

```php
Category::first()->entries(Post::class)->get();
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@konceiver.dev. All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## Support Us

We invest a lot of resources into creating and maintaining our packages. You can support us and the development through [GitHub Sponsors](https://github.com/sponsors/faustbrian).

## License

Laravel Categories is an open-sourced software licensed under the [MPL-2.0](LICENSE.md).
