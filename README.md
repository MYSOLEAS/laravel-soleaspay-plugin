# Package laravel pour le paiement en ligne via soleaspay

<!-- [![Latest Version on Packagist](https://img.shields.io/packagist/v/mysoleas/package-sopay.svg?style=flat-square)](https://packagist.org/packages/mysoleas/package-sopay)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mysoleas/package-sopay/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mysoleas/package-sopay/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mysoleas/package-sopay/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mysoleas/package-sopay/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mysoleas/package-sopay.svg?style=flat-square)](https://packagist.org/packages/mysoleas/package-sopay) -->

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://app.soleaspay.com/images/sopay.png" width="419px" />](https://soleaspay.com)

We invest a lot of resources in the creation of packages to facilitate the integration of online payments via our [soleaspay platform](https://soleaspay.com) . You can support us by using our package on your laravel application.


## Installation

You can install the package via composer:

```bash
composer require mysoleas/package-sopay
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="package-sopay-config"
```

You must now add your api-key provided by our soleaspay platform in the configuration file named __package-sopay.php__ located in the config directory of your application.This is the contents of the published config file:

```php
return [
    'x-api-key' => 'your api key'
];
```
to finish you just have to send the following information :  
* service (orange_money,mtn_mobile_money,bitcoin,paypal,express_union,perfect_money,litecoin,dogecoin);  
* wallet;  
* amount;  
* currency;  
* order_id;  

To do this you must include the Packagesopay class in your file to be able to use our function __processPayment(service,wallet,amount,currency,order_id)__. Here is a usage pattern :

```php
<?php

namespace App\Http\Controllers;
use Mysoleas\PackageSopay\PackageSopay;

class TestController extends Controller
{
    public function myControllerMethod() {
        $myClassInstance = new PackageSopay();
        $myClassInstance->processPayment('mtn_mobile_money',900654321,100000,"XAF","123456789");
    }
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mysoleas](https://mysoleas.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
