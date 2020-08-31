# Laravel Global Settings

[![Latest Version on Packagist](https://img.shields.io/packagist/v/scriptingbeating/global-settings.svg?style=flat-square)](https://packagist.org/packages/scriptingbeating/global-settings)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)

It stores all your laravel settings in database and provides a simple api to work with those settings. It also type cast your values into the specified format.

## Installation

You can install the package via composer:

```bash
composer require scriptingbeating/laravel-global-settings
```

Publish the migration:

```bash
php artisan vendor:publish --provider="ScriptingBeating\GlobalSetting\GlobalSettingServiceProvider" --tag="migrations"
```

Run your migrations:

```bash
php artisan migrate
```

You will get a table `global_settings` in your database which mainly three columns
`key` to store setting name, `value` to store setting value and `type` in which value should be type casted.


Supported Casting Type:

```bash
string
int or integer
bool or boolean
array
object
```

## Usage

``` php
global_setting()->all();
global_setting()->get($key, $default = null);
global_setting()->set($key, $value);
global_setting()->set($key, $value, $type = 'string');
global_setting()->has($key);
global_setting()->remove($key);
```

Or You can also use `GlobalSetting` Facade.

``` php
GlobalSetting::all();
GlobalSetting::get($key, $default = null);
GlobalSetting::set($key, $value);
GlobalSetting::set($key, $value, $type = 'string');
GlobalSetting::has($key);
GlobalSetting::remove($key);
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email mohansharma201.ms@gmail.com instead of using the issue tracker.

## Credits

- [Mohan Sharma](https://github.com/scriptingbeating)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.