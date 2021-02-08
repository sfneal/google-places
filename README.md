# Google Places

[![Packagist PHP support](https://img.shields.io/packagist/php-v/sfneal/google-places)](https://packagist.org/packages/sfneal/google-places)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/sfneal/google-places.svg?style=flat-square)](https://packagist.org/packages/sfneal/google-places)
[![StyleCI](https://github.styleci.io/repos/289320434/shield?branch=master)](https://github.styleci.io/repos/289320434?branch=master)
[![Build Status](https://travis-ci.com/sfneal/google-places.svg?branch=master&style=flat-square)](https://travis-ci.com/sfneal/google-places)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sfneal/google-places/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sfneal/google-places/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/sfneal/google-places.svg?style=flat-square)](https://packagist.org/packages/sfneal/google-places)

Actions & Controllers for interacting with the Google Places API through Laravel applications

## Installation

You can install the package via composer:

```bash
composer require sfneal/google-places
```

## Usage

Publish the config to overwrite env values.
``` php
php artisan vendor:publish --provider="Sfneal\Healthy\Providers\HealthyServiceProvider"
```

Add the routes to your application.
``` php
Route::prefix('')->group(base_path('vendor/sfneal/google-places/routes/google-places.php')); 
```

Autocomplete places queries by inputting a part of the place's name. 
``` php
/places/city?q=boston

>>> Array
(
    [total_count] => 5
    [items] => Array
        (
            [0] => Array
                (
                    [id] => Boston, MA
                    [text] => Boston, MA
                    [place_id] => ChIJGzE9DS1l44kRoOhiASS_fHg
                )

            [1] => Array
                (
                    [id] => Boston, NY
                    [text] => Boston, NY
                    [place_id] => ChIJNfL3CvAB04kRz5mZnjI-6p0
                )

            [2] => Array
                (
                    [id] => Boston, OH
                    [text] => Boston, OH
                    [place_id] => ChIJcaM-YbLfMIgRrdGkTgGt2Og
                )

            [3] => Array
                (
                    [id] => New Boston, NH
                    [text] => New Boston, NH
                    [place_id] => ChIJDW6Uqegz4okRZT90sRNsDlk
                )

            [4] => Array
                (
                    [id] => Boston Corner, NY
                    [text] => Boston Corner, NY
                    [place_id] => ChIJU_hSBC2B3YkROSlb42LQxoM
                )

        )

)

```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email stephen.neal14@gmail.com instead of using the issue tracker.

## Credits

- [Stephen Neal](https://github.com/sfneal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).
